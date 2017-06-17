<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginService {
    protected $CI;

    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->database();
    }
    public function getPerfilUsuario(){

        $sql = 'select idperfil, perfil from "perfil"';
        
        try 
	    {
            $query = $this->CI->db->query($sql);
            $result = $query->result();
            //$result = array('Perfiles' => $query->result());
            //die( json_encode( $result) );
            //json_encode( $result);
            //die($result);
            return $result;
		}
            catch (PDOException $e){
            //die( json_encode( false ) );
            json_encode( false );
		}
    }
}
