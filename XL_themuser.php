<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $user_ten = $_POST['user_ten'];
                            $user_namsinh = $_POST['user_namsinh'];
                            $user_diachi = $_POST['user_diachi'];
                            $user_sdt = $_POST['user_sdt'];
                            $user_email = $_POST['user_email'];
                            $user_mk = $_POST['user_mk'];
                            $name = $_FILES['user_hinhanh']['name'];
                          $target_dir = "images/";
                          $target_file = $target_dir . basename($_FILES["user_hinhanh"]["name"]);
                          move_uploaded_file($_FILES['user_hinhanh']['tmp_name'],$target_dir.$name);
                            $sql = "INSERT INTO `user`( `user_mk`, `user_ten`, `user_namsinh`, `user_diachi`, `user_sdt`, `user_email`, `user_hinhanh`) VALUES ('$user_mk', '$user_ten', '$user_namsinh', '$user_diachi', '$user_sdt', '$user_email', '". $target_file."' )";
                            echo "$sql";
                            

                            $query = mysqli_query($con, $sql);
                             if ($query){
                                header("location:themuser.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='themuser.php' style='color:blue'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>