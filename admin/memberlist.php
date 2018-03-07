<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
		            if(isset($_GET['delpostid'])){
		            	 $id=$_GET['delpostid'];
		            	 $query="SELECT * FROM ds_member WHERE id='$id'";
			            	$post=$db->select($query);
				            if ( $post) {
				                while ($postresult=$post->fetch_assoc()) {
				                $a =$postresult['image'];
				                $deleteimg =unlink($a);
				                }
				            }

			                $query="DELETE FROM ds_member WHERE id = '$id' ";
							$delpost=$db->delete($query);
							if ($delpost) {
				                 echo "<div class='alert alert-success'>
				                         <strong>Success!</strong> Post delete Successfully!.
				                    </div>";
				             }else{
				                 echo "Post Not deleted!!";
				             }
				         }
       			 ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead style="padding_bottom:10px">

						<tr>
							<th width="5%">No.</th>
							<th width="10%">Name</th>
							<th width="15%">Designation</th>
							<th width="10%">period</th>
							<th width="20%">Massage</th>	
							<th width="15%">Image</th>
							<th width="25%">Action</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM ds_member order by ds_member.id desc";
						$post=$db->select($query);
						if ($post) {
							$i=1;
							while ($result=$post->fetch_assoc()) {
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['designation'];?></td>
							<td><?php echo $result['period'];?></td>
							<td><?php echo $fm->textShorten($result['massage'],50);?></td>
							
							<td>
								<img src="<?php echo $result['image'];?>" hight="50px" width="80px" style="padding:15px 0 0 0"/>
								
							</td>
							
							
							
							<td>
									<a href="viewdsMember.php?viewDsMemberid=<?php echo $result['id'];?>">View</a>
						
									||
									<a href="editsingleDsMember.php?editDsMemberid=<?php echo $result['id'];?>">Edit</a>
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
<?php include 'inc\footer.php';?>