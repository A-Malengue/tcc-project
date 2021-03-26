<div class="main">
<div class="new-Post">
        <div class="info-User">
            <div class="img-User"></div>
            <Strong>Arnaldo Malengue</Strong>
        </div>

        <form action="<?php echo URLROOT; ?>/posts/add" class="form-Post" method="post">
          <textarea name="body"  placeholder="Vamos mudar o Kilamba" ><?php echo $data["body"]; ?></textarea>
          <small class="error"><?php echo $data["body_err"]; ?></small>
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
    </div>
