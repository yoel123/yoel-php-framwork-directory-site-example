<?php

function get_loc($ymap,$loc,$op="marker",$html='')
{
	$Return = 0;
	
	$pos = $ymap->getLatLng($loc, MapBuilder::URL_FETCH_METHOD_SOCKETS);
	if(!$pos){return;}	
	if($op == "marker")
	{
		if(!is_array($pos)){return;}
			// Add a marker with specified color and symbol. 
		$ymap->addMarker($pos['lat'], $pos['lng'], array(
			'title' => $loc, 
			'defColor' => '#FA6D6D', 
			'html' => $html,
			 'infoCloseOthers' => true
		));
	}
	elseif($op =="center")
	{
		// Set map's center position by latitude and longitude coordinates. 
		$ymap->setCenter($pos['lat'], $pos['lng']);
		
	}
	elseif($op =="both")
	{
		//print_r( $pos);
		// Set map's center position by latitude and longitude coordinates. 
		$ymap->setCenter($pos['lat'], $pos['lng']);
			// Add a marker with specified color and symbol. 
		$ymap->addMarker($pos['lat'], $pos['lng'], array(
			'title' => $loc, 
			'defColor' => '#FA6D6D', 
			'html' => $html,
			 'infoCloseOthers' => true 
		));
			
	}
		
	return $pos;
	
}//end get loc

/*
$map = new MapBuilder();
$pos = get_loc($map,"tel aviv","both","hacker hacker");
$map->setMapTypeId(MapBuilder::MAP_TYPE_ID_ROADMAP); 
echo "<div class='y_map'>";
$map->show();
echo "</div>";

function yshop_single()
{
	$map = new MapBuilder();
	if(!isset($_GET['id'])){return;}
	$id = mysql_real_escape_string($_GET['id']);
	
	$sel = y_select('users',"id='".$id."' AND user_type ='0'","0,100");
	$row = mysql_fetch_array($sel);
	$adress = $row['house_num']." ".$row['street']." ".$row['city'];
    $pos = get_loc($map,$adress,"both",$adress." ".$row['name']);
	
	echo "<div class='shop_datastuff'>";
	echo "<h1>".$row['name']."</h1>";
	echo "?????</br><a href = 'tel:".$row['phone']."'>".$row['phone']."</a></br> ???</br>".$row['fax']."</br>??????</br> <a href = 'tel:".$row['mobile']."'>".$row['mobile']."</a> <br>";//.$row['commants'];
	echo "</br>????? </br>".$adress;
	echo "</div>";
	//set roadmap 
	$map->setMapTypeId(MapBuilder::MAP_TYPE_ID_ROADMAP); 
	echo "<div class='shop_map'>";
	$map->show();
	echo "</div>";
	
	
	
}//end yshop_single

function all_shops_map()
{
	$map = new MapBuilder();
	//$pos = get_loc($map," ???? ????? ????","both",'test');
	// Select data and add markers using that data.
	$table= "users";
	$result = mysql_query("SELECT * FROM ".$table." WHERE activated =1 AND user_type=0") or die(mysql_error());
	$i = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$adress = $row['house_num']." ".$row['street']." ".$row['city'];

		$pos = get_loc($map,$adress,"marker",$adress." ".$row['name']);
		
		$i++;
	}
	$pos = get_loc($map,"israel","center",$adress." ".$row['name']);
	$map->setZoom(7); 
	//set roadmap 
	$map->setMapTypeId(MapBuilder::MAP_TYPE_ID_ROADMAP); 
	echo "<div class = 'all_map'>";
	$map->show();
	echo "</div>";
}//end all_shops_map


*/

?>