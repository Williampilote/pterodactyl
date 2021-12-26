import React, { lazy, memo } from 'react';
import { ServerContext } from '@/state/server';
import Can from '@/components/elements/Can';
import ContentContainer from '@/components/elements/ContentContainer';
import tw from 'twin.macro';
import ServerContentBlock from '@/components/elements/ServerContentBlock';
import isEqual from 'react-fast-compare';
import PowerControls from '@/components/server/PowerControls';
import { EulaModalFeature, JavaVersionModalFeature } from '@feature/index';
import ErrorBoundary from '@/components/elements/ErrorBoundary';
import Spinner from '@/components/elements/Spinner';
import PlayerCounter from '@/components/server/PlayerCounter';

export type PowerAction = 'start' | 'stop' | 'restart' | 'kill';

const ChunkedConsole = lazy(() => import(/* webpackChunkName: "console" */'@/components/server/Console'));
const ChunkedStatGraphs = lazy(() => import(/* webpackChunkName: "graphs" */'@/components/server/StatGraphs'));

const ServerConsole = () => {
    const isInstalling = ServerContext.useStoreState(state => state.server.data!.isInstalling);
    const isTransferring = ServerContext.useStoreState(state => state.server.data!.isTransferring);
    const eggFeatures = ServerContext.useStoreState(state => state.server.data!.eggFeatures, isEqual);

    return (
        <ServerContentBlock title={'Console'}>
            <div css={tw`w-full`}>
                <Spinner.Suspense>
                    <ErrorBoundary>
                        <ChunkedConsole/>
                    </ErrorBoundary>
                    <ChunkedStatGraphs/>
                </Spinner.Suspense>
                <React.Suspense fallback={null}>
                    {eggFeatures.includes('eula') && <EulaModalFeature/>}
                    {eggFeatures.includes('java_version') && <JavaVersionModalFeature/>}
                </React.Suspense>
                <PlayerCounter></PlayerCounter>
            </div>
        </ServerContentBlock>
        
    );
};

export default memo(ServerConsole, isEqual);
