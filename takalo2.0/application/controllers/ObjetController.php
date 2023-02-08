<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjetController extends CI_Controller {


    public function index()
    {
        $this->load->view('Users/accueil');
    }

    public function ajout()
    {
        $this->load->model('Categorie');
		$data = array();
        $data['listcat'] = $this->Categorie-> liste_categories();
        $this->load->view('Users/ajouterObjet',$data);
    }


    public function rechercher(){
        $this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
	    $mot = $this->input->post("mot");
        $cat = $this->input->post("idcat");
        $data = array();
        $test=array();
        if($cat == 0){
            $test=$this->Objet->liste_objets();
        }else{
            $test=$this->Objet->objets_categorie($cat);
        }

        // if($mot ==" "){
        //     $data['resultat'] =$test;
        //     $this->load->view('users/resultatRecherche',$data);
        // }

       
        $data['resultat'] =$this->Objet->rechercheDesc($mot,$test);
        $this->load->view('Users/resultatRecherche',$data);

        

    }

    public function pourcentage(){
        $this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
	    $marge = $this->input->get("marge");
        $id = $this->input->get("ido");
        $data = array();
        $listphoto=null;
        $isa= 0;

        foreach($this->Objet->getMarge($id,$marge)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }  
        $data['listephoto'] = $listphoto;
        $data['listobj'] =$this->Objet->getMarge($id,$marge);
        $data['ido1'] =$id;
        $this->load->view('Users/listObjetMarge',$data);

        

    }

    public function ajouter_objet()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
	    $nom = $this->input->post("nom");
        $prix = $this->input->post("prix");
        $idu=$this->session->idutilisateur;
        $idcat=$this->input->post("idcat");
        $desc = $this->input->post("desc");
		$ok=$this->Objet->insert_objet($nom,$desc,$idu,$prix,$idcat);
        $max=$this->Objet->get_max();
        $idmax = $max->row_array();
        $ido=$idmax['max(id)'];
        $phot[0] = $this->input->post("photo1");
        $phot[1] = $this->input->post("photo2");
        $phot[2]= $this->input->post("photo3");
        $phot[3]= $this->input->post("photo4");

        for($i=0; $i<4; $i++){
            if($phot[$i] != ""){
                $this->Photo->insert_photo($ido,$phot[$i]);
            }
        }
        $data = array();
        $query = $this->Objet->mes_objets($idu);
        $data['listeObjet'] = $query;
       redirect('UtilisateurController/accueill');	

    }



    public function detail()
    {


		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
	    $ido = $this->input->get("ido");
        $data = array();
		$data['myinfo'] = $this->Objet->get_info($ido);
		$data['myphotos']=  $this->Photo->mes_photos($ido);
        $this->load->view('Users/detailObjet',$data);	

    }

    public function listObjet()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');

        $id=$this->session->idutilisateur;
        $data = array();
        $listphoto=null;
        $isa= 0;

        foreach($this->Objet->liste_autreobjets($id)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }
        
        $data['listephoto'] = $listphoto;
		$data['listobj'] = $this->Objet->liste_autreobjets($id);
        $this->load->view('Users/listObjet',$data);	

    }

    public function interesser()
    {
 
		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
        $ido = $this->input->get("ido1");
        $data = array();
		$data['ido2'] = $ido;
        $id=$this->session->idutilisateur;
        $query = $this->Objet->mes_objets($id);
        $data['mesobj'] = $query;
        $listphoto=null;
        $isa= 0;

        foreach($this->Objet->mes_objets($id)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }  
        $data['listephoto'] = $listphoto;
        $this->load->view('Users/mesObjets',$data);	

    }

    

    
    public function echangemultiple()
    {
 
		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Photo');
        $ido = $this->input->get("ido2");
        $data = array();
        $id=$this->session->idutilisateur;
        $query = $this->Objet->mes_objets($id);
        
        $data['ido2'] = $ido;
        $listphoto=null;
        $isa= 0;

        foreach($this->Objet->mes_objets($id)->result_array() as $rows) {
            $listphoto[$isa]=$this->Photo->get_photo($rows['id']);
            $isa++;
        }  
        $data['listephoto'] = $listphoto;
        $data['mesobj'] = $query;
        $this->load->view('Users/multiple',$data);	

    }



}

?>