<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Categorie extends CI_Model
{
    /*liste categories*/
    public function liste_categories()
    {
        $requete = $this->db->query("select* from categorie ");
        return $requete;
    }


    public function insert_categorie($nom)
    {
        $requete = "insert into categorie(nom) values ('%s')";
        $requete= sprintf($requete,$nom);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    }

    
   
}
?>