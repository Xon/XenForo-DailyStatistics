<?php
	
	class DailyStats_ControllerPublic_Users extends XenForo_ControllerPublic_Forum
	{
        public function actionIndex()
        {
			$DS_newUsersToday = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_newUsersToday');
			
            $viewParams = array('newuser' => $DS_newUsersToday);
			
            return $this->responseView('DailyStats_ControllerPublic_UsersView', 'dailystats_users_today', $viewParams);
		}
		
        protected function _getAttachStatsModel()
        {
			return $this->getModelFromCache('DailyStats_Model_DailyStats');
		}
		
	}
