<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $loaidd_ten = $_POST['loaidd_ten'];
                            //secho "$loaidd_ten";
                            $loaidd_vaitro = $_POST['loaidd_vaitro']; 
                            $sql = "INSERT INTO `loai_dinh_duong`(loaidd_ten, loaidd_vaitro) VALUES ('$loaidd_ten', '$loaidd_vaitro')";

                            $query = mysqli_query($con, $sql);
                             if ($query){
                                header("location:themdinhduong.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='themdinhduong.php' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>