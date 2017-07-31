<?php

class DailyStats_ControllerPublic_Forum extends XFCP_DailyStats_ControllerPublic_Forum
{
    public function actionNewUsers()
    {
        $DS_newUsersToday = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_newUsersToday');

        $viewParams = array('newuser' => $DS_newUsersToday);

        return $this->responseView('DailyStats_ControllerPublic_DailyStats_NewUsersView', 'dailystats_users_today', $viewParams);
    }
}
