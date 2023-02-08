<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Admin extends CI_Model
{

    public function is_logged($pseudo,$mdp)
    {
        $requete = $this->db->query("select count(*) as logged from admin where mail='$pseudo' and mdp='$mdp' ");
        return $requete;
    }
}
?>