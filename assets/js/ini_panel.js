var cont = 0;
window.addEventListener("load", function(){
    
    if(document.getElementById("addReg")){
        document.getElementById("addReg").addEventListener("click", function(){
            let table = document.getElementById("formAsistencia");
            document.getElementById("nullData") ? deleteData(table): addData(table)           
        })
    }
    
   
})

//ELIMINAR LOS NODOS HIJOS DEL ID CONTENEDOR
function deleteData(id){
    while (id.hasChildNodes()) id.removeChild(id.firstChild)
    addData(id)
}

//ELIMINAR EL NODO SELECCIONADO
function deleteItem(id){
    id.parentNode.removeChild(id);
    saveDataTable();
}

//AGREGAR EL VALOR DE OBSERVACIÓN AL INPUT 
function addObservation(id,idRecept){
    idRecept.value = id.value;
}

//AGREGA LA FUNCIONALIDAD DE GUARDAR EL CONTENIDO DEL MODAL AL INPUT A ENVIAR
function addFunctionObservation(id,idname){
    document.getElementById("saveObservation").setAttribute("onclick", `addObservation(${id},${idname})`)
}

//VALIDA SI SE PUEDE GUARDAR
function saveDataTable(){
    let tableBody = document.getElementById("formAsistencia");
    let tableNodes = tableBody.childNodes.length;
    if(!document.getElementById("saveAsistance")){    
        if(tableNodes > 0){
            let saveButton = document.createElement("button")
            saveButton.textContent ="Guardar";
            saveButton.id ="saveAsistance";
            saveButton.setAttribute("onclick","insertSpec()");
            saveButton.classList.add("btn","btn-primary")

            
            document.getElementById("buttonsElements").appendChild(saveButton)
        }
    }else{
        if(tableNodes == 0){
            deleteItem(document.getElementById("saveAsistance"))
            let tr = document.createElement("tr");
            tr.id ="nullData";
            let td = document.createElement("td");
            td.textContent="No hay datos";
            tr.appendChild(td);
            document.getElementById("formAsistencia").appendChild(tr);
        }
    }

}

//AGREGAR TR, TD Y INPUTS PARA AGREGAR LOS REGISTROS 
function addData(id){
    cont++;
    let tr = document.createElement("tr");
    tr.id = `row_${cont}`;
    tr.classList.add("addInput");
    //DATOS REQUERIDOS EN LA TABLA PARA CONSTRUIR LOS ELEMENTOS
    let datos = [
        {class:'add', id:'fecha', name:'fecha', type:"date" },
        {class:'add', id:'horaIngreso', name:'horaIngreso',type:"time"},
        {class:'add', id:'horaSalida', name:'horaSalida',type:"time"},
        {class:'add', id:'dni', name:'dni', type:"number"},
        {class:'select_docente',id:'docente',name:'docente',type:'select',advance:true,select:[]},
        {class:'add', id:`turno_${cont}`, name:'turno',type:"select", select:["Mañana","Tarde"]},
        {class:'btn-primary',id:'observacion', type:"button",text:"agregar",click:`addFunctionObservation('observationTextFull','observacionText_${cont}')`,attr:[{key:"data-toggle", val:"modal"},{key:"data-target", val:"#myModal"}]},
        {class:'btn-danger',id:'eliminar', type:"button",text:"Eliminar", click:`deleteItem(row_${cont})`},
        {class:'add', id:`observacionText_${cont}`, name:`observacionText`, type:"hidden"}
    ]

    for(let x in datos){
        let input;
        let td = document.createElement("TD");
        //EVALUA EL TIPO DE ELEMENTO QUE CONSTRUIRÁ
        datos[x].type=="button"? input = document.createElement("BUTTON") : datos[x].type=="select"? input = document.createElement("SELECT") : input = document.createElement("INPUT")
        datos[x].type=="button" ? input.classList.add("btn",`${datos[x].class}`) :input.classList.add("form","form-control",`${datos[x].class}`);
        input.id = datos[x].id;
        if(datos[x].type=="select"){
            if(datos[x].hasOwnProperty("advance")){
                if(datos[x].advance){
                    input.classList.add("form-control","select2");
                    input.style ="width: 100%;";
                }else{
                    input.classList.add("form-control")
                }
            }else{
                input.classList.add("form-control")
                td.style ="width: 30%"
            }
            let values = datos[x].select;
            for(let v in values){
             let option = document.createElement("OPTION");
                option.value = values[v]
                option.textContent = values[v]
                input.appendChild(option)
            }

            if(datos[x].id == "docente"){
                getDocente(input);
            }

        }

        //EVALUA SI EL BOTON TENDRÁ ATRIBUTOS Y EVENTOS O AMBOS
        if(datos[x].type=="button"){            
            if(datos[x].hasOwnProperty("click") && datos[x].hasOwnProperty("attr")){
                input.setAttribute("onclick",`${datos[x].click}`)
                let attrs = datos[x].attr;
                for(let i in attrs){
                    input.setAttribute(`${attrs[i].key}`,`${attrs[i].val}`);
                }
            }else if(datos[x].hasOwnProperty("click")){
                input.setAttribute("onclick",`${datos[x].click}`)
            }else if(datos[x].hasOwnProperty("attr")){
                let attrs = datos[x].attr;
                for(let i in attrs){
                    input.setAttribute(`${attrs[i].key}`,`${attrs[i].val}`);
                }
            }
        } 
        
        datos[x].type !="button" ? input.name = datos[x].name:null
        datos[x].type=="button"? input.textContent = datos[x].text  :input.type = datos[x].type;
        
        td.appendChild(input);
        tr.appendChild(td);
    }
    id.appendChild(tr)
    //AGREGA EL BOTON DE GUARDAR
    saveDataTable()
}


function insertSpec(){


    let tr = document.getElementsByClassName("addInput");
    
    let t = tr.length;
    let data = []

    while(t--){
        data.push({
            fecha : document.getElementsByName("fecha")[t].value,
            ingreso : document.getElementsByName("horaIngreso")[t].value,
            salida : document.getElementsByName("horaSalida")[t].value,
            dni : document.getElementsByName("dni")[t].value,
            docente : document.getElementsByName("docente")[t].value,
            turno : document.getElementsByName("turno")[t].value,
            observacion: document.getElementsByName("observacionText")[t].value
        });       
    }

    console.log(data);
    let form = new FormData();
    form.append("data",JSON.stringify(data));
    form.append("flag","save_data")
    let htop = new XMLHttpRequest();
    htop.onreadystatechange = function(){
        if(htop.readyState == 4 && htop.status == 200){
            let resp = JSON.parse(htop.responseText);
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
    htop.open("POST","../controller/ini_controller.php",true);
    htop.send(form);

    }


  function getDocente(id){
        
        let formDoc = new FormData();
        formDoc.append("flag","get_docentes")
        let get = new XMLHttpRequest();

        get.onreadystatechange = function(){
            if(get.readyState == 4 && get.status == 200){
                let datos = JSON.parse(get.responseText)
                let select = datos.data;
              
                for(let x in select){
                    let option = document.createElement("option");
                    option.setAttribute("value", `${select[x].usuario_nombre} ${select[x].usuario_apellidos}`);
                    option.textContent = `${select[x].usuario_nombre} ${select[x].usuario_apellidos}`;
                    id.appendChild(option);
                }
            }
        }

        get.open("POST","../controller/ini_controller.php",true);
        get.send(formDoc);

    
  }