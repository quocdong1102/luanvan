                    <?php
                        include("connect.php");
                        $id = 0;    
                        if(isset($_POST['submit'])){
                            $id=isset($_POST['id']) ? $_POST['id']:$id;
                            $loainl_ten = $_POST['loainl_ten'];
                            $loainl_ghichu = $_POST['loainl_ghichu']; 
                            $sql_update = "UPDATE `loai_nguyen_lieu` SET  `loainl_ten`='$loainl_ten',`loainl_ghichu`='".$loainl_ghichu."' WHERE loai_nguyen_lieu.loainl_id=".$id;
                                // var_dump($sql_update);   
                                // return; ''
                            $query = mysqli_query($con, $sql_update);
                             if ($query){
                                header("location:loainl.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Cập nhật không thành công </br>
                                   <a href='capnhatloainl.php?id=$id' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>