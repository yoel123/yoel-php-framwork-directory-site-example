<?php
define("DB_NAME",'ydir');//database name
define("DB_USER", "root");//database username
define("DB_PASSWORD", "");//database password
define("DB_HOST", "localhost");//database host name
define("DB_PORT", "33063");//database port (if you dont need leave empty)

/*

pdo cheatsheet--------------------------------

$db = new PDO("mysql:host"=".DB_HOST.";dbname=".DB_NAME, $user, $pass);
//select
# UH-OH! Typed DELECT instead of SELECT!
  $DBH->prepare('DELECT name FROM people');

 //(UPDATE /INSERT 	)
 # STH means "Statement Handle" 
$STH = $DBH->prepare("INSERT INTO folks ( first_name ) values ( 'Cathy' )");
$STH->execute();

//insert arrays and objects
//arr
# the data we want to insert
$data = array( 'name' => 'Cathy', 'addr' => '9 Dark and Twisty', 'city' => 'Cardiff' );

//obj 
# a simple object
class person {
    public $name;
    public $addr;
    public $city;
 
    function __construct($n,$a,$c) {
        $this->name = $n;
        $this->addr = $a;
        $this->city = $c;
    }
    # etc ...
}
 
$cathy = new person('Cathy','9 Dark and Twisty','Cardiff');
 
# here's the fun part:
$STH = $DBH->("INSERT INTO folks (name, addr, city) value (:name, :addr, :city)");
$STH->execute((array)$cathy);

//FETCH_ASSOC
# using the shortcut ->query() method here since there are no variable
# values in the select statement.
$STH = $DBH->query('SELECT name, addr, city from folks');
 
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
 
while($row = $STH->fetch()) {
    echo $row['name'] . "\n";
    echo $row['addr'] . "\n";
    echo $row['city'] . "\n";
}

//FETCH_ASSOC2
$stmt = $db->query('SELECT * FROM table');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['field1'].' '.$row['field2']; //etc...
}

//lastInsertId
$DBH->lastInsertId();

//delete
$DBH->exec('DELETE FROM folks WHERE 1');

//like search
$stmt = $db->prepare("SELECT field FROM table WHERE field LIKE ?");
$stmt->bindValue(1, "%$search%", PDO::PARAM_STR);
$stmt->execute();

end pdo cheatsheet--------------------------------
*/

//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>