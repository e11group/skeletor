
<?php

require_once '../../vendor/autoload.php';

use Herrera\Cli\Application;

$app = new Application('MyApp', '1.2.3');

$app->add('myCommand', function ($input, $output) use ($app) {
    
    $output->writeln('Hello, ' . $input->getArgument('name') . '!');

    
    return 123;
})->addArgument('name');

$app->run();

?> 