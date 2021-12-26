import React, { memo } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { IconProp } from '@fortawesome/fontawesome-svg-core';
import tw from 'twin.macro';
import styled from 'styled-components/macro';
import isEqual from 'react-fast-compare';

interface Props {
    icon?: IconProp;
    title: string | React.ReactNode;
    className?: string;
    children: React.ReactNode;
}

const GreyBox = styled.div`
    &{
        background-color:var(--secondary);
        border-radius:3px;
    }
    & > titleBox > p > title{
        color:var(--color);
    }
`;

const TitledGreyBox = ({ icon, title, children, className }: Props) => (
    <div className={className}>
        <GreyBox>
            <div css={tw`p-3`} className='titleBox'>
                {typeof title === 'string' ?
                    <p css={tw`text-sm uppercase`}>
                        {icon && <FontAwesomeIcon icon={icon} css={tw`mr-2`} className='title'/>}{title}
                    </p>
                    :
                    title
                }
            </div>
            <div css={tw`p-3`}>
                {children}
             </div>
        </GreyBox>
    </div>
);

export default memo(TitledGreyBox, isEqual);
