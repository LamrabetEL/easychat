<?php
class Routing
{

	/*
	Hundle request and send to right controller and Action 
	*/
    static public function route()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
		$route = self::hundleRequest();
		$controller = "Easychat\\Controller\\".$route['controller'].'Controller';
        if (class_exists($controller)) {
            $controller = new $controller();

            if (method_exists($controller, $route['action'])) {

				if (!empty($route['param'])) {
                call_user_func_array([$controller, $route['action']], $args);
				} else {
					call_user_func([$controller, $route['action']]);
				}
				die();
            }
        }else{
			die('not found');
		}
	}
	/*
		hundle request to get controller and action
	*/
	
	public function hundleRequest(){
		
		$route = array();
		$sources           = explode('/', $_SERVER['REQUEST_URI']);
        $sources           = array_filter(array_filter($sources));
        $route['controller'] = ($c = array_shift($sources)) ? $c : ucfirst ( 'index' );
        $route['action']     = ($c = array_shift($sources)) ? $c : 'index';
        $route['param']       = (isset($sources[0])) ? $sources : [];
		return $route;
	}
	
    
}