<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start();

class Login extends CI_Controller {

  function __construct()
  {
    // Construct the parent class
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

  }

  public function ChangeString()
  {
    $f = new ChangeString();
    die( json_encode( $f->build('**Casa 52Z') ) );
  }
  public function index()
  {
    $this->load->helper('url');

    $this->load->library('Colegio/LoginService');
    //$r = $this->loginservice->getPerfilUsuario();

    $r = $this->loginservice->getperfilusuario();
    //print_r($r);
    $result = array('Perfiles' => $r);
    $this->load->view('login', $result);
  }
  public function login_session()
  {
      $r = true;
      //$_SESSION['login'] = $_POST['user'];
      $login = $_POST['user'];
      $psw = $_POST['psw'];
      $perfil_id = $_POST['per'];

      $this->db->select('u.usuario, u.contrasena, p.idperfil');
      $this->db->from('usuario as u');
      $this->db->join('usuarioperfil as p','u.idusuario = p.idusuario');
      $this->db->where('u.usuario',$login);
      $this->db->where('u.contrasena',$psw);
      $this->db->where('p.idperfil',$perfil_id);
      $data = $this->db->get();
      $data = $data->result_array();

      if(count($data) > 0)
      {
        $start = time();
        $expire = $start + (30 * 60);
        //ver mas en http://www.codeigniter.com/user_guide/libraries/sessions.html#using-the-session-class
        $this->session->set_userdata('nameuser', $login);
        $this->session->set_userdata('perfil_id', $data[0]['idperfil']);
        $this->session->set_userdata('start', $start);
        $this->session->set_userdata('expire', $expire);

        die( json_encode( true ) );
      }
      else {
        die(json_encode(false));
      }
      //die( json_encode( $login ) );
  }

}
class ChangeString
{
  public function build($param)
  {
    $result = '';
    $abc = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';
    $arrayWord = str_split($param);
    $arrayBase = str_split($abc);
    $flag = false;



    for ($i = 0; $i < count($arrayWord); $i++) {
      $flag = false;
      for($a = 0; $a < count($arrayBase); $a++) {
        if( $arrayWord[$i] ===  $arrayBase[$a] )
        {
          $flag = true;
          //$arrayFound[$index] = $i;
          //$index++;

          if($arrayWord[$i] == 'z')
               $result .= $arrayBase[0];
          if($arrayWord[$i] == 'Z')
              $result .= $arrayBase[28];
          else
            $result .= $arrayBase[$a + 1];
        }
        // if($a + 1 === count($arrayBase))
        //   if(!$flag)
        //     $result .= $arrayBase[$a];
      }
      if($flag === false)
           $result .= $arrayWord[$i];
    }

    return $result;
  }
}
