if(sessionStorage.getItem("session")){
let xmlSession = new XMLHttpRequest();
let form = new FormData();
form.append("sessionData", sessionStorage.getItem("session"));
xmlSession.onreadystatechange = function(){
    if(xmlSession.readyState == 4 && xmlSession.status == 200){
        let resp = JSON.parse(xmlSession.responseText);
        console.log(resp);
        if(!resp.status){
            window.stop();
            window.location.href="login.php";
        }
    }
}
xmlSession.open("POST","../controller/val_session.php",true);
xmlSession.send(form);
}else{
    window.stop();
    window.location.href="login.php";
}
