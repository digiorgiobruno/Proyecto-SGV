<?php
	include_once('clases/config.php');
	class Model{
		protected $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->db->connect_errno){
				echo 'Error de conexion: '.$this->db->connect_errno;
				return;
			}
			$this->db->set_charset(DB_CHARSET);
		}
	}
?>