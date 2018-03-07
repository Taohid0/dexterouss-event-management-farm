<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
		            if(isset($_GET['delpostid'])){
		            	 $id=$_GET['delpostid'];
			                $query="DELETE FROM post_tbl WHERE id='$id'";
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
							<th width="10%">Post Title</th>
							<th width="15%">Body</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="5%">Tags</th>
							<th width="5%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM post_tbl order by post_tbl.Id desc";
						$post=$db->select($query);
						if ($post) {
							$i=1;
							while ($result=$post->fetch_assoc()) {
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShorten($result['body'],50);?></td>
							<td><?php echo $result['author'];?></td>
							<td>
								<img src="<?php echo $result['image'];?>" hight="50px" width="80px" style="padding:10px"/>
								
							</td>
							
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tag'];?></td>
							<td><?php echo  $fm->formateDate( $result['date']);?></td>
							<td>

							<a href="viewpost.php?viewpostid=<?php echo $result['Id'];?>">View</a>
						
									||
									<a href="editpost.php?editpostid=<?php echo $result['Id'];?>">Edit</a>
							 		|| <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['Id'];
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