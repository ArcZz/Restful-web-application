<?php
session_start();

?>
<?php
// $.post("post.php", {"title": $("#title").val(), "poster": $("#poster").val(),
// "datepicker": $("#datepicker").val(), "comment": $("#comment").val(), "contact": $("#contact").val(),},


$link = mysqli_connect("localhost", "root", "", "lab10") or die("Connect Error " . mysqli_error($link));
$title = htmlspecialchars($_POST['title']);
$poster = htmlspecialchars($_POST['poster']);
$datepicker = htmlspecialchars($_POST['datepicker']);
$comment = htmlspecialchars($_POST['comment']);
$contact = htmlspecialchars($_POST['contact']);

	$query = "INSERT INTO favor (username, data, content,contact,title) VALUES (?,?,?,?,?)";
  $stmt=mysqli_prepare($link, $query) or die("Prepare:".mysql_error());
  mysqli_stmt_bind_param($stmt, "sssss", $poster, $datepicker,$comment,$contact,$title) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {
  			mysqli_stmt_close ($stmt);
				echo "success";
			}
    else{
      mysqli_stmt_close ($stmt);
      echo "fail";
    }


  mysqli_free_result($result);
?>
