
<?php include 'inc/header.php';?>
<?php include 'inc/Sidebar.php';?>
 <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>


                <?php
                    if(isset($_GET['delpostid'])){
                         $id=$_GET['delpostid'];
                            $query="DELETE FROM notice WHERE id='$id'";
                            $delpost=$db->delete($query);
                            if ($delpost) {
                                 echo "<div class='alert alert-success'>
                                         <strong>Success!</strong> Notice delete Successfully!.
                                    </div>";
                             }else{
                                 echo "Notice Not deleted!!";
                             }
                         }
                 ?>


                <div class="block">  
                    <table class="data display datatable" id="example">
                    <thead style="padding_bottom:10px">

                        <tr>
                            <th width="15%">No.</th>
                            <th width="20%">Notice By</th>
                            <th width="20%">title</th>
                            <th width="20%">body</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                        $query="SELECT * FROM notice";
                        $post=$db->select($query);
                        if ($post) {
                            $i=1;
                            while ($result=$post->fetch_assoc()) {
                            
                    ?>


                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['NoticeBy'];?></td>
                            <td><?php echo $fm->textShorten($result['title'],50);?></td> 
                            <td><?php echo $fm->textShorten($result['body'],50);?></td>
                            
                            <td>

                            <a href="SingleNoticeView.php?noticeid=<?php echo $result['id'];?>">View</a>
                                    || <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['id'];
                                        ?>">Delete</a>
                

                             </td>
                        </tr>
                        <?php 
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
    
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

 <?php  include 'inc/footer.php'?>