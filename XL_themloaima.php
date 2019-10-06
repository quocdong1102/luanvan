<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $loaima_ten = $_POST['loaima_ten'];
                            //secho "$loaidd_ten";
                            $loaima_ghichu = $_POST['loaima_ghichu']; 
                            $sql = "INSERT INTO `loai_mon_an`(loaima_ten, loaima_ghichu) VALUES ('$loaima_ten', '$loaima_ghichu')";

                            $query = mysqli_query($con, $sql);
                             if ($query){
                                header("location:loaima.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='loaima.php' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>