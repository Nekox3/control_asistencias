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
<script src="../assets/js/ini_panel.js"></script>




<div class="container card">
        <div class="row mt-3">
          <div class="col-md-3">
              <button class="btn btn-success" onclick="getPDF()">Generar reporte</button>
          </div>
          <div class="col-md-3">
            <label for="start">Desde:</label>
            <input type="date" id="start">
          </div>
          <div class="col-md-3">
            <label for="end">Hasta:</label>
            <input type="date" id="end">
          </div>

        </div>
        <div class="row mt-3 mb-4">
          <div class="col-md-12">
              <div class="table-responsive">
                <table id="root" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Docente</th>
                      <th>Hora inicio</th>
                      <th>Hora salida</th>
                      <th>Dias</th>
                    </tr>
                  </thead>
                </table>
              </div>
          </div>
        </div>
</div>
<script>
      function getPDF() {
        // Get the element.
        var element = document.getElementById('root');

        // Generate the PDF.
        html2pdf().from(element).set({
          margin: 1,
          filename: 'reporte_horarios.pdf',
          html2canvas: { scale: 2 },
          jsPDF: {orientation: 'portrait', unit: 'in', format: 'letter', compressPDF: true}
        }).save();
      }
    </script>