<?php
   include("db_finalproject_conn.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      $query = ("select * FROM memberinfo WHERE Account = '$myusername' and password = '$mypassword'");
	  $stmt = $db->query($query);
	  $result = $stmt->fetchAll();  
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(!empty($result[0])) {
         $_SESSION['login_user'] = $myusername;
		 header("location: bookData.php");
      }else {
         $error = "Your UserName or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>海大班級訂書系統-登入畫面</title><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	  </head>
  <body >	
		<nav class="navbar navbar-expand-xl navbar-dark bg-dark" id="mainNav">
			<div class="container">
				<a class="navbar-brand" style="color:white" id="#">海大班級訂書系統</a>
			 
			</div>
		</nav>
	   	<div class="container py-5">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 mx-auto">

							<!-- form card login -->
							<div class="card rounded-0">
								<div class="card-header">
									<h3 class="mb-0">登入(Login)</h3>
								</div>
								
								<form action = "" method = "post">
									<div class="card-body">
										<div class="form-group">
											<label for="uname1">帳號(Username)</label>
											<input type="text" class="form-control form-control-lg rounded-0" name="username" id="uname1" >
										</div>
										<div class="form-group">
											<label>密碼(Password)</label>
											<input type="password" class="form-control form-control-lg rounded-0" name="password" id="pwd1">
										</div>
										<input type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">
									</div>
								</form>
								<div style = "font-size:11px; color:#cc0000; margin-top:10px">
									<?php
										echo $error; 
									?>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

		</div>	   

	</body>
</html>
