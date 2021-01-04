window.addEventListener("load", function(){
  createTable();

  let id = document.getElementById("docente");
  if(id){
    getDocente(id);
  }

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
  }else if(tableName =="docenteTableData"){
    controllerName="docente_data_controller"
  }
  //----------------------------
  let formGet = new FormData();
  formGet.append("flag","get_table");
  let http = new XMLHttpRequest();
  http.onreadystatechange = function(){
    if(http.status == 200 && http.readyState == 4){
      document.getElementsByTagName("tbody")[0].innerHTML = http.responseText;
     
        $(`#${tableName}`).DataTable({
          "responsive": true,
          "autoWidth": false
        });

    }
  }
  http.open("POST",`../controller/${controllerName}.php`,true);
  http.send(formGet);
}


function insertItems(){
  const table = document.getElementsByTagName("table")[0];
  let tableName = table.id; 
  let controllerName;
  //----------------------------
  if(tableName =="docenteTable"){
      controllerName="docente_controller"
  }else if(tableName =="asignaturaTable"){
      controllerName="asignatura_controller"
  }else if(tableName =="docenteTableData"){
    controllerName="docente_data_controller"
  }


  let form = new FormData()
  form.append("flag","insert");


  let classInput = document.getElementsByClassName("addInput");
  let i = classInput.length;
  let regData = [];

  while(i--){
    if(classInput[i].value != " "){
            if(classInput[i].type == "radio"){
                if(classInput[i].checked){
                    regData.push({ "column":`${classInput[i].name}`,"data":`${classInput[i].value}`});
                }
            }else if(classInput[i].type != "radio"){
            
              regData.push({ "column":`${classInput[i].name}`,"data":`${classInput[i].value}`});
        }                               
    } 
}

form.append("data", JSON.stringify(regData));
  //------------------------------

    let insertCrud = new XMLHttpRequest();
    insertCrud.onreadystatechange = function(){
      if(insertCrud.status==200 && insertCrud.readyState == 4){
        let resp = JSON.parse(insertCrud.responseText);
        console.log(insertCrud.responseText);

        
        if(resp.state){
          swal({
              icon: "success",
              title: `Se ha guardado correctamente!`
            });
            setTimeout(function(){
             window.location.reload();
            },3000)

      }else{
          swal({
              icon: "error",
              title: `Error al guardar`
            });
            console.log(insertCrud.error)
        }

      }
    }

    insertCrud.open("POST",`../controller/${controllerName}.php`,true);
    insertCrud.send(form);
    
}


function updateItems(id,idItem){

  const table = document.getElementsByTagName("table")[0];
  let tableName = table.id; 
  let controllerName;


  idItem.textContent ="Actualizar"

if(tableName =="docenteTable"){
    controllerName="docente_controller"
}else if(tableName =="asignaturaTable"){
    controllerName="asignatura_controller"
}else if(tableName =="docenteTableData"){
  controllerName="docente_data_controller"
}


let get_update = new XMLHttpRequest();
let form_update = new FormData();

form_update.append("id",id);
form_update.append("flag","get_update");

get_update.onreadystatechange = function(){
  if(get_update.readyState == 4 && get_update.status == 200){
    let data = JSON.parse(get_update.responseText);
      data.forEach(element => {
        if(document.getElementsByName(`${element.id}`)[0]){
            document.getElementsByName(`${element.id}`)[0].value = element.val;
          }

          if(document.getElementById(`id`)){
            if(element.id=="id"){
              document.getElementById(`id`).value = element.val;
              idItem.setAttribute("onclick",`addUpdate('${element.val}')`);
            }
          }
      });
    }
  }

get_update.open("POST",`../controller/${controllerName}.php`,true);
get_update.send(form_update);

}


function addUpdate(id){
  const table = document.getElementsByTagName("table")[0];
  let tableName = table.id; 
  let controllerName;
  //----------------------------
  if(tableName =="docenteTable"){
      controllerName="docente_controller"
  }else if(tableName =="asignaturaTable"){
      controllerName="asignatura_controller"
  }else if(tableName =="docenteTableData"){
    controllerName="docente_data_controller"
  }


  let form = new FormData()
  form.append("flag","add_update");


  let classInput = document.getElementsByClassName("addInput");
  let i = classInput.length;
  let regData = [];

  while(i--){
    if(classInput[i].value != " "){
            if(classInput[i].type == "radio"){
                if(classInput[i].checked){
                    regData.push({ "column":`${classInput[i].name}`,"data":`${classInput[i].value}`});
                }
            }else if(classInput[i].type != "radio"){
            
              regData.push({ "column":`${classInput[i].name}`,"data":`${classInput[i].value}`});
        }                               
    } 
}

form.append("data", JSON.stringify(regData));
form.append("id", id);
  //------------------------------

    let insertCrud = new XMLHttpRequest();
    insertCrud.onreadystatechange = function(){
      if(insertCrud.status==200 && insertCrud.readyState == 4){
        let resp = JSON.parse(insertCrud.responseText);
        //console.log(insertCrud.responseText);

        if(resp.state){
          swal({
              icon: "success",
              title: `Se modificado correctamente!`
            });
            setTimeout(function(){
             window.location.reload();
            },3000)

      }else{
          swal({
              icon: "error",
              title: `Error al guardar`
            });
            console.log(insertCrud.error)
        }
      }
    }

    insertCrud.open("POST",`../controller/${controllerName}.php`,true);
    insertCrud.send(form);

}


function deleteitems(id){

  const table = document.getElementsByTagName("table")[0];
  let tableName = table.id; 
  let controllerName;
  //----------------------------
  if(tableName =="docenteTable"){
      controllerName="docente_controller"
  }else if(tableName =="asignaturaTable"){
      controllerName="asignatura_controller"
  }else if(tableName =="docenteTableData"){
    controllerName="docente_data_controller"
  }
  //------------------------------
    let form = new FormData();
    form.append("id",id);
    form.append("flag","delete");

    let deleteCrud = new XMLHttpRequest();
    deleteCrud.onreadystatechange = function(){
      if(deleteCrud.status==200 && deleteCrud.readyState == 4){
        let resp = JSON.parse(deleteCrud.responseText);

        if(resp.state){
          swal({
              icon: "success",
              title: `Se ha eliminado el registro!`
            });
            setTimeout(function(){
              window.location.reload();
            },2000)

      }else{
          swal({
              icon: "error",
              title: `Error al eliminar`
            });
            console.log(deleteCrud.error)
        }
      }
    }

    deleteCrud.open("POST",`../controller/${controllerName}.php`,true);
    deleteCrud.send(form);
}
