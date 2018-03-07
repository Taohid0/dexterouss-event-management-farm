<?php 
ob_start();
include 'inc/header.php';

?>
<?php include 'inc/Sidebar.php';?>
<div class="grid_10">

<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$title = mysqli_escape_string($db->link,$_POST['title']);
					$NoticeBy = mysqli_escape_string($db->link,$_POST['NoticeBy']);
					$body = mysqli_escape_string($db->link,$_POST['body']);

					if($title==""||$NoticeBy==""||$body==""){
						echo "<span class='error'>Field must not be empty</span>";
					}else{
						$query = "INSERT INTO notice(title,NoticeBy,body) VALUES('$title','$NoticeBy','$body')";
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
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name = "title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Notice By</label>
                            </td>
                            <td>
                                <input type="text" name = "NoticeBy" placeholder="Notice by..." class="medium" />
                            </td>
                        </tr>
 							
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" name="body" class="tinymce"></textarea>
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