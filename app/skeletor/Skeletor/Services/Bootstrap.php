<?php
namespace Skeletor\Services;

class Bootstrap
{

	public function __construct() {

	}

	public function getEM() {
		 $isDevMode = true;


    if ($isDevMode == true) {
        $cache = new \Doctrine\Common\Cache\ArrayCache; 
    } else {
        $cache = new \Doctrine\Common\Cache\ApcCache;
    }

    $dbParams = array(
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => 'Xrxa5J2vCqCS',
        'dbname' => 'skeletor'
    );
    

    $paths = array('../app/skeletor/Skeletor/Entities');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    $entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);

        $em = $entityManager;


    $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    ));

    	return $em;
	}



}