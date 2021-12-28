<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Test</span>
    </a>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

		<?php

			if($_SESSION["foto"] != ""){

				echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';

			}else{


				echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2" alt="User Image"';

			}

		?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
    	<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<?php if($_SESSION["perfil"] == "Administrador"): ?>

					<li class="nav-item">
						<a href="inicio" class="nav-link" id="tab-inicio">
							<i class="nav-icon fa fa-home nav-icon"></i>
							<p>Inicio</p>
						</a>
					</li>

					<li class="nav-item" id="tab-lipagos">
						<a class="nav-link" href="#" id="tab-rootpagos">
							<i class="nav-icon fas fa-list-ul"></i>
							<p>Procesar Pagos</p>
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a class="nav-link" href="pagosdirecto" id="tab-pagodirecto">
									<i class="far fa-circle nav-icon"></i>
									<p>Pago Directo</p>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="pluspagos" id="tab-pluspago">
									<i class="far fa-circle nav-icon"></i>
									<p>Plus Pagos</p>
								</a>
							</li>

						</ul>
					</li>

				<?php endif; ?>

			</ul>
    	</nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>