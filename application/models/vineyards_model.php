<?php

class Vineyards_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function get_id_with_name($vineyards_name)
    {
    	$this->db->select('id')
    	->from('vineyards')
    	->where('name', $vineyards_name);
    	$aResult = $this->db->get()->row_array();
    	return $aResult['id'];
    }

}