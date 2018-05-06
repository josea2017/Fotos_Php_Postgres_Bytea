<?php

namespace models
{

	class Imagen
	{
		private $connection;
		function __construct($connection)
	    {
	      $this->connection = $connection;
	    }

	    

		public function insertarImagen($comentario, $imagen)
		{
			$escaped = pg_escape_bytea($imagen);
			$sql = "INSERT INTO imagenes(comentario, imagen) VALUES ('$comentario', '{$escaped}')";
			$this->connection->executeSql($sql);
		}


		public function listarTodasImagenes()
		{
			//$sql = "SELECT * FROM imagenes ORDER BY id ASC";
			//$result = $this->connection->executeSql($sql);
			//return $this->connection->getResults($result);
			//$res = "SELECT encode(imagen, 'base64') AS imagen FROM imagenes WHERE id='1'";
			$res = "SELECT encode(imagen, 'base64') AS imagen FROM imagenes";
			$result = $this->connection->executeSql($res);
			return  $this->connection->getResults($result);
		}

		public function listarTodaInfoImagenes()
		{
			$sql = "SELECT * FROM imagenes ORDER BY id ASC";
			$result = $this->connection->executeSql($sql);
			return $this->connection->getResults($result);
		}

		

	}

}