<?php
	session_start();
	if(!isset($_SESSION['buyeremail'])){
	header('location:home.php');
}
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
  	<style type="text/css">
  		.result_container>.row>div:nth-child(2)>.result>ul>li
  		{
  			margin-top: 2%;
  		}
  		.result_container>.row>div:nth-child(2)>.result>ul>li>span
  		{
  			margin-left: 5%;
  		}
  		.result_container>.row>div:nth-child(2)>.result>ul>li>button
  		{
  			float: right;
  			background-color: #5c85d6;
  		}
  	</style>
  	<script type="text/javascript">
  		
		var sellers_from_server="";
		var unorderedlist="";
		var fruittable="";
		var thead="";
		var colrow="";
		var sellers_fruits_from_server="";
		var buyer_email;
  		$(document).ready(function(){
  			buyer_email=$("#buyer_email").text().trim();
			sellersInformation();
		    $(document).on("click","#shop",function(){
		    	console.log($(this).attr("name"));
		    	 $("ul").remove();
		    	 $.post("get_fruit_information.php",
				    {"email":sellers_from_server[$(this).attr("name")].semail},
				    function(data,status){
				    	if(data!="[0]"){
				    		console.log(data);
				    		sellers_fruits_from_server=JSON.parse(data);
				    		drawTable(sellers_fruits_from_server);
				    	}
				    	
				    }
		    	);

		    });
  		});
  		function sellersInformation()
  		{
  			$("table").remove();
  			$("ul").remove();
  			$.post("get_sellers_information.php",
				    {"email":""},
				    function(data,status){
				    	if(data!="[0]")
				    	{
				    		console.log(data);
				    		sellers_from_server=JSON.parse(data);
				    		drawList(sellers_from_server);
				    	}
				    	
				    }
		    );
  		}
  		function drawList(sellers)
  		{
  			unorderedlist = $("<ul class='list-group'/>");
  			$("#result").append(unorderedlist);
  			for(var i=0;i<sellers.length;i++)
  			{
  				drawListItem(sellers[i],i);
  			}
  		}
  		function drawListItem(seller,index)
  		{
  			unorderedlist.append($("<li class='list-group-item'><span>"+seller.sname+"</span><span>"+seller.semail+"</span><span>"+seller.shopname+"</span><button class='btn btn-default' type='button' id='shop' name='"+index+"'>shop</button></li>"));
  		}
  		function drawTable(fruits){
			//console.log(fruits.length);
			fruittable= $("<table class='table table-striped'/>");
			thead=$("<thead/>");
			colrow=$("<tr>");
			thead.append(colrow);
			colrow.append("<td>FruitName</td>");
			colrow.append("<td>Qunatity</td>");
			colrow.append("<td>Price</td>");
			fruittable.append(thead);
			$("#result").append(fruittable);
			for (var i = 0; i < fruits.length; i++) {
        			drawRow(fruits[i],i);
    		}
		}
		function drawRow(fruit,index)
		{
			    //console.log(fruit.fname);
				var row = $("<tr />");
				var tbody=$("<tbody/>");
				fruittable.append(tbody);
			    tbody.append(row); 
			    //row.append($("<td><img id='delete' name='"+email+":"+fruit.fname+"' src='delete.png' width='10' height='10'></td>"));
			    row.append($("<td>" + fruit.fname + "</td>"));
			    row.append($("<td>" + fruit.quantity + "</td>"));
			    row.append($("<td>" + fruit.price + "</td>"));
			    //row.append($("<td><img data-toggle='modal' data-target='#myModal' id='update' name='"+index+"' src='update.png' width='20' height='20'></td>"));
		}       
  	</script>
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

	<a href="home.php?logout='1'">Logout</a>
	<h3 id="buyer_email"><?php echo $_SESSION['buyeremail']; ?></h3>
		<!--<ul class="nav navbar-nav navbar-right"><br>
			<li class="nav-item"><a class='fas fa-wallet'>Wallet</a></li>
			<li class="nav-item"><a href="home.php?logout='1'">Logout</a></li>
		</ul>-->
	<div class="container result_container">
		<div class="row">
			<div class="col-xs-12 col-sm-3"></div>
			<div class="col-xs-12 col-sm-6">
				<button type="button" class="btn btn-default" onclick="sellersInformation()">DashBoard Buyer Home</button>
				<div class="result" id="result">
						
				</div>
			</div>
			<div class="col-xs-12 col-sm-3"></div>
		</div>
	</div>
	
</body>
</html>