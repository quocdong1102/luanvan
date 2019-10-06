<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/bo.png" alt="IMG">
				</div>
<?php
	    include('check.php');
		include('connect.php');
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
        	$errors=array();
        	if(empty($_POST['taikhoan'])){
        		$errors[]='taikhoan';
        	}
        	else{
        		$taikhoan=$_POST['taikhoan'];
        	}
        	if(empty($_POST['matkhau'])){
        		$errors[]='matkhau';
        	}	
        	else{
               $matkhau=$_POST['matkhau'];
        	}
        	if(empty($errors)){
        		$sql="SELECT id,AD_TAIKHOAN,AD_MATKHAU FROM admin WHERE AD_TAIKHOAN ='{$taikhoan}' AND AD_MATKHAU ='{$matkhau}'";
        		$result=mysqli_query($con,$sql);
        		kiemtra($result,$sql);
        			if(mysqli_num_rows($result)==1)
              {     
                    echo $_SESSION['taikhoan']=$taikhoan;
                    echo $_SESSION['matkhau']=$matkhau;
                    //dong khong co van chuyen giao dien duoc chua hieu tac dung cua no                     
                    list($id,$taikhoan,$matkhau)=mysqli_fetch_array($result,mysqli_num_rows);
                    //chuyen giao dien sang index.html
                    header('Location:index.php');
                }else{
        				echo"tai khoan hoac mat khau khong dung";
                 header('Location:login.php');
        			}
        		}
        }
	?>
				<section class="login_content">
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
					<div class="animate form login_form">
                    
					<span class="login100-form-title">
						Hôm nay ăn gì?  <br> ADMIN
					</span>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="taikhoan" > 
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						 <?php
              if(isset($errors) && in_array(taikhoan, $errors)){
              	echo"Bạn chưa nhập tài khoản";
              } 
           ?>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="matkhau">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					<?php
              if(isset($errors) && in_array(taikhoan, $errors)){
              	echo"Bạn chưa nhập mật khẩu";
              } 
           ?>	
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit">
							Đăng nhập
						</button>
					</div>

					<div class="text-center p-t-12">
						
					</div>

					<div class="text-center p-t-136">
						
					</div>
				
				</form>
				</section>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>