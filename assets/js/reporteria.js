window.addEventListener("load", function(){
  getDataDocente()

});

//GENERA EL PDF
function getPDF(){
    // Get the element.
    var element = document.getElementById('root');

    // Generate the PDF.
    html2pdf().from(element).set({
      margin: 1,
      filename: 'reporte_horarios.pdf',
      html2canvas: { scale: 2 },
      jsPDF: {orientation: 'landscape', unit: 'in', format: 'letter', compressPDF: true}
    }).save();
  }

//OBTIENE LOS DATOS PARA FORMAR EL REPORTE
 function getReport(){
    let report = new XMLHttpRequest();
    
    let start = document.getElementById("start").value;
    let end = document.getElementById("end").value;
    let dni = document.getElementById("dni").value;

    let formData = new FormData();
    formData.append("hora_inicio", start);
    formData.append("hora_fin", end);
    formData.append("dni", dni);
    formData.append("flag", "get_data");

    report.onreadystatechange = ()=>{
        if(report.status==200 && report.readyState ==4){
            let getReport = JSON.parse(report.responseText);

            //-----------------------------
            document.getElementById("desde").textContent ="Desde: "+start
            document.getElementById("hasta").textContent ="Hasta: "+end;
            document.getElementById("dni_rep").textContent ="DNI: "+dni;
            document.getElementById("horas").textContent ="Horas trabajadas: "+getReport.horas;
            //-----------------------------

            let tabla = document.getElementsByTagName("tbody")[0];
            tabla.innerHTML = getReport.tabla;

        }
    }
    report.open("POST","../controller/reporteria_controller.php",true);
    report.send(formData);
 };


 function getDataDocente(){

  let formData = new FormData();
  formData.append("flag", "get_users");

  let htt = new XMLHttpRequest();
  htt.onreadystatechange = function(){
    if(htt.readyState == 4 && htt.status == 200){
      let users = JSON.parse(htt.responseText);
      users.forEach(element => {
        let option = document.createElement("option");
        option.value = element.usuario_dni
        option.textContent = `${element.usuario_nombre} ${element.usuario_apellidos}`
        document.getElementById("dni").appendChild(option);
      });
    }
  }

  htt.open("POST","../controller/reporteria_controller.php",true);
  htt.send(formData)

 }