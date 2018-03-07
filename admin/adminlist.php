<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
		            if(isset($_GET['delpostid'])){
		            	 $id=$_GET['delpostid'];
			                $query="DELETE FROM admin_info WHERE Id='$id'";
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
							<th width="20%">No.</th>
							<th width="40%">Name</th>
							<th width="40%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM admin_info order by admin_info.Id desc";
						$post=$db->select($query);
						if ($post) {
							$i=1;
							while ($result=$post->fetch_assoc()) {
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td>

						
						
								 <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['Id'];
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