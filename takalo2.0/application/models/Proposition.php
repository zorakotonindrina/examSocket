<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Proposition extends CI_Model
{
    /*liste users*/
    public function liste_proposition()
    {
        $requete = $this->db->query("select* from proposition ");
        return $requete;
    }


    public function insert_proposition($idu1,$idu2,$idob1,$idob2,$dat,$marge,$signe)
    {
        $status=0;
        $requete = "insert into proposition(idutilisateur1,idobjet1,idobjet2,idutilisateur2,dateprop,etat,marge,signe) values('%d','%d','%d','%d','%s','%d','%d','%s')";
        $requete = sprintf($requete, $idu1, $idob1, $idob2, $idu2, $dat, $status,$marge,$signe);
        $this->db->query($requete);
    }

    public function gererate_proposition($etat,$idp)
    {
        $requete = "update proposition set etat='%d' where id='%d' ";
        $requete = sprintf($requete, $etat, $idp);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    } 

    public function select($id)
    {
        $requete = $this->db->query("select* from proposition  where id='$id'");
        return $requete;
    }

    public function mes_propositions($id)
    {
        $requete = $this->db->query("select* from proposition  where idutilisateur1='$id' and etat=0");
        return $requete;
    }

    public function mes_suggestion($id)
    {
        $requete = $this->db->query("select* from proposition  where idutilisateur2='$id' and etat=0");
        return $requete;
    }

    public function isa_echange(){
        $requete = $this->db->query("select count(id) as isa from proposition  where etat=1");
        $isa = 0;
        foreach ($requete->result() as $resultat){
            $isa = $resultat->isa;
        }
        return $isa;
    }

  

}
?>