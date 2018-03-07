<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<?php
            if(!isset($_GET['viewDsMemberid'])||$_GET['viewDsMemberid']==NULL){
                echo"<script>window.location = 'postlist.php';</script>";
            }else{
                $Dsmemberid=$_GET['viewDsMemberid'];
            }
        ?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      $query="SELECT * FROM ds_member where Id=$Dsmemberid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
                    ?>
                    <table class="form">
                    
                        <tr>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['designation'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>period</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo $postresult['period'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Special Award</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo $postresult['special_award'];?>"  class="medium" />
                            </td>
                        </tr>
                        

                        <tr>
                            <td>
                                <label>Massage</label>
                            </td>

                            <td>

                            <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['massage'];?>    
                                </textarea>
             
                            </td>
                        </tr>



            
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image'];?>" hight="50px" width="80px" style="padding:10px"/>
                            </td>
                        </tr>
                        <?php }?>
						<tr>
                            <td></td>
                            <td>
                                <a href="memberlist.php">OK</a>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>






<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc\footer.php';?>