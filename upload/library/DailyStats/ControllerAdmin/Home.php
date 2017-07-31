<?php

class DailyStats_ControllerAdmin_Home extends XFCP_DailyStats_ControllerAdmin_Home
{
    public function actionIndex()
    {
        XenForo_Model::create('XenForo_Model_Counters')->rebuildBoardTotalsCounter();
        return parent::actionIndex();
    }
}		