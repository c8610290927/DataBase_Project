<?php
   include("db_finalproject_conn.php");
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $temp = $_GET['value'];      
      $myOrderID = $_POST['OrderID'];
      $myBookName = $_POST['BookName']; 
      $myVersion = $_POST['version'];
      $myAuthor = $_POST['author'];
      $mySeller = $_POST['seller'];
      $myPrice = $_POST['price'];
      $myDept = $_POST['dept'];
    if($temp!= "add")
    {
      $myOrderID = $_GET['value'];
      $query = ("select * from bookinfo where OrderID = '$myOrderID'");
      $stmt =  $db->query($query);
      $result = $stmt->fetchAll();
      if(!$myBookName)
      {
        $myBookName = $result[0][1];
      }
      if(!$myVersion)
      {
        $$myVersion = $result[0][2];
      }
      if(!$myAuthor)
      {
        $myAuthor = $result[0][3];
      }
      if(!$mySeller)
      {
        $mySeller = $result[0][4];
      }
      if(!$myPrice)
      {
        $myPrice = $result[0][5];
      }
      if(!$myDept)
      {
        $myDept = $result[0][6];
      }
      $query = ("update bookinfo SET  BookName = '$myBookName' ,Version = '$myVersion',Author = '$myAuthor',Seller = '$mySeller',Price = '$myPrice' WHERE OrderID = '$myOrderID'");
	    $stmt = $db->query($query);
    } 
    else
    {
      $query = "insert into bookinfo values ('$myOrderID','$myBookName','$myVersion','$myAuthor','$mySeller','$myPrice','$myDept')";
	    $stmt = $db->query($query);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title>海大班級訂書系統-訂購書籍資訊</title>
	
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
            <li class="nav-item"><a class = "nav-link" href="member_information.php">會員資訊</a></li>
            <li class="nav-item"><a class = "nav-link" onclick="changePage()">訂購書籍資訊</a></li>         
                    
					<li class="dropdown">
						<a class="nav-link active manager_name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="https://fashion.jedi.net.tw/images/user.png" width=30 height=30>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="change_password.php">修改密碼</a>
						  <a class="dropdown-item" href="{{url_for('logout')}}">登出</a>
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
                <h1>訂購書籍資訊-新增修改</h1>
            </div>
		
            
            <div class="form-group row">
                
                <div class="col-xs-12 col-md-6 col-lg-6" id="member">
            
                    <table class="table table-hover" id="memberTable">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col" >編號</th>
                          <th scope="col">書名</th>
                          <th scope="col">版本</th>
                          <th scope="col">作者</th>
                          <th scope="col">出版社</th>
                          <th scope="col">價錢</th>
                          <th scope="col">訂購班級</th>
                        </tr>
                        <?php
                            include "db_finalproject_conn.php";
                            $value = $_GET['value'];
                            if($value!="add")
                            {
                              $query = ("select * from bookinfo where OrderID = '$value'");
                              $stmt =  $db->query($query);
                              $result = $stmt->fetchAll();
                            }
                            for($i=0; !empty($result[$i]); $i++)
                            {
                              echo "<form method = 'post' action = ''>";
                              echo "<tr>";
                              echo "<td scope='col'><input type = text name = 'OrderID' placeholder = ".$result[$i][0]."></td>";
                              echo "<td scope='col'><input type = text name = 'BookName' placeholder = ".$result[$i][1]."></td>";
                              echo "<td scope='col'><input type = text name = 'version' placeholder = ".$result[$i][2]."></td>";
                              echo "<td scope='col'><input type = text name = 'author' placeholder = ".$result[$i][3]."></td>";                              
                              echo "<td scope='col'><input type = text name = 'seller' placeholder = ".$result[$i][4]."></td>";
                              echo "<td scope='col'><input type = text name = 'price' placeholder = ".$result[$i][5]."></td>";
                              echo "<td scope='col'><input type = text name = 'dept' placeholder = ".$result[$i][6]."></td>";
                              echo "<td scope='col'><input type='submit' class='btn btn-success btn-lg float-right' id='btnSave'</td>";                               
                              echo "</tr>";                                                    
                              echo "</form>";
                            }
                            if($value == "add")
                            {
                              echo "<form method = 'post' action = ''>";
                              echo "<tr>";
                              echo "<td scope='col'><input type = text name = 'OrderID' ></td>";
                              echo "<td scope='col'><input type = text name = 'BookName' ></td>";
                              echo "<td scope='col'><input type = text name = 'version' ></td>";
                              echo "<td scope='col'><input type = text name = 'author' ></td>";                              
                              echo "<td scope='col'><input type = text name = 'seller' ></td>";
                              echo "<td scope='col'><input type = text name = 'price' ></td>";
                              echo "<td scope='col'><input type = text name = 'dept' ></td>";
                              echo "<td scope='col'><input type='submit' class='btn btn-success btn-lg float-right' id='btnSave'</td>";                               
                              echo "</tr>";                                                    
                              echo "</form>";
                            }
                          ?>
                        </thead>
                      
                      </table>
                      
                  </div>    
                
            </div>
<<<<<<< HEAD
            

=======
        <script>
            function changePage()
            {
              location.href="bookData.php?value=read";
            }
        </script>
>>>>>>> 74223b5840474fbed13aa6c6dfe6782ce55d3f64
	</body>
</html>