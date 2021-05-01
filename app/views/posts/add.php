<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/posts.css">
<?php require APPROOT . "../views/inc/header.php";?>
<main class="main">
<div class="new-Post">
        <div class="info-User">
            <div class="img-User"></div>
            <Strong>Arnaldo Malengue</Strong>
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
    
    </main>
<?php require APPROOT . "../views/inc/footer.php";?>