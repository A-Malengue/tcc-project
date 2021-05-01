<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dash.css">
    <title>Dashboard</title>
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
                    <a href="" class="active">
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
                
            </h2>
         <div class="user-wrapper">
             <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
            <div><h4>Arnaldo Malengue</h4>
            <small>Super admin</small>
            </div>
         </div>
        </header>
        <main>
            
            <div class="recent-grid">
                    <div class="projects">
                        <div class="card">
                            <div class="card-header">
                                    <h3>Reclamações recentes</h3>
                                    <button><a href="<?php echo URLROOT; ?>/admin/reclama">Ver todas</a><span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Project Title</td>
                                                <td>Departament</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>UI/UX design</td>
                                                <td>UT Team</td>
                                                <td><span class="status purple"></span>
                                                    review
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Web development</td>
                                                <td>Frontend</td>
                                                <td><span class="status pink"></span>
                                                    in progress
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Ushop app</td>
                                                <td>Mobile Team</td>
                                                <td><span class="status orange"></span>
                                                    pending
                                                </td>
                                            </tr>
                                            <tr>
                                            
                                        </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                    <h3>Novos cadastros</h3>
                                    <button><a href="<?php echo URLROOT; ?>/admin/usuario">Ver todos</a><span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                          <div class="customer">
                            <div class="info">
                              <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
                              <div>
                                  <h4>Lewis S.Cunningham</h4>
                                  <small>CEO Excerpt</small>
                              </div> 
                            </div>
                      </div>
                      <div class="customer">
                        <div class="info">
                          <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
                          <div>
                              <h4>Lewis S.Cunningham</h4>
                              <small>CEO Excerpt</small>
                          </div> 
                        </div>
                  </div>
                  <div class="customer">
                    <div class="info">
                      <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
                      <div>
                          <h4>Lewis S.Cunningham</h4>
                          <small>CEO Excerpt</small>
                      </div> 
                    </div>
              </div>
              <div class="customer">
                <div class="info">
                  <img src="<?php echo URLROOT; ?>/img/User-2.png" width= "40px" heigth="40px" alt="">
                  <div>
                      <h4>Lewis S.Cunningham</h4>
                      <small>CEO Excerpt</small>
                  </div> 
                </div>
          </div>
           </div>
             </div>
            </div>
            </div>
        </main>
    </div>
</body>
</html>