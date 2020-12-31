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
            
            if(classInput[i].name =="usuario_nombre" && classInput[i].value != ""){
              form.append("agg",'true');
            }

            if(classInput[i].value != " " && classInput[i].name != "rol"){
              regData.push({ "column":`${classInput[i].name}`,"data":`${classInput[i].value}`});
            }
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
            },2000)

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
  idItem.textContent ="Actualizar"
}



function addUpdate(){

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
