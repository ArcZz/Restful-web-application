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
		<title>Dantalian</title>

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

     $.post("post.php", 
			{
		 	"bookid": $("#bookid").val(), 
		 	"userid": $("#userid").val(), 
		 	"datepicker": $("#datepicker").val()
			},

            function(data){
		    alert(data);
		 	console.log(data);
		 	var num = data.replace(/[^0-9]/g,'');
		 	
            cconsole.log(num);
            if(num==1){
              alert(" success rent");
           
            }
            else if (num==2) {
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
							<h1>Welcome, <?php echo "$username ";?> <span>Rent book online</span></h1>
							<nav class="codrops-demos">
								<br>
								<br>
								<a class="current-demo" href="login.php">log out</a>
							</nav>					
						</div>
						
						
						<div class="bb-custom-side">
							<div class="post">
								<h2 class="form-signin-heading">ENTER BOOK</h2>
            					<form  action="" method = "POST"  class="form-signin" >
								<div class="row form-group">
								<label for="poster">User</label>
								<input class="form-control" type="text" id="poster" name="poster" readonly="readonly" value="<?php echo "$username "?>">
								</div>
								<div class="row form-group">
								<label for="title">Book name</label>
									<select style=" height: 35px" class="form-control" id="title" name="title">
									  <option value = "a">Book a</option>
									  <option value = "b">Book b</option>
									  <option value = "c">Book c</option>
									  <option value = "d">Book d</option>
									  <option value = "e">Book e</option>
									  <option value = "f">Book f</option>
									</select>
								</div>
								<div class="row form-group">
									<input type = "submit" class="btn btn-info"  name = "submit"> 
								</div>
								</form>
								 
							<?php 
									
									 if(isset($_POST['submit'])){
									$name = $_POST['title']; 
									$url = "http://zhangzhi.eastus.cloudapp.azure.com/project/rest/$name";
									//Send request to Resourse        
									$client = curl_init($url);
									curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
									//get response from resource
									$response = curl_exec($client);
									//echo $response;
									//decode        
									$result = json_decode($response);
						 	?><div class="row form-group">
									<textarea  readonly="readonly" class="form-control" rows="2" id="comment" name="comment" placeholder="the information of book"><?php echo "Book_$name is $result->data / cost $result->price$ per month." ?></textarea>
								</div>

									
								<?php 
										 if($result->data == "available"){
								?>
											  <form  action = "" method = "POST"  class="form-signin" >
												 <div class="row form-group">
												
												<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION["id"]?>">
												<input type="hidden" id="bookid" name="bookid" value="<?php echo $result->id ?>">
													 
												<label for="datepicker">Return date</label>
												
												<input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="dd/mm/yy">
												</div>
												<div class="row form-group">
												<input type = "submit" class="btn btn-info" id="post" name="Rent" Value="Rent"> 
												</div>
											</form>
											 
								<?php }}
								?>
													
							</div>
						</div>
						
					</div>	
				

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




<?php



         	 

?>
