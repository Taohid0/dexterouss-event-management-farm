
<?php include 'inc\header.php';?>
<?php include 'inc/Sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Inbox Message</h2>
                <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                         $to=$fm->validation($_POST['to']);
                         $from=$fm->validation($_POST['from']);
                         $sbj=$fm->validation($_POST['sbj']);
                         $msg=$fm->validation($_POST['msgtxt']);
                        $from="From: ".$from;

                         if ($to!=""&&$from!=""&&$msg!=""&&$sbj!="") {

                                $mail=mail($to,$sbj,$msg,$from);

                                 if ($mail) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Message Send Successfully!.
                                        </div>";
                                        
                                 }else{
                                     echo "Message not Send!!";
                                 }
                         }
                    }
                                
                ?>
                
               <div class="block copyblock"> 
               <form action="" method="post">   
               <table class="form" >      
                  <?php 
                    if (isset($_GET['id'])) {
                        $id=$_GET['id'];
                        $query="SELECT * FROM user_question_table Where id='$id'";
                        $contact=$db->select($query);
                        if ($contact) {
                            while ($result=$contact->fetch_assoc()) {

                  ?>
                    				
                        <tr>
                            <td >
                               <label>To:</label>
                            </td>
                            <td>
                            <input type="text" name="to" value="<?php echo $result['user_email'];?>" >
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label>From:</label>
                            </td>
                            <td>
                                <input type="text" name="from" value=" <?php echo "helalkucse@gmail.com";?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label>Subject:</label>
                            </td>
                            <td>
                                <input type="text" name="sbj">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label> Message:</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" name="msgtxt"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input  type="submit" name="" value="Send">
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>