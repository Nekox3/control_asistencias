window.addEventListener("load", function(){

if(localStorage.getItem("session")){
    localStorage.removeItem("session")
}

if(document.getElementById("login"))
        document.getElementById("login").addEventListener("click", function(){
            
            let dni = document.getElementById("inputDNI").value;
            let password = document.getElementById("inputPassword").value
            
            let httpd = new XMLHttpRequest();
            //------------------------------------------------
            let formSend = new FormData();
            formSend.append("flag","login");
            formSend.append("dni",dni);
            formSend.append("password",password);
            //------------------------------------------------
            httpd.onreadystatechange = function(){
                if(httpd.status==200 && httpd.readyState ==4){
                    let resp = JSON.parse(httpd.responseText);
                    if(resp.datos.state){
                        localStorage.setItem("session",JSON.stringify(resp.datos))
                        window.location.href = resp.url;
                    }else{
                        if(resp.datos.exeption == null){
                            swal({
                                icon: "warning",
                                title: `${resp.datos.data}`
                              });
                          
                        }else{
                            swal({
                                icon: "error",
                                title: `${resp.datos.data}`
                              });
                        }
                    }
                }
            }
            httpd.open("POST","../controller/login_controller.php",true);
            httpd.send(formSend);
        })
    
})