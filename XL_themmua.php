<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $mua_ten = $_POST['mua_ten'];
                            //secho "$loaidd_ten";
                            //$loaidd_vaitro = $_POST['loaidd_vaitro']; 
                            $sql = "INSERT INTO `mua`(mua_ten) VALUES ('$mua_ten')";

                            $query = mysqli_query($con, $sql);
                             if ($query){
                                header("location:themma.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='themma.php' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>