<div class="brand clearfix">
	<a href="" style="font-size: 20px;">Welcome to the Houseowner Panel</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<!-- <li><a href="change-password.php">Change Password</a></li> -->
					<li style="background-color:#222;color:white;padding-left:18px; padding-top:12px;">
						
							<?=$_SESSION["owner"]["FullName"]?>
					
					</li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
