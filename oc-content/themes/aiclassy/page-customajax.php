<?php 
	$action = Params::getParam('action');
	switch ($action)
	{
		case 'cities': //Returns cities given a regionId
			$cities = CityStats::newInstance()->listCities(Params::getParam("regionId"),"!=","city_name ASC");
			echo json_encode($cities);
		break;
	}
?>
