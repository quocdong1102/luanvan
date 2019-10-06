<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $loainl_ten = $_POST['loainl_ten'];
                            $loainl_ghichu = $_POST['loainl_ghichu']; 
                            $sql = "INSERT INTO `loai_nguyen_lieu`(loainl_ten, loainl_ghichu) VALUES ('$loainl_ten', '$loainl_ghichu')";

                            $query = mysqli_query($con, $sql);
                             if ($query){
                                header("location:loainl.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='loainl.php' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>