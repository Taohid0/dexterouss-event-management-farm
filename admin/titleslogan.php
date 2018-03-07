<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">


        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = mysqli_escape_string($db->link, $_POST['title']);
                        $slogan = mysqli_escape_string($db->link, $_POST['slogan']);
                      


                            
                         $query="UPDATE others_table
                                SET
                                name='Website title',
                                content='$title' 
                                Where id=1";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='slogan',
                                content='$slogan' 
                                Where id=14";
                               $db->update($query);  
                               echo "Done";    

                        }


                        ?>
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                    <?php
                          $query="SELECT * FROM others_table where id=1";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" required="1" value="<?php echo $postresult['content']; ?>"  name="title" class="medium" />
                            </td>
                        </tr>
                            <?php } ?>
                        <?php
                          $query="SELECT * FROM others_table where id=14";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" required="1" value="<?php echo $postresult['content']; ?>" name="slogan" class="medium" />
                            </td>
                        </tr>
						 <?php } ?>
						
						 <tr>
                            <td>
                            </td>
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