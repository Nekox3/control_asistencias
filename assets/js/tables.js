$(function () {
    
    let table = document.getElementsByTagName("table")[0];
    let tableName = table.id;
    

    $(`#${tableName}`).DataTable({
      "responsive": true,
      "autoWidth": false
    });
    let controllerName;
    //----------------------------
    if(tableName =="docenteTable"){
        controllerName="docente_controller"
    }else if(tableName =="asignaturaTable"){
        controllerName="asignatura_controller"
    }
    //----------------------------
    let httpd = new XMLHttpRequest();
    httpd.onreadystatechange = function(){
      if(httpd.readyState == 4 && httpd.status == 200){
        console.log(httpd.responseText)
      }
    }

    httpd.open("GET",`../controller/${controllerName}.php`,true);
    httpd.send();
});