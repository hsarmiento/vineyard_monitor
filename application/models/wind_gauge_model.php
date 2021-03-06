<?php

class Wind_gauge_model extends CI_Model {

	var $iSensorId = 0;
	var $iValue = 0;
    var $sDirection = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function initialize($sensor_id, $value, $direction)
    {
        $this->iSensorId = $sensor_id;
        $this->iValue = $value;
        $this->sDirection = $direction;

    }

    public function save_wind_value()
    {
        $data = array('sensor_id' => $this->iSensorId ,'value'=>$this->iValue, 'direction' => $this->sDirection, 'created_at' => date('Y-m-d H:i:s',(time())+(10800)));
        $this->db->insert('wind_gauge', $data);
        if($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;       
    }

    public function get_last_wind($sensor_id)
    {
        $this->db->select('*')
        ->from('wind_gauge')
        ->where('sensor_id', $sensor_id)
        ->order_by('created_at','desc')
        ->limit(1);
        return $this->db->get()->row_array();
    }

    public function get_wind_trending($pcb_id, $day)
    {
        $query = $this->db->query("SELECT t1.identifier as pcb_identifier, t1.id as pcb_id, 
                t2.id sensor_id, t2.identifier sensor_identifier, t2.type as sensor_type, 
                t3.value as temp_value, t3.created_at as created_at
                from pcbs as t1 left join sensors as t2 on t1.id = t2.pcb_id left join wind_gauge
                as t3 on t2.id = t3.sensor_id where t1.id = ".$pcb_id." and t2.type = 'WG' and t3.created_at >= NOW() - INTERVAL ".$day." DAY 
                ORDER BY t2.id asc, t3.created_at asc;"
            );
        return $query->result_array();
        
    }

}