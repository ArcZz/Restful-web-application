<?php
session_start();

	// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysqli.php";
	
	
	$username = htmlspecialchars($_POST['user']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['pass']);
	$isNew = $_POST["new"];
	$db = new ezSQL_mysqli('zhang','some_pass','bookstore','localhost');
//login returnning user attempt------------
if($isNew == "0"){
	
	$user = $db->get_row("SELECT password, id FROM user WHERE username = '$username'");
	if(isset($user->id)){
		if ($password == $user->password ){
			setcookie('userid', $username);
			$_SESSION["user"] = $username;
			$_SESSION["id"] = $user->id;
			echo "success login 3";
		}
		else{
			echo "password fail 2";
		}
	}
	else{
		echo "no that user 1";
	}
	
}

//sign in attempt
else{

//   +------------+--------------+------+-----+---------+----------------+
// | Field      | Type         | Null | Key | Default | Extra          |
// +------------+--------------+------+-----+---------+----------------+
// | id         | int(11)      | NO   | PRI | NULL    | auto_increment |
// | username   | varchar(20)  | YES  |     | NULL    |                |
// | email      | varchar(255) | YES  |     | NULL    |                |
// | name_first | varchar(30)  | YES  |     | NULL    |                |
// | name_last  | varchar(45)  | YES  |     | NULL    |                |
// | password   | varchar(256) | YES  |     | NULL    |                |

$user = $db->get_row("SELECT password, id FROM user WHERE username = '$username'");
	if(isset($user->id)){
		 echo "the user already existed 4";
	}
	else{
		//sign in!
		$db->query("INSERT INTO user (username, email, name_first, name_last, password) VALUES ('$username','$email','$fname','$lname','$password')");
		 echo "signin success 5";		
	}
}
	
 
?>
