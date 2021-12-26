import styled from 'styled-components/macro';
import tw, { theme } from 'twin.macro';

const SubNavigation = styled.div`
    ${tw`w-full overflow-y-auto`};

    & {
        padding-bottom:90px;
        background-color:var(--secondary);
        max-width:72px;
        height:100%;
        min-height:100vh;
        border-right:1px solid var(--borders);
        position:relative;
    }
    &::after{
        z-index:-1;
        position:fixed;
        top:0;
        left:0;
        background-color:var(--secondary);
        border-right:1px solid var(--borders);
        height:100vh;
        width:72px;
        content:'';
    }

    & > div:first-of-type{
        border-bottom: 2px solid var(--borders);
        margin-bottom: 25px;
        padding: 25px 0px;
    }

    & > div {
        ${tw`mx-auto`};

        & > a, & > div {
            ${tw`block py-3 px-4 no-underline whitespace-nowrap transition-all duration-150`};

            &{
                text-align:center;
                color:var(--color);
                position:relative;
            }

            &:hover {
                ${tw`text-neutral-100`};
            }

            &:active, &.active {
                color:var(--primary);
            }
            &.ignore.active {
                color:var(--color);
            }
        }
    }
    
    & > div.subNavBottom{
        border-top: 2px solid var(--borders);
        padding-top:25px;
        padding-bottom:10px;
        position:absolute;
        bottom:0;
        width:100%;
    }


    @media (max-width: 694px){
        & {
            width:100%;
            max-width:100%;
            border-right:0px solid var(--borders);
            padding-bottom:0px;
            min-height:10px;
            height:auto;
            display:flex;
        }
        & > div {
            display:flex;
        }
        &::after{
            height:0;
            width:0;
            display:none;
        }
        & > div:first-of-type{
            border-bottom: 0px solid var(--borders);
            margin-bottom: 0px;
            padding: 0px 0px;
        }
        & > div.subNavBottom{
            width:0;
            height:0;
            display:none;
        }
    }
`;

export default SubNavigation;
