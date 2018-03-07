<?php 
	include "../lib/Session.php"; 
	Session::init();
	
?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/formate.php"; ?>
<?php include "../config/config.php"; ?>
<?php 

		 $db = new Database();
		 $f = new Format();
		 
		?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
			<?php 
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$username= $f->validation($_POST['username']);
					$password=$f->validation(md5($_POST['password']));
					$username=mysqli_real_escape_string($db->link,$username);
					$password=mysqli_real_escape_string($db->link,$password);
					$query = "SELECT * FROM admin_info WHERE name='$username' AND password='$password'";
					$result = $db->select($query);
					if($result!=false){
						$value = mysqli_fetch_array($result);
						$row = mysqli_num_rows($result);
						if($row>0){
							Session::set("login",true);
							Session::set("username",$value['name']);
							Session::set("admin_id",$value['Id']);
							header("Location:index.php");
						}else{
							echo "<span style='color : red; font-size : 18px'>No result Found !!</span>";
						}
					}else{
						
						echo "<span style='color : red; font-size : 18px'>Username and passsword dosenot match!!</span>";
					}
				}
				
			
			?>
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>