import React from 'react';
import tw from 'twin.macro';
import Can from '@/components/elements/Can';
import Button from '@/components/elements/Button';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSkull } from '@fortawesome/free-solid-svg-icons';
import { PowerAction } from '@/components/server/ServerConsole';
import { ServerContext } from '@/state/server';
import styled from 'styled-components/macro';

const PowerControlsDiv = styled.div`
    & {
        background-color:var(--secondary);
    }
`;


const PowerControls = () => {
    const status = ServerContext.useStoreState(state => state.status.value);
    const instance = ServerContext.useStoreState(state => state.socket.instance);

    const sendPowerCommand = (command: PowerAction) => {
        instance && instance.send('set state', command);
    };

    return (
        <div css={tw`grid grid-cols-4 grid-rows-1 gap-2`}>
            <Can action={'control.start'}>
                <button
                disabled={status !== 'offline'}
                css={tw`h-12 w-12 flex justify-center justify-items-center rounded-full bg-green-500 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-green-400 text-white`}
                onClick={e => {
                    e.preventDefault();
                    sendPowerCommand('start');
                }}
                >
                <i className="fas fa-play" css={tw`mx-auto my-auto`}></i>
                </button>

            </Can>
            <Can action={'control.restart'}>
                <button
                disabled={!status}
                css={tw`h-12 w-12 flex justify-center justify-items-center rounded-full bg-neutral-500 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-neutral-400 text-white`}
                onClick={e => {
                    e.preventDefault();
                    sendPowerCommand('restart');
                }}
                >
                <i className="fas fa-redo" css={tw`mx-auto my-auto`}></i>
                </button>

            </Can>
            <Can action={'control.stop'}>
                <button
                disabled={!status || status === 'offline'}
                css={tw`h-12 w-12 flex justify-center justify-items-center rounded-full bg-red-500 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-red-400 text-white`}
                onClick={e => {
                    e.preventDefault();
                    sendPowerCommand('stop');
                }}
                >
                <i className="fas fa-power-off" css={tw`mx-auto my-auto`}></i>
                </button>

            </Can>
            <Can action={'control.stop'}>
                <button
                disabled={!status || status === 'offline'}
                css={tw`h-12 w-12 flex justify-center justify-items-center rounded-full bg-red-600 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-red-500 text-white`}
                onClick={e => {
                    e.preventDefault();
                    sendPowerCommand('kill');
                }}
                >
                <i className="fas fa-skull" css={tw`mx-auto my-auto`}></i>
                </button>

            </Can>
        </div>
    );
};

export default PowerControls;
