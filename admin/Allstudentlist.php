<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
		            if(isset($_GET['delpostid'])){
							$id=$_GET['delpostid'];
							$query="SELECT * FROM pending_student_application WHERE StudentId='$id'";
			            	$post=$db->select($query);
				            if ( $post) {
				                while ($postresult=$post->fetch_assoc()) {
				                $a =$postresult['image'];
								$b =substr($a, 6);
				                $deleteimg =unlink($b);
				                }
				            }



			                $query="DELETE FROM pending_student_application WHERE StudentId='$id'";
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
							<th width="10%">Student ID</th>
							<th width="20%">Name</th>
							<th width="15%">Discipline</th>
							<th width="15%">Picture</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM pending_student_application Where Check1 = 1";
						$post=$db->select($query);
						if ($post) {
							$i=1;
							while ($result=$post->fetch_assoc()) {
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['StudentId'];?></td>
							<td><?php echo $result['fullname'];?></td>
							<td><?php echo $result['Disciplinename'];?></td>
							
							<td>
							<?php
								$a =$result['image'];
								$b =substr($a, 6);
							?>
							<img src="<?php echo $b;?>" hight="50px" width="80px" style="padding:10px"/>
								
							</td>
							
							<td>
							<a href="viewStudent.php?viewStudentid=<?php echo $result['StudentId'];?>">View</a>
	
							 || <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['StudentId'];
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