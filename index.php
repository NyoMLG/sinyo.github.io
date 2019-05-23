<!DOCTYPE html>
<html>
<head>
	<title>Rating system</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- font awesome -->
  	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	<!-- rating star css -->
  	<link rel="stylesheet" href="js/ratingstar.css">  	
</head>






<body class="container">
	<?php include 'menu.php'; ?>
<div class="row">
<div class="col-md-12">


		 
	    <label for="email">Studnet Rating :</label>	  	
	  	<div class='starrr' id='rating-student'></div> 	<br>
	  	<div class="msg"></div>
	</div>	
</div>

<hr>
<!-- show the student -->
<h2>Student Details</h2>
<table class="table table-condensed">
	<thead>
	  <tr>
	    <th>Student Name</th>
	    <th>Student Email</th>
	    <th>Rating</th>
	  </tr>
	</thead>
	<tbody>
	
	</tbody>
</table>
	
</div>



<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- star js -->
<script src="js/ratingstar.js"></script>
<!-- ajax -->
<script>
// rating
var rate;
$('#rating-student').starrr({
  change: function(e, value){ 
  	rate = value;  	       
    if (value) {
      $('.your-choice-was').show();      
    } else {
      $('.your-choice-was').hide();
    }
  }
});
// ajax submit
$("#submit").click(function(){	
	var name = $('#name').val();
	var email = $('#email').val();	
	$.ajax({		
        url: "rating.php",
        type: 'post',
        data: {v1 : name, v2 : email, v3 : rate},
        success: function (status) {
        	if(status == 1){
            	$('.msg').html('<b>Student Inserted !</b>');
        	}else{
            	$('.msg').html('<b>Server side error !</b>');        		
        	}
        }
    });

});
</script>
</body>
</html>