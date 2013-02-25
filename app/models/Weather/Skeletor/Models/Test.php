<?php
namespace Weather\Skeletor\Models;

/** @Entity **/
class Test
{

	private function construct() {

		
	
	}

	public static function get() {

		$user = new \Weather\Skeletor\Entities\User();
		$post = new \Weather\Skeletor\Entities\Post($user);

		$entityManager->persist($user);
		$entityManager->persist($post);
	}


}