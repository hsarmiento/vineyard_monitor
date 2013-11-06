<?php

class Subsoil_moisture_05_model extends CI_Model {

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

    public function save_subsoil_05_value()
    {
        $data = array('sensor_id' => $this->iSensorId ,'value'=>$this->iValue);
        $this->db->insert('subsoil_moisture_05', $data);
        if($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;       
    }

}