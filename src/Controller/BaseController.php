<?php
namespace easychat\Controller;

abstract class BaseController {
	
	/*
	 Render $template located in src/Views
	*/
	protected function render($template, array $vars = array())
    {
        extract($vars);
        include '../src/Views/'.$template;

    }
	/*
	 redirect to $url
	*/
    protected function redirectUrl($url)
    {
        header("location: $url",true,302);
        exit();
    }
	
}