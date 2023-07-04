<?php 
$url_base="http://localhost/boostersystem/";
?>
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
<?php
if ($rol_idRol == 1) { // Estudiante
?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i>
            <span>Gestión Académica</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/boletinEst.php" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Boletin
                    
                </a>
            </li>

            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/consultarCarnet.php" class="treeview-menu">
                    <i class="fa fa-credit-card"></i> Carnet estudiantil
                
                </a>
            </li>

            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/consultarCronograma" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    
                </a>
            </li>
        </ul>
    </li>


<!-- Menú de Material Didáctico -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-book"></i>
        <span>Material Didáctico</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">

        <!-- Menú de Consultar materiales -->
        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Libros
            </a>
        </li>

        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Cartillas
            </a>
        </li>

        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Guias de trabajo
            </a>
        </li>   
    </ul>
</li>
<?php
} elseif ($rol_idRol == 2) { // Acudiente
?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i>
            <span>Gestión Académica</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/boletin.php" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Boletines
                    
                </a>
            </li>

            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/carnetEstudiantil" class="treeview-menu">
                    <i class="fa fa-credit-card"></i> Carnet estudiantil
                
                </a>
            </li>

            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/listado_observaciones.php" class="treeview-menu">
                    <i class="fa fa-eye"></i> Observador
                  </a>
            </li>

            <li>
                <a href="<?php echo $url_base; ?>gestionAcademica/consultarCronograma.php" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    
                </a>
            </li>

        </ul>
    </li>

<!-- Menú de Material Didáctico -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-book"></i>
        <span>Material Didáctico</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">

        <!-- Menú de Consultar materiales -->
        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Libros
            </a>
        </li>

        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Cartillas
            </a>
        </li>

        <li>
            <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                <i class="fa fa-search"></i> Guias de trabajo
            </a>
        </li>
        
    </ul>
</li>
<?php
} elseif ($rol_idRol == 3) { // Profesor
?>
    <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Gestion Academica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Gestion de notas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/consultarNotas.php"><i class="fa fa-arrow-right"></i>Consultar/Registrar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/boletin.php"><i class="fa fa-arrow-right"></i>Boletines</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-eye"></i> Observador
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/registrarObservador.php"><i class="fa fa-arrow-right"></i>Registrar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/listado_observaciones.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/consultarCronograma.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
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
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-cloud-upload"></i></i> Publicar
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php"><i class="fa fa-arrow-right"></i>Cartillas</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php"><i class="fa fa-arrow-right"></i>Guias de trabajo</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Consultar
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Libros</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Cartillas</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Guias de trabajo</a></li>
                  </ul>
                </li>
                </ul>
              </li>

<?php
} elseif ($rol_idRol == 4) { // Secretaria
?>
    <li class="treeview">
      
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Gestion Academica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Gestion de notas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="gestionAcademica/boletin.php"><i class="fa fa-arrow-right"></i>Boletines</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-credit-card"></i> Carnet estudiantil
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/carnetEstudiantil/crear.php"><i class="fa fa-arrow-right"></i>Cargar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/carnetEstudiantil"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-eye"></i> Observador
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/listado_observaciones.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/cargarCronograma.php"><i class="fa fa-arrow-right"></i>cargar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/consultarCronograma.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
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
                    <li><a href="<?php echo $url_base; ?>admisiones/asignarCupos.php"><i class="fa fa-arrow-right"></i>Asignar</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarCupos.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarPersonassinCitas.php"><i class="fa fa-arrow-right"></i>Interesados</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Gestion de pruebas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarPersonasconCitas.php"><i class="fa fa-arrow-right"></i>Asignar cita</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/cargarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Cargar resultados</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Consultar resultados</a></li>
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
                  <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                    <i class="fa fa-users"></i> Libros
                  </a>
                </li>
                <li>
                  <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                    <i class="fa fa-file-text-o"></i> Cartillas
                  </a>                  
                </li>
                <li>
                  <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Guias de trabajo
                  </a>
                </li>
              </ul>
            </li>
          </ul>
<?php

} elseif ($rol_idRol == 5) { // Coordinador
?>
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
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/registrarUser.php"><i class="fa fa-arrow-right"></i>Registrar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/usuariosRegistrados.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-sticky-note"></i> Gestion de notas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/consultarNotas.php"><i class="fa fa-arrow-right"></i>Consultar/registrar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/boletin.php"><i class="fa fa-arrow-right"></i>Boletines</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-credit-card"></i> Carnet estudiantil
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/carnetEstudiantil/crear.php"><i class="fa fa-arrow-right"></i>Cargar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/carnetEstudiantil"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-eye"></i> Observador
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/registrarObservador.php"><i class="fa fa-arrow-right"></i>Registrar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/listado_observaciones.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-calendar"></i> Cronograma
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/cronograma/crear.php"><i class="fa fa-arrow-right"></i>cargar</a></li>
                    <li><a href="<?php echo $url_base; ?>gestionAcademica/cronograma"><i class="fa fa-arrow-right"></i>Consultar</a></li>
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
                    <li><a href="<?php echo $url_base; ?>admisiones/asignarCupos.php"><i class="fa fa-arrow-right"></i>Asignar</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarCupos.php"><i class="fa fa-arrow-right"></i>Consultar</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarPersonassinCitas.php"><i class="fa fa-arrow-right"></i>Interesados</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Gestion de pruebas
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="<?php echo $url_base; ?>admisiones/consultarPersonasconCitas.php"><i class="fa fa-arrow-right"></i>Asignar cita</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/cargarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Cargar resultados</a></li>
                    <li><a href="<?php echo $url_base; ?>admisiones/consultarResultadosPrueba.php"><i class="fa fa-arrow-right"></i>Consultar resultados</a></li>
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
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-cloud-upload"></i></i> Publicar
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php"><i class="fa fa-arrow-right"></i>Libros</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php"><i class="fa fa-arrow-right"></i>Cartillas</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php"><i class="fa fa-arrow-right"></i>Guias de trabajo</a></li>
      
                  </ul>
                </li>
                <li>
                  <a href="#" class="treeview-menu">
                    <i class="fa fa-search"></i> Consultar
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Libros</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Cartillas</a></li>
                    <li><a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php"><i class="fa fa-arrow-right"></i>Guias de trabajo</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
<?php
} elseif ($rol_idRol == 6){ //Bibliotecario
?>
  <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Material Didactico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li>
                  <a href="<?php echo $url_base; ?>materialDidactico/publicarMaterial.php" class="treeview-menu">
                    <i class="fa fa-cloud-upload"></i></i> Publicar Libros
                  </a>
  
                </li>
                <li>
                  <a href="<?php echo $url_base; ?>materialDidactico/consultarMaterial.php" class="treeview-menu">
                    <i class="fa fa-search"></i> Consultar Libros
                  </a>
                </li>
              </ul>
            </li>
<?php
}
?>

  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>