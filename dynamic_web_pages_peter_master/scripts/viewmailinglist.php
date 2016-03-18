
<html>
<head>
	<title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>

	<div class="page-header">
	  <h1>Mailing List <small>mailinglist.php</small></h1>
	  <a href="logout.php" class="btn btn-danger" style="position:absolute; top: 5px; right: 5px ">Log Out</a>
	</div>

		<div class="row"
			<div class="col-md-offset-2 col-md-8">
				<div class="well"> 

					<table class="table table-striped">
						<thead>
							<tbody>

					<?php
					session_start();
                 if (!isset($_SESSION['username'])) {
                 	header('location:login.php');
                 
                 }else {

                 	$query ="SELECT * FROM `emaillist` ";

                 	include('connect.php');
                 	$result = mysqli_query($con, $query);
                 	

                 	while ($row = mysqli_fetch_assoc($result)) {
                 		echo "<tr> <td>". $row['username'] . "</td>";
                 		echo "<td>" . $row['email'] . "</td> </tr>";

                 	}
                 }

                
					?>
</tbody>
</table>
<h1>Delete Users from Database</h1>

	<form action="removeFromDB.php" method="POST">

		<div class="input-group input-group-md">
	  <span class="input-group-addon" id="sizing-addon1">Email</span>
	  <input type="text" name="email" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
	</div><br>

	

	<input type="submit" value ="delete" name="submit" class="btn btn-danger"></input>

	</form>
	</div>

				<h1>Go Back to Add</h1>
				<a href="../index.php" class="btn btn-success">Back to Add/Remove</a>
			</div>
		</div>

	</body>
	</html>