
<?php

// TODO: separate concerns and meet psr-1, psr-2

require_once '../../vendor/autoload.php';

use Herrera\Cli\Application;
use Symfony\Component\Yaml\Yaml;
use Skeletor;


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






$app->add('customSchema', function ($input, $output) use ($app) {

  $file_name = $input->getArgument('name');


  $conn = \Skeletor\Methods\DatabaseService::bootstrapDBAL();

  // get tables

  $rootpath = $_SERVER['DOCUMENT_ROOT'] . '../../bones/Custom/';
  
  $fileinfos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootpath)
  );
  
  $i = 0;

  foreach($fileinfos as $pathname => $fileinfo) {
    if (!$fileinfo->isFile()) continue;

    $pathname = $pathname;

    try {

    $tables_array[] = array(Yaml::parse($pathname));


  } catch (ParseException $e) {
    
      printf("Unable to parse the YAML string: %s", $e->getMessage());
  
  }

    $i++;
  }
  

  // parse that shit
        $schema =  new \Doctrine\DBAL\Schema\Schema();

  foreach($tables_array as $table_array) {
    

    foreach ($table_array as $row){

      // get values
      foreach ($row as $n => $r) {


  
        if (strpos($n,'Table') !== false) {
          
          // get required options
          $table_name = isset($r['TableName']) ? $r['TableName'] : null;

          if (empty($table_name)) {

            print 'Incomplete Config File';
            exit;

          }

          // set up the tabke
                $set_table = $schema->createTable($table_name);


        }


        if (strpos($n,'Column') !== false) {

          $column_name = isset($r['ColumnName']) ? $r['ColumnName'] : null;

          $type = isset($r['Type']) ? $r['Type'] : null;

          $options = isset($r['Options']) ? $r['Options'] : array();

        

          $options = empty($options) ? array() : $options;

          $add_col = $set_table->addColumn($column_name, $type, $options);

        }


      

      if (strpos($n,'Keys') !== false) {

        $primary_key = isset($r['PrimaryKey']) ? array($r['PrimaryKey']) : array();


          $set_primary = $set_table->setPrimaryKey($primary_key);


          // get optional tables stuff
          // foreign key

          $foreign = isset($r['Foreign']) ? $r['Foreign'] : null;

          if ($foreign) {
            foreach($foreign as $opt => $option) {

              if($opt == 'PrimaryTable') { $primary_table = array($option); }
              if($opt == 'PrimaryKey') { $primary_key = array($option); }
              if($opt == 'ForeignKey') { $foreign_key = array($option); }
              if($opt == 'onUpdate') { $onUpdate = array($option); }

            }

             //$add_foreign = $schema->add_foreign_key_constraint($primary_table, $primary_key, $foreign_key, $onUpdate);

          }

          // sequence
          $sequence = isset($r['Sequence']) ? $r['Sequence'] : null;

          if(!empty($sequence)) {

           $create_sequence = $schema->createSequence($sequence);


          }

          // unique index
          $unique_index = isset($r['UniqueIndex']) ? array($r['UniqueIndex']) : null;

          if(!empty($unique_index)) {

                   $add_unique = $set_table->addUniqueIndex($unique_index);

            
          }


 


       }

      }
      
    }

            $platform = $conn->getDatabasePlatform();

     // $myPlatform = new \Doctrine\DBAL\Platforms\MySqlPlatform();
     // $queries = $schema->toSql($myPlatform);
       $queries[] = $schema->toSql($platform); // get queries to create this schema.


        var_dump($queries);

  }


    return 123;

})->addArgument('name');



 


$app->run();

?> 