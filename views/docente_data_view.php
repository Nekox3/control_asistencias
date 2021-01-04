  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 558px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agregar docente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Docente</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<link  href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/locales-all.min.js'></script>
<script src="../assets/js/ini_panel.js"></script>

<div class="container"> 
  <div class="row mb-2">
    <div class="col-md-1">
    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar</button>
    </div>
  </div>
<div class="container card">
        <div class="row mt-3 mb-4">
          <div class="col-md-12">
              <div class="table-responsive">
                <table id="docenteTableData" class="table table-hover">
                  <thead class="bg-primary">
                    <tr>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Telefono de contacto</th>
                      <th>Correo</th>
                      <th>DNI</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
          </div>
        </div>
</div>
</div>


<!--Modal-->

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Datos del docente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Nombres</label>
                      <input type="text" placeholder="Nombres del docente" name="usuario_nombre" class="form form-control addInput">
                    </div>

                    <div class="col-md-4">
                      <label>Apellidos</label>
                      <input type="text" placeholder="Nombre docente " name="usuario_apellidos" class="form form-control addInput">
                    </div>


                    <div class="col-md-4">
                      <label>DNI</label>
                      <input type="text" placeholder="DNI del docente"  name="usuario_dni" class="form form-control addInput">
                    </div>

                  </div>

                  <div class="row">

                  <div class="col-md-4">
                      <label>Nº celular</label>
                      <input type="text" placeholder="Telefono de contácto" name="usuario_telefono" class="form form-control addInput">
                    </div>

                    <div class="col-md-4">
                      <label>Correo electrónico</label>
                      <input type="mail" placeholder="Correo de contácto" name="usuario_correo" class="form form-control addInput">
                    </div>

                    <input type="hidden" class="addInput" name="rol" value="1">
                    <input type="hidden" id="id">
                  </div>

              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="saveItem" onclick="insertItems()" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
        </div>
       
      </div>
    </div>
  </div>
  <!--fin modal-->

  
  <!--Modal-->
  <!--fin modal-->
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script src="../assets/js/general_options.js"></script>