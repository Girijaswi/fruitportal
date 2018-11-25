<?php
session_start();
if(!isset($_SESSION['email'])){
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
		.fruit_information>.row>div>table img
		{
			cursor: -webkit-grab; cursor: grab;
		}
		.fruit_information
		{
			//background-color:#e8e8e8;
		}
		.add_fruit_information
		{
			margin-top: 2%;
		}
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		/*function getcookie(name)
		{
			var re = new RegExp(name + "=([^;]+)");
			var value = re.exec(document.cookie);
			document.getElementById('hh').innerHTML=unescape(value[1]);
			return (value != null) ? unescape(value[1]) : null;
		}*/
		var email;
		$(document).ready(function(){	
			email=$("#seller_email").text().trim();
			//var email=getcookie('test');
			var fruits_from_server="";
			$.post("get_fruit_information.php",
				    {"email":email},
				    function(data,status){
				    	if(data!="[0]")
				    	{
				    		console.log(data);
				    	fruits_from_server=JSON.parse(data);
				    	//alert(fruits_from_server[2].fname);
				    	drawTable(fruits_from_server,email);
				    	}
				    	
				    }
		    );
									
			$(document).on("click","#delete",function(){
					var temp=$(this).attr("name");
					console.log(temp.split(":")[0]+" "+temp.split(":")[1]);
					deleteRow(temp.split(":")[0],temp.split(":")[1]);
			});
			$(document).on("click","#update",function(){
					var temp=$(this).attr("name");
					//console.log(temp);
			});
			$("#btn_add").click(function(){
				$("tbody").remove();
				$.post("add_fruit_information.php",
				    {
				      "email":email,
				      "fruit_name":$("#fruit_name").val(),
				      "quantity":$("#quantity").val(),
				      "price":$("#price").val()
				    },
				    function(data,status){
				    	if(data!="[0]")
				    	{
				    		console.log(data);
				    		fruits_from_server=JSON.parse(data);
				    		drawTable(fruits_from_server,email);
				    	}
				    	
				    }
		    	);
			});
			$(document).on("click","#update",function(){
				var index=$(this).attr("name");
				console.log(index);
				console.log(fruits_from_server[index].fname);
				$("#update_fruit").text(fruits_from_server[index].fname);
				$("#update_quantity").val(fruits_from_server[index].quantity);
				$("#update_price").val(fruits_from_server[index].price);

			});
			$("#update_btn").click(function(){
				 $("tbody").remove();
				 $.post("update_fruit_information.php",
				    {
				      "email":email,
				      "fruit_name":$("#update_fruit").text(),
				      "quantity":$("#update_quantity").val(),
				      "price":$("#update_price").val()
				    },
				    function(data,status){
				    	if(data!="[0]"){
				    		console.log(data);
				    		fruits_from_server=JSON.parse(data);
				    		drawTable(fruits_from_server,email);
				    	}
				    	
				    }
		    	);
			});
		});
		function drawTable(fruits,email){
			//console.log(fruits.length);
			for (var i = 0; i < fruits.length; i++) {
        			drawRow(fruits[i],email,i);
    		}
		}
		function drawRow(fruit,email,index)
		{
			    //console.log(fruit.fname);
				var row = $("<tr />");
				var tbody=$("<tbody/>");
				$("#tableone").append(tbody);
			    tbody.append(row); 
			    row.append($("<td><img id='delete' name='"+email+":"+fruit.fname+"' src='delete.png' width='10' height='10'></td>"));
			    row.append($("<td>" + fruit.fname + "</td>"));
			    row.append($("<td>" + fruit.quantity + "</td>"));
			    row.append($("<td>" + fruit.price + "</td>"));
			    row.append($("<td><img data-toggle='modal' data-target='#myModal' id='update' name='"+index+"' src='update.png' width='20' height='20'></td>"));
		}       
		function deleteRow(email,fruit_name)
		{
			
			$("tbody").remove();
			$.post("delete_fruit_information.php",
				    {"email":email,"fruit_name":fruit_name},
				    function(data,status){				    	
				    	//console.log(data);
				    	if(data!="[0]"){
				    		fruits_from_server=JSON.parse(data);
				    		drawTable(fruits_from_server,email);
				    	}
				    	
				    }
				  );
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
		<h3 id="seller_email"><?php echo $_SESSION['email']; ?></h3>
		<a href="home.php?logout='1'">Logout</a>
		<!-- <ul class="nav navbar-nav navbar-right"><br>
			<li class="nav-item"><a class='fas fa-wallet'>Wallet</a></li>
			<li class="nav-item"><a href="home.php?logout='1'">Logout</a></li>
		</ul> -->

<!--start Modal add information-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <form >
					<div class="form-group">
  						<label> FruitName:</label>
  						<input type="text" class="form-control" id="fruit_name">
					</div>
					<div class="form-group">
  						<label>Quantity:</label>
  						<input type="text" class="form-control" id="quantity">
					</div>
					<div class="form-group">
  						<label>Price:</label>
  						<input type="text" class="form-control" id="price">
					</div>
					<button type="button" id="btn_add" class="btn btn-default" data-dismiss="modal">Add</button>
			</form>         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!--End Modal add information-->
<!--start Modal update-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="update_fruit"></h4>
        </div>
        <div class="modal-body">
           <form>
           		<div class="form-group">
           			<label>Qunatity</label>
           			<input type="number" id="update_quantity" class="form-control">           			
           		</div>
           		<div class="form-group">
           			<label>Price</label>
           			<input type="number" id="update_price" class="form-control">           			
           		</div>
           		<button id="update_btn" type="button" class="btn btn-default" data-dismiss="modal">Update</button>
           </form>           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!--End Modal update-->
  
	<div class="container fruit_information" style="">
		<div class="row">
			<div class="col-xs-12 col-sm-3"></div>
			<div class="col-xs-12 col-sm-6">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Add</button>

				<table class="table table-striped" id="tableone">
					<thead>
						<tr>
							<th>Delete</th>
							<th>Fruit</th>
							<th>Quantity</th>
							<th>Price/Unit</th>
							<th>Update</th>
						</tr>
					</thead>					
				</table>
			</div>
			<div class="col-xs-12 col-sm-3"></div>
		</div>
	</div>
	<!-- <div class="container add_fruit_information">
		<div class="row">
			<div class="col-xs-12 col-sm-4"></div>		
			<div class="col-xs-12 col-sm-4">
				
			</div>		
			<div class="col-xs-12 col-sm-4"></div>		
		</div>
	</div> -->
</body>
</html>