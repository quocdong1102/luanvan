<?php

   
                        include("connect.php");
                        if(isset($_POST['submit'])){
                            $loainl_id = $_POST['loainl_id'];
                            $nl_ten = $_POST['nl_ten'];
                            $dvt_id = $_POST['dvt_id'];
                            $khoi_luong = $_POST['khoi_luong'];
                            echo "$khoi_luong";
                            $chat_dam = $_POST['chat_dam'];
                            $chat_beo = $_POST['chat_beo'];
                            $chat_xo = $_POST['chat_xo'];
                            echo "$chat_xo";
                            $chat_botduong = $_POST['chat_botduong'];
                            $vitamin = $_POST['vitamin'];
                            $khoang_chat = $_POST['khoang_chat'];
                            $name = $_FILES['nl_hinhanh']['name'];
                            $target_dir = "images/";
                            $target_file = $target_dir . basename($_FILES["nl_hinhanh"]["name"]);
                            move_uploaded_file($_FILES['nl_hinhanh']['tmp_name'],$target_dir.$name);
                            $sql = "INSERT INTO `nguyen_lieu`(`loainl_id`, `nl_ten`,  `nl_hinhanh`) VALUES ('$loainl_id', '$nl_ten',  '". $target_file."')";

                            $query = mysqli_query($con, $sql);
                            echo "$sql";
                            $sql_nlid= "SELECT nl_id FROM nguyen_lieu WHERE nl_ten='$nl_ten'";
                            echo "$sql_nlid";
                            echo "<br>";
                            $result= $con->query($sql_nlid);
                            $row2 = $result->fetch_assoc();
                            $nl_id=$row2['nl_id'];
                            $sql1 = "INSERT INTO `chitiet_nguyenlieu`(`nl_id`, `dvt_id`, `khoi_luong`, `chat_dam`, `chat_beo`, `chat_xo`, `chat_botduong`, `vitamin`, `khoang_chat`) VALUES (".$nl_id.",".$dvt_id.',"'.$khoi_luong.'","'.$chat_dam.'","'.$chat_beo.'","'.$chat_xo.'","'.$chat_botduong.'","'.$vitamin.'","'.$khoang_chat.'")';
                            echo "$sql1";

                           $query = mysqli_query($con, $sql1);
                            
                        
                             if ($query){
                                header("location:themnl.php");
                             }else{
                                echo "<center> <font size='5' color='red'>Thêm mới không thành công </br>
                                   <a href='themnl.php' style='color:white'> Làm lại </a> </font> </center>";
                            }
                           mysqli_close($con);
                            
                        }
                    ?>