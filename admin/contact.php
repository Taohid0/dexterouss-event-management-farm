<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">


        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $ph1 = mysqli_escape_string($db->link, $_POST['ph1']);
                        $ph2 = mysqli_escape_string($db->link, $_POST['ph2']);
                        $ph3 = mysqli_escape_string($db->link, $_POST['ph3']);
                        $ph4 = mysqli_escape_string($db->link, $_POST['ph4']);
                        $email = mysqli_escape_string($db->link, $_POST['email']);


                            
                         $query="UPDATE others_table
                                SET
                                name='ph1',
                                content='$ph1' 
                                Where id=9";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='ph2',
                                content='$ph2' 
                                Where id=10";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='ph3',
                                content='$ph3' 
                                Where id=11";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='ph4',
                                content='$ph4' 
                                Where id=12";
                               $db->update($query);

                               $query="UPDATE others_table
                                SET
                                name='Email',
                                content='$email' 
                                Where id=4";
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
                          $query="SELECT * FROM others_table where id=9";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>					
                        <tr>
                            <td>
                                <label>Phone No 1 </label>
                            </td>
                            <td>
                                <input type="text" required="1" name="ph1" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>

                        <?php } ?>

                        <?php
                          $query="SELECT * FROM others_table where id=10";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>  

						 <tr>
                            <td>
                                <label>Phone No 2</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="ph2" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>
                        <?php } ?>


                         <?php
                          $query="SELECT * FROM others_table where id=11";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?> 

						
						 <tr>
                            <td>
                                <label>Phone No 3</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="ph3" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>
                        <?php } ?>


                         <?php
                          $query="SELECT * FROM others_table where id=12";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?> 
						
						 <tr>
                            <td>
                                <label>Phone No 4</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="ph4" value="<?php echo $postresult['content']; ?>" class="medium" />
                            </td>
                        </tr>

                        <?php } ?>

                        <?php
                          $query="SELECT * FROM others_table where id=4";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?> 
                        
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" required="1" name="email" value="<?php echo $postresult['content']; ?>" class="medium" />
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