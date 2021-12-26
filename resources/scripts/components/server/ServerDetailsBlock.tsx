import React, { useEffect, useState } from 'react';
import tw, { TwStyle } from 'twin.macro';
import { faCircle, faClock, faEthernet, faHdd, faMemory, faMicrochip, faPowerOff } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { bytesToHuman, megabytesToHuman } from '@/helpers';
import TitledGreyBox from '@/components/elements/TitledGreyBox';
import { ServerContext } from '@/state/server';
import CopyOnClick from '@/components/elements/CopyOnClick';
import { SocketEvent, SocketRequest } from '@/components/server/events';
import styled from 'styled-components/macro';
import UptimeDuration from '@/components/server/UptimeDuration';

import PowerControls from '@/components/server/PowerControls';
import Can from '@/components/elements/Can';


export type PowerAction = 'start' | 'stop' | 'restart' | 'kill';

interface Stats {
    memory: number;
    cpu: number;
    disk: number;
    uptime: number;
}

function statusToColor (status: string|null, installing: boolean): TwStyle {
    if (installing) {
        status = '';
    }

    switch (status) {
        case 'offline':
            return tw`text-red-500`;
        case 'running':
            return tw`text-green-500`;
        default:
            return tw`text-yellow-500`;
    }
}

const ServerDetailsBlock = () => {
    const [ stats, setStats ] = useState<Stats>({ memory: 0, cpu: 0, disk: 0, uptime: 0 });

    const status = ServerContext.useStoreState(state => state.status.value);
    const connected = ServerContext.useStoreState(state => state.socket.connected);
    const instance = ServerContext.useStoreState(state => state.socket.instance);

    const statsListener = (data: string) => {
        let stats: any = {};
        try {
            stats = JSON.parse(data);
        } catch (e) {
            return;
        }

        setStats({
            memory: stats.memory_bytes,
            cpu: stats.cpu_absolute,
            disk: stats.disk_bytes,
            uptime: stats.uptime || 0,
        });
    };

    useEffect(() => {
        if (!connected || !instance) {
            return;
        }

        instance.addListener(SocketEvent.STATS, statsListener);
        instance.send(SocketRequest.SEND_STATS);

        return () => {
            instance.removeListener(SocketEvent.STATS, statsListener);
        };
    }, [ instance, connected ]);

    const name = ServerContext.useStoreState(state => state.server.data!.name);
    const isInstalling = ServerContext.useStoreState(state => state.server.data!.isInstalling);
    const isTransferring = ServerContext.useStoreState(state => state.server.data!.isTransferring);
    const limits = ServerContext.useStoreState(state => state.server.data!.limits);
    const primaryAllocation = ServerContext.useStoreState(state => state.server.data!.allocations.filter(alloc => alloc.isDefault).map(
        allocation => (allocation.alias || allocation.ip) + ':' + allocation.port
    )).toString();

    const diskLimit = limits.disk ? megabytesToHuman(limits.disk) : 'Unlimited';
    const memoryLimit = limits.memory ? megabytesToHuman(limits.memory) : 'Unlimited';
    const cpuLimit = limits.cpu ? limits.cpu + '%' : 'Unlimited';

    return (
        <div>
            <div css={tw`flex mb-3 w-auto overflow-hidden flex-wrap`} style={{backgroundColor:"var(--secondary)", borderRadius:"3px", padding:"25px 25px"}}>
                <p> 
                    <h1 css={tw`text-lg`}>
                    <FontAwesomeIcon
                        icon={faCircle}
                        fixedWidth
                        css={[
                            tw`mr-1 mt-1`,
                            statusToColor(status, isInstalling || isTransferring),
                        ]}
                    />
                    </h1>
                </p>
                <div>
                    <h1 css={tw`text-xl text-neutral-400`}>
                        {name}
                    </h1>
                    <CopyOnClick text={primaryAllocation}>
                        <p css={tw`mt-2`}>
                            <FontAwesomeIcon icon={faEthernet} fixedWidth css={tw`mr-1`}/>
                            <code css={tw`ml-1`}>{primaryAllocation}</code>
                        </p>
                    </CopyOnClick>
                    <p css={tw`mt-2`}>
                    <FontAwesomeIcon icon={faClock} css={tw`mr-1`}/>
                    {stats.uptime > 0 &&
                    <span css={tw`ml-2 lowercase`}>
                        (<UptimeDuration uptime={stats.uptime / 1000}/>)
                    </span>
                    }
                    </p>
                </div>
                <div css={tw`ml-auto w-auto my-auto`}>
                <Can action={[ 'control.start', 'control.stop', 'control.restart' ]} matchAny>
                    <PowerControls/>
                </Can>
                </div>
            </div>
        </div>
    );
};

export default ServerDetailsBlock;
