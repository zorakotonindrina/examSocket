<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    
    public function index()
    {
        $this->load->view('Admin/index1');
    }


    public function deco(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('AdminController/index');
    }


    public function login()
    {
		$this->load->model('Admin');
        $this->load->model('Objet');
        $this->load->model('Photo');
        $this->load->model('Categorie');
	    $pseudo = $this->input->post("mail");
		$mdp = $this->input->post("mdp");   
		$logged = $this->Admin->is_logged($pseudo,$mdp);
		$auth = $logged->row_array();
		if($auth['logged'] == 1)
		{
            
            $data = array();
            $listphoto=null;
            $isa= 0;
            foreach($this->Objet->liste_objets()->result_array() as $rows) {
                $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
                $isa++;
            }  
            $data['listephoto'] = $listphoto;
            $data['listeObjet'] = $this->Objet->liste_objets();
            $data['listcat'] = $this->Categorie-> liste_categories();
            $this->load->view('Admin/accueill',$data);
		}
		else {		  		
		redirect('AdminController/index');	
        }

    }

        /*fonction qui retourne la vue index */
    public function accueill()
    {
        $this->load->model('Objet');
        $this->load->model('Categorie');
        $this->load->model('Photo');
		$data = array();
		$data['listeObjet'] = $this->Objet->liste_objets();
        $listphoto=null;
        $isa= 0;
        foreach($this->Objet->liste_objets()->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }  
        $data['listephoto'] = $listphoto;
        $data['listcat'] = $this->Categorie-> liste_categories();
        $this->load->view('Admin/accueill',$data);
    }

    public function stat(){
        $this->load->model('Utilisateur');
        $this->load->model('Proposition');
        $data = array();
        $data['isaUtilisateur'] = $this->Utilisateur->isa_users();
        $data['isaEchange'] = $this->Proposition->isa_echange();
        $this->load->view('Admin/stat',$data);
    }

}


?>