<?php

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Load up
     *
     *
    */


    // autoloader
    require_once '../vendor/autoload.php';

    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

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
    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    $entityManager = EntityManager::create($dbParams, $config);

    $em = $entityManager;


    $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    ));
    \Flight::set('em', $em);

foreach (getallheaders() as $name => $value) {
    if ($name == 'From') {
      \Flight::set('client-email',  $value);
    }
}
