<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $vm_ten = $_POST['vm_ten'];
                            //secho "$loaidd_ten";
                            //$loaidd_vaitro = $_POST['loaidd_vaitro']; 
                            $sql = "INSERT INTO `vung_mien`(vm_ten) VALUES ('$vm_ten')";

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