<?php

class DailyStats_Listener
{
    public static function extendAdminHome($class, array &$extend)
    {
        $extend[] = 'DailyStats_ControllerAdmin_Home';
    }

    public static function extendForumController($class, array &$extend)
    {
        $extend[] = 'DailyStats_ControllerPublic_Forum';
    }

    public static function extendThreadController($class, array &$extend)
    {
        $extend[] = 'DailyStats_ControllerPublic_Thread';
    }

    public static function extendCategoryController($class, array &$extend)
    {
        $extend[] = 'DailyStats_ControllerPublic_Category';
    }

    public static function extendCTAController($class, array &$extend)
    {
        $extend[] = 'DailyStats_ControllerPublic_Thread';
    }

    public static function extendCountersModel($class, array &$extend)
    {
        $extend[] = 'DailyStats_Model_Counters';
    }
}
