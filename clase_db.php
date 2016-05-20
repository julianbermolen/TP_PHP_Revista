<?php
	class DataBase{
		private $url;
		private $usuario;
		private $clave;
		private $db;
		//public $consulta;
		private $conexion;

		function __construct($url,$usuario,$clave,$db){
			$this->url=$url;
			$this->usuario=$usuario;
			$this->clave=$clave;
			$this->db=$db;
		}
		//conectar la base
		public function conectar(){
			$this->conexion=mysqli_connect($this->url,$this->usuario,$this->clave,$this->db);
		}
		//consultar a la base
		public function consultar($consulta){
			return mysqli_query($this->conexion,$consulta);
		}
		//cerrar la conexion
		public function cerrarConexion(){
			mysqli_close($this->conexion);
		}

	}