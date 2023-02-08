<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriqueController extends CI_Controller {

    
    public function index()
    {
        $this->load->view('Users/accueil');
    }



    public function liste_historique()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Categorie');
        $this->load->model('Objet');
        $this->load->model('Historique');
	    $ido = $this->input->get("ido");
        $data = array();
        $data['listehist'] = $this->Historique->mes_historiques($ido);
        $this->load->view('Users/historique',$data);

    }





 



}

?>