
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 558px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
  <div class="col-md-1"></div>
    <div class="col-md-8">
    <table class="table">
  
    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>

  <tbody id="formAsistencia">
    <tr>
      <td></td>
    </tr>
  </tbody>

    </table>
    </div>
      <div class="col-md-2">
        <button type="button" id="addReg" class="btn btn-success mt-3 mb-3">Agregar <i class="fas fa-plus-circle"></i></button>
      </div>
    </div>

  
  <script>
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
 
</div>