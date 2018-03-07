<?php 
ob_start();
include 'inc/header.php';

?>
<?php include 'inc/Sidebar.php';?>

        <div class="grid_10">
		<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$name = mysqli_escape_string($db->link, $_POST['name']);
					$designation = mysqli_escape_string($db->link, $_POST['designation']);
                    $special_award = mysqli_escape_string($db->link, $_POST['special_award']);
                    $massage = mysqli_escape_string($db->link, $_POST['massage']);
                    $period = mysqli_escape_string($db->link, $_POST['period']);


					$permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;
					if($name==""||$designation==""||$massage==""||$file_name==""||$period==""){
						echo "<span class='error'>Field must not be empty</span>";
					}elseif ($file_size >1048567) {
					 echo "<span class='error'>Image Size should be less then 1MB!</span>";
					} elseif (in_array($file_ext, $permited) === false) {
					 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
					} else{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = "INSERT INTO ds_member(name,designation,special_award,massage,period,image) VALUES('$name','$designation','$special_award','$massage','$period','$uploaded_image')";
						$inserted_rows = $db->insert($query);
						if ($inserted_rows) {
						 echo "<span class='success'>Post Inserted Successfully.</span>";
						}else {
						 echo "<span class='error'>Post Not Inserted !</span>";
						}
						
					
					
					}
				}

?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name = "name" placeholder="Enter Name.." class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type="text" name="designation" id="" />
                            </td>
                        </tr>
    
                   
                    
                        <tr>
                            <td>
                                <label>Special Award</label>
                            </td>
                            <td>
                                <input type="text" name="special_award" id="" />
                            </td>
                        </tr>
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Massage</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" name="massage" class="tinymce"></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Period</label>
                            </td>
                            <td>
                            <input type="text" name="period" id="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name = "image" />
                            </td>
                        </tr>
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
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php  include 'inc/footer.php'?>