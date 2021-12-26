<?php

namespace Pterodactyl\Http\Controllers\Api\Client\Servers;

use Illuminate\Http\Request;
use Pterodactyl\Models\Server;
use Illuminate\Http\JsonResponse;
use Pterodactyl\Models\Permission;
use Illuminate\Support\Facades\Log;
use Pterodactyl\Repositories\Eloquent\SubuserRepository;
use Pterodactyl\Services\Subusers\SubuserCreationService;
use Pterodactyl\Repositories\Wings\DaemonServerRepository;
use Pterodactyl\Transformers\Api\Client\SubuserTransformer;
use Pterodactyl\Http\Controllers\Api\Client\ClientApiController;
use Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException;
use Pterodactyl\Http\Requests\Api\Client\Servers\Subusers\GetSubuserRequest;
use Pterodactyl\Http\Requests\Api\Client\Servers\Subusers\StoreSubuserRequest;
use Pterodactyl\Http\Requests\Api\Client\Servers\Subusers\DeleteSubuserRequest;
use Pterodactyl\Http\Requests\Api\Client\Servers\Subusers\UpdateSubuserRequest;
use Illuminate\Support\Facades\DB;

class SubuserController extends ClientApiController
{
    /**
     * @var \Pterodactyl\Repositories\Eloquent\SubuserRepository
     */
    private $repository;

    /**
     * @var \Pterodactyl\Services\Subusers\SubuserCreationService
     */
    private $creationService;

    /**
     * @var \Pterodactyl\Repositories\Wings\DaemonServerRepository
     */
    private $serverRepository;

    /**
     * SubuserController constructor.
     */
    public function __construct(
        SubuserRepository $repository,
        SubuserCreationService $creationService,
        DaemonServerRepository $serverRepository
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->creationService = $creationService;
        $this->serverRepository = $serverRepository;
    }

    /**
     * Return the users associated with this server instance.
     *
     * @return array
     */
    public function index(GetSubuserRequest $request, Server $server)
    {
        return $this->fractal->collection($server->subusers)
            ->transformWith($this->getTransformer(SubuserTransformer::class))
            ->toArray();
    }

    /**
     * Returns a single subuser associated with this server instance.
     *
     * @return array
     */
    public function view(GetSubuserRequest $request)
    {
        $subuser = $request->attributes->get('subuser');

        return $this->fractal->item($subuser)
            ->transformWith($this->getTransformer(SubuserTransformer::class))
            ->toArray();
    }

    /**
     * Create a new subuser for the given server.
     *
     * @return array
     *
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Service\Subuser\ServerSubuserExistsException
     * @throws \Pterodactyl\Exceptions\Service\Subuser\UserIsServerOwnerException
     * @throws \Throwable
     */
    public function store(StoreSubuserRequest $request, Server $server)
    {
        $response = $this->creationService->handle(
            $server,
            $request->input('email'),
            $this->getDefaultPermissions($request)
        );

        // Log
        $user = $request->user();
        activity()
            ->causedBy($user)
            ->performedOn($server)
            ->withProperties([
                'serverID' => $server->id, 
                'module' => 'Subuser', 
                'type' => 'Created',
                'status' => 'Success'
            ])
            ->log($user->name_first.' '.$user->name_last.' has Created Subuser "'.$request->input('email').'".');

        return $this->fractal->item($response)
            ->transformWith($this->getTransformer(SubuserTransformer::class))
            ->toArray();
    }

    /**
     * Update a given subuser in the system for the server.
     *
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function update(UpdateSubuserRequest $request, Server $server): array
    {
        /** @var \Pterodactyl\Models\Subuser $subuser */
        $subuser = $request->attributes->get('subuser');

        $permissions = $this->getDefaultPermissions($request);
        $current = $subuser->permissions;

        sort($permissions);
        sort($current);

        // Only update the database and hit up the Wings instance to invalidate JTI's if the permissions
        // have actually changed for the user.
        if ($permissions !== $current) {
            $this->repository->update($subuser->id, [
                'permissions' => $this->getDefaultPermissions($request),
            ]);

            try {
                $this->serverRepository->setServer($server)->revokeUserJTI($subuser->user_id);
            } catch (DaemonConnectionException $exception) {
                // Don't block this request if we can't connect to the Wings instance. Chances are it is
                // offline in this event and the token will be invalid anyways once Wings boots back.
                Log::warning($exception, ['user_id' => $subuser->user_id, 'server_id' => $server->id]);
            }
        }

        // Log
        $user = $request->user();
        $sub_user = DB::table('users')->where('id', '=', $subuser->user_id)->first();
        activity()
            ->causedBy($user)
            ->performedOn($server)
            ->withProperties([
                'serverID' => $server->id, 
                'module' => 'Subuser', 
                'type' => 'Updated',
                'status' => 'Warning'
            ])
            ->log($user->name_first.' '.$user->name_last.' has Updated Subuser "'.$sub_user->email.'".');

        return $this->fractal->item($subuser->refresh())
            ->transformWith($this->getTransformer(SubuserTransformer::class))
            ->toArray();
    }

    /**
     * Removes a subusers from a server's assignment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteSubuserRequest $request, Server $server)
    {
        /** @var \Pterodactyl\Models\Subuser $subuser */
        $subuser = $request->attributes->get('subuser');

        $this->repository->delete($subuser->id);

        try {
            $this->serverRepository->setServer($server)->revokeUserJTI($subuser->user_id);
        } catch (DaemonConnectionException $exception) {
            // Don't block this request if we can't connect to the Wings instance.
            Log::warning($exception, ['user_id' => $subuser->user_id, 'server_id' => $server->id]);
        }

        // Log
        $user = $request->user();
        $sub_user = DB::table('users')->where('id', '=', $subuser->user_id)->first();
        activity()
            ->causedBy($user)
            ->performedOn($server)
            ->withProperties([
                'serverID' => $server->id, 
                'module' => 'Subuser', 
                'type' => 'Daleted',
                'status' => 'Danger'
            ])
            ->log($user->name_first.' '.$user->name_last.' has Daleted Subuser "'.$sub_user->email.'".');
            
        return new JsonResponse([], JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * Returns the default permissions for all subusers to ensure none are ever removed wrongly.
     */
    protected function getDefaultPermissions(Request $request): array
    {
        return array_unique(array_merge($request->input('permissions') ?? [], [Permission::ACTION_WEBSOCKET_CONNECT]));
    }
}