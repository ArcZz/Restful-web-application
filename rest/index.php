<?php

header("Content-Type:application/json");

include_once "ez_sql_core.php";

include_once "ez_sql_mysqli.php";

/*
+--------+--------------+------+-----+---------+----------------+
| Field  | Type         | Null | Key | Default | Extra          |
+--------+--------------+------+-----+---------+----------------+
| id     | int(11)      | NO   | PRI | NULL    | auto_increment |
| name   | varchar(255) | NO   |     | NULL    |                |
| price  | int(50)      | YES  |     | NULL    |                |
| status | int(3)       | YES  |     | NULL    |                |
+--------+--------------+------+-----+---------+----------------+

*/

if(!empty($_GET['name'])){

	$bookdb = new ezSQL_mysqli('zhang','some_pass','bookstore','localhost');
	$find=$_GET['name'];

	$exist = "available";
	$unexist = "unavailable";
	
	$book = $bookdb->get_row("SELECT id,price,status FROM book WHERE name = '$find'");
	

			if(($book->status)==1){
			$price = $exist;	
			}
			else{
			$price = $unexist;
			}  

			if (empty($price))
			{
				deliver_response(200,"book not found","book not available","unknown price","unknown book id");
			}else{
				$price1=$book->price;
				$price2=$book->id;
				deliver_response(200,"book found",$price,$price1,$price2);
			}
	}
else
	{
			deliver_response(400,"book not found","book not found","unknown price","unknown book id");
	}
	
	

function deliver_response($status, $status_message,$data,$data2,$data3)
	{
			header("HTTP/1.1 $status $status_message");
			$response['status']=$status;
			$response['status_message']=$status_message;
			$response['data']=$data;
			$response['price']=$data2;
			$response['id']=$data3;
			
			$json_response = json_encode($response);
			echo $json_response;			
	}
	
?>