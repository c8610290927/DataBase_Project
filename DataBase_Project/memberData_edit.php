<?php
   include("db_finalproject_conn.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      if(isset($_POST['No'])) 
      {
        $temp = $_GET['Dept'];
        $myNo = $_POST['No'];
        $myStudentName = $_POST['StudentName']; 
        $myStudentID = $_POST['StudentID'];
        $myPhoneNum = $_POST['PhoneNum'];
        $query = ("select * from memberinfo where Dept = '$temp'");
        $stmt =  $db->query($query);
        $result = $stmt->fetchAll();
        if(!$myNo)
        {
          $myNo = $result[0][0];
        }
        if(!$myStudentName)
        {
          $myStudentName = $result[0][3];
        }
        if(!$myStudentID)
        {
          $myStudentID = $result[0][2];
        }
        if(!$myPhoneNum)
        {
          $myPhoneNum = $result[0][4];
        }
        $query = ("update memberinfo SET  No = '$myNo' ,StudentName = '$myStudentName',StudentID = '$myStudentID',PhoneNum = '$myPhoneNum' where Dept='$temp'");
        $stmt = $db->query($query);
        header("location: memberData.php");
      }
      else
      {
        unset($_SESSION['username']);
        session_destroy();
        header("location: homepage.php");
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
      <style>
        table{
            margin-left:auto; 
            margin-right:auto;
            }
      </style>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title>海大班級訂書系統-會員資訊</title>
	
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>


    <body>

	  	<nav class="navbar navbar-expand-xl navbar-dark bg-dark" id="mainNav">
			<div class="container">
				  <a class="navbar-brand" href="index.php">海大班級訂書系統</a>
				  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				
				<div class="navbar-collapse collapse" id="navbarText">
				  <ul class="nav navbar-nav">
            <li class="nav-item"><a class = "nav-link" href="memberData.php">會員資訊</a></li>
            <li class="nav-item"><a class = "nav-link" onclick="changePage()">訂購書籍資訊</a></li>          
                    
					<li class="dropdown">
						<a class="nav-link active manager_name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="https://fashion.jedi.net.tw/images/user.png" width=30 height=30>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="changePassword.php">修改密碼</a>
						  <form method = 'post' action = ''>
              <input type = submit class = 'dropdown-item' value = 登出></input>
              </form>
						</div>
					</li>
				  </ul>
				  <ul class="nav navbar-nav ml-auto">
					
				  </ul>
				</div>
				
			</div>
	    </nav>
			
		<div class="container">
			
            <div class="intro-text my-4">  
                <h1>會員資訊-修改</h1>
            </div>
		
            
            <div class="form-group row">
                
                <div class="table-responsive" id="member">
            
                    <table class="table table-hover" id="memberTable">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">編號</th>
                          <th scope="col">班級</th>
                          <th scope="col">學號</th>
                          <th scope="col">姓名</th>
                          <th scope="col">聯絡電話</th>
                        </tr>
                        <?php
                            include "db_finalproject_conn.php";
                            $Dept = $_GET['Dept'];
                            $query = ("select * from memberinfo where Dept = '$Dept'");
                            $stmt =  $db->query($query);
                            $result = $stmt->fetchAll();
                            for($i=0; !empty($result[$i]); $i++)
                            {
                              echo "<form method = 'post' action = ''>";
                              echo "<tr>";
                              echo "<td scope='col'><input type = text name = 'No' placeholder = ".$result[$i][0]."></td>";
                              echo "<td scope='col'><input type = text name = 'Dept' placeholder = ".$result[$i][1]."></td>";
                              echo "<td scope='col'><input type = text name = 'StudentID' placeholder = ".$result[$i][2]."></td>";
                              echo "<td scope='col'><input type = text name = 'StudentName' placeholder = ".$result[$i][3]."></td>";                              
                              echo "<td scope='col'><input type = text name = 'PhoneNum' placeholder = ".$result[$i][4]."></td>";
                              echo "<td scope='col'><input type='submit' class='btn btn-success btn-lg float-right' id='btnSave'</td>";                               
                              echo "</tr>";                                                    
                              echo "</form>";
                            }
                        ?>
                      </thead>
                     
                    </table>
                </div>
            </div>
          <script>
            function changePage()
            {
              location.href="bookData.php?value=read";
            }
        </script>
	</body>
</html>