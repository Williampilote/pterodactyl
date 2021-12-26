import React, { forwardRef } from 'react';
import { Form } from 'formik';
import styled from 'styled-components/macro';
import { breakpoint } from '@/theme';
import FlashMessageRender from '@/components/FlashMessageRender';
import tw from 'twin.macro';

type Props = React.DetailedHTMLProps<React.FormHTMLAttributes<HTMLFormElement>, HTMLFormElement> & {
    title?: string;
}

export default forwardRef<HTMLFormElement, Props>(({ title, ...props }, ref) => (
    <div>
        {title &&
        <div className="text-center text-muted mb-4">
                <small>{title}</small>
        </div>
        }
        <FlashMessageRender css={tw`mb-2 px-1`}/>
        <Form {...props} ref={ref}>
            <div css={tw`w-full mx-1`}>
                <div css={tw`flex-1`}>
                    {props.children}
                </div>
            </div>
        </Form>
    </div>
));
