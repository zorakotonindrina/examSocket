<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Historique extends CI_Model
{
    /*liste historique*/
    public function liste_historique()
    {
        $requete = $this->db->query("select* from historique ");
        return $requete;
    }

        /*liste historique*/
        public function mes_historiques($ido)
        {
            $requete = $this->db->query("select* from historique where idobjet='$ido' ");
            return $requete;
        }

    public function insert_historique($ido,$idu,$dat)
    {
        $requete = "insert into historique(idobjet,idutilisateur,datehisto) values('%d','%s','%s')";
        $requete=sprintf($requete,$ido,$idu,$dat);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    }

   
}
?>