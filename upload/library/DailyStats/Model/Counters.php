<?php

class DailyStats_Model_Counters extends XFCP_DailyStats_Model_Counters
{
    public function getBoardTotalsCounter()
    {
        $output = parent::getBoardTotalsCounter();

        $registry = $this->getModelFromCache('XenForo_Model_DataRegistry');

        $options = XenForo_Application::get('options');
        $extendedStats = $options->dailystats_acp_extended == '1';
        $DailyStatsModel = $this->_getDailyStatsModel();
        $output['DS_totalUsers'] = $DailyStatsModel->getTotalUsers();
        $output['DS_totalUsersWeek'] = $DailyStatsModel->getTotalUsersWeek();
        $output['DS_totalUsersMonth'] = $DailyStatsModel->getTotalUsersMonth();

        $output['DS_totalPosts'] = $DailyStatsModel->getTotalPosts();
        $output['DS_totalPostsWeek'] = $DailyStatsModel->getTotalPostsWeek();
        $output['DS_totalPostsMonth'] = $DailyStatsModel->getTotalPostsMonth();

        $output['DS_totalThreads'] = $DailyStatsModel->getTotalThreads();
        $output['DS_totalThreadsWeek'] = $DailyStatsModel->getTotalThreadsWeek();
        $output['DS_totalThreadsMonth'] = $DailyStatsModel->getTotalThreadsMonth();

        $output['DS_activeUsers'] = $DailyStatsModel->getActiveUsers();
        $output['DS_activeUsersWeek'] = $DailyStatsModel->getActiveUsersWeek();
        $output['DS_activeUsersMonth'] = $DailyStatsModel->getActiveUsersMonth();

        if ($extendedStats)
        {

        }


        //Check if RM option is enabled
        switch ($options->dailystats_rm_enable)
        {
            case '1':
                $output['DS_totalResource'] = $DailyStatsModel->getTotalResource();
                $output['DS_totalResourceWeek'] = $DailyStatsModel->getTotalResourceWeek();
                $output['DS_totalResourceMonth'] = $DailyStatsModel->getTotalResourceMonth();
                break;
        }

        //Check if Showcase option is enabled
        switch ($options->dailystats_sc_enable)
        {
            case '1':
                $output['DS_totalShowcase'] = $DailyStatsModel->getTotalShowcase();
                $output['DS_totalShowcaseWeek'] = $DailyStatsModel->getTotalShowcaseWeek();
                $output['DS_totalShowcaseMonth'] = $DailyStatsModel->getTotalShowcaseMonth();
                break;
        }

        //Check if XFMG option is enabled
        switch ($options->dailystats_xfmg_enable)
        {
            case '1':
                $output['DS_totalXFMG'] = $DailyStatsModel->getTotalXFMG();
                $output['DS_totalXFMGWeek'] = $DailyStatsModel->getTotalXFMGWeek();
                $output['DS_totalXFMGMonth'] = $DailyStatsModel->getTotalXFMGMonth();
                break;
        }


        return $output;
    }

    public function rebuildBoardTotalsCounter()
    {
		$DailyStatsModel = $this->_getDailyStatsModel();
        $newUsers = $DailyStatsModel->getNewUsersToday();
		$this->_getDataRegistryModel()->set('DS_newUsersToday', $newUsers);

        return parent::rebuildBoardTotalsCounter();
    }

    protected function _getDailyStatsModel()
    {
        return $this->getModelFromCache('DailyStats_Model_DailyStats');
    }
}
