<?php
namespace Weather\Skeletor;

class DatabaseService
{

    public static function bootstrapDBAL() {
    
      $config = new \Doctrine\DBAL\Configuration();


      $connectionParams = array(
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => 'Xrxa5J2vCqCS',
        'dbname' => 'skeletor'
      );
    
      $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
  
      return $conn;

    }
    
/*
    protected $_table; 

    public function __construct($table) 
    {
        $this->_table = $table;
    }


    public function insert( array $insertData)
    {

        try {

             $insert = dibi::query('INSERT INTO ' . $this->_table, $insertData);

             return $insert;

            } catch (DibiException $e) {
        
                echo get_class($e), ': ', $e->getMessage(), "\n";
            
            }

    }

    public function selectSingle($columns, $where_column, $where_value) 

    {

        try {

            $select = dibi::query('SELECT '.$columns.' FROM '.$this->_table.' WHERE '.$where_column.' = ?', $where_value);

            return $select;
        
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

    public function selectAll($columns, $order = 'DESC')
    {

        $order_arr = array('id' => $order);

        try {

            $select = dibi::query('SELECT '.$columns.' FROM '.$this->_table. ' ORDER BY %by', $order_arr);

            return $select;
    
        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }


    }

    public function update( array $updateData, $where_column, $where_value) 

    { 
    
        try {
      
          $update = dibi::query("UPDATE ".$this->_table." SET", $updateData, " WHERE ".$where_column." = ? ", $where_value);
        
           return $update;

        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

    public function delete($where_column, $where_value)
    {

        try { 

            $delete = dibi::query('DELETE FROM '.$this->_table.' WHERE '.$where_column.' =? ', $where_value);

             return $delete;

        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }

    public function query($query, $value = '')
    {

        try { 

            $result = dibi::query($query, $value);

            return $result;

        } catch (DibiException $e) {
        
            echo get_class($e), ': ', $e->getMessage(), "\n";
            
        }

    }
*/

}
?>