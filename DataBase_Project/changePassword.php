<!DOCTYPE html>
<html lang="en">

	<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title>海大班級訂書系統-修改密碼</title>
	
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
					<li class="nav-item"><a class = "nav-link" href="{{url_for('login')}}">會員資訊</a></li>
					<li class="nav-item"><a class = "nav-link" href="{{url_for('login')}}">訂購書籍資訊</a></li>
                    
                    
					<li class="dropdown">
						<a class="nav-link dropdown-toggle active manager_name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="{{url_for('change_password')}}">修改密碼</a>
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
            <div class="alert alert-danger" role="alert"><strong>Error:</strong> {{ error }}</div>

            <div class="alert alert-success" role="alert"><strong>Success:</strong> {{ success }}</div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mx-auto">

                            <!-- form card login -->
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h3 class="mb-0">修改密碼(Change Password)</h3>
                                </div>
                                <div class="card-body">
                                    <!--<form class="form" role="form" id="formLogin">-->
                                        <div class="form-group">
                                            <label for="uname1">舊密碼(Current Password)</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="uname1" id="uname1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新密碼(New Password)</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新密碼確認(Confirm Password)</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" id="pwd2" required>
                                        </div>
                                        <button type="button" class="btn btn-success btn-lg float-right" id="btnSave">確認</button>
                                            <div>
                                                <p class=error style="color:red"><strong>Error:</strong> {{ error }}
                                            </div>
                                        <p class=error style="color:red" id="error">
                                    <!--</form>-->
                                </div>
                                <!--/card-block-->
                            </div>
                            <!-- /form card login -->

                        </div>


                    </div>
                    <!--/row-->

                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
		<!--/container-->

	</body>
</html>