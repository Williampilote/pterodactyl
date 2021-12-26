import React from 'react';
import styled from 'styled-components/macro';
import { NavLink, Route, RouteComponentProps, Switch } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCogs, faTools, faHome, faUserCircle, faSignOutAlt, faTerminal, faFolder, faDatabase, faCalendar, faUsers, faArchive, faNetworkWired, faPlayCircle, faExternalLinkAlt } from '@fortawesome/free-solid-svg-icons';
import AccountOverviewContainer from '@/components/dashboard/AccountOverviewContainer';
import NavigationBar from '@/components/NavigationBar';
import DashboardContainer from '@/components/dashboard/DashboardContainer';
import AccountApiContainer from '@/components/dashboard/AccountApiContainer';
import { NotFound } from '@/components/elements/ScreenBlock';
import TransitionRouter from '@/TransitionRouter';
import SubNavigation from '@/components/elements/SubNavigation';

const FlexContainer = styled.div`
    & {
        display:flex;
        width:100%;
    }
    @media (max-width:694px){
        display:block;
    }
`;
const ContentBase = styled.div`
    & {
        width:100%;
    }
`;

export default ({ location }: RouteComponentProps) => (
    <FlexContainer>
        <>
            <ContentBase>
                <TransitionRouter>
                    <Switch location={location}>
                        <Route path={'/'} exact>
                            <DashboardContainer/>
                        </Route>
                        <Route path={'/account'} exact>
                            <AccountOverviewContainer/>
                        </Route>
                        <Route path={'/account/api'} exact>
                            <AccountApiContainer/>
                        </Route>
                        <Route path={'*'}>
                            <NotFound/>
                        </Route>
                    </Switch>
                </TransitionRouter>
            </ContentBase>
        </>
    </FlexContainer>
);
