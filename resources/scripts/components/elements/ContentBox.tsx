import React from 'react';
import FlashMessageRender from '@/components/FlashMessageRender';
import SpinnerOverlay from '@/components/elements/SpinnerOverlay';
import tw from 'twin.macro';
import styled from 'styled-components/macro';

const UserPermItem = styled.div`
    &{
        background-color:var(--secondary);
    }
`;

type Props = Readonly<React.DetailedHTMLProps<React.HTMLAttributes<HTMLDivElement>, HTMLDivElement> & {
    title?: string;
    borderColor?: string;
    showFlashes?: string | boolean;
    showLoadingOverlay?: boolean;
}>;

const ContentBox = ({ title, borderColor, showFlashes, showLoadingOverlay, children, ...props }: Props) => (
    <div {...props}>
        {showFlashes &&
        <FlashMessageRender
            byKey={typeof showFlashes === 'string' ? showFlashes : undefined}
            css={tw`mb-4`}
        />
        }
        <UserPermItem
            css={[
                tw`p-4 rounded shadow-lg relative`,
                !!borderColor && tw`border-t-4`,
            ]}
        >
            <SpinnerOverlay visible={showLoadingOverlay || false}/>
            {title && <h2 css={tw`text-neutral-900 mb-4 text-2xl`}>{title}</h2>}

            {children}
        </UserPermItem>
    </div>
);

export default ContentBox;
