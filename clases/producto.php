<?php
	include_once('conexion.php');
	class Product extends Model{
		public $code;
		public $product;
		public $description;
		public $price;

		public function __construct(){ 
      parent::__construct(); 
    } 

		public function get_products(){ 
      $sql = $this->db->query("SELECT * FROM tbl_productos");  
      $html = '';
      foreach ($sql->fetch_all(MYSQLI_ASSOC) as $key){
        $code = "'".$key['producto_codigo']."'";
        $html .= '<tr>
                    <td>'.$key['producto_codigo'].'</td>
                    <td>'.$key['producto_nombre'].'</td>
                    <td>'.$key['producto_descripcion'].'</td>
                    <td align="right">'.$key['producto_precio'].'</td>
                    <td align="right">
                      <input type="number" id="'.$key['producto_codigo'].'" value="1" min="1">
                    </td>
                    <td>
                      <button onClick="addProduct('.$code.');">
                        Agregar
                      </button>
                    </td>
                  </tr>';
      }
      return $html;
   	} 

 		public function search_code($code){
 			$sql = $this->db->query("SELECT * FROM tbl_productos WHERE producto_codigo = '$code'"); 
      $product = $sql->fetch_all(MYSQLI_ASSOC); 
      $status = 0;
      foreach ($product as $key){
    		$this->code = $key['producto_codigo'];
    		$this->product = $key['producto_nombre'];
    		$this->description = $key['producto_descripcion'];
    		$this->price = $key['producto_precio'];
    		$status++;
    	}
    	return $status;
 		}
	}
?>