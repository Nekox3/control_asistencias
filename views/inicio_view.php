
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 558px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Control de horario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Panel</li>
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


<div class="container card">
  <div id="calendar"></div>
  <div class="row mt-3">
      <div class="col-2">
          <button type="button" id="addReg" class="btn btn-success">Agregar <i class="fas fa-plus-circle"></i></button>
      </div>
      <div class="col-md-2" id="buttonsElements">
      </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table" >
              <thead class="bg-primary">
                <tr>
                    <th >Fecha</th>
                    <th >Hora ingreso</th>
                    <th >Hora salida</th>
                    <th style="width: 24.137931034483%">DNI</th>
                    <th style="width: 24.137931034483%">Docente</th>
                    <th style="width: 24.137931034483%">Turno</th>
                    <th >Observación</th>
                    <th ></th>
                    <th ></th>
                </tr>
              </thead>
              <tbody id="formAsistencia" >
                    <tr id="nullData">
                    <td>No hay datos aún</td>
                    </tr>
          
              </tbody>
        </table>
      </div>
      </div>
    </div>

    <!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
  <script>

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
/*
document.addEventListener('DOMContentLoaded', function() {
        let fecha = new Date();
          let fechaActual;
          if(fecha.getDate()<10){
            fechaActual = `${fecha.getFullYear()}-${fecha.getMonth()+1}-0${fecha.getDate()}`;
          }else{
            fechaActual = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;
          }

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
              initialDate: fechaActual,
              navLinks: true, // can click day/week names to navigate views
              businessHours: true, // display business hours
              editable: true,
              selectable: true,
              events:[
                {title:"Asistencia Francisco",start:"2020-12-23"}
              ],dateClick: function(info) {

                },eventClick: function(info) {
                }
        });

calendar.render();
});
*/
  </script>

  <!--inicio modal-->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Observación</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <textarea id="observationTextFull" class="form form-control" placeholder="Agregar Observación"></textarea>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="saveObservation" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
        </div>
       
      </div>
    </div>
  </div>
  
  <!--fin modal-->
</div>
