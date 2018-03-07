<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<?php
            if(!isset($_GET['editDsMemberid'])||$_GET['editDsMemberid']==NULL){
                echo"<script>window.location = 'postlist.php';</script>";
            }else{
                $editDsMemberid=$_GET['editDsMemberid'];
            }
            $query="SELECT image 
                        FROM ds_member WHERE id='$editDsMemberid'
                        ";
            $post1 = $db->select($query);
            if ( $post1) {
                while ($postresult=$post1->fetch_assoc()) {
                $img_Delete=$postresult['image'];
                }
            }
        ?>


        <div class="grid_10">



                 <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $name = mysqli_escape_string($db->link, $_POST['name']);
                        $designation = mysqli_escape_string($db->link, $_POST['designation']);
                        $period = mysqli_escape_string($db->link, $_POST['period']);
                        $special_award = mysqli_escape_string($db->link, $_POST['special_award']);
                        $massage = mysqli_escape_string($db->link, $_POST['massage']);

                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

                        if (empty($name) || empty($designation) || empty($period) ||  empty($massage)) {
                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                   </div>";
                        }
                        else{
                            if (!empty($file_name)) {
                                
                           
                            if ($file_size > 1048567) {
                                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                            } elseif (in_array($file_ext, $permited) === false) {
                                echo "<span class='error'>You can upload only:-"
                                    . implode(', ', $permited) . "</span>";
                            } else {
                                move_uploaded_file($file_temp, $uploaded_image);
                                   $deleteimg =unlink($img_Delete);


                                $query="UPDATE ds_member
                                SET
                                name='$name',
                                designation='$designation',
                                period='$period',
                                special_award='$special_award',
                                massage='$massage',
                                image='$uploaded_image'
                                
                                Where id='$editDsMemberid'";
                                $update_rows = $db->update($query);
                                if ($update_rows && $deleteimg) {
                                    echo "<span class='success'>Post Updated Successfully.    </span>";
                                } else {
                                    echo "<span class='error'>Post Not Updated !</span>";
                                }
                            }
                         }
                         else{
                                
                               
                                $query="UPDATE ds_member
                                SET
                                name='$name',
                                designation='$designation',
                                period='$period'
                                Where Id='$editDsMemberid'
                                ";
                               $update_rows = $db->update($query);
                                if ($update_rows  ) {
                                    echo "<span class='success'>Post Updated Successfully.    </span>";
                                } else {
                                    echo "<span class='error'>Post Not Updated !</span>";
                                }
                            }


                         }
                    } 
                    ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                 

                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      $query="SELECT * FROM ds_member where Id=$editDsMemberid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
                    ?>
                    <table class="form">
                        <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text"  name="name" value="<?php echo $postresult['name'];?>" class="medium" />
                                </td>
                        </tr>

                        
                    
                        <tr>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type="text"  name="designation" value="<?php echo $postresult['designation'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>period</label>
                            </td>
                            <td>
                                <input type="text"  name="period" value="<?php echo $postresult['period'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Special Award</label>
                            </td>
                            <td>
                                <input type="text"  name="special_award" value="<?php echo $postresult['special_award'];?>"  class="medium" />
                            </td>
                        </tr>
                        

                        <tr>
                            <td >
                                <label>Massage</label>
                            </td>

                            <td>

                            <textarea style="width:655px;height: 400px"  name="massage" id="editor1">
                                 <?php echo $postresult['massage'];?>    
                                </textarea>
             
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img required="1" src="<?php echo $postresult['image'];?>" hight="50px" width="80px" style="padding:10px"/>
                                <input name="image" type="file" />
                            </td>
                        </tr>

                        <?php }?>
						<tr>
                        <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>






<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc\footer.php';?>