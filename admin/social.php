<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">


        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $facebook = mysqli_escape_string($db->link, $_POST['facebook']);
                        $twitter = mysqli_escape_string($db->link, $_POST['twitter']);
                        $linkedin = mysqli_escape_string($db->link, $_POST['linkedin']);
                        $googleplus = mysqli_escape_string($db->link, $_POST['googleplus']);


                            
                         $query="UPDATE others_table
                                SET
                                name='Facebook',
                                content='$facebook' 
                                Where id=5";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='twitter',
                                content='$twitter' 
                                Where id=8";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='linkedin',
                                content='$linkedin' 
                                Where id=7";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='googleplus',
                                content='$googleplus' 
                                Where id=6";
                               $db->update($query);
                               echo "Done";
                         
                            

                        }


                        ?>
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                        <?php
                          $query="SELECT * FROM others_table where id=5";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="facebook" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>

                        <?php } ?>

                        <?php
                          $query="SELECT * FROM others_table where id=8";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>  

						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="twitter" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>
                        <?php } ?>


                         <?php
                          $query="SELECT * FROM others_table where id=7";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?> 

						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="linkedin" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>
                        <?php } ?>


                         <?php
                          $query="SELECT * FROM others_table where id=6";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?> 
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="googleplus" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>

                        <?php } ?>

						
						 <tr>
                            <td></td>
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