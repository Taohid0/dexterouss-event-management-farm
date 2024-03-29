<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<?php
            if(!isset($_GET['editpostid'])||$_GET['editpostid']==NULL){
                echo"<script>window.location = 'postlist.php';</script>";
            }else{
                $postid=$_GET['editpostid'];
            }
            $query="SELECT image 
                        FROM post_tbl WHERE id='$postid'
                        ";
            $post=$db->select($query);
            if ( $post) {
                while ($postresult=$post->fetch_assoc()) {
                $img_Delete=$postresult['image'];
                }
            }
            
        ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = mysqli_escape_string($db->link, $_POST['title']);
                        $author = mysqli_escape_string($db->link, $_POST['author']);
                        $tag = mysqli_escape_string($db->link, $_POST['tag']);
                        $body = mysqli_escape_string($db->link, $_POST['body']);

                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

                        if (empty($title) || empty($author) || empty($tag) || empty($body)) {
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


                                $query="UPDATE post_tbl
                                SET
                                title='$title',
                                body='$body',
                                image='$uploaded_image',
                                tag='$tag'
                                Where Id='$postid'";
                                $update_rows = $db->update($query);
                                if ($update_rows && $deleteimg) {
                                    echo "<span class='success'>Post Updated Successfully.    </span>";
                                } else {
                                    echo "<span class='error'>Post Not Updated !</span>";
                                }
                            }
                         }
                         else{
                                
                               
                                $query="UPDATE post_tbl
                                SET
                                title='$title',
                                body='$body',
                                tag='$tag'
                                Where Id='$postid'
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
                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      $query="SELECT * 
                        FROM post_tbl WHERE id='$postid'";
                        $post=$db->select($query);
                        if ($post) {
                            while ($postresult=$post->fetch_assoc()) {
                    ?>
                    <table class="form">
                    
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postresult['title'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $postresult['author'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" value="<?php echo $postresult['tag'];?>"  class="medium" />
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image'];?>" hight="50px" width="80px" style="padding:10px"/><br/>
                                <input name="image" type="file" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" name="body" id="editor1">
                                 <?php echo $postresult['body'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <?php }}?>
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
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <!-- Load Ckeditor -->
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        } );
</script>
<?php include 'inc\footer.php';?>