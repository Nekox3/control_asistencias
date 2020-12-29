window.addEventListener("load", function(){
  createTable();
});


//CREA LAS TABLAS
function createTable(){
  const table = document.getElementsByTagName("table")[0];
  let tableName = table.id; 
  let controllerName;
  //----------------------------
  if(tableName =="docenteTable"){
      controllerName="docente_controller"
  }else if(tableName =="asignaturaTable"){
      controllerName="asignatura_controller"
  }
  //----------------------------
  let formGet = new FormData();
  formGet.append("flag","get_table");
  let http = new XMLHttpRequest();
  http.onreadystatechange = function(){
    if(http.status == 200 && http.readyState == 4){
      console.log(http.responseText);
      document.getElementsByTagName("tbody")[0].innerHTML = http.responseText;
     
        $(`#${tableName}`).DataTable({
          "responsive": true,
          "autoWidth": false
        });

    }
  }
console.log(`../controller/${controllerName}.php`);
  http.open("POST",`../controller/${controllerName}.php`,true);
  http.send(formGet);
}

function insertItems(){

}

function updateItems(id,idItem){
  idItem.textContent ="Actualizar"
}

function addUpdate(){

}

function deleteitems(){

}
