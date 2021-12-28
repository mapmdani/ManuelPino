<div class="content-wrapper">

  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Procesador de Pagos Directos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                <li class="breadcrumb-item active">Pagos Directos</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
   
          <div class="col-sm-12 col-md-12">
          <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-12 col-md-2">
                    <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarArchivo">Agregar Archivos</button>
                  </div>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="PagosDirectoTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Transaccion</th>
                    <th>Monto</th>
                    <th>Identificador</th>
                    <th>Fecha</th>
                    <th>Medio de Pago</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>


<div class="modal fade" id="modalAgregarArchivo">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="formPagoDirecto">
            <div class="modal-header">
              <h4 class="modal-title">Procesar Archivo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">


             <div class="form-group">
                <label for="exampleInputFile">Buscar Archivo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input nuevoArchivo"  name="nuevoArchivo" id="nuevoArchivo">
                    <label class="custom-file-label" for="exampleInputFile">Buscar Archivo</label>

                  </div>
                </div>
                <br>

                <input type="text" class="form-control previsualizar" placeholder="Archivo Seleccionado" value="" name="archivoSeleccionado" id="archivoSeleccionado" readonly>

                <p class="help-block">Peso máximo del archivo 20MB</p>

              </div>

            </div>
            

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <div id="content"></div>
              <button type="submit" class="btn btn-success guardarUsuario" id="guardarArchivo">Procesar</button>
            </div>

            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



