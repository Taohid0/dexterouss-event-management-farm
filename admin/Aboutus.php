<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
        <div class="grid_10">

        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $copyright = mysqli_escape_string($db->link, $_POST['copyright']);
                       
                               

                               $query="UPDATE others_table
                                SET
                                name='About us',
                                content='$copyright' 
                                Where id=16";
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
                          $query="SELECT * FROM others_table where id=16";
                            $post=$db->select($query);
                            if ($post) {
                               $postresult=$post->fetch_assoc();
                        ?>

                        <tr>
                            <td>
                                <textarea style="width: 800px;height: 400px" required="1"  name="copyright" class="large"><?php echo $postresult['content']; ?></textarea>  
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