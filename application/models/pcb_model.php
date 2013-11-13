<?php

class Pcb_model extends CI_Model {

	var $strIdentifier = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function initialize($identifier)
    {
        $this->strIdentifier = $identifier;
    }

    public function get_all()
    {
        $query = $this->db->get('pcbs');
        return $query->result_array();
    }


    public function get_pcb_id_with_identifier($identifier)
    {
        $this->db->select('id')
        ->from('pcbs')
        ->where('identifier', $identifier);
        $aQuery = $this->db->get()->row_array();
        return $aQuery['id'];
    }


    public function get_pcb_with_vineyard($vineyard_id)
    {
        $this->db->select('*')
        ->from('pcbs')
        ->where('vineyard_id', $vineyard_id);
        return $this->db->get()->result_array();
    }

    public function exist_pcbid($iPcbId)
    {
        $query = $this->db->get_where('positions',array('pcb_id' => $iPcbId));
        if ($query->num_rows() > 0)         
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}