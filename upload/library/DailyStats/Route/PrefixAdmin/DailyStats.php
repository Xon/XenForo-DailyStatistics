<?php
	
	class DailyStats_Route_PrefixAdmin_DailyStats implements XenForo_Route_Interface
	{
        /**
			* Match a specific route for an already matched prefix.
			*
			* @see XenForo_Route_Interface::match()
		*/
        public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
        {
			return $router->getRouteMatch('DailyStats_ControllerAdmin_Users', $routePath);
		}
	}
