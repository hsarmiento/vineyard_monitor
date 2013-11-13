<?php
	// echo '<pre>';
	// print_r($aData);
	// print_r($aPcbName);
	// echo '</pre>';	
	$data = array();
	$data['vineyard_name'] = $sVineyardName;
	foreach ($aPcbName as $pcb)
	{
		$data[$pcb] = $aData[$pcb];
	}
	echo json_encode($data);
?>