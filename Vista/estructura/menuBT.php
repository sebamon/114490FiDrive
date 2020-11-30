<div class="wrapper border border-warning"> 
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse border border-warning">
<h3 align="center">Menu</h3>
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">  
                <li class="nav-item">
                        <a class="nav-link active" href="../main/contenido.php">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                            Contenido<span class="sr-only">(current)</span>
                        </a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link active" href="../amarchivo/amarchivo.php?parametro=nuevo">
                        <i class="fas fa-plus-square"></i>
                            AM Archivo<span class="sr-only">(current)</span>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../main/archivoscompartidos.php">
                        <i class="fas fa-share-alt-square"></i>
                            Archivos Compartidos<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php 
                    if($mySession->isLog() and $mySession->isAdmin())
                    {
                       echo '<li class="nav-item">';
                       echo '<a class="nav-link active" href="../usuario/usuario.php">';
                       echo '<i class="fas fa-share-alt-square" href="../usuario/usuario.php"></i>';
                            echo 'Gestion de Usuarios<span class="sr-only">(current)</span>';
                    echo '</a></li>';
                    }
                    ?>
              
                
                </ul>
            </div>
        </nav>
<!-- </div> -->

