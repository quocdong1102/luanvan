                    <?php
                        include("connect.php");
                        $id = 0;    
                        if(isset($_POST['submit'])){
                            $id=isset($_POST['id']) ? $_POST['id']:$id;
                            $loaidd_ten = $_POST['loaidd_ten'];
                            $loaidd_vaitro = $_POST['loaidd_vaitro']; 
                            $sql_update = "UPDATE `loai_dinh_duong` SET  `loaidd_ten`='$loaidd_ten',`loaidd_vaitro`='".$loaidd_vaitro."' WHERE loai_dinh_duong.loaidd_id=".$id;
                                // var_dump($sql_update);   
                                // return; ''
                            $query = mysqli_query($con, $sql_update);
                             if ($query){
                                header("location:dsdinhduong.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Cập nhật không thành công </br>
                                   <a href='capnhatloaidd.php?id=$id' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>