
<?php

// TODO: separate concerns and meet psr-1, psr-2

require_once '../../vendor/autoload.php';

use Herrera\Cli\Application;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Weather\Skeletor;


$app = new Application('Summoner', '1.2.3');

$app->add('hello', function ($input, $output) use ($app) {
    
    $output->writeln('Hello, ' . $input->getArgument('name') . '!');

    return 123;
})->addArgument('name');



$app->add('summon', function ($input, $output) use ($app) {
    


    	$path = $_SERVER['DOCUMENT_ROOT']. 'bones/config/config.yml';


	try {

		$config_yaml = Yaml::parse($path);


	} catch (ParseException $e) {
   	
   	 	printf("Unable to parse the YAML string: %s", $e->getMessage());
	
	}

 


    
    return 123;
})->addArgument('name');




$app->run();

?> 