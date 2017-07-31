<?php

class DailyStats_ControllerPublic_Thread extends XFCP_DailyStats_ControllerPublic_Thread
{
    public function actionIndex()
    {
        $parent = parent::actionIndex();

        if (!isset($parent->params['boardTotals']))
        {
            $parent->params['boardTotals'] = $this->_getBoardTotals();
        }

        return $parent;
    }

    public function actionFeatured()
    {
        if (!class_exists('CTA_FeaturedThreads_ControllerPublic_Thread', false))
        {
            return $this->getNotFoundResponse();
        }
        $parent = parent::actionFeatured();

        if (!isset($parent->params['boardTotals']))
        {
            $parent->params['boardTotals'] = $this->_getBoardTotals();
        }

        return $parent;
    }

    protected function _getBoardTotals()
    {
        $boardTotals = $this->getModelFromCache('XenForo_Model_DataRegistry')->get('boardTotals');
        if (!$boardTotals)
        {
            $boardTotals = $this->getModelFromCache('XenForo_Model_Counters')->rebuildBoardTotalsCounter();
        }

        return $boardTotals;
    }

    public function actionNewUsers()
    {
        $DS_newUsersToday = $this->getModelFromCache('XenForo_Model_DataRegistry')->get('DS_newUsersToday');

        $viewParams = array('newuser' => $DS_newUsersToday);

        return $this->responseView('DailyStats_ControllerPublic_DailyStats_NewUsersView', 'dailystats_users_today', $viewParams);
    }

    protected function _getDailyStatsModel()
    {
        return $this->getModelFromCache('DailyStats_Model_DailyStats');
    }
}
