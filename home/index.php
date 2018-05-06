<?php

//Recibiremos el formulario
if( isset($_POST['btn']) ){
	include '../DbSetup.php';
	//print_r($_FILES);
	//Recuperar los datos del archivo
	$nombre = $_FILES['txtImg']['name'];
	$tmp = $_FILES['txtImg']['tmp_name'];
	$folder = '../imagenes';
	//Movera el archivo del folder temporal a una nueva ruta
	move_uploaded_file($tmp, $folder.'/'.$nombre);

	//Extraigo los bytes del archivo
	//echo $bytesArchivo = file_get_contents($folder.'/'.$nombre);
	$bytesArchivo = file_get_contents($folder.'/'.$nombre);
	$comentario = $_POST['txtComent'];
	//echo $comentario;
	//echo $bytesArchivo;
	$imagen_model->insertarImagen($comentario, $bytesArchivo);

}

?>

<form method="POST" action="" enctype="multipart/form-data">
	<label>Ingresar comentario</label>
	<input type="text" name="txtComent">
	<br><br>
	<label>Ingresa imagen</label>
	<input type="file" name="txtImg">
	<br>
	<button type="submit" name="btn">Agregar</button>
</form>

<table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>ID</th>
        <th>COMENTARIO</th>
        <th>IMAGEN</th>
      </tr>
      <?php
        include '../DbSetup.php';
        $result_array_Imagenes = $imagen_model->listarTodasImagenes();
        $result_array_Info_Imagenes = $imagen_model->listarTodaInfoImagenes();
        //var_dump($result_array_Info_Imagenes);
        /*
        foreach ($result_array_Info_Imagenes as $row) {

            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['comentario'] . "</td>";
            echo "</tr>";

        }*/
        $max = sizeof($result_array_Info_Imagenes);
        for ($i=0; $i < $max; $i++) { 
        	//$comentario = $result_array_Info_Imagenes[$i]['comentario'];
        	echo "<tr>";
            echo "<td>" . $result_array_Info_Imagenes[$i]['id'] . "</td>";
            echo "<td>" .  $result_array_Info_Imagenes[$i]['comentario'] . "</td>";
            $data = $result_array_Imagenes[$i]['imagen'];
            $img = "<img width='8%' src= 'data:image/jpeg;base64, $data' />";
            echo "<td>" . $img . "</td>";
            echo "</tr>";
        }
        
        /*
        foreach ($result_array_Imagenes as $row) {

            $data = $row['imagen'];
            $img = "<img width='8%' src= 'data:image/jpeg;base64, $data' />";
            //echo "<td><img src=" . print($img) . "/><td>";
            //echo "<td>" . $img . "<td>";
            echo "<td>" . $img . "</td>";
        }
        */
        //"<a href='../carro/agregar_linea_orden.php?id=" . $row['id_articulo'] . "'>+</a>".
      ?>
</table>



