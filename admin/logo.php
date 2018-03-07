<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">

        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        
                        $query="SELECT content 
                        FROM others_table WHERE id=15
                        ";
                        $post1 = $db->select($query);  
                         $postresult=$post1->fetch_assoc();
                         $img_Delete=$postresult['content'];      
                         $deleteimg =unlink($img_Delete);


                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query="UPDATE others_table
                                SET
                                name='Logo',
                                content='$uploaded_image'
                                Where id=15";
                                $update_rows = $db->update($query);
                            }


                        ?>
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                     <?php
                          $query="SELECT * FROM others_table where id=15";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['content'];?>" hight="50px" width="80px" style="padding:10px"/>
                                <br>
                                <input name="image" type="file" />
                            </td>
                        </tr>

						 <?php } ?>
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php  include 'inc/footer.php'?>