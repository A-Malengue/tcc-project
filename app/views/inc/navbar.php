<nav class="navbar">
<div class="nome-site">Portal de Reclamações do Kilamba</div>
<a href="#" class="toggle-button">
<span class="bar"></span>
<span class="bar"></span>
<span class="bar"></span>
</a>

<div class= "navbar-links">
<ul>
    <li ><a href="<?php echo URLROOT; ?>">Home</a></li>
    <li ><a href="<?php echo URLROOT; ?>/pages/about">Sobre</a></li>
    
    <?php if(isset($_SESSION["user_id"])) : ?>
        <li ><a href="<?php echo URLROOT; ?>/users/logout">Sair</a></li>

    <?php else : ?>
    <li ><a href="<?php echo URLROOT; ?>/users/register">Cadasta-se</a></li>
    <li ><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
    <?php endif; ?>
</ul>
</div>

</nav>