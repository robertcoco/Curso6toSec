<!DOCTYPE html>
<html lang="en">
<?php
    //getting the conetion  and the setting the post_var['nombre'] to a var buscar.
    include 'conexion.php';
    if($_POST){
        $conexion = new conexion1();
        $buscar = $_POST['nombre'];
    
    // selecting all the information from database where nombre like the var buscar.
        $sql = "select * from alumno where nombre like '$buscar';";
        $alumno = $conexion->consultar($sql);
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6to Sec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b969f99fdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="curso.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="number6.png">
</head>
<body>
    <form class="formulario" action="paginaCurso.php" method="post">
        <input type="text" name="nombre" id="">
        <button type="submit">Buscar</button>
    </form>
    <div class="curso">
        <p>Bienvenidos</p>
        <i class="fa-solid fa-6"></i>
    </div>

    <?php
        // setting a condition that evaluates if the size of the array alumno is greater than 0
        // to know if  there is some data that match with some register of database.
        if ($_POST) {
            if (sizeof($alumno) > 0) {
    ?>
        <?php
        // looping through the alumno array which contains the data that we select from our database.
         foreach ($alumno as $estudiante){
        ?>
        <div class="card">
            <div class="card-body">
                <div class="caja">
                <h4 class="card-title"><?php echo $estudiante['nombre'];?></h4>
                <img width="200px" height="200px" src="imagenes/<?php echo $buscar;?>.jpg">
                </div>
            </div>
        </div>
        <?php }?>
    <?php } else {?>
        <h1 style="text-align:center">no hay datos encontrados</h1>
    <?php } } ?>
</body>
</html>