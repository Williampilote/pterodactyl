<body id="body-pd">


<div class="">
    @extends('templates/wrapper', [
    'css' => ['body' => 'bg-neutral-800'],
    ])

    @section('container')
    @inject('BLang', 'Pterodactyl\Models\Billing\BLang')
    <div id="modal-portal"></div>
    <div id="app"></div>
    @endsection


</div>
@include('templates.Carbon.inc.style')
@include('templates.Carbon.inc.script')