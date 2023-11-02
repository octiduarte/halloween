<?php
if(isset($_POST["nombre"]) && isset($_POST["descripcion"]))
{
    //verifico que no exista el disfraz
    $sql = "SELECT *FROM disfraces where nombre = ' ".$_POST['nombre']." ' ";
    $sql = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql)!= 0)
    {
        echo "<script> alert('EL DISFRAZ YA EXISTE EN LA BD');</script>";
    }
    else
    {
        //inserto nuevo disfraz
        $sql = "INSERT INTO disfraces (nombre,descripcion) values (' ".$_POST['nombre']." ',' ".$_POST['descripcion']. " ')";
        $sql = mysqli_query($con, $sql);
        if(mysqli_error($con))
        {
            echo "<script> alert('ERROR NO SE PUDO INSERTAR EL DISFRAZ);</script>";
        }
            else
            {
                echo "<script> alert('Disfraz cargado con exito');</script>";
            }
    }    
}
?>


<section id="admin" class="section">
    <h2>Panel de Administración</h2>
    <form action="index.php?modulo=procesar_disfraz" method="POST">
        <label for="disfraz-nombre">Nombre del Disfraz:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="disfraz-descripcion">Descripción del Disfraz:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="disfraz-nombre">Foto:</label>
        <input type="file" id="disfraz-foto" name="disfraz-foto" required>

        <button type="submit">Agregar Disfraz</button>
    </form>
</section>