<?php

	include_once('../includes/form_creator.php');
?>
<nav class="topnav" id="topnavbar">
  <a href="../index.php" class="navbar no-border"> <i class="fas fa-home"></i> Home </a>
  <?php if (isset($_SESSION['id'])) { ?>
    <a href="../pages/profile.php" class="navbar"> <i class="fas fa-user"></i> Profile </a>
  <?php } ?>
  <a href="../pages/pets.php" class="navbar"> <i class="fas fa-dog"></i> Pets </a>
  <a href="../pages/foundpet.php" class="navbar"> <i class="fas fa-child"></i> Found a pet! </a>
  <div style="display:none" id="csrf_token"> <?= $_SESSION['csrf'] ?> </div>

  <?php 
       if(!isset($_SESSION['id'])){

	?>
  <!-- REGISTER -->
  <button onclick="document.getElementById('register-popup').style.display='block'" class="navbar right">
    <i class="fa fa-user-plus"></i> Register
  </button>
<?php

       $register_form = new FormCreator('register-popup', '../actions/action_register.php', true);
       $register_form->add_input("username", "Username", "text", "Enter username", true);
       $register_form->add_input("password", "Password", "password", "Enter password", true);

       $register_form->inline();

?>
  <!-- LOGIN -->
  <button onclick="document.getElementById('login-popup').style.display='block'" class="navbar right">
    <i class="fa fa-sign-in"></i> Login
  </button>
	<?php
	       $login_form = new FormCreator('login-popup', '../actions/action_login.php', true);
	       $login_form->add_input("username", "Username", "text", "Enter username", true);
	       $login_form->add_input("password", "Password", "password", "Enter password", true);
	       $login_form->add_input("remember", "Remember Me", "checkbox", NULL, false);
	       $login_form->inline();

	?>

  <?php } else { ?>
	  <button onclick="fetch('../actions/action_logout.php').then((e)=> { location.reload();});" class="navbar right">
	    <i class="fa fa-users-slash"></i> Logout
	  </button>
	  <a href="../pages/favorites.php" class=" a-heart right"> <i class="fa fa-heart"> </i> Favorites </a>

  <?php } ?>
  <a href="../pages/search.php" class=" a-search right"> <i class="fa fa-search"> </i> Search </a>
  <a href="javascript:void(0);" class="icon" onclick="topnavResponsive()"><i class="fa fa-bars"></i></a>
</nav>

<script>

	function authHandler(type, event){
		event.preventDefault();
		let element = document.getElementById(type+'-errors');
		element.innerHTML = '';
		switch (type){


			case 'register-popup':
			case 'login-popup':

				let children = document.querySelectorAll(`#${type} input`);
				console.dir(children);
				let action = 'action_'+type.split('-')[0];
				fetch(`../actions/${action}.php`, {
					method:'POST',
					headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json',
					},
						body: JSON.stringify({'username': children[0].value, 'password':children[1].value, 'remember': children.length == 3 ? children[2].checked : false })
				}).then((text) => {
					return text.json();
					
				}).then( (json) => {

					if('errors' in json){
						element.innerHTML = json['errors'];
						return;
					}

					location.reload();

					
				});
				break;
		}
	}

	function registerListener(id){

		if(document.getElementById(id))
			document.getElementById(id).children[0].addEventListener('submit', (e) => authHandler(id, e));
	}


	


</script>
