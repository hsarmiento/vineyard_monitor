<?php

class Temperature_model extends CI_Model {

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

    public function save_temperature_value()
    {
        $data = array('sensor_id' => $this->iSensorId ,'value'=>$this->iValue);
        $this->db->insert('temperature', $data);
        if($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;       
    }

    public function get_last_temperatures($iPcbId, $iLimit = 2)
    {
        $this->db->select('temperature.sensor_id,temperature.value as heat,sensors.identifier as sensor_name,pcb.identifier as pcb_name,temperature.created_at');
        $this->db->from('temperature');
        $this->db->join('sensors', 'sensors.id = temperature.sensor_id');
        $this->db->join('pcb', 'pcb.id = sensors.pcb_id and pcb.id ='.$iPcbId);
        $this->db->order_by('temperature.id','desc');
        $this->db->limit($iLimit);
        $query = $this->db->get();
        // esta linea muestra la ultima consulta ejecutada en la db
        // echo $this->db->last_query();
        return $query->result_array();
    }

    public function max_temperature_compare($sensor_id, $current_temp = 0)
    {
        $this->db->select('max_temperature');
        $this->db->from('sensors_settings');
        $this->db->where('sensor_id',$sensor_id);
        $this->db->order_by('created_at','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $aMaxTemperature = $query->row_array();
            if($aMaxTemperature['max_temperature'] < $current_temp){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }  
    }

    public function check_turn_on_one_hour($sensor_id, $current_temp)
    {
       $query = $this->db->query('SELECT * from temperature where sensor_id = '.$sensor_id.' and TIMESTAMPDIFF(MINUTE, created_at, now()) >= 60 
                and TIMESTAMPDIFF(MINUTE, created_at, now()) < 80 order by created_at desc limit 1');
        if($query->num_rows()>0){
           $aOneHourBefore = $query->row_array(); 
           if(4 <= ($current_temp - $aOneHourBefore['value']) && ($current_temp - $aOneHourBefore['value']) <= 10 && $aOneHourBefore['value'] > 90 && $current_temp > 90 ){
                return TRUE;

            }
        }
        return FALSE; 
    }

    public function check_turn_off_one_hour($sensor_id, $current_temp)
    {
        $query = $this->db->query('SELECT * from temperature where sensor_id = '.$sensor_id.' and TIMESTAMPDIFF(MINUTE, created_at, now()) >= 60 
                and TIMESTAMPDIFF(MINUTE, created_at, now()) < 80 order by created_at desc limit 1');
        if($query->num_rows()>0){
           $aOneHourBefore = $query->row_array(); 
           if(20 <= ($aOneHourBefore['value'] - $current_temp)  && $aOneHourBefore['value'] > 90 && $current_temp > 90 ){
                return TRUE;

            }
        }
        return FALSE; 
    }

    public function get_last_temperature($sensor_id)
    {
        $this->db->select('*')
        ->from('temperature')
        ->where('sensor_id', $sensor_id)
        ->order_by('created_at','desc')
        ->limit(1);
        return $this->db->get()->row_array();
    }
}