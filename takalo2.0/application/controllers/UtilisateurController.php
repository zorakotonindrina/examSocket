<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurController extends CI_Controller {

    public function index()
    {   
      $this->load->view('Users/index');
    }
    
    public function deco(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('UtilisateurController/index');
    }

    public function nouveau_membre()
    {
        $this->load->library('form_validation');
        $this->load->model('Utilisateur');
        $pseudo = $this->input->post('mail');
        $mdp =  $this->input->post('mdp');
        $contact =  $this->input->post('contact');
        $this->Utilisateur->insert_users($pseudo,$mdp,$contact);
        $this->load->view('Users/index');
    }

    public function inscrire()
    {
        $this->load->view('Users/inscription');
    }
    


    public function list_objets()
    {

        $this->load->model('Utilisateur');

        $id=$this->session->idutilisateur;
        $query = $this->Utilisateur->mes_objets($id);
        $listphoto=null;
        $isa= 0;

        foreach($this->Utilisateur->mes_objets($id)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }  
        $data['listephoto'] = $listphoto;
        $data['result'] = $query;
        $this->load->view('Users/accueil',$data);
    }

    public function list_propositions()
    {
        $this->load->model('Utilisateur');
        $this->load->model('Proposition');
        $id=$this->session->idutilisateur;
        $query = $this->Proposition-> mes_propositions($id);
        $data['result'] = $query;
        $this->load->view('Users/tableauProposition',$data);
    }

    public function list_suggestions()
    {
        $this->load->model('Utilisateur');
        $this->load->model('Proposition');
        $id=$this->session->idutilisateur;
        $query = $this->Proposition-> mes_suggestion($id);
        $data['suggest'] = $query;
        $this->load->view('Users/tableauSuggestion',$data);
    }
    


    public function login()
    {

		$this->load->model('Utilisateur');
	    $pseudo = $this->input->post("mail");
		$mdp = $this->input->post("mdp"); 
        $this->load->model('Objet');  
		$logged = $this->Utilisateur->is_logged($pseudo,$mdp);
		$auth = $logged->row_array();
		if($auth['logged'] == 1)
		{
            $query = $this->Utilisateur->get_id($pseudo);
            $idutilisateur = $query->row_array();
            $this->session->set_userdata("idutilisateur",$idutilisateur['id']);
            	 //eto 
                
                 $data = array();
            $data['listeObjet'] = $this->Objet->mes_objets($idutilisateur['id']);
			redirect('UtilisateurController/accueill');
            //redirect('Users/accueill');	
		}
		else {		  		
        $this->session->set_flashdata('incorrect','Mail ou mot de passe icorrect');	 //eto 
        $this->session->flashdata('incorrect');
		redirect('UtilisateurController/index');	
        }
    }

    public function accueill()
    {
        $this->load->model('Utilisateur');
        $this->load->model('Proposition');
        $this->load->model('Categorie');
        $this->load->model('Objet');
        $this->load->model('Photo');
        $id=$this->session->idutilisateur;
        $data = array();
        $data['listeObjet'] = $this->Objet->mes_objets($id);
        $listphoto=null;
        $isa= 0;

        foreach($this->Objet->mes_objets($id)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }
        
        $data['listephoto'] = $listphoto;
        $data['listcat'] = $this->Categorie-> liste_categories();
        $this->load->view('Users/accueill',$data);
    }
    





}

?>