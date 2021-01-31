<?php
include('db.php')        ?>

<!DOCTYPE html>
<html lang="en">

<head>
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

        <form action="app.php" method="POST">
            <center>
                <div class="form-group">
                    <h1>Ingresa tu nickname</h1>
                    <input type="text" class="form-control" name="user" required style="width: 50%;">
                    <small id="emailHelp" class="form-text text-muted">Al dar click en guardar se registrará un número
                        aleatorio entre 0 y 1.000, Solo tendrás una oportunidad</small>
                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                </div>
            </center>
        </form>



        <?php
        $consulta ="SELECT * FROM user";
        $res =mysqli_query($conexion,$consulta);
        ?>

        <center>
            <table style="width:26%">
                <tr>
                    <th>Nickname</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                </tr>
                <?php         while($reg = mysqli_fetch_array($res)){
                echo"
                 <tr>
                 <td>".$reg['user']."</td>
                 <td>".$reg['numero']."</td>
                 <td>50</td>
             </tr>";
            }
            mysqli_close($conexion);
           ?>
            </table>
        </center>
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