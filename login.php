<?php
session_start();
setcookie('userid', '', 1);
$username = empty($_COOKIE['userid']) ? '' : $_COOKIE['userid'];

// If the user is logged in, redirect them home
if ($username) {
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js demo-1">
	<head>
		<title>login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
		<script src="js/modernizr.custom.js"></script>
	   	<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<script src="js/login.js"></script>
    <style>
 body{
   background-color: #ECDAB0;
	 
 }
 .codrops-top{
   background:#585757;
   font-size: 0.80em;
 }
 header{
  margin-top: 60px;
  }
.hidden{

  display: none;
}
.navbar {

	min-height: 40px;
margin-bottom: 10px;
}
.top li a{
height: 10px;
}


    </style>
	</head>
	<body>
			<nav class="navbar navbar-inverse top" style="height = 100px">
				 <div class="container-fluid">
			 <form class="navbar-right">
				 <ul class="nav navbar-nav" id="navbar_top">
				 <li><a href="#">CS4830 Project</a></li>
				 <li><a href="#">ZhangZ</a></li>
				 <li><a href="#">Contact</a></li>
				 </ul>
			 </form>
		 </div>
	 </nav>

		<div class="container" style="width: 90%" >
			
	
			<header style="background-color: #ECDAB0;">
				<h1>Rent book online <span>Login & sign_in</span></h1>
			</header>
			<div class="main clearfix">
				<div class="bb-custom-wrapper">
          <div class="row" >
           <div class="col-md-1 col-sm-1 col-xs-1">
           </div>
           <div class="col-md-10 col-sm-10 col-xs-10">
              <form id="form" class="form-signin" >
                <div class="row form-group">
                <p class="thick">I am a
                <select id = "isNew" class = "border lightHover">
                <option value = "0">returning</option>
                <option value = "1">new</option>
              </select>	user
                </p>
              </div>

              <div class="row form-group">
                <label for="user">Username</label>
                <input class="form-control" type="text" id="user" name="user" placeholder="needs to be at least 2 letters long">
              </div>

              <div class="row form-group sign hidden">
                <label for="fname">First name</label>
                <input class="form-control" type="text" id="fname" name="fname" placeholder="needs to be at least 2 letters long">
              </div>

              <div class="row form-group sign hidden">
                <label for="lname">Last name</label>
                <input class="form-control" type="text" id="lname" name="lname" placeholder="needs to be at least 2 letters long">
              </div>

              <div class="row form-group sign hidden">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" placeholder="xxxx@mail.missouri.edu">
              </div>

              <div class="row form-group">
                <label for="pass">Password</label>
                <input class="form-control" type="password" id="pass" name="pass" placeholder="needs to be at least 4 letters long">
              </div>

              <div class="row form-group sign hidden">
                  <input class="form-control" type="password" id="pass1" name="pass1" placeholder="retype the password">
              </div>

              <div class="row form-group">
                  <button class=" btn btn-large btn-primary" type="button" id="submit" name="submit"> Submit</button>
              </div>
              <div id="hint" class="row form-group">

              </div>
            </form>
           </div>
  </div>
					<nav style="margin-bottom: 0.2em;">
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
					</nav>
					<div id="bb-bookblock" class="bb-bookblock">

						<div class="bb-item">
							<img src="images/demo1/7.jpg" alt="image01"/>
						</div>
						
						<div class="bb-item">
						  <img src="images/demo1/1.jpg" alt="image03"/>
						</div>
						<div class="bb-item">
							<img src="images/demo1/2.jpg" alt="image04"/>
						</div>
						<div class="bb-item">
						  <img src="images/demo1/3.jpg" alt="image05"/>
						</div>
						<div class="bb-item">
							<img src="images/demo1/5.jpg" alt="image06"/>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.min.js"></script>
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
							speed : 800,
							shadowSides : 0.8,
							shadowFlip : 0.7
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
