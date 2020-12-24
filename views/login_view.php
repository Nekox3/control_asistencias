<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../assets/js/login.js"></script>
<title> control de asistencia | Login </title>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="../assets/css/login.css">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <link rel="shortcut icon" href="../assets/img/logo02.jpg">
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="../assets/img/logo02.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputDNI" name="inputDNI" maxlength="8" class="form-control mt-2" placeholder="DNI" required autofocus>
                <input type="password" id="inputPassword" name="inputPassword" maxlength="6" class="form-control mt-2" placeholder="Contraseña" required autofocus>
             
                <button id="login" class="btn btn-lg btn-primary btn-block btn-signin mt-3" type="button">ingresar</button>
            </form><!-- /form -->
       
        </div><!-- /card-container -->
    </div><!-- /container -->