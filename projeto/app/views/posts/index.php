<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/posts.css">
<?php require APPROOT . "../views/inc/header.php";?>

<header>
    <H2>Reclame Aqui</H2>
</header>

<main class="main">
<!-- Form de post-->
<div class="new-Post">
        <div class="info-User">
            <div class="img-User"><img src="<?php echo URLROOT; ?>/img/user-1.png" alt="" width= "35px" heigth="35px"></div>
            <Strong><?php echo $_SESSION["user_nome"]; ?></Strong>
        </div>

        <form action="<?php echo URLROOT; ?>/posts/add/" class="form-Post" method="post" enctype="multipart/form-data">
        <textarea name="body" placeholder="Faça uma reclamação" ></textarea>
          <small class="error"><?php if (array_key_exists("body_err", $data)) {  echo $data['body_err'];} ?></small>
          
          <div class="icons-and-btn">
               <div class="icons">
                   <form action="" method=""><input type="file" name="fotos/imagens"></form>
               </div>
               <button type="submit" class="btn-Submit-Form">Publicar</button>
          </div>
        </form>
    </div>

    <?php foreach($data['posts']as $post) : ?>
    <ul class="posts">
    <li class="post">
        <div class="info-User-post">
            <div class="img-User-post"><img src="<?php echo URLROOT; ?>/img/user-1.png" alt="" width= "30px" heigth="30px"></div>
            <div class="nome-hora">
                <Strong><?php echo $post->nome; ?></Strong>
                <p><?php echo $post->criado_em; ?></p>
            </div>
        </div>
        <p><?php echo $post->body; ?></p>
        <div class="action-btn-post">
            <form action='<?php echo URLROOT; ?>/posts/<?php echo $post->postId; ?>'  method="POST">
            <button type="submit" name="curtidas" class="filespost like"><img src="<?php echo URLROOT; ?>/img/heart.svg" alt="Curtir"><span id="likes_<?php echo $post->postId; ?>">Curtir</span></button>
            </form>
            <button type="button" class="filespost comment"><img src="<?php echo URLROOT; ?>/img/comment.svg" alt="Comentar">Comentar</button>
            <button type="button" class="filespost detalhe"><i class="fas fa-plus"></i><a href="<?php echo URLROOT; ?>/posts/opcoes/<?php echo $post->postId; ?>">Opções</a></button>        
        </div>
        <?php ?>
        <?php foreach($data['comentario']as $posts_comentario) : ?>
        <div class="area-comentario">
        <div class="info-User-post">
        <div class="img-User"><img src="<?php echo URLROOT; ?>/img/user-1.png" alt="" width= "35px" heigth="35px"></div>
        <div class="nome-hora">
                <Strong><?php echo $posts_comentario->nome; ?></Strong>
                <p><?php echo $posts_comentario->criado_no; ?></p>
        </div>
        </div>
            <p><?php echo $posts_comentario->comentario; ?></p>
        </div>
        <?php endforeach; ?>

    <div class="comentario">
    <form action="<?php echo URLROOT; ?>/posts/comentar/"  class="form-Post" method="POST">
    <div class="img-User"><img src="<?php echo URLROOT; ?>/img/user-1.png" alt="" width= "35px" heigth="35px"></div>
    <textarea name="comentario" placeholder="Faça um comentário" ></textarea>
    <small class="error"><?php if (array_key_exists("comentário_err", $data)) {  echo $data['comentário_err'];} ?></small>
    <input type="submit" value="Comentar">
    <input type="hidden" name="posts_id" value="<?php echo $post->postId; ?>">
    </form>
    </div>
    </li>
    </ul>
    
    <?php endforeach; ?>
</main>

<?php require APPROOT . "../views/inc/footer.php";?>