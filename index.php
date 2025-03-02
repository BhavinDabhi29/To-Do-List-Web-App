<?php
	   $host = 'localhost';
	   $database = 'db_task';
	   $username = 'root';
	   $db_password = '';


    session_start();

    if(isset($_SESSION['user']))
    {   
    	if (isset($_SESSION['id'])) {
    		
    		$id=$_SESSION['id'];    	
    	}
			

        ?>
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
						<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
						<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
					</head>
				<body>
					<nav class="navbar navbar-light bg-light">
				  <div class="container-fluid" align="Login">
				    <span class="navbar-text" >
				     							 Welcome! <?php echo $_SESSION['user'];?>
				    </span>
				  </div>
				  <div>
				  <nav class="navbar navbar-light bg-light">
				  <form class="container-fluid justify-content-start" action="register/logout.php">
				    <button class="btn btn-outline-success me-2" type="btn-success">Logout</button>
				    
				  </form>
				</nav>
				</div>
				</nav>
					
					<div class="col-md-3"></div>
					<div class="col-md-6 well">
						<h3 class="text-primary">To Do List App</h3>
						<hr style="border-top:1px dotted #ccc;"/>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<center>
								<form method="POST" class="form-inline" action="add_query.php">
									<input type="text" class="form-control" name="task" required/>
									<button class="btn btn-primary form-control" name="add">Add Task</button>
								</form>
							</center>
						</div>
						<br /><br /><br />
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Task</th>
									<th>Status</th>
									<th colspan="2">Action</th>
									<th>Edit</th>

								</tr>
							</thead>
							<tbody>
								<?php
									require 'conn.php';
									$query = $conn->query("SELECT * FROM `task` WHERE `user_id` = '$id' ORDER BY `task_id` ASC");
									$count = 1;
									while($fetch = $query->fetch_array()){
								?>
								<tr>
									<td><?php echo $count++?></td>
									<td><?php echo $fetch['task']?></td>
									<td><?php echo $fetch['status']?></td>
									<td colspan="2">
										<center>
											<?php
												if($fetch['status'] != "Done"){
													echo 
													'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
												}
											?>
											 <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
										</center>
									</td>
									<td><a href="edit.php?task_id=<?php echo $fetch['task_id']?>">Edit Task</a></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</body>
				</html>

        <?php
    }

    
    else
    {

        ?>
        		
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
						<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
						<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
					</head>
				<body>
					<nav class="navbar navbar-light bg-light">
				  <div class="container-fluid" align="Login">
				    <span class="navbar-text" >
				     							Please Login Or Register First to Manage Your Daily Routine.. 
				    </span>
				  </div>
				  <div>
				  <nav class="navbar navbar-light bg-light">
				  <form class="container-fluid justify-content-start" action="register/index.php">
				    <button class="btn btn-outline-success me-2" type="btn-success">Login Or Register</button>
				    
				  </form>
				</nav>
				</div>
				</nav>
					
					<div class="col-md-3"></div>
					<div class="col-md-6 well">
						<h3 class="text-primary"> To Do List</h3>
						<hr style="border-top:1px dotted #ccc;"/>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							
						</div>
						<br /><br /><br />
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Task</th>
									<th>Status</th>
									<th colspan="2">Action</th>
									<th>Edit</th>

								</tr>
							</thead>
							
						</table>
					</div>
				</body>
				</html>


        	<?php

    }

?>