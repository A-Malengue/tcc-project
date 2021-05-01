<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/posts.css">
<?php require APPROOT . "../views/inc/header.php";?>
<main class="main">

<ul class="posts">
    <li class="post">
    <button type="button" class="filespost edit">
  <i class="fas fa-backward"></i><a href="<?php echo URLROOT; ?>/posts<?php echo $data['post']->id; ?>">Voltar</a>
  </button>
<div class="">
<h3><?php echo $data ['post']->body; ?></h3>
<p id="welcome">Reclamação feita por <?php echo $data['user']->nome; ?> em <?php echo $data['post']->criado_em; ?></p>
</div>
<?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
  
  <div class="action-btn-post">
  <button type="button" class="filespost edit">
  <a href="<?php echo URLROOT; ?>/posts/edite/<?php echo $data['post']->id; ?>">Editar</a>
  </button>
 
  <form action="<?php echo URLROOT; ?>/posts/apagar/<?php echo $data['post']->id; ?>" method="post">
  <input class="filespost delete" type="submit" value="Apagar" <i class="fas fa-trash-alt"></i>
  </form>
 
  </div>
<?php endif; ?>
</div>
<?php require APPROOT . "../views/inc/footer.php";?>