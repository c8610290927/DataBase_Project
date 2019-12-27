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
			
		<div class="container">
			
            <div class="intro-text my-4">  
                <h1>訂購書籍資訊</h1>
            </div>
		
            
            <div class="form-group row">
                
                <div class="col-xs-12 col-md-6 col-lg-6" id="member">
            
                    <table class="table table-hover" id="memberTable">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">編號</th>
                          <th scope="col">書名</th>
                          <th scope="col">版本</th>
                          <th scope="col">作者</th>
                          <th scope="col">出版社</th>
                          <th scope="col">價錢</th>
                          <th scope="col">訂購班級</th>
                          <th scope="col">訂購狀況</th>
                          <th scope="col">編輯</th>
                        </tr>
                          <?php
                            include "db_finalproject_conn.php";
                          
                            $query = ("select * from bookinfo");
                            $stmt =  $db->query($query);
                            $result = $stmt->fetchAll();
                            for($i=0; !empty($result[$i]); $i++)
                            {
                              echo"<tr>";
                              echo "<td scope='col'>".$result[$i][0]."</td>";
                              echo "<td scope='col'>".$result[$i][1]."</td>";
                              echo "<td scope='col'>".$result[$i][2]."</td>";
                              echo "<td scope='col'>".$result[$i][3]."</td>";                              
                              echo "<td scope='col'>".$result[$i][4]."</td>";
                              echo "<td scope='col'>".$result[$i][5]."</td>";
                              echo "<td scope='col'>".$result[$i][6]."</td>";
                              echo "<td scope='col'><button type='button' class='btn btn-secondary'><a href='purchaserData.php' style='color:white'>查看</a></button></td>";
                              echo "<td scope='col'><button type='button' class='btn btn-secondary'><a href='bookData_edit.php' style='color:white'>修改</a></button><button type='button' class='btn btn-secondary'><a href=# style='color:white'>刪除</a></button></td>";
                              echo "</tr>";
                            }
                          ?>
                      </thead>
                     
                    </table>
                    
                    <button type="button" class="btn btn-secondary" id="add"><a href="bookData_edit.php" style="color:white">新增資料</a></button>
                    <!--<button type="button" class="btn btn-secondary" id="modify"><a href="book_information_edit.html" style="color:white">修改資料</a></button>
                    <button type="button" class="btn btn-secondary" id="delete">刪除資料</button>-->
                </div>
            </div>

	</body>
</html>