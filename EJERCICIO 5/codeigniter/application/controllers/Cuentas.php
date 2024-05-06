<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cuentas_model'); // Asegúrate de que el nombre del modelo sea correcto y coincida con el nombre del archivo
        $this->load->model('Cuentas_model'); // Asegúrate de cargar el modelo correcto
        $this->load->helper('url');
    }
    
    public function index() {
        $data['cuentas'] = $this->Cuentas_model->get_cuentas_con_nombre_persona(); // Ajusta el método en tu modelo para obtener el nombre de la persona
        $this->load->view('cuentas_list', $data);
    }

    public function borrar($idcuenta)
    {
        $this->load->helper('url');

        // Llama al método del modelo para eliminar la cuenta bancaria
        $this->Cuentas_model->borrar_cuenta($idcuenta);

        // Redirige a la página de listado de cuentas después de borrar
        redirect('cuentas/cuentas_list');
    }

}
