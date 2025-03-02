<?php
   $host = 'localhost';
   $database = 'db_task';
   $username = 'root';
   $db_password = '';
    
    session_start();

    
		if($_GET['task_id'] != "")
		{
			$task_id = $_GET['task_id'];
		}

		
		
           if(isset($_POST['submit']))
           {
                $ut = $_POST['task'];

                $conn = mysqli_connect($host, $username, $db_password, $database);
                if(! $conn ) {
                    die('Could not connect: ' . mysqli_connect_error());
                }
                
                $sql = "UPDATE `task` SET `task` = '$ut' WHERE `task_id`='$task_id'";

                if (mysqli_query($conn, $sql)) {
                    header('Location: /todo/index.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
           }
           else
           {
                $conn = mysqli_connect($host, $username, $db_password, $database);
                if(! $conn ) {
                    die('Could not connect: ' . mysqli_connect_error());
                }
                
                $sql = "SELECT * FROM task WHERE `task_id` = '$task_id' ";

                if ($result = mysqli_query($conn, $sql)) {

                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $user = $row;
                    }
                    else{
                        header('Location: /todo/register/login.php?invalid=1');
                        die('Invalid Credentials');
                    }

                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
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
				     							 Welcome! 
				    </span>
				  </div>
				  
				</nav>
					
					<div class="col-md-3"></div>
					<div class="col-md-6 well">
						<h3 class="text-primary"> Edit Task - To Do List App</h3>
						<hr style="border-top:1px dotted #ccc;"/>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<center>
								<form method="POST" class="form-inline" action="index.php">
									<input type="text" class="form-control" name="task" required/>
									<button class="btn btn-primary form-control" name="submit" type="submit" value="<?php echo $user['task']; ?>">Edit Task</button>
								</form>
							</center>
						</div>
				</div>
				</body>
				</html>
