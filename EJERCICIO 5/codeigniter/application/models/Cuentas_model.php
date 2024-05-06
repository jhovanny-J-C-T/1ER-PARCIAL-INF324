<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_cuentas() {
        return $this->db->get('cuentabancaria')->result_array();
    }
    public function get_cuentas_con_nombre_persona() {
        $this->db->select('c.*, p.nombre as nombre'); // Ajusta el nombre de la tabla y el campo que contiene el nombre de la persona
        $this->db->from('cuentabancaria c');
        $this->db->join('persona p', 'c.persona_id = p.idpersona');
        return $this->db->get()->result_array();
    }
    

}
