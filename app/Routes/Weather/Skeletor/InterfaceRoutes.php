<?php
namespace Skeletor;
	 
	interface RouteControllerInterface
	{
		public function getRequestHeaders();
		public function getRouteData();
	    public function run();
	}