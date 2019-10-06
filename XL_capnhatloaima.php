                    <?php
                        include("connect.php");
                        $id = 0;    
                        if(isset($_POST['submit'])){
                            $id=isset($_POST['id']) ? $_POST['id']:$id;
                            $loaima_ten = $_POST['loaima_ten'];
                            $loaima_ghichu = $_POST['loaima_ghichu']; 
                            $sql_update = "UPDATE `loai_mon_an` SET  `loaima_ten`='$loaima_ten',`loaima_ghichu`='".$loaima_ghichu."' WHERE loai_mon_an.loaima_id=".$id;
                                // var_dump($sql_update);   
                                // return; ''
                            $query = mysqli_query($con, $sql_update);
                             if ($query){
                                header("location:loaima.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Cập nhật không thành công </br>
                                   <a href='capnhatloaima.php?id=$id' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>