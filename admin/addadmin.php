<?php 
ob_start();
include 'inc/header.php';

?>
<?php include 'inc/Sidebar.php';?>

        <div class="grid_10">
		<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$name = mysqli_escape_string($db->link,$_POST['name']);
					$password = mysqli_escape_string($db->link,$_POST['password']);
					$password =md5($password);
					
					if($name==""||$password==""){
						echo "<span class='error'>Field must not be empty</span>";
					}else{
						$query = "INSERT INTO admin_info(name,password) VALUES('$name','$password')";
						$inserted_rows = $db->insert($query);
						if ($inserted_rows) {
						 echo "<span class='success'>Admin Inserted Successfully.</span>";
                
						}else {
						 echo "<span class='error'>Admin Not Inserted !</span>";
						}
						
					
					
					}
				}

?>
		
            <div class="box round first grid">
                <h2>Add New Admin</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name = "name" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="password" name="password" id="" />
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