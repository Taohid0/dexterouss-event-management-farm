<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
            if(!isset($_GET['msgInboxtid'])||$_GET['msgInboxtid']==NULL){
                echo"<script>Id didn't Found</script>";
            }else{
                $postid=$_GET['msgInboxtid'];
            }
                      $query="SELECT * FROM contact_mail where Id=$postid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
 ?>

  			<div class="grid_10">
			 	<div class="box round first grid">
            	  

 						<h2>Name : <?php echo $postresult['name']; ?></h2>
 						<p> Email : <?php echo $postresult['email']; ?></p>
 						<h3>Massage : </h3>
 						<h5><?php echo $postresult['massage']; ?></h5>
 						<div class="block">
                 			<form action="" method="post" enctype="multipart/form-data">
                 			<table class="form">
                 				<tr>
                            <td></td>
                            <td>
                            <a href="reply.php?id=<?php echo $postid;?>">Reply</a>
                                ||<a style="color:red" href="inbox.php">BACK</a>
                            </td>
                 			</table>
                 			</form>
                 			</div>
 				</div>
 				
 				
 			</div>
                    <?php
                    	}

                    ?>




<?php include 'inc\footer.php';?>