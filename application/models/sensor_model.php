<?php

class Sensor_model extends CI_Model {

	var $strIdentifier = '';
    var $iPcbId = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function initialize($identifier,$pcb_id)
    {
        $this->strIdentifier = $identifier;
        $this->iPcbId = $pcb_id;
    }

    public function get_all(){
        $query = $this->db->get('sensors');
        return $query->result_array();
    }

    public function get_sensors_with_pcb($pcb_id)
    {
        $this->db->select('*');
        $this->db->from('sensors');
        $this->db->where('pcb_id',$pcb_id);
        $this->db->order_by('id','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sensor_id_with_identifier($identifier)
    {
        $this->db->select('id');
        $this->db->from('sensors');
        $this->db->where('identifier', $identifier);
        $aQuery = $this->db->get()->row_array();
        return $aQuery['id'];
    }

    public function get_sensor_data($sensor_id)
    {
        $this->db->select('*')
        ->from('sensors')
        ->where('id',$sensor_id);
        return $this->db->get()->row_array();

    }

    public function get_sensor_id_with_identifier_and_pcb($identifier,$pcb_id)
    {
        $aWhere = array('identifier' => $identifier, 'pcb_id' => $pcb_id);
        $this->db->select('id')
        ->from('sensors')
        ->where($aWhere);
        // $this->db->last_query();
        $aResult = $this->db->get()->row_array();
        return $aResult['id'];
    }

}