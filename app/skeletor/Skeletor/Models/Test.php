<?php
namespace Skeletor\Models;

/** @Entity **/
class Test
{

	private function construct() {

		
	
	}

	public static function get() {

		$user = new \Skeletor\Entities\User();
		$post = new \Skeletor\Entities\Post($user);

		$entityManager->persist($user);
		$entityManager->persist($post);
	}


}