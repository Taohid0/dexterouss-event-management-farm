<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
            if(!isset($_GET['questionid'])||$_GET['questionid']==NULL){
                echo"<script>Id didn't Found</script>";
            }else{
                $postid=$_GET['questionid'];
            }
                      $query="SELECT * FROM user_question_table where Id=$postid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
 ?>

  			<div class="grid_10">
			 	<div class="box round first grid">
            	  

 						<h2>Name : <?php echo $postresult['user_name']; ?></h2>
 						<p> Email : <?php echo $postresult['user_email']; ?></p>
 						<h3>Massage : </h3>
 						<h5><?php echo $postresult['user_question']; ?></h5>
 						<div class="block">
                 			<form action="" method="post" enctype="multipart/form-data">
                 			<table class="form">
                 				<tr>
                            <td></td>
                            <td>
                            <a href="replyq.php?id=<?php echo $postid;?>">Reply</a>
                                ||<a style="color:red" href="Question.php">BACK</a>
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