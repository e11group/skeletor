<?php
namespace Weather\Skeletor;

class SchemaService
{
	
  protected $_schema;
  protected $_custom_table;

  public function __construct() {

    $this->_schema = new \Doctrine\DBAL\Schema\Schema();

  }

  public function set_custom_table($table = null) {

   if ($table) {
     $this->_custom_table = $this->_schema->createTable($table);
   }

  }

  public function get_custom_table() {
  	return $this->_custom_table;
  }


  public function add_column($name, $type, $options = null) {

    $options = empty($options) ? array() : array($options);

    $myForeign = $this->_schema->createTable("my_foreign");

    $add_col = $myForeign->addColumn($name, $type, $options);
  
 //   $add_column = $this->_custom_table->addColumn($name, $type, $options);


    $this->_custom_table = $myForeign;

  }

  public function set_primary_key($primary = array()) {

    $primary = empty($primary) ? array() : array($primary);
  
    $set_primary = $this->_custom_table->setPrimaryKey($primary);


  }

  public function add_unique_index($uid = array()) {

        $uid = empty($uid) ? array() : array($uid);

        $table = $this->_custom_table;


  
        $add_unique = $table->addUniqueIndex($uid);

  }

  public function create_sequence($sequence) {

        $create_sequence = $this->_schema->createSequence($sequence);      


  }

  public function add_foreign_key_constraint($primary_custom_table = array(), $foreign_id = array(), $id = array('id'), $option = array('onUpdate' => 'CASCADE')) {
        
       $add_foreign = $this->_custom_table->addForeignKeyConstraint($primary_custom_table, $foreign_id, $id, $option);     

  }

  public function get_queries($platform) {
    
  	      $queries = $this->_schema->toSql($platform); // get queries to create this schema.

          return $queries;

  }





}

?>