<!DOCTYPE html>
<?php
    include("db_finalproject_conn.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = $_SESSION['username'];
        $mypassword = $_POST['oldpwd']; 
        $newpassword1 = $_POST['newpwd1'];
        $newpassword2 = $_POST['newpwd2'];
        $query = ("select * FROM memberinfo WHERE Account = '$myusername' and password = '$mypassword'");
        $stmt = $db->query($query);
        $result = $stmt->fetchAll();  
        
        // If result matched $myusername and $mypassword, table row must be 1 row
          
        if(!empty($result[0])) {
            if($newpassword1 == $newpassword2)
            {                
                $query = ("update memberinfo SET  Password = '$newpassword1' WHERE account = '$myusername' and password = '$mypassword'");
                $stmt = $db->query($query);
                $error = "成功修改!";
            }
            else
            {
                $error = "你的兩個密碼不符合!";
            }
        }else {
           $error = "舊密碼不正確";
        }
     }
?>
<html lang="en">

	<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title>海大班級訂書系統-修改密碼</title>
	
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>


    <body>

	  	<nav class="navbar navbar-expand-xl navbar-dark bg-dark" id="mainNav">
			<div class="container">
				  <a class="navbar-brand" href="{{url_for('manager_index')}}">海大班級訂書系統</a>
				  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				
				<div class="navbar-collapse collapse" id="navbarText">
				  <ul class="nav navbar-nav">
                    <li class="nav-item"><a class = "nav-link" href="memberData.php">會員資訊</a></li>
					<li class="nav-item"><a class = "nav-link" href="bookData.php">訂購書籍資訊</a></li>
                    
                    
					<li class="dropdown">
						<a class="nav-link active manager_name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="https://fashion.jedi.net.tw/images/user.png" width=30 height=30>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="changePassword.php">修改密碼</a>
						  <a class="dropdown-item" href="{{url_for('logout')}}">登出</a>
						</div>
					</li>
				</ul>
				<ul class="nav navbar-nav ml-auto">
					
				</ul>
				</div>
				
			</div>
	    </nav>
			
		<div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mx-auto">

                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h3 class="mb-0">修改密碼(Change Password)</h3>
                                </div>
                                <form action = "" method = "post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="uname1">舊密碼(Current Password)</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="oldpwd" id="uname1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新密碼(New Password)</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" name= "newpwd1" id="pwd1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新密碼確認(Confirm Password)</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" name= "newpwd2" id="pwd2" required>
                                        </div>
                                        <input type="submit" class="btn btn-success btn-lg float-right" id="btnSave">確認</button>
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