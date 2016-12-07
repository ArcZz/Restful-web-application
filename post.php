<?php
session_start();

// 	"bookid": $("#bookid").val(), 
//		 	"poster": $("#poster").val(), 
//		 	"datepicker": $("#datepicker").val()

	// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysqli.php";
$rentdb = new ezSQL_mysqli('zhang','some_pass','bookstore','localhost');
	
$bookid = intval(htmlspecialchars($_POST['bookid']));
$userid = intval(htmlspecialchars($_POST['userid']));
$datepicker = htmlspecialchars($_POST['datepicker']);
/*
+---------+-------------+------+-----+---------+-------+
| Field   | Type        | Null | Key | Default | Extra |
+---------+-------------+------+-----+---------+-------+
| user_id | int(11)     | NO   | PRI | NULL    |       |
| book_id | int(11)     | NO   | PRI | NULL    |       |
| date    | varchar(32) | YES  |     | NULL    |       |
+---------+-------------+------+-----+---------+-------+

*/
if($rentdb->query("INSERT INTO rent1 (user_id, book_id, date) VALUES ($userid,$bookid,'$datepicker')")){
		echo "success1";
	
}
else{
   
      echo "fail2";
}


?>
