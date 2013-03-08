<?php
namespace Weather\Skeletor;

class SchemaService
{
	
  protected $schema;
  protected $table;

  public function __construct() {

    $this->_schema = new \Doctrine\DBAL\Schema\Schema();

  }

  public function set_table($table = null) {

   if ($table) {
     $myTable = $this->_schema->createTable($table);
   }

  }

  public function get_table() {
  	return $this->_table;
  }

	 public static function createSchema() {

      $myTable->addColumn("id", "integer", array("unsigned" => true));
      $myTable->addColumn("username", "string", array("length" => 32));
      $myTable->setPrimaryKey(array("id"));
      $myTable->addUniqueIndex(array("username"));
      $schema->createSequence("my_table_seq");      

      $myForeign = $schema->createTable("my_foreign");
      $myForeign->addColumn("id", "integer");
      $myForeign->addColumn("user_id", "integer");
      $myForeign->addForeignKeyConstraint($myTable, array("user_id"), array("id"), array("onUpdate" => "CASCADE"));     

      $queries = $schema->toSql($myPlatform); // get queries to create this schema.
      $dropSchema = $schema->toDropSql($myPlatform); // get queries to safely delete this schema.

      }

  public function add_column($name, $type, $options = array()) {

    $myTable = $this->_schema->createTable($table);

  }

  public function set_primary_key($primary = array()) {



  }

  public function add_unique_ndex($uid = array()) {

  }

  public function create_sequence($sequence) {

  }

  public function add_foreign_key_constraint($primary_table, $foreign_id, $id = array('id'), $option = array('onUpdate' => 'CASCADE')) {

  }

  public function get_queries($platform) {
  	
  }





}

?>