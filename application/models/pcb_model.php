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
        $query = $this->db->get('pcb');
        return $query->result_array();
    }

    public function get_trending_temperature($pcb_id)
    {
        $query = $this->db->query('SELECT pcb.id as pcb_id, sensors.id as sensor_id, sensors.identifier 
                as sensor_identifier, temperature.value as t_value, temperature.created_at as created_at 
                FROM (pcb) LEFT JOIN sensors ON pcb.id = sensors.pcb_id 
                JOIN temperature ON sensors.id = temperature.sensor_id WHERE pcb.id = '.$pcb_id.' 
                and temperature.created_at >= NOW() - INTERVAL 3 DAY 
                ORDER BY sensors.id asc, temperature.created_at asc'
            );
        return $query->result_array();
        
    }

    public function get_pcb_id_with_identifier($identifier)
    {
        $this->db->select('id')
        ->from('pcb')
        ->where('identifier', $identifier);
        $aQuery = $this->db->get()->row_array();
        return $aQuery['id'];
    }

    public function get_sensor_heater_with_pcb($pcb_id)
    {
        // para servidor
        // $query = $this->db->query('select t1.id as pcb_id, t1.identifier as pcb_identifer, 
        //     t2.id as sensor_id, t2.identifier as sensor_identifier,
        //     t3.status as status, date_add(t3.created_at, interval 2 hour) as created_at,
        //     date_add(t3.stopped_at , interval 2 hour) as stopped_at, t4.value as temperature from pcb as t1 join 
        //     sensors as t2 on t1.id = t2.pcb_id 
        //     join heaters as t3 on t2.id = t3.sensor_id 
        //     left join temperature as t4 on t2.id = t4.sensor_id where t1.id = '.$pcb_id.'
        //     order by t3.id desc limit 1;');

        $query = $this->db->query('select t1.id as pcb_id, t1.identifier as pcb_identifer, 
            t2.id as sensor_id, t2.identifier as sensor_identifier,
            t3.status as status, t3.created_at as created_at,
            t3.stopped_at as stopped_at, t4.value as temperature from pcb as t1 join 
            sensors as t2 on t1.id = t2.pcb_id 
            join heaters as t3 on t2.id = t3.sensor_id 
            left join temperature as t4 on t2.id = t4.sensor_id where t1.id = '.$pcb_id.'
            order by t3.id desc limit 1;');
        return $query->row_array();
    }

    public function get_pcb_id_with_trailer($trailer_id)
    {
        $this->db->select('id')
        ->from('pcb')
        ->where('trailer_id', $trailer_id);
        $aQuery = $this->db->get()->row_array();
        return $aQuery['id'];
    }

}