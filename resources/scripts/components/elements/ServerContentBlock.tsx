import PageContentBlock, { PageContentBlockProps } from '@/components/elements/PageContentBlock';
import React from 'react';
import { ServerContext } from '@/state/server';
import ServerDetailsBlock from '@/components/server/ServerDetailsBlock';
import ServerDetails from '@/components/server/ServerDetails';
import PowerControls from '@/components/server/PowerControls';

import tw from 'twin.macro';

interface Props extends PageContentBlockProps {
    title: string;
}

export type PowerAction = 'start' | 'stop' | 'restart' | 'kill';

const ServerContentBlock: React.FC<Props> = ({ title, children, ...props }) => {
    const name = ServerContext.useStoreState(state => state.server.data!.name);

    return (
        <PageContentBlock title={`${name} | ${title}`} {...props}>
          <div>
              <div css={tw`w-full`}>
                  <ServerDetailsBlock/>
              </div>
              <div css={tw`w-full`}>
                  {children}
              </div>
          </div>
        </PageContentBlock>
    );
};

export default ServerContentBlock;
