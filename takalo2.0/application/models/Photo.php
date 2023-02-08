<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Photo extends CI_Model
{
    /*liste photos*/
    public function liste_photos()
    {
        $requete = $this->db->query("select* from photo ");
        return $requete;
    }

        /*liste photos*/
        public function mes_photos($ido)
        {
            $requete = $this->db->query("select* from photo where idobjet='$ido' ");
            return $requete;
        }

        public function get_photo($ido)
        {
            $requete = $this->db->query("select* from photo where idobjet='$ido' ");
            $phot=array();
            $u=0;
            foreach($requete->result_array() as $rows) {
                $phot[$u]=$rows['path'];   
                $u++;
            }
            return $phot[0];
        }

        public function isa_photos($id)
        {
            $requete = $this->db->query("select count(id) as isa from photo where id='$id'");
            $isa = 0;
            foreach ($requete->result() as $resultat){
                $isa = $resultat->isa;
            }
            return $isa;
        }

    public function insert_photo($ido,$path)
    {
        $requete = "insert into photo(idobjet,path) values('%d','%s')";
        $requete=sprintf($requete,$ido,$path);
        $requete = $this->db->query($requete);
        $requete = $this->db->affected_rows();
        return $requete;
    }

   
}
?>