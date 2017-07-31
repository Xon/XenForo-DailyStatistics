<?php

class DailyStats_Model_DailyStats extends XenForo_Model
{
    const DAY = 86400;

    //Posts
    public function getTotalPosts()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_post
            WHERE post_date > ?
            AND message_state = \'visible\'
        ', $time);
    }

    public function getTotalPostsWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'post\'
        ', $time);
    }

    public function getTotalPostsMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'post\'
        ', $time);
    }

    //Threads
    public function getTotalThreads()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_thread
            WHERE post_date > ?
            AND discussion_state = \'visible\'
        ', $time);
    }

    public function getTotalThreadsWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'thread\'
        ', $time);
    }

    public function getTotalThreadsMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'thread\'
        ', $time);
    }

    //Users
    public function getTotalUsers()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_user
            WHERE register_date > ?
            AND user_state = \'valid\' AND is_banned = \'0\'
        ', $time);
    }

    public function getNewUsersToday()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchAll('
            SELECT *
            FROM xf_user
            WHERE register_date > ?
            AND user_state = \'valid\' AND is_banned = \'0\'
        ORDER BY register_date DESC
        ', $time);
    }

    public function getTotalUsersWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'user_registration\'
        ', $time);
    }

    public function getTotalUsersMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'user_registration\'
        ', $time);
    }

    //Resource Manager
    public function getTotalResource()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_resource
            WHERE resource_date > ?
            AND resource_state = \'visible\'
        ', $time);
    }

    public function getTotalResourceWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'resource\'
        ', $time);
    }

    public function getTotalResourceMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'resource\'
        ', $time);
    }

    //XFMG
    public function getTotalXFMG()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xengallery_media
            WHERE media_date > ?
            AND media_state = \'visible\'
        ', $time);
    }

    public function getTotalXFMGWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'media\'
        ', $time);
    }

    public function getTotalXFMGMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'media\'
        ', $time);
    }

    //Showcase Items
    public function getTotalShowcase()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_nflj_showcase_item
            WHERE date_added > ?
            AND item_state = \'visible\'
        ', $time);
    }

    public function getTotalShowcaseWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'sc_items\'
        ', $time);
    }

    public function getTotalShowcaseMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT SUM( counter )
            FROM xf_stats_daily
            WHERE stats_date > ?
            AND stats_type =  \'sc_items\'
        ', $time);
    }

    //Active Users
    public function getActiveUsers()
    {
        $time = XenForo_Application::$time - 1*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_user
            WHERE last_activity > ?
        ', $time);
    }

    public function getActiveUsersWeek()
    {
        $time = XenForo_Application::$time - 7*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_user
            WHERE last_activity > ?
        ', $time);
    }

    public function getActiveUsersMonth()
    {
        $time = XenForo_Application::$time - 30*self::DAY;

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_user
            WHERE last_activity > ?
        ', $time);
    }

    protected function _getDailyStats()
    {
        return $this->getModelFromCache('DailyStats_Model_DailyStats');
    }
}
