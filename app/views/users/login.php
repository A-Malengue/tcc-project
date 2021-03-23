<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/login.css">
<?php require APPROOT . "../views/inc/header.php";?>

<!-- Login -->
<div class="container">
	<div class="content">
	<div class="header">
	<?php flash('register_success'); ?>
		<h2>Faça Login</h2>
	</div>
	<form id="form" class="form" action="<?php echo URLROOT; ?>/users/login" method="post">
		<div class="form-control ">
			<label for="username">Email</label>
			<input type="email"  placeholder="Email" name="email" id="email" value="<?php echo $data["email"]; ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small class="error"><?php echo $data["email_err"]; ?></small>
		</div>

		<div class="form-control ">
			<label for="username">Senha</label>
			<input type="password" placeholder="Senha" name="senha" id="password" value="<?php echo $data["senha"]; ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small class="error"><?php echo $data["senha_err"]; ?></small>
		</div>
		<button>Submit</button>
	</form>
	</div>
</div>

<?php require APPROOT . "../views/inc/footer.php";?>