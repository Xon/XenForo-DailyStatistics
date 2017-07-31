<?php

class DailyStats_Install
{
    public static function installer($installedAddon)
    {
        if (XenForo_Application::$versionId < 1020031)
        {
            // note: this can't be phrased
            throw new XenForo_Exception('This add-on requires XenForo 1.2.0 Beta 1 or higher.', true);
        }

        XenForo_Model::create('XenForo_Model_Counters')->rebuildBoardTotalsCounter();
    }

    public static function uninstall()
    {
        XenForo_Model::create('XenForo_Model_DataRegistry')->delete('DS_newUsersToday');
        XenForo_Model::create('XenForo_Model_Counters')->rebuildBoardTotalsCounter();
    }
}
