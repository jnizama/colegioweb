<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public $admin = 'admin';
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
   {
     // Construct the parent class
     parent::__construct();
		 $this->load->helper('url');
     //parent::MY_Controller();
     $this->load->library('session');
		 $this->load->database();

   }

	public function index()
	{
		$this->load->helper('url');

		//if($this->session->login)
		if($this->session->has_userdata('nameuser'))
		{
			switch($this->session->userdata('perfil_id'))
			{
				case '1':
						$data['content'] = 'pages/dashboardadmin'; //Perfil 1 = Administrativo
						break;
				case '2':
						$data['content'] = 'pages/dashboardprofe'; //Perfil 1 = Administrativo
						break;
				case '3':
						$data['content'] = 'pages/dashboardalu'; //Perfil 1 = Administrativo
						break;
			}


				// $data['content'] = 'pages/dashboard2'; //Perfil 1 = Alumno
				// $data['content'] = 'pages/dashboard3'; //Perfil 1 = Profesor

			$this->load->helper('url');
			$this->load->view('layout/master', $data);
		}
		else {
			redirect('/login');
			//$this->load->view('login');
		}

	}
	public function hola()
	{
		$this->load->database();
		$query = $this->db->query('SELECT * FROM demo');
		foreach ($query->result() as $row)
		{
        echo $row->id;
        echo $row->nombre;
		}
	}
		public function pedidos(){
			$data['content'] = 'pages/pedidos';
			$this->load->helper('url');
			$this->load->view('layout/master', $data);
		}
		public function phpinfo(){
			echo (phpinfo());
		}
		//Logout session
		public function outsession(){

				$r = true;
				//$_SESSION = array();
				$this->session->sess_destroy();
				die( json_encode( $r ) );
				//$this->response($r);
				//
		}
		public function getSucursal()
		{
			if($this->session->userdata('nameuser') != null)
			{
				$usuario = $this->session->userdata('nameuser');

				// if(null != $usuario){
				// 	$usuario = $this->session->userdata('nameuser');
				// }
				$sql = 'select "el"."idLocalEmpresa", "el"."nombre" from "Usuario" as "u" join "Usuario_Empresa" as "e" on "u"."idUsuario" = "e"."idUsuario"
				inner join "Empresa_Locales" as "el" on "e"."idEmpresa" ="el"."idEmpresa" ';

				if($usuario != $this->admin)
				{
					$sql = $sql . 'where "u"."usuario" = ?';
				}
				$this->load->database();
				try{  //ajistar el query para qu reciba parametro del usuari oloegado
					$query = $this->db->query($sql, array($usuario) );
					$result = $query->result();
					die( json_encode( $result) );
				}catch (PDOException $e){
					die( json_encode( false ) );
				}
			}
		}
		public function getPedidos()
		{
				$usuario = $this->session->userdata('nameuser');

				// if(null != $usuario){
				// 	$usuario = $this->session->userdata('nameuser');
				// }
				$sql = 'select "el"."idLocalEmpresa", "el"."nombre" from "Usuario" as "u" join "Usuario_Empresa" as "e" on "u"."idUsuario" = "e"."idUsuario"
				inner join "Empresa_Locales" as "el" on "e"."idEmpresa" ="el"."idEmpresa" ';

				if($usuario != $this->admin)
				{
					$sql = $sql . 'where "u"."usuario" = ?';
				}
				$this->load->database();
				try{  //ajistar el query para qu reciba parametro del usuari oloegado
					$query = $this->db->query($sql, array($usuario) );
					$result = $query->result();
					die( json_encode( $result) );
				}catch (PDOException $e){
					die( json_encode( false ) );
				}
		}
		public function getProductsToListBox()
		{
			$idLocalEmpresa = $_SESSION['company_id'];
			//$idLocalEmpresa = 1;
			$sql = 'select "idProducto","nombre" from "Producto" as "p" inner join "Local_Producto" as "l" on "p"."idProducto" = "l"."idproducto" where "l".idlocalempresa = ?';

			try
			 {  //ajistar el query para qu reciba parametro del usuari oloegado
				$query = $this->db->query($sql, array($idLocalEmpresa));
				$result = $query->result();
				die( json_encode( $result) );
				}
				catch (PDOException $e){
				die( json_encode( false ) );
				}
		}

		public function getPedidoById()
		{
			//$idPedido = $_POST['idPedido'];
			$idPedido = 1;
			try{
				$sql = 'select "p"."idPedido","p"."fecha", (select count(*) from "DetallePedido" as "d" where "d"."idPedido" = "p"."idPedido") as "cantPlatos" , CASE WHEN "p"."idModulo" = ? THEN ? WHEN "p"."idModulo" = ? THEN ? ELSE ? END AS  "Modulo" from "Pedido" as "p" where "p"."idPedido" = ?';
				$query = $this->db->query($sql, array('1', 'Pedidos', '2', 'Delivery', 'Ninguno',$idPedido)); //arreglar esto.
				$result = $query->result();
				$result = json_encode( $result[0]);

				//details Pedido
				$sql = 'select "d"."idPedido","p"."nombre" as "nombreProducto","d"."detallepedido","d"."cantidad","d"."precio","d"."subtotal"  from "DetallePedido" as "d" inner join "Producto" as "p" on "d"."idProducto" = "p"."idProducto"
				where "d"."idPedido" = ? ';
				$query = $this->db->query($sql, array($idPedido)); //arreglar esto.
				$result_detail = $query->result();
				$result_detail = json_encode( $result_detail);

				//$result_detail = array_merge($result, array("detail" => array($query->result())));
				//$result_detail = $result_detail->result();

				//die( json_encode(array_merge($result, array("detalles" => $result_detail))) );
				//$newArray=array(json_decode($result,true),array("detail" => $result_detail));
				//
				$combined_array = json_decode($result, true) + array("Detail"=>json_decode($result_detail, true));
				$combined_json = json_encode($combined_array,JSON_PRETTY_PRINT);

				//die(json_encode($result,array("detalles" => $result_detail)));
				die($combined_json);
				//die($sql);
			}
			catch (PDOException $e){
				die( json_encode($e) );
			}
		}
}
