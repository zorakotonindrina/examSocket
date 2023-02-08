<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropositionController extends CI_Controller {

    
    public function index()
    {
      
        redirect('UtilisateurController/accueill');
    }




    public function proposer()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
	    $ido1 = $this->input->get("ido1");
		$ido2 = $this->input->get("ido2");
        $idu1 = $this->session->idutilisateur;
        $query = $this->Objet->get_proprietaire($ido2);
        $idu = $query->row_array();
        $idu2=$idu['idutilisateur'];
        date_default_timezone_set('Europe/Moscow');
        $dat =  date('y-m-d h:i:s');
        $marge=$this->Objet->getDiffMarge($ido1,$ido2);
        $signe=$this->Objet->getDiffSigne($ido1,$ido2);
		$this->Proposition->insert_proposition($idu1,$idu2,$ido1,$ido2,$dat,$marge,$signe);
        redirect('PropositionController/index');


    }

    public function multiple()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
	    $ido2 = $this->input->post("ido2");
        $idobjs=null;
        $j=0;

        if($this->input->post('objets')!= False){
            foreach($this->input->post('objets') as $rows) {
                $idobjs[$j] = $rows; 
                $j++;
            }
        }


        $idu1 = $this->session->idutilisateur;
        $query = $this->Objet->get_proprietaire($ido2);
        $idu = $query->row_array();
        $idu2 = $idu['idutilisateur'];
        date_default_timezone_set('Europe/Moscow');
        $dat =  date('y-m-d h:i:s');
        for($k=0; $k<count($idobjs); $k++){
            $marge=$this->Objet->getDiffMarge($idobjs[$k],$ido2);
            $signe=$this->Objet->getDiffSigne($idobjs[$k],$ido2);
            $this->Proposition->insert_proposition($idu1,$idu2,$idobjs[$k],$ido2,$dat,$marge,$signe);
        }
       
        redirect('PropositionController/index');


    }

    

    public function detailSuggest()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $idp = $this->input->get("id");
        $pro=$this->Proposition->select($idp);
        $idu1=null;
        $idu2=null;
        $ido1=null;
        $ido2=null;
        $dat = null;
       foreach($pro->result_array() as $rows) {

        $idu1 = $rows['idutilisateur1']; 
        $ido1 = $rows['idobjet1']; 
        $ido2 = $rows['idobjet2']; 
        $idu2 = $rows['idutilisateur2']; 
        $dat  = $rows['dateprop']; 
           }
           
           
        $objet1=$this->Objet->get_info($ido1);
        $objet2=$this->Objet->get_info($ido2);
        $query1=$this->Utilisateur->get_nom($idu1);
        $nomm1 = $query1->row_array();
        $nom1=$nomm1['mail'];

        $query2=$this->Utilisateur->get_nom($idu2);
        $nomm2 = $query2->row_array();
        $nom2=$nomm2['mail'];
        $data = array();
        $data['objet1'] =$objet1;
        $data['objet2'] =$objet2;
        $data['nom1'] =$nom1;
        $data['nom2'] =$nom2;
        $data['idp']=$idp;
        $this->load->view('Users/detailSuggest',$data);

    }

    public function accepter()
    {

		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $this->load->model('Historique');
        $idp = $this->input->get("idp");
        $pro=$this->Proposition->select($idp);
        $idu1=null;
        $idu2=null;
        $ido1=null;
        $ido2=null;
        $dat = null;
       foreach($pro->result_array() as $rows) {

        $idu1 = $rows['idutilisateur1']; 
        $ido1 = $rows['idobjet1']; 
        $ido2 = $rows['idobjet2']; 
        $idu2 = $rows['idutilisateur2']; 
        $dat  = $rows['dateprop']; 
           }
        $etat=1;
        date_default_timezone_set('Europe/Moscow');
        $dat =  date('y-m-d h:i:s');
		$this->Proposition->gererate_proposition($etat,$idp);
        
        $this->Historique->insert_historique($ido1,$idu1,$dat);
        $this->Historique->insert_historique($ido2,$idu2,$dat);
        $this->Objet->change_proprietaire($idu1,$ido2);
        $this->Objet->change_proprietaire($idu2,$ido1);

        redirect('PropositionController/index');

    }

    public function refuser()
    {
		$this->load->model('Utilisateur');
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $idp = $this->input->get("idp");
        $etat=2;
		$this->Proposition->gererate_proposition($etat,$idp);
        redirect('PropositionController/index');

    }



}

?>