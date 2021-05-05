<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dash.css">
    <title>Reclamações</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/solid.min.css">
</head>
<body>
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>Dashboard</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admin/dash" class="active">
                    <span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/admin/usuario"><span class="las la-users"></span><span>Usuários</span></a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/admin/reclama"><span class="las la-shopping-bag"></span><span>Reclamações</span></a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/posts/index"><span class="las la-shopping-bag"></span><span>Voltar</span></a>
                </li>
            </ul>

        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="la la-bars"></span>
                </label>
                Reclamações
            </h2>
         <div class="search-wrapper">
             <span class="las la-search"></span>
              <input type="search" placeholder="Procure aqui">
         </div>
         <div class="user-wrapper">
             <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
            <div><h4>Arnaldo Malengue</h4>
            <small>Super admin</small>
            </div>
         </div>
        </header>
</body>
</html>