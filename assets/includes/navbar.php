<nav>
		<div class="nav">
			<div class="logo">
				Hospital Management System
			</div>
			<div class="profile">
				
				<div class="profile-icon" id="profile-icon">
					<span><?php echo $_SESSION['username']; ?></span>
					<img src="../assets/images/user.png">
				</div>
				<div id="dropdown">
					<div class="logout-container">
					<a onclick="logout()">Log out</a>
					</div>
				</div>
			</div>

	</nav>
    