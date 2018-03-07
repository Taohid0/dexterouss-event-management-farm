<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">

        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $copyright = mysqli_escape_string($db->link, $_POST['copyright']);
                       
                               

                               $query="UPDATE others_table
                                SET
                                name='copyright',
                                content='$copyright' 
                                Where id=2";
                               if($db->update($query)){
                                echo "Done";
                               }
                         
                            

                        }


                        ?>
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                     <?php
                          $query="SELECT * FROM others_table where id=2";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>

                        <tr>
                            <td>
                                <input type="text" required="1" value="<?php echo $postresult['content']; ?>" name="copyright" class="large" />
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