<?php
include('db.php')        ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="assets/img/logo_suda.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo Sudametrica</title>
</head>

<body>
    <div class="container-fluid">
        <center>
            <img src="assets/img/aging_banner.jpg" alt="Imagen" class="img-fluid rounded">
        </center>
        <center>
            <div class="alert alert-primary mt-3" style="width: 76%;">
                <center>INSTRUCCIONES: </center>
                <ul style="list-style: none;">
                    <li>1. Escribe tu nick en el cuadro de texto</li>
                    <li>2. haz click sobre el botón guardar</li>
                </ul>

                <p style="text-align: center;">La pagina generará automaticamente un número aleatorio enter 0 y 100, el
                    jugador que obtenga el número más cercano a 100 será el ganador, solo se permite un turno por
                    jugador, el cual quedará registrado con nickname,fecha y hora. Buena suerte! </p>
                <br>
                En caso de empate se duplicará la apuesta y los que empataron NO tendrán que pagar de nuevo
            </div>
        </center>
        <form action="app.php" method="POST">
            <center>
                <div class="form-group">
                    <h1>Ingresa tu nickname</h1>
                    <input type="text" class="form-control" name="user" required style="width: 50%;" id="nick" disabled>
                    <small id="emailHelp" class="form-text text-muted">Al dar click en guardar se registrará un número
                        aleatorio entre 0 y 100, Solo tendrás una oportunidad
                        <br>
                        En caso de empate se duplicará la apuesta y los que empataron NO tendrán que pagar de nuevo
                    </small>
                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                </div>
            </center>
        </form>



        <?php
        $consulta ="SELECT * FROM user order by fecha_actual desc";
        $res =mysqli_query($conexion,$consulta);

        // $cons= mysqli_query($conexion,"SELECT MAX(numero) AS maxNum FROM user");
        $cons= mysqli_query($conexion,"SELECT * FROM user WHERE numero = (SELECT MAX(numero) AS maxNum FROM user)");
        
        ?>
        <center>
            <?php 
            $consEmpate =mysqli_query($conexion,"SELECT user,numero FROM user WHERE numero IN ( SELECT numero FROM user HAVING count( numero ) >1 )");

            if (mysqli_num_rows($consEmpate)>1){
                //  $emp = mysqli_fetch_array($consEmpate);
                while ($emp = mysqli_fetch_array($consEmpate)){
                    echo '<div class="alert alert-success" style="width: 50%;"> <h3>EMPATE!</h3>'. $emp['user'].' '.$emp['numero'].'
                    </div>';
                }
            }else{
            ?>
            <div class="alert alert-success" style="width: 50%;">
                El ganador es : <?php while ($row = $cons->fetch_assoc()) {
                         echo '<h1>'.$row['user'].'</h1>'."Número: ".'<h1>'.$row['numero'].'</h1>'; 
                         
            }}?>
            </div>
        </center>
        <div class="row mb-5">
            <table style="margin: 0 auto;" class="col-md-8 mr-5">
                <tr>

                    <th>Nickname</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                </tr>
                <?php         while($reg = mysqli_fetch_array($res)){
                echo"
                 <tr>
                 <td> <h6> ".$reg['user']." </h6> </td>
                 <td>".$reg['numero']."</td>
                 <td>".$reg['fecha_actual']."</td>
             </tr>";
            }
            mysqli_close($conexion);
           ?>
            </table>
        </div>
    </div>
</body>

<style>
    .caja-principal {
        margin: 0rem 9rem 0;
    }

    div-cent {
        width: 80%;
    }
</style>

</html>