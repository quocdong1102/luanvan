<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng Nhập </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<style>
    #background {
        background-image: url("images/images.jpg");
        /* Full height */
        height: 588px;
        /* Center and scale the image nicely */
        background-repeat: no-repeat;
        background-size: cover;
        color: black;
    }
</style>

<body class="login" id="background">
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
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <h1> Đăng Nhập </h1>
                            <div>
                                <input type="text" class="form-control" name="taikhoan" placeholder="Tài khoản...                                                                                                                                                                                       " required="" />
                                <?php
              if(isset($errors) && in_array(taikhoan, $errors)){
              	echo"Bạn chưa nhập tài khoản";
              } 
           ?>
                            </div>
                            <div>
                                <input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu..." required="" />
                                <?php
              if(isset($errors) && in_array(taikhoan, $errors)){
              	echo"Bạn chưa nhập mật khẩu";
              } 
           ?>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info" name="submit" style="color:white">Đăng Nhập</button>


                                <div class="clearfix"></div>

                                <div class="separator">
                                    <p class="change_link">

                                    </p>

                                    <div class="clearfix"></div>
                                    <br />

                                    <div>
                                        <h1><i class="fa fa-paper-plane"></i>Đăng nhập hệ thống!</h1>
                                        <p>©2019 Hệ thống quản lý cung cầu công nghệ</p>
                                    </div>
                                </div>
                        </form>
                    </section>
                    </div>

                    <div id="register" class="animate form registration_form">
                        <section class="login_content">
                            <form>
                                <h1>Create Account</h1>
                                <div>
                                    <input type="text" class="form-control" placeholder="Username" required="" />
                                </div>
                                <div>
                                    <input type="email" class="form-control" placeholder="Email" required="" />
                                </div>
                                <div>
                                    <input type="password" class="form-control" placeholder="Password" required="" />
                                </div>
                                <div>
                                    <a class="btn btn-default submit" href="index.html">Submit</a>
                                </div>

                                <div class="clearfix"></div>

                                <div class="separator">
                                    <p class="change_link">Already a member ?
                                        <a href="#signin" class="to_register"> Log in </a>
                                    </p>

                                    <div class="clearfix"></div>
                                    <br />
                                    <div>
                                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
</body>

</html>
