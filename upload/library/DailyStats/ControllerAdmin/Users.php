<?php
	
	class DailyStats_ControllerAdmin_Users extends XenForo_ControllerAdmin_Home
	{
        public function actionIndex()
        {
			$DS_newUsersToday = $this->getModelFromCache('XenForo_Model_DataRegistry')->get('DS_newUsersToday');
			
			$viewParams = array('newuser' => $DS_newUsersToday); 
			
			return $this->responseView('XenForo_ViewAdmin', 'dailystats_users_today', $viewParams);
		}
		
        protected function _getAttachStatsModel()
        {
			return $this->getModelFromCache('DailyStats_Model_DailyStats');
		}
		
	}
