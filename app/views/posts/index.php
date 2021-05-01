<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/posts.css">
<?php require APPROOT . "../views/inc/header.php";?>

<header>
    <!--<img src="img/logo.svg" alt="Reclame">-->
    <H2>Reclame Aqui</H2>
    
</header>

<main class="main">
<!-- Form de post-->
<div class="new-Post">
        <div class="info-User">
            <div class="img-User"></div>
            <Strong><?php echo $user->nome; ?></Strong>
        </div>

        <form action=""  class="form-Post" method="post">
        <textarea name="body" placeholder="Vamos mudar o Kilamba" ><?php if (array_key_exists("body", $data)) {  echo $data['body'];}else
  {echo "Key does not exist!"; } ?></textarea>
          <small class="error"><?php if (array_key_exists("body_err", $data)) {  echo $data['body_err'];} ?></small>
          
          <div class="icons-and-btn">
            <div class="icons">
            <button type="button" class="btn-file-form"><img src="img/img.svg" alt="Adicione Uma imagem"></button>
            <button type="button" class="btn-file-form"><img src="img/video.svg" alt="Adicione Um video"></button>
            <button type="button" class="btn-file-form"><img src="img/gif.svg" alt="Adicione Um gif"></button>
             
               </div>
               <button type="submit" class="btn-Submit-Form">Publicar</button>
          </div>
        </form>
    </div>

    <?php foreach($data['posts'] as $post) : ?>
    <ul class="posts">
    <li class="post">
        <div class="info-User-post">
            <div class="img-User-post"></div>
            <div class="nome-hora">
                <Strong><?php echo $post->nome; ?></Strong>
                <p><?php echo $post->criado_em; ?></p>
            </div>
        </div>

        <p><?php echo $post->body; ?></p>
    
        <div class="action-btn-post">
            <button type="button" class="filespost like"><img src="img/heart.svg" alt="Curtir">Curtir</button>
            <button type="button" class="filespost comment"><img src="img/comment.svg" alt="Comentar">Comentar</button>
            <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
            <button type="button" class="filespost edit"><i class="fas fa-edit"></i><a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" >Edite</a></button>
            <button type="button" class="filespost delete"><i class="fas fa-trash-alt"></i><form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" >
  </form></button>
            <?php endif;  ?>
            <button type="button" class="filespost detalhe"><i class="fas fa-trash-alt"></i><a href="<?php echo URLROOT; ?>/posts/show<?php echo $post->postId; ?>">Detalhe</a> </button>        
            
        </div>
    </li>

    <?php endforeach; ?>

    </ul>
    
</main>

<?php require APPROOT . "../views/inc/footer.php";?>