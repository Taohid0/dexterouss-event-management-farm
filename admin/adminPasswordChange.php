<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<?php
            
                $postid=Session::get('admin_id');
                
                
   ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                    

                    <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $oldpas = mysqli_escape_string($db->link, $_POST['oldpas']);
                        $newpas = mysqli_escape_string($db->link, $_POST['newpas']);
                        $newpas=md5($newpas);
                        $oldpas=md5($oldpas);
                        echo $oldpas;
                        if (empty($oldpas) || empty($newpas) ) {
                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty :D.
                                   </div>";
                        }else{
                           $query="SELECT * FROM admin_info WHERE Id = '$postid'";
                                $post=$db->select($query);
                
                                    if ($post) {
                                       $postresult=$post->fetch_assoc();
                                       $databasePassword = $postresult['password'];
                                        echo $databasePassword;
                                       if($databasePassword==$oldpas){
                                            $query="UPDATE admin_info
                                            SET 
                                            
                                            password='$newpas' Where Id = '$postid'";
                                            $update_rows = $db->update($query);
                                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong>Password Changed!!
                                            </div>";
                                           

                                       }else{
                                        
                                             echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong>Password Dose not match
                                            </div>";

                                       }
                                   }
                                    
                                    

                    
                                }
                                
                                
                                

                              
                        }
                       
        
                    
                    ?>
                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      
                    ?>
                    <table class="form">
                    
                        <tr>
                            <td>
                                <label>Old password</label>
                            </td>
                            <td>
                                <input type="password" name="oldpas" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>New password</label>
                            </td>
                            <td>
                                <input type="password" name="newpas" value="" class="medium" />
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