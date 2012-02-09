<?php
ini_set("display_errors",1);


//connection example for MySQL:
require("MySQL.class.php");
$db = new MySQL_Wrapper("localhost", "root", "root", "test_database");




$id = $db->insertAndReturnID("INSERT INTO `users` (`email`,`first_name`,`last_name`) VALUES ('email','fist','name') ");


$id = $db->escape($id);

$test  = $db->getOneRow("SELECT * FROM `users` WHERE user_id='$id' LIMIT 1");
echo "<br/><pre>";
print_r($test);
echo "</pre><br/>";

foreach($db->getMultipleRows("SELECT * FROM `users`") as $row){
	echo $row["user_id"]."<br/>";
}


echo "loaded $id";

$test = $db->smartInsert("users", array('email','first_name','last_name'), array(array('me@tommy.com','firstest','best'),array('2nd email','blah','crush')));
echo $test;



/*
//connection example for MySQLi
require('MySQLi.class.php');
$db = new MySQLi_Wrapper("localhost", "root", "root", "test_database");
*/

/* All wrappers contain the following functions:
 * 
 * 		CORE FUNCTIONS:
 * 
 * 		connect (called when created)
 * 		select_db (called when created, can be called to change db)
 * 		query
 * 		fetch_array
 * 		num_rows
 * 		insert_id
 * 		escape
 * 
 * 
 * 		MORE FUNCTIONS:
 * 
 * 		getOneRow($query)
 * 			returns an array of the data, or false if anything but 1 was returned by the query
 * 			note, use LIMIT 1 in the query
 * 	
 * 		getMultipleRows($query)
 * 			returns a 2D array of the data, or false is nothing was returned by the query
 * 
 * 		insertAndReturnID($query)
 * 			returns the insert_id
 * 
 */

 /*
//insert a new row
$insert_id = $db->insertAndReturnID("INSERT INTO `test` (`col1`,`col2`) VALUES ('v1', 'v2')");

//OR, lets insert mutiple rows using the raw "query" function
$db->query("INSERT INTO `test` (`col1`,`col2`) VALUES ('v2', 'v2'),('v3','v3')");



//get one row of data
$data = $db->getOneRow("SELECT * FROM `test` WHERE `col1`='v1' LIMIT 1");

//get a 2d array of the data
foreach($db->getMultipleRows("SELECT * FROM `test`") as $row){
	echo $row["col1"]."<br/>";
}
  * 
  */





?>