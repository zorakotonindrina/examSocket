<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Objet extends CI_Model
{
    /*liste users*/
    public function liste_objets()
    {
        $requete = $this->db->query("select* from objet ");
        return $requete;
    }

    public function get_max()
    {
        $requete = $this->db->query("select max(id) from objet ");
        return $requete;
    }

    public function liste_autreobjets($idu)
    {
        $requete = $this->db->query("select* from objet where idutilisateur !='$idu'");
        return $requete;
    }

    public function mes_objets($id)
    {
        $requete = $this->db->query("select* from objet where idutilisateur='$id'");
        return $requete;
    }

    public function objets_categorie($id)
    {
        $requete = $this->db->query("select* from objet where idcategorie='$id'");
        return $requete;
    }

    public function get_info($id)
    {
        $requete = $this->db->query("select * from objet where id='$id'");
        return $requete;
    }

    public function change_categorie($idcat,$ido)
    {
        $requete = "update objet set idcategorie='%d' where id='%d'";
        $requete=sprintf($requete,$idcat, $ido);
        $this->db->query($requete);
        $this->db->affected_rows();
    } 

    public function change_proprietaire($idu,$ido)
    {
        $requete = "update objet set idutilisateur='%d' where id='%d'";
        $requete=sprintf($requete,$idu, $ido);
        $this->db->query($requete);
    } 

    public function insert_objet($nom,$desc,$idu,$prix,$idcat)
    {
        $requete = "insert into objet(nom,prixestimatif,idutilisateur,description,idcategorie) values ('%s','%d','%d','%s','%d')";
        $requete= sprintf($requete,$nom, $prix, $idu , $desc, $idcat);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    }

    

 
    public function getMarge($id,$marge){
        $obj=$this->get_info($id);
        $prix = 0;
        $idu=0;
        foreach($obj->result_array() as $rows) {
            $prix=$rows['prixestimatif'];   
            $idu=$rows['idutilisateur'];
        }
        $min=$prix - ($marge/100*$prix);
        $max=$prix + ($marge/100*$prix);
        $requete = $this->db->query("select * from objet where prixestimatif >'$min' and  prixestimatif <'$max' and idutilisateur!='$idu'");
        return $requete;

    }

    public function getDiffMarge($ido1,$ido2){
        $obj1=$this->get_info($ido1);
        $obj2=$this->get_info($ido2);
        $prix1 = 0;
        $prix2 = 0;
        foreach($obj1->result_array() as $rows) {
            $prix1=$rows['prixestimatif'];   
        }
        foreach($obj2->result_array() as $rows) {
            $prix2=$rows['prixestimatif'];   
        }
        $marge=$prix2*100/$prix1;

        return $marge;
    }

    public function getDiffSigne($ido1,$ido2){
        $obj1=$this->get_info($ido1);
        $obj2=$this->get_info($ido2);
        $prix1 = 0;
        $prix2 = 0;
        $idu=0;
        foreach($obj1->result_array() as $rows) {
            $prix1=$rows['prixestimatif'];   
        }
        foreach($obj2->result_array() as $rows) {
            $prix2=$rows['prixestimatif'];   
        }
        $signe="";
        if($prix1 > $prix2){
            $signe="-";
        }else{
            $signe="+";
        }
        return $signe;
    }

     public function get_proprietaire($ido)
     {
        $requete = $this->db->query("select idutilisateur from objet where id='$ido'");
        return $requete;
     }

     public function rechercheDesc($mot,$tabobj){

        $result=array();
        $j=0;
        foreach($tabobj->result_array() as $rows) {
            $desc=$rows['description'];
            $tabdesc=explode(" ", $desc);
            for($i=0; $i<count($tabdesc); $i++){
                if(strcmp($mot,$tabdesc[$i])==0){
                    $result[$j]=$rows;
                    $j ++;                    
                }
            }
        }

        return $result;
    }
  

}
?>