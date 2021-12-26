import React, { useEffect, useState } from 'react';
import tw, { TwStyle } from 'twin.macro';
import { faCircle, faEthernet, faHdd, faMemory, faMicrochip, faPowerOff } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { bytesToHuman, megabytesToHuman } from '@/helpers';
import TitledGreyBox from '@/components/elements/TitledGreyBox';
import { ServerContext } from '@/state/server';
import CopyOnClick from '@/components/elements/CopyOnClick';
import { SocketEvent, SocketRequest } from '@/components/server/events';
import styled from 'styled-components/macro';

import PowerControls from '@/components/server/PowerControls';
import Can from '@/components/elements/Can';


export type PowerAction = 'start' | 'stop' | 'restart' | 'kill';

interface Stats {
    memory: number;
    cpu: number;
    disk: number;
}

const DetailsItems = styled.div`
    & {
        display:flex;
        width:100%;
    }
    & .DetailsItem{
        background-color:var(--secondary);
        border-radius:3px;
        margin:5px;
        width:100%;
        padding:25px 25px;
        display:flex;
        align-items: center;
    }
    & .DetailsItem:first-of-type{
        margin-left:0px;
    }
    & .DetailsItem:last-of-type{
        margin-right:0px;
    }
    & .DetailsItem > p{
        display:flex;
        align-items: center;
    }
    & .DetailsItem > p > .Icon{
        font-size:1.5em;
    }
    & .DetailsItem > p > div > span{
        display:block;
    }
    @media (max-width:694px){
        &{
            display:block;
        }
        &{
            .DetailsItem{
                margin: 5px 0px;
            }
        }
    }
`;

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

const ServerDetails = () => {
    const [ stats, setStats ] = useState<Stats>({ memory: 0, cpu: 0, disk: 0 });

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
            <DetailsItems css={tw`mb-3`}>
                <div className='DetailsItem'>
                    <p>
                        <FontAwesomeIcon icon={faPowerOff} fixedWidth css={tw`mr-3`} className='Icon'/>
                        <div css={tw`capitalize`}>
                            {!status ? 'Connecting...' : (isInstalling ? 'Installing' : (isTransferring) ? 'Transferring' : status)}
                        </div>
                    </p>
                </div>

                <div className='DetailsItem'>
                    <p>
                        <FontAwesomeIcon icon={faMicrochip} fixedWidth css={tw`mr-3`} className='Icon'/>
                        <div>
                            {stats.cpu.toFixed(2)}%
                            <span css={tw`text-neutral-500`}> / {cpuLimit}</span>
                        </div>
                    </p>
                </div>

                <div className='DetailsItem'>
                    <p>
                        <FontAwesomeIcon icon={faMemory} fixedWidth css={tw`mr-3`} className='Icon'/>
                        <div>
                            {bytesToHuman(stats.memory)}
                            <span css={tw`text-neutral-500`}> / {memoryLimit}</span>
                        </div>
                    </p>
                </div>

                <div className='DetailsItem'>
                    <p>
                        <FontAwesomeIcon icon={faHdd} fixedWidth css={tw`mr-3`} className='Icon'/>
                        <div>
                            {bytesToHuman(stats.disk)}
                            <span css={tw`text-neutral-500`}> / {diskLimit}</span>
                        </div>
                    </p>
                </div>
            </DetailsItems>
        </div>
    );
};

export default ServerDetails;
