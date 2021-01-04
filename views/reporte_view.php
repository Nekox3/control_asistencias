  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 558px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reporte de horario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Reporte</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<script src="../assets/plugins/html2pdf/html2pdf.bundle.js"></script>
<link  href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.5.0/locales-all.min.js'></script>
<script src="../assets/js/reporteria.js"></script>




<div class="container card">
        <div class="row mt-3">
          <div class="col-md-3" id="">
              <button class="btn btn-success mb-2" onclick="getReport()">Generar reporte</button>
              <button class="btn btn-success mb-2" onclick="getPDF()">Descargar reporte PDF</button>
          </div>
          <div class="col-md-3">
            <label for="start">Desde:</label>
            <input type="date" class="form form-control" id="start">
          </div>

          <div class="col-md-3">
            <label for="end">Hasta:</label>
            <input type="date" class="form form-control" id="end">
          </div>

          <div class="col-md-3">
            <label for="end">DNI del docente:</label>
            <select type="text" class="form form-control" maxlength="8" id="dni">
            
            <select>
          </div>

        </div>

        <div id="root">
        
        <div class="row mt-4 mb-4">

         <div class="col-md-3">
            <div id="desde"></div>
            
          </div>

          <div class="col-md-3">
          <div id="hasta"></div>
            
          </div>

          <div class="col-md-3">
          <div id="dni_rep"></div>
           
          </div>

          <div class="col-md-3">
          <div id="horas"></div>
            
          </div>

        </div>
        <div class="row mt-2 mb-4">
          <div class="col-md-12">
              <div class="table-responsive">
                <table  class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Docente</th>
                      <th>Hora inicio</th>
                      <th>Hora salida</th>
                      <th>Fecha</th>
                      <th>Turno</th>
                      <th>Observacion</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
          </div>
        </div>

        
       </div>

        
</div>
<script>
 
    </script>