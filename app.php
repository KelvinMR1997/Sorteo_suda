<head>
    <link rel="shortcut icon" href="assets/img/logo_suda.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" </head>
    <?php 
include('db.php');
// date_default_timezone_set();
// echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y") ." Hora: ".date("h").":".date('i').":".date('s');

if (isset ($_POST['guardar'])){
    $numero = rand(1,100);
    $user = $_POST['user'];
    // echo $user .    $numero;
    $consulta =mysqli_query($conexion,"SELECT * FROM user WHERE numero = '$numero'");
    

     
    

    $filas = mysqli_num_rows($consulta);
    if($filas> 0){
        die(header("location:index.html"));
    }
    else{
        $query ="INSERT INTO user (user,numero) VALUES ('$user','$numero')";
        $resultado = mysqli_query($conexion,$query);

        echo "<div class='container'>
        <div class='alert alert-success' role='alert'>
            <div class='text-center'>
            <h1>Listo</h1>
            <h2>Tu número es: $numero </h2>
            <br>
            </div>
            
            
            <div>
            <p>Serás redireccionado en <span id='counter'>1</span> segundo(s).</p>
        </div>
    </div>
        <script type='text/javascript'>
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML) <= 0) {
                location.href = 'index.php';
            }
            i.innerHTML = parseInt(i.innerHTML) - 1;
        }
        setInterval(function () {
            countdown();
        }, 1000);
    </script>";
        
    }

   }