<?php require_once '../includes/session.php'; ?>
<?php require '../templates/head.php'; default_head('Pet Nexus - Found Pets');

// Verify if user is logged in
if (!isset($_SESSION['id'])){
	die(header('Location: login.php'));
}



require_once("../database/db_class.php");
$dbc = Database::instance()->db();
$stmt = $dbc->prepare('SELECT username FROM users WHERE id = ?');
$stmt->execute(array($_SESSION['id']));

$username = $stmt->fetch()['username'];

?>

<body>
	<?php require '../templates/header.html' ?>
	<?php require '../templates/navbar.php' ?>
	<header>
		<section class="grid-gallery">
			<div class="profile">
				<div class="profile-image">
					<img src="../assets/img/logo.png">
				</div>

				<div class="profile-header">
					<code class="profile-user-name"> <?=$username?> </code>
					<button onclick="document.getElementById('change-popup').style.display='block'" class="profile-settings-button" aria-label="profile settings">
						<i class="fas fa-edit" aria-hidden="true"></i>
					</button>
					<p class="profile-real-name">Pet Nexus Admin</p>
				</div>
				
				<?php
					
				   $change_form = new FormCreator('change-popup', '../actions/action_change_creds.php', true);
				   $change_form->add_input("username", "Username", "text", "Enter username", true, $username);
				   $change_form->add_input("old_password", "Old password", "password", "Enter old password", true);
				   $change_form->add_input("new_password", "New password", "password", "Enter new password", false);
				   $change_form->inline();
				?>
			

			</div>
		</section>
	</header>

	<section>
		<section class="grid-gallery">
			<div class="posts">
				<h1 class="pink">My Listed Pets</h1>
				<?php
					$stmt = $dbc->prepare("SELECT * FROM dogs WHERE user_id = ?");
					$stmt->execute(array($_SESSION['id']));
					$pets = $stmt->fetchAll();
					$i = 0;
					error_log(print_r($pets, true));
					foreach ($pets as $index => $entry) { $i++;
				?>

				<div class="posts-item">
					<div class="posts-container">
						<div class="posts-inside-container">
							<img src="<?= $entry['listing_picture']?>" class="posts-image">
							<div class="fav-button">
								<button class="button-heart"><i class="fa fa-heart" aria-hidden="true"></i></button>
							</div>
							<div class="photo-stats">
								<i class="fa fa-heart pink" aria-hidden="true"></i> <?=32+$i ?>
								<i class="fa fa-question-circle blue" aria-hidden="true"></i> 3
							</div>
						</div>
						<a href="item.php">
							<p><?= $entry['listing_name']?><br>29.99€</p>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>
	</section>
	<?php require '../templates/footer.html'; ?>
</body>

</html>
