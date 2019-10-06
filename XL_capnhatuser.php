                    <?php
                        include("connect.php");
                        $id = 0;    
                        if(isset($_POST['submit'])){
                            $id=isset($_POST['id']) ? $_POST['id']:$id;
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


                         if($user_hinhanh!=''){
                              $sql_update = "UPDATE `user` SET `user_mk`='$user_mk',`user_ten`='".$user_ten."',`user_namsinh`='".$user_namsinh."',`user_diachi`='".$user_diachi."',`user_sdt`='".$user_sdt."',`user_email`='".$user_email."',`user_hinhanh`='".$user_hinhanh."' WHERE user.user_id =".$id;
                                }else{
                              $sql_update = "UPDATE `user` SET `user_mk`='$user_mk',`user_ten`='".$user_ten."',`user_namsinh`='".$user_namsinh."',`user_diachi`='".$user_diachi."',`user_sdt`='".$user_sdt."',`user_email`='".$user_email."' WHERE user.user_id =".$id;
                            }




                            
                            $query = mysqli_query($con, $sql_update);
                             if ($query){
                                header("location:dsuser.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Cập nhật không thành công </br>
                                   <a href='capnhatuser.php?id=$id' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>