<?php
namespace Skeletor\Controllers\Items;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class Items
{

       
    public static function get_items_page() {
      // caching
      \Flight::etag('skeletor-admin-view-template');

      // init models and params //

      $di = require VENDOR_DIR . '/aura/di/scripts/instance.php';

      $conn = \Skeletor\Methods\DatabaseService::bootstrapDBAL();
/*
// SQL Prepared Statements: Named
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $connection->prepare($sql);
$stmt->bindValue("id", 1);
$stmt->execute();

// ordered
$sql = "SELECT * FROM articles WHERE id = ? AND status = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $id);
$stmt->bindValue(2, $status);
$stmt->execute();

// shortcut
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $connection->executeQuery($sql, array($_GET['username']));

//transaction

$conn->beginTransaction();
try{
    // do stuff
    $conn->commit();
} catch(Exception $e) {
    $conn->rollback();
    throw $e;
}


// prepared

$statement = $conn->prepare('SELECT * FROM user');
$statement->execute();
$users = $statement->fetchAll();

/*
array(
  0 => array(
    'username' => 'jwage',
    'password' => 'changeme
  )
)
*/
/*
$count = $conn->executeUpdate('UPDATE user SET username = ? WHERE id = ?', array('jwage', 1));
echo $count; // 1

$statement = $conn->executeQuery('SELECT * FROM user WHERE username = ?', array('jwage'));
$user = $statement->fetch();

/*
array(
  0 => 'jwage',
  1 => 'changeme
)
*/
/*
$users = $conn->fetchAll('SELECT * FROM user');

/*
array(
  0 => array(
    'username' => 'jwage',
    'password' => 'changeme
  )
)
*/
/*
$username = $conn->fetchColumn('SELECT username FROM user WHERE id = ?', array(1), 0);
echo $username; // jwage

$user = $conn->fetchAssoc('SELECT * FROM user WHERE username = ?', array('jwage'));
/*
array(
  'username' => 'jwage',
  'password' => 'changeme
)
*/
/*
$conn->delete('user', array('id' => 1));
// DELETE FROM user WHERE id = ? (1)

$conn->insert('user', array('username' => 'jwage'));
// INSERT INTO user (username) VALUES (?) (jwage)

$conn->update('user', array('username' => 'jwage'), array('id' => 1));
// UPDATE user (username) VALUES (?) WHERE id = ? (jwage, 1)




while ($row = $stmt->fetch()) {
}
*/

/*
    $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

$request = $http->newRequest();

$request->setUrl('https://api.github.com/orgs/auraphp/repos');
$stack = $http->send($request);
$repos = json_decode($stack[0]->content);
foreach ($repos as $repo) {
    echo $repo->name . PHP_EOL;
}

*/
      echo \Skeletor\Views\Items\Items::load_page('Page', array());
   
    }


}

?>
