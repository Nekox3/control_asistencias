var cont = 0;
window.addEventListener("load", function(){
    document.getElementById("addReg").addEventListener("click", function(){
        let table = document.getElementById("formAsistencia");
        document.getElementById("nullData") ? deleteData(table): addData(table)           
    })
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
    //DATOS REQUERIDOS EN LA TABLA PARA CONSTRUIR LOS ELEMENTOS
    let datos = [
        {class:'addInput', id:'fecha', name:'fecha', type:"date" },
        {class:'addInput', id:'horaIngreso', name:'horaIngreso',type:"time"},
        {class:'addInput', id:'horaSalida', name:'horaSalida',type:"time"},
        {class:'addInput', id:'dni', name:'dni', type:"number"},
        {class:'addInput',id:'docente',name:'docente',type:'select',advance:true,select:['Carlos Alberto','Francisco Javier']},
        {class:'addInput', id:`turno_${cont}`, name:'turno',type:"select", select:["Mañana","Tarde"]},
        {class:'btn-primary',id:'observacion', type:"button",text:"agregar",click:`addFunctionObservation('observationTextFull','observacionText_${cont}')`,attr:[{key:"data-toggle", val:"modal"},{key:"data-target", val:"#myModal"}]},
        {class:'btn-danger',id:'eliminar', type:"button",text:"Eliminar", click:`deleteItem(row_${cont})`},
        {class:'addInput', id:`observacionText_${cont}`, name:'observacionText', type:"hidden"}
    ]

    for(let x in datos){
        let input;
        let td = document.createElement("TD");
        //EVALUA EL TIPO DE ELEMENTO QUE CONSTRUIRÁ
        datos[x].type=="button"? input = document.createElement("BUTTON") : datos[x].type=="select"? input = document.createElement("SELECT") : input = document.createElement("INPUT")
        datos[x].type=="button" ? input.classList.add("btn",`${datos[x].class}`) :input.classList.add("form","form-control",`${datos[x].class}`);
        
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
        input.id = datos[x].id;
        datos[x].type !="button" ? input.name = datos[x].name:null
        datos[x].type=="button"? input.textContent = datos[x].text  :input.type = datos[x].type;
        
        td.appendChild(input);
        tr.appendChild(td);
    }
    id.appendChild(tr)
    //AGREGA EL BOTON DE GUARDAR
    saveDataTable()
}