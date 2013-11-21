<?php

class Position_model extends CI_Model
{
	var $iPcbId = 0;
	var $fLatitude = 0.0;
	var $fLongitude = 0.0;

	public function __construct()
    {
        parent::__construct();
    }

    public function initialize($pcb_id, $latitude, $longitude)
    {
        $this->iPcbId = $pcb_id;
        $this->fLatitude = $latitude;
        $this->fLongitude = $longitude;
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

    public function get_last_position($iPcbId)
    {
    	$this->db->order_by('id','desc');
    	$this->db->limit(1);
    	$query = $this->db->get_where('positions',array('pcb_id' => $iPcbId));
        // echo $this->db->last_query();
    	return $query->result_array();
    }

    public function save_position(){

        $data = array('pcb_id' => $this->iPcbId ,'latitude'=>$this->fLatitude, 'longitude' => $this->fLongitude, 'created_at' => date('Y-m-d H:i:s',(time())+(10800)));
        $this->db->insert('positions', $data);
        if($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    public function max_com_loss_time_compare($pcb_id)
    {
        $this->load->model('pcb_setting_model');
        $iLastLossValue = $this->pcb_setting_model->get_last_value($pcb_id);
        $this->db->select('TIMESTAMPDIFF(SECOND, created_at, NOW()) as diff');
        $this->db->from('position');
        $this->db->where('pcb_id', $pcb_id);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(1);
        $aDiff = $this->db->get()->row_array();
        if($aDiff['diff'] > $iLastLossValue['max_com_loss_time']){
            return TRUE;
        }
        return FALSE;
    }

}