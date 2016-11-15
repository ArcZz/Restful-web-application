<!DOCTYPE html>

<?php
session_start();
// A user has to have logged in order to have this 'username' cookie
$username = empty($_COOKIE['userid']) ? '' : $_COOKIE['userid'];
// If the cookie isn't there, send them back to the login
 if (!$username) {
	header("Location: login.php");
	exit;
 }
?>
<html lang="en" class="no-js demo-4">
	<head>
		<meta charset="UTF-8" />
		<title>Demo</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
		<link rel="stylesheet" type="text/css" href="css/demo4.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/book.css" />
		<script src="js/modernizr.custom.js"></script>
  	<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.min.js"></script>

 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $("#post").click(function(){

     $.post("post.php", {"title": $("#title").val(), "poster": $("#poster").val(), "datepicker": $("#datepicker").val(), "comment": $("#comment").val(), "contact": $("#contact").val()},

            function(data){
            console.log(data);
            if(data=="success"){
              alert(" success post");
              location.reload(true);
            }
            else if (data=="fail") {
              alert("data is wrong! retype again");
            }
          });
        });

   });
  </script>

	</head>
	<body>
		<div class="container">
			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item">
						<div class="bb-custom-firstpage">
							<h1>Welcome, <?php echo "$username ";?> <span>It's my pleasure to meet you</span></h1>
							<nav class="codrops-demos">
								<a class="current-demo" href="login.php">log out</a>
							</nav>
						</div>
						<div class="bb-custom-side">

	    	 <div class="post">
            <form id="form1" class="form-signin" >
              <h2 class="form-signin-heading">Post my request</h2>
              <br>
						<div class="row form-group">
	              <label for="title">Title</label>
							  <input class="form-control" type="text" id="title" name="title" placeholder="the title of ur request">
						</div>
						<div class="row form-group">
								<label for="poster">User</label>
								<input class="form-control" type="text" id="poster" name="poster" value="<?php echo "$username ";?>">
						</div>
					  <div class="row form-group">
							<label for="datepicker">Complete date</label>
              <input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="dd/mm/yy">
					   </div>
						 <div class="row form-group">
               <label for="comment">Content:</label>
             <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Could u help me..."></textarea>
             </div>
						<div class="row form-group ">
							<label for="contact">Phone number/ Email</label>
							<input class="form-control" type="text" id="contact" name="contact" placeholder=" ">
						</div>
						<div class="row form-group">
							<button class="post-btn" type="button" id="post" name="post"> Post</button>
					  </div>
					</form>
				</div>

						</div>
					</div>

					<?php
// // 				| Field    | Type         | Null | Key | Default | Extra          |
// +----------+--------------+------+-----+---------+----------------+
// | id       | int(11)      | NO   | PRI | NULL    | auto_increment |
// | username | varchar(20)  | YES  |     | NULL    |                |
// | data     | varchar(20)  | YES  |     | NULL    |                |
// | content  | varchar(255) | YES  |     | NULL    |                |
// | contact  | varchar(255) | YES  |     | NULL    |                |
// | title    | varchar(25)  | YES  |     | NULL    |                |
// +----------+--------------+------+-----+---------+----------------+
						$link = mysqli_connect("localhost", "root", "", "lab10")or die('Could not connect:' . mysql_error());
						$sql="SELECT id, username, data, data,content,contact,title FROM favor ORDER BY id ASC";
					 $i=0;
						$result = mysqli_query($link, $sql);
						while($row = mysqli_fetch_array($result)){
							$i++;
						if($row["id"]%2==1){
								echo "<div class="."bb-item".">";
								echo "<div class="."bb-custom-side".">";
					     	echo "<p><strong>Title: " . $row["title"] .  "</strong></br></br>";
								echo "Name:  " . $row["username"] ."</br>";
								echo "End date:  " . $row["data"] ."</br>";
								echo "Contact:  " . $row["contact"] ."</p>";
								echo "<div class="."poster"."> <p>Content:  " . $row["content"] ."</p></div></div>";

						}
						else{
							echo "<div class="."bb-custom-side".">";
							echo "<p><strong>Title: " . $row["title"] .  "</strong></br><br>";
							echo "Name:  " . $row["username"] ."</br>";
							echo "End date:  " . $row["data"] ."</br>";
							echo "Contact:  " . $row["contact"] ."</p>";
							echo "<div class="."poster"."> <p>Content:  " . $row["content"] ."</p></div></div></div>";

						}
					  }
						if($i%2==1){
							echo "<div class="."bb-custom-side"."><p>To be continue</p></div></div>";
						}

						mysqli_free_result($result);
         	 ?>

					<div class="bb-item">
						<div class="bb-custom-side">
							<p>To be continue</p>
						</div>
						<div class="bb-custom-side">
							<p>To be continue</p>
						</div>
					</div>
					</div>
				<nav>
					<a id="bb-nav-first"href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
					<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
					<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
					<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
				</nav>

			</div>

		</div>

		<script>
			var Page = (function() {

				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 1000,
							shadowSides : 0.8,
							shadowFlip : 0.4
						} );
						initEvents();
					},
					initEvents = function() {

						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );

						// add swipe events
						$slides.on( {
							'swipeleft' : function( event ) {
								config.$bookBlock.bookblock( 'next' );
								return false;
							},
							'swiperight' : function( event ) {
								config.$bookBlock.bookblock( 'prev' );
								return false;
							}
						} );

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}
						} );
					};

					return { init : init };

			})();
		</script>
		<script>
				Page.init();
		</script>
	</body>
</html>
