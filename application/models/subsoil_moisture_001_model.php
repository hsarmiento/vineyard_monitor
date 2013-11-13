<?php

class Subsoil_moisture_001_model extends CI_Model {

	var $iSensorId = 0;
	var $iValue = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function initialize($sensor_id, $value)
    {
        $this->iSensorId = $sensor_id;
        $this->iValue = $value;

    }

    public function save_subsoil_001_value()
    {
        $data = array('sensor_id' => $this->iSensorId ,'value'=>$this->iValue);
        $this->db->insert('subsoil_moisture_001', $data);
        if($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;       
    }

    public function get_last_subsoil($sensor_id)
    {
        $this->db->select('*')
        ->from('subsoil_moisture_001')
        ->where('sensor_id', $sensor_id)
        ->order_by('created_at','desc')
        ->limit(1);
        return $this->db->get()->row_array();
    }

    public function get_subsoil001_trending($pcb_id)
    {
        $query = $this->db->query("SELECT t1.identifier as pcb_identifier, t1.id as pcb_id, 
                t2.id sensor_id, t2.identifier sensor_identifier, t2.type as sensor_type, 
                t3.value as temp_value, t3.created_at as created_at
                from pcbs as t1 left join sensors as t2 on t1.id = t2.pcb_id left join subsoil_moisture_001
                as t3 on t2.id = t3.sensor_id where t1.id = ".$pcb_id." and t2.type = 'SM001' and t3.created_at >= NOW() - INTERVAL 3 DAY 
                ORDER BY t2.id asc, t3.created_at asc;"
            );
        return $query->result_array();
        
    }

}