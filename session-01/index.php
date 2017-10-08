<html>
<head>
	<title>Undersanding Ajax</title>

	<style type="text/css">

		#container{
			background: green;
			color: white;
		}

		.title{
			height: 200px;
		}


	</style>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<h1 id="container" class="">Welcome to Ajax</h1>

	<form>
		<input type="text" id="name" placeholder="Enter Country Name">
		<input type="text" id="city" placeholder="Enter City Name">
		<button type="submit" id="btnSubmit">Submit</button>
	</form>

	<button id="btnClick"><i class="fa fa-square"></i> &nbsp;Click Me</button>

	<div id="countryList"></div>


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			$('#btnSubmit').bind('click',function(e){
				e.preventDefault();
				var name = $('#name').val();
				var city = $('#city').val();
				var action = 'store.php';
				$.ajax({

				  url: action,
				  method:"POST",
				  data:{
				  	name:name,
				  	city:city
				  }			
				  
				}).done(function(response) {
					$('#name').val('');
					$('#city').val('');
				});
			});


			$('#btnClick').bind('click',function(){
				var btn = $(this);
				btn.find('i').removeClass('fa-square').addClass('fa-refresh fa-spin fa-3x fa-fw');
				$.ajax({
				  url: "countries.php",
				  dataType:"JSON"
				  
				}).done(function(response) {
					 btn.find('i').removeClass('fa-refresh fa-spin fa-3x fa-fw').addClass('fa-square');
					 var html = '<table><tr><th>Country</th><th>City</th><th>Action</th></tr>';

						$.each(response,function(index,value) {

							html = html+'<tr><td>'+value.name+'</td><td>'+value.city+'</td><td data-id='+value.id +'>show</td></tr>';
							
						});

					 html = html+'</table>';

					 $('#countryList').html(html);


					  $('#countryList td').bind('click',function(){
							
						var id = $(this).attr('data-id');


						$.ajax({
						  url: "show.php",
						  method: 'GET',
						  data:{id:id}
				
						}).done(function(response) {

							
							 $('#countryList').html(response);
							console.log(response);
						});


					 });



				});

			});

		});


	</script>

</body>
</html>


<?php


    $user = "webville123";
    $pass = "rockzorz";
    $salt = "skkgf4dfg!";
    $enc_pass = md5($pass);

    var_dump(utf8_decode($enc_pass));


?>