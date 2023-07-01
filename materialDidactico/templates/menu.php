 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Gestion Academica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-user"></i> Usuarios
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./registrarUser.php"><i class="fa fa-arrow-right"></i>Registrar</a></li>
                    <li><a href="./usuariosRegistrados.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Gestion de notas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./consultarNotas.php"><i class="fa fa-arrow-right"></i>Consultar/registrar</a></li>
                    <li><a href="./boletin.php"><i class="fa fa-arrow-right"></i>Boletines</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-credit-card"></i> Carnet estudiantil
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./cargarCarnet.php"><i class="fa fa-arrow-right"></i>Cargar</a></li>
                    <li><a href="../descargarCarnet.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-eye"></i> Observador
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./registrarObservador.php"><i class="fa fa-arrow-right"></i>Registrar</a></li>
                    <li><a href="./consultarObservador.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./cargarCronograma.php"><i class="fa fa-arrow-right"></i>cargar</a></li>
                    <li><a href="./consultarCronograma.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
              </ul>
            </li> 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-times"></i>
                <span>Admisiones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-cloud-upload"></i></i> Gestion de cupos
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                <ul class="treeview-menu">
                  <li><a href="./asignarCupos.php"><i class="fa fa-arrow-right"></i>Asignar</a></li>
                  <li><a href="./consultarCupos.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                </ul>  
            </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Interesados
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="./consultarPersonassinCitas.php"><i class="fa fa-arrow-right"></i>Agendar citas</a></li>
                    <li><a href="./consultarPersonasconCitas.php"><i class="fa fa-arrow-right"></i>Consultar citas</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Gestion de pruebas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="cargarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Cargar resultados</a></li>
                    <li><a href="consultarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Consultar resultados</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Material Didactico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li>
                  <a href="./publicarMaterial.php" class="treeview-menu">
                    <i class="fa fa-cloud-upload"></i></i> Publicar
                  </a>
                </li>
                <li>
                  <a href="./consultarMaterial.php" class="treeview-menu">
                    <i class="fa fa-search"></i> Consultar
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="ruta/al/archivo.pdf" download>
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>