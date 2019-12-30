<?php
   include("db_finalproject_conn.php");
   $error = "";
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if(!isset($_POST['No']))
     {
      unset($_SESSION['username']);
      session_destroy();
      header("location: homepage.php");
     }
     else
     {
      $temp = $_GET['value'];     
      $myNo = $_POST['No'];  
      $myOrderID = $_POST['Dept'];
      $myStudentName = $_POST['StudentName'];
      $myStudentID = $_POST['StudentID'];
      $myPhoneNum = $_POST['PhoneNum'];
      $myQuality = $_POST['Quality'];
      $myPaymentStatus = $_POST['PaymentStatus'];
      if($temp!= "add")
      {
        $query = ("select * from purchaserinfo where StudentID = '$temp'");
        $stmt =  $db->query($query);
        $result = $stmt->fetchAll();
        if(!$myNo)
        {
          $myNo = $result[0][0];
        }
        if(!$myOrderID)
        {
          $myOrderID = $result[0][1];
        }
        if(!$myStudentName)
        {
          $myStudentName = $result[0][2];
        }
        if(!$myStudentID)
        {
          $myStudentID = $result[0][3];
        }
        if(!$myPhoneNum)
        {
          $myPhoneNum = $result[0][4];
        }
        if(!$myQuality)
        {
          $myQuality = $result[0][5];
        }
        if(!$myPaymentStatus)
        {
          $myPaymentStatus = $result[0][6];
        }
        $query = ("update purchaserinfo SET  No = '$myNo' ,Name = '$myStudentName',StudentID = '$myStudentID'
        ,PhoneNum = '$myPhoneNum' ,Quantity = '$myQuality',PaymentStatus = '$myPaymentStatus'WHERE StudentID = '$temp'");
        $stmt = $db->query($query);
        $stmt->execute();
        header("location: purchaserData.php?value=".$myOrderID);
      } 
      else
      {
        $query = "insert into purchaserinfo values ('$myNo','$myOrderID','$myStudentName','$myStudentID','$myPhoneNum','$myQuality','$myPaymentStatus')";
        $stmt = $db->query($query);
        header("location: purchaserData.php?value=".$myOrderID);
      }
    }      
  }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title>海大班級訂書系統-購書者資訊</title>
    
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
                <h1>購書者資訊-新增修改</h1>
            </div>
		
            
            <div class="form-group row">
                
                <div class="table-responsive" id="member">
            
                    <table class="table table-hover" id="memberTable">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">編號</th>
                          <th scope="col">訂單編號</th>
                          <th scope="col">姓名</th>
                          <th scope="col">學號</th>
                          <th scope="col">聯絡電話</th>
                          <th scope="col">數量</th>
                          <th scope="col">繳款狀況</th>
                        </tr>
                        <?php
                            include "db_finalproject_conn.php";
                            $value = $_GET['value'];
                            if($value!="add")
                            {
                              $query = ("select * from purchaserinfo where StudentID = '$value'");
                              $stmt =  $db->query($query);
                              $result = $stmt->fetchAll();
                            }
                            for($i=0; !empty($result[$i]); $i++)
                            {
                              echo "<form method = 'post' action = ''>";
                              echo "<tr>";
                              echo "<td scope='col'><input type = text name = 'No' placeholder = ".$result[$i][0]."></td>";
                              echo "<td scope='col'><input type = text name = 'Dept' placeholder = ".$result[$i][1]."></td>";
                              echo "<td scope='col'><input type = text name = 'StudentName' placeholder = ".$result[$i][2]."></td>";
                              echo "<td scope='col'><input type = text name = 'StudentID' placeholder = ".$result[$i][3]."></td>";                              
                              echo "<td scope='col'><input type = text name = 'PhoneNum' placeholder = ".$result[$i][4]."></td>";
                              echo "<td scope='col'><input type = text name = 'Quality' placeholder = ".$result[$i][5]."></td>";
                              echo "<td scope='col'><input type = text name = 'PaymentStatus' placeholder = ".$result[$i][6]."></td>";
                              echo "<td scope='col'><input type='submit' class='btn btn-success btn-lg float-right' id='btnSave'></td>";                               
                              echo "</tr>";                                                    
                              echo "</form>";
                            }
                            if($value == "add")
                            {
                              echo "<form method = 'post' action = ''>";
                              echo "<tr>";
                              echo "<td scope='col'><input type = text name = 'No' ></td>";
                              echo "<td scope='col'><input type = text name = 'Dept' ></td>";
                              echo "<td scope='col'><input type = text name = 'StudentName' ></td>";
                              echo "<td scope='col'><input type = text name = 'StudentID' ></td>";                              
                              echo "<td scope='col'><input type = text name = 'PhoneNum' ></td>";
                              echo "<td scope='col'><input type = text name = 'Quality' ></td>";
                              echo "<td scope='col'><input type = text name = 'PaymentStatus' ></td>";
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