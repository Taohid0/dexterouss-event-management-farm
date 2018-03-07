<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
            if(!isset($_GET['noticeid'])||$_GET['noticeid']==NULL){
                echo"<script>Id didn't Found</script>";
            }else{
                $noticeid=$_GET['noticeid'];
            }
                      $query="SELECT * FROM notice where Id=$noticeid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
 ?>

  			<div class="grid_10">
			 	<div class="box round first grid">
            	  

 						<h2 style="  text-align: center;"><?php echo $postresult['title']; ?></h2>
 						<p> Notice By : <?php echo $postresult['NoticeBy']; ?></p>
 						<h3>Notice : </h3>
 						<h5><?php echo $postresult['body']; ?></h5>
 						<div class="block">
                 			<form action="" method="post" enctype="multipart/form-data">
                 			<table class="form">
                 				<tr>
                            <td></td>
                            <td>
                                <a style="color:red" href="viewnotice.php">BACK</a>
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