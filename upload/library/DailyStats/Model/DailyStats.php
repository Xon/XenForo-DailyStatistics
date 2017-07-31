<?php

class DailyStats_Model_DailyStats extends XenForo_Model
{
    //Posts
    public function getTotalPosts()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_post
        WHERE post_date > UNIX_TIMESTAMP(CURDATE( ))
        AND message_state = \'visible\'
        ');
    }

    public function getTotalPostsWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'post\'
        ');
    }

    public function getTotalPostsMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'post\'
        ');
    }

    //Threads
    public function getTotalThreads()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_thread
        WHERE post_date > UNIX_TIMESTAMP(CURDATE( ))
        AND discussion_state = \'visible\'
        ');
    }

    public function getTotalThreadsWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'thread\'
        ');
    }

    public function getTotalThreadsMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'thread\'
        ');
    }

    //Users
    public function getTotalUsers()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_user
        WHERE register_date > UNIX_TIMESTAMP(CURDATE( ))
        AND user_state = \'valid\' AND is_banned = \'0\'
        ');
    }

    public function getNewUsersToday()
    {
        return $this->_getDb()->fetchAll('
        SELECT *
        FROM xf_user
        WHERE register_date > UNIX_TIMESTAMP(CURDATE( ))
        AND user_state = \'valid\' AND is_banned = \'0\'
        ORDER BY register_date DESC
        ');
    }

    public function getTotalUsersWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'user_registration\'
        ');
    }

    public function getTotalUsersMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'user_registration\'
        ');
    }

    //Resource Manager
    public function getTotalResource()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_resource
        WHERE resource_date > UNIX_TIMESTAMP(CURDATE( ))
        AND resource_state = \'visible\'
        ');
    }

    public function getTotalResourceWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'resource\'
        ');
    }

    public function getTotalResourceMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'resource\'
        ');
    }

    //XFMG
    public function getTotalXFMG()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xengallery_media
        WHERE media_date > UNIX_TIMESTAMP(CURDATE())
        AND media_state = \'visible\'
        ');
    }

    public function getTotalXFMGWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'media\'
        ');
    }

    public function getTotalXFMGMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'media\'
        ');
    }

    //Showcase Items
    public function getTotalShowcase()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_nflj_showcase_item
        WHERE date_added > UNIX_TIMESTAMP(CURDATE( ))
        AND item_state = \'visible\'
        ');
    }

    public function getTotalShowcaseWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        AND stats_type =  \'sc_items\'
        ');
    }

    public function getTotalShowcaseMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT SUM( counter )
        FROM xf_stats_daily
        WHERE stats_date > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        AND stats_type =  \'sc_items\'
        ');
    }

    //Active Users
    public function getActiveUsers()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_user
        WHERE last_activity > UNIX_TIMESTAMP(CURDATE( ))
        ');
    }

    public function getActiveUsersWeek()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_user
        WHERE last_activity > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 7 DAY ) )
        ');
    }

    public function getActiveUsersMonth()
    {
        return $this->_getDb()->fetchOne('
        SELECT COUNT(*)
        FROM xf_user
        WHERE last_activity > UNIX_TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL 30 DAY ) )
        ');
    }

    protected function _getDailyStats()
    {
        return $this->getModelFromCache('DailyStats_Model_DailyStats');
    }
}
