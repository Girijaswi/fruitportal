<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	 <title></title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="../css/login.css">
	 <style>
	 	body
	 	{
	 		background-image: url("../css/img4.jpg");
	 		background-repeat: no-repeat;
	 		background-attachment: fixed;
    		background-position: center;
    		background-size: cover;
	 		width: 100%;
	 		height: 100%;
	 	}

	 </style>	
</head>
<body>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Fruit Heaven</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <!--<li><a href="#">Page 3</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you a seller! or a buyer!</h4>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="../seller_reg.html">Seller</a></li>
                <li class="list-group-item"><a href="../buyer_reg.html">Buyer</a></li>                
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you a seller! or a buyer!</h4>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="seller_login.php">Seller</a></li>
                <li class="list-group-item"><a href="buyer_login.php">Buyer</a></li>                
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h3>Login</h3>
				<form action="sellercheck.php" method="POST">
						  <div class="form-group">
						    <label>Email:</label>
						    <input type="text" name="email" class="form-control" id="email">
						  </div>
						  <div class="form-group">
						    <label>Password:</label>
						    <input type="Password" name="pwd" class="form-control" id="pwd">
						  </div>			  
						  <button type="submit" class="btn btn-default">Login</button>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>