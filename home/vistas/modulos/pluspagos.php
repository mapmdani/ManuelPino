<div class="content-wrapper">

  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Procesador de Plus Pagos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                <li class="breadcrumb-item active">Plus Pagos</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
   
          <div class="col-sm-12 col-md-9">
          <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-12 col-md-2">
                    <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
                  </div>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="UserTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Foto</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Último login</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php

                      $item = null;
                      $valor = null;

                      $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                      foreach ($usuarios as $key => $value){
                      
                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["usuario"].'</td>';

                                if($value["foto"] != ""){

                                  echo '<td><img src="'.$value["foto"].'" class="img-circle" width="40px"></td>';

                                }else{

                                  echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" width="40px"></td>';

                                }

                                echo '<td>'.$value["perfil"].'</td>';

                                if($value["estado"] != 0){

                                  echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                                }else{

                                  echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                                }             

                                echo '<td>'.$value["ultimo_login"].'</td>
                                <td>

                                  
                                      
                                    <a class="btn btn-primary btn-sm btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></a>

                                    <a class="btn btn-danger btn-sm btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-trash"></i></a>

                                  

                                </td>

                              </tr>';
                      }


                    ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-sm-12 col-md-3">
              <!-- USERS LIST -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Miembros Recientes</h3>

                <div class="card-tools">
                  <!--span class="badge badge-danger">8 New Members</span-->
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                <?php
                foreach ($usuarios as $key => $value){

                  if($value["foto"] != ""){

                    echo '<li><img src="'.$value["foto"].'" alt="User Image"></li>';

                  }else{

                    echo '<li><img src="vistas/img/usuarios/default/anonymous.png" alt="User Image"><a class="users-list-name" href="#">'.$value["nombre"].'</a></li>';

                  }

                }


                ?> 
                  
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          </div>





        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>



<div class="modal fade" id="modalAgregarUsuario">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="formGuardarUsuario">
            <div class="modal-header">
              <h4 class="modal-title">Agregar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre" name="nuevoNombre" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                  <input type="text" class="form-control" placeholder="Usuario" name="nuevoUsuario" id="nuevoUsuario" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                  <input type="password" class="form-control" placeholder="Password" name="nuevoPassword" required>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-users"></i></span>
                    <select class="form-control" name="nuevoPerfil">
                    <option value="">Selecionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                    </select>
                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputFile">Subir Foto</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input nuevaFoto"  name="nuevaFoto">
                    <label class="custom-file-label" for="exampleInputFile">Buscar Archivo</label>
                  </div>
                </div>

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle previsualizar" width="100px">

              </div>

            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success guardarUsuario" id="guardarUsuario">Guardar Usuario</button>
            </div>

            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modalEditarUsuario">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title">Editar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">


              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre" id="editarNombre" name="editarNombre" value="" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                  <input type="text" class="form-control" placeholder="Usuario" id="editarUsuario" name="editarUsuario" value="" readonly>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                  <input type="password" class="form-control" name="editarPassword" placeholder="Escriba la nueva contraseña" required>
                  
                  <input type="hidden" id="passwordActual" name="passwordActual">
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-users"></i></span>
                    <select class="form-control" name="editarPerfil">
                    <option value="" id="editarPerfil"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                    </select>
                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputFile">Subir Foto</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input nuevaFoto"  name="editarFoto">
                    <label class="custom-file-label" for="exampleInputFile">Buscar Archivo</label>
                  </div>
                </div>

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>

            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Modificar Usuario</button>
            </div>

            <?php
              $editarUsuario = new ControladorUsuarios();
              $editarUsuario -> ctrEditarUsuario();
            ?>

            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


