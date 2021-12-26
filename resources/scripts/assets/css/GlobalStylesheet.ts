import tw from 'twin.macro';
import { createGlobalStyle } from 'styled-components/macro';

export default createGlobalStyle`
    body {
        transition:background .2s;
        ${tw`font-sans`};
        letter-spacing: 0.015em;
        color:var(--color);
        background-color:var(--background-color);
    }

    .toggler{
        cursor:pointer;
        position:fixed;
        right:15px;
        bottom:15px;
        padding:10px;
        background-color:var(--secondary-hover);
        border-radius:3px;
        display:block;
    }

    .toggler-inside{
        display:block !important;
        transform:rotate(0deg);
        transition:transform .4s;
    }

    .darkmode .toggler-inside{
        transform:rotate(-180deg);
    }

    h1, h2, h3, h4, h5, h6 {
        ${tw`font-medium tracking-normal font-header`};
    }

    p {
        ${tw`leading-snug font-sans`};
        color:var(--color);
    }

    form {
        ${tw`m-0`};
    }

    textarea, select, input, button, button:focus, button:focus-visible {
        ${tw`outline-none`};
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield !important;
    }

    /* Scroll Bar Style */
    ::-webkit-scrollbar {
        background: none;
        width: 16px;
        height: 16px;
    }

    ::-webkit-scrollbar-thumb {
        border: solid 0 rgb(0 0 0 / 0%);
        border-right-width: 4px;
        border-left-width: 4px;
        -webkit-border-radius: 9px 4px;
        -webkit-box-shadow: inset 0 0 0 1px hsl(211, 10%, 53%), inset 0 0 0 4px hsl(209deg 18% 30%);
    }

    ::-webkit-scrollbar-track-piece {
        margin: 4px 0;
    }

    ::-webkit-scrollbar-thumb:horizontal {
        border-right-width: 0;
        border-left-width: 0;
        border-top-width: 4px;
        border-bottom-width: 4px;
        -webkit-border-radius: 4px 9px;
    }

    ::-webkit-scrollbar-thumb:hover {
        -webkit-box-shadow:
        inset 0 0 0 1px var(--primary),
        inset 0 0 0 4px var(--primary);
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }
`;