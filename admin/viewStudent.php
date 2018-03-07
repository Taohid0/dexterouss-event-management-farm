<?php include 'inc\header.php';?>
<?php include 'inc\Sidebar.php';?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
            if(isset($_GET['viewStudentid'])){
                $postid=$_GET['viewStudentid'];
            }
        ?>
        <?php
                    if(isset($_GET['delpostid'])){
                            $id=$_GET['delpostid'];
                            $postid = $_GET['delpostid'];
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
                                    </div>" ;
                                    echo"<script>window.location = 'Allstudentlist.php';</script>";
                             }else{
                                 echo "Post Not deleted!!";
                             }
                         }
                 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      $query="SELECT * FROM pending_student_application where StudentId=$postid";
                        $post=$db->select($query);
                        if ($post) {
                           $postresult=$post->fetch_assoc();
                    ?>
                    <table class="form">
                    
                        <tr>
                            <td>
                                <label>StudentId</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['StudentId'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Fullname</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['fullname'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>nickname</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['nickname'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>DOB</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['DOB'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Session</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['Session'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>studentHeight</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['studentHeight'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>studentWeight</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['studentWeight'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Disciplinename</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['Disciplinename'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>email</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>eye_st</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['eye_st'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>IdentificationSymbol</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['IdentificationSymbol'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>bloodGroup</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['bloodGroup'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>AdmissionDate</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['AdmissionDate'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>SSCYear</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['SSCYear'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>SchoolName</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['SchoolName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>SSCBoard</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['SSCBoard'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>SSC_GPA</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['SSC_GPA'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>HSCYear</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['HSCYear'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>CollageName</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['CollageName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>HSCBoard</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['HSCBoard'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>HSC_GPA</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['HSC_GPA'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>FatherName</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['FatherName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>FatherAge</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['FatherAge'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>FatherDOA</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['FatherDOA'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>FatherEducation</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['FatherEducation'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>FatherOccupation</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['FatherOccupation'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mother's Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['MotherName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mother's Age</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['MotherAge'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>MotherDOA</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['MotherDOA'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>MotherEducation</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['MotherEducation'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>MotherOccupation</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['MotherOccupation'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>DeathReasonOfParents</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['DeathReasonOfParents'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>PresentAddressOfParents</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['PresentAddressOfParents'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>PermanentAddressOfParents</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['PermanentAddressOfParents'];?>    
                                </textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>OwnContactNo</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['OwnContactNo'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>ParentsContactNo</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['ParentsContactNo'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>sibilingNumber</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['sibilingNumber'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>interestedSports</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['interestedSports'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>interestedsing</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['interestedsing'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>hobby</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['hobby'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>involvementculturalprogram</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['involvementculturalprogram'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>participationInRadioOrTelevision</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['participationInRadioOrTelevision'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>swim</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['swim'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Journalism</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['Journalism'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>afterGraduationPlan</label>
                            </td>
                            <td>
                                <textarea style="width:655px;height: 400px" readonly name="body" id="editor1">
                                 <?php echo $postresult['afterGraduationPlan'];?>    
                                </textarea>
                            </td>
                        </tr>

                        
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            <?php
                                $a =$postresult['image'];
                                $b =substr($a, 6);
                            ?>
                            <img src="<?php echo $b;?>" hight="50px" width="80px" style="padding:10px"/>
                                
                            </td>
                        </tr>
                        
                        <?php }?>
						<tr>
                          
                                
                           
                            <td >
                            <a  href="Allstudentlist.php">OK</a>
                             <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $postresult['StudentId'];?>">Delete</a>
                                
                            </td>
                            
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <!-- Load Ckeditor -->
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        } );
</script>
<?php include 'inc\footer.php';?>