<?php 
	include "../config/config.php"; 
	include "../lib/Database.php"; 
	include "../lib/Session.php"; 
    include '../helpers/formate.php';
	Session::checkSession();	
?>
<?php 

		 $db = new Database();
          $fm = new Format();
		 
?>



   
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
            <?php 
                $query="SELECT * FROM others_table where id=15";
                $post=$db->select($query);
                $postresult=$post->fetch_assoc();
                $logo = $postresult['content'];

            ?>
                <div class="floatleft logo">
                    <img style="width: 80px;overflow: hidden;height: 60px" src="<?php echo $logo; ?>" alt="ku logo">
				</div>
				<div class="floatleft middle">
					<h1>KHULNA UNIVERSITY DIRECTOR OF STUDENT AFFAIR</h1>
					<p>&copy; Copyright KHULNA UNIVERSITY Computer Science and Engineering </p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
						<?php
							if(isset($_GET['action']) && $_GET['action']=="logout" ){
								Session::destroy();
							}
						?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-dashboard"><a href="../index.php"><span>View Website</span></a> </li>
                
                <li class="ic-form-style"><a href="Question.php"><span>Question
                        <?php
                            $queryqq="SELECT * FROM user_question_table";
                            $contact=$db->select($queryqq);
                            if ($contact) {
                                $count=mysqli_num_rows($contact);
                                echo "(".$count.")";
                            }
                            ?>

                </span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
                        <?php
                            $queryqq="SELECT * FROM contact_mail";
                            $contact=$db->select($queryqq);
                            if ($contact) {
                                $count=mysqli_num_rows($contact);
                                echo "(".$count.")";
                            }
                            ?>

                </span></a></li>
                <li class="ic-charts"><a href="application_list.php"><span>Application List
                    <?php
                        $queryas="SELECT * FROM pending_student_application Where Check1=0";
                        $contact1=$db->select($queryas);
                        if ($contact1) {
                            $count1=mysqli_num_rows($contact1);
                            echo "(".$count1.")";
                        }
                            ?>
                </span></a></li>
                <li class="ic-charts"><a href="postlist.php"><span>Student</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        