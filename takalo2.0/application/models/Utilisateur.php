<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Utilisateur extends CI_Model
{
    /*liste users*/
    public function liste_users()
    {
        $requete = $this->db->query("select* from utilisateur ");
        return $requete;
    }

    
    public function insert_users($mail,$mdp,$contact)
    {
        $requete = "insert into utilisateur(mail,mdp,contact) values('%s','%s','%s')";
        $requete= sprintf($requete, $mail, $mdp, $contact);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    }

  

   
    public function is_logged($pseudo,$mdp)
    {
        $requete = $this->db->query("select count(*) as logged from utilisateur where mail='$pseudo' and mdp='$mdp' ");
        return $requete;
    }

    public function get_id($pseudo)
    {
        $requete = $this->db->query("select id from utilisateur where mail='$pseudo' ");
        return $requete;
    }

    public function get_nom($id)
    {
        $requete = $this->db->query("select mail from utilisateur where id='$id' ");
        return $requete;
    }

    public function isa_users()
    {
        $requete = $this->db->query("select count(id) as isa from utilisateur");
        $isa = 0;
        foreach ($requete->result() as $resultat){
            $isa = $resultat->isa;
        }
        return $isa;
    }


   
}
?>