<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategorieController extends CI_Controller {

    
    public function index()
    {
        $this->load->view('Users/accueil');
    }

    public function ajouter_categorie()
    {
        $this->load->model('Objet');
		$this->load->model('Utilisateur');
        $this->load->model('Categorie');
	    $nom = $this->input->post("nom");
		$this->Categorie-> insert_categorie($nom);
        redirect('AdminController/accueill');

    }

    public function ajout()
    {
        $this->load->view('Admin/ajouterCategorie');

    }

    public function changercategorie()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Categorie');
        $this->load->model('Objet');
	    $idcat = $this->input->post("idcat");
        $ido = $this->input->post("ido");
		$this->Objet->change_categorie($idcat,$ido);

       redirect('AdminController/accueill');

    }





 



}

?>