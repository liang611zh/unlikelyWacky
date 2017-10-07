<?php

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  This routine calculates the distance between two points (given the     :*/
/*::  latitude/longitude of those points). It is being used to calculate     :*/
/*::  the distance between two locations using GeoDataSource(TM) Products    :*/
/*::                                                                         :*/
/*::  Definitions:                                                           :*/
/*::    South latitudes are negative, east longitudes are positive           :*/
/*::                                                                         :*/
/*::  Passed to function:                                                    :*/
/*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
/*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
/*::    unit = the unit you desire for results                               :*/
/*::           where: 'M' is statute miles (default)                         :*/
/*::                  'K' is kilometers                                      :*/
/*::                  'N' is nautical miles                                  :*/
/*::  Worldwide cities and other features databases with latitude longitude  :*/
/*::  are available at http://www.geodatasource.com                          :*/
/*::                                                                         :*/
/*::  For enquiries, please contact sales@geodatasource.com                  :*/
/*::                                                                         :*/
/*::  Official Web site: http://www.geodatasource.com                        :*/
/*::                                                                         :*/
/*::         GeoDataSource.com (C) All Rights Reserved 2017		   		     :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}



echo "Smithers Airport(YYD) ------>  Burns Lake Airport(YPZ) ". distance(54.825278, -127.182778, 54.376389,  -125.951389, "K") . " Kilometers<br>";
echo "Smithers Airport(YYD) ------>  Dease Lake Airport(YDL)  ". distance(54.825278, -127.182778, 58.422222, -130.032222, "K") . " Kilometers<br>";
echo "Smithers Airport(YYD) ------>  Stewart Aerodrome(ZST) ". distance(54.825278, -127.182778, 55.933333, -129.983333, "K") . " Kilometers<br>";


echo "Burns Lake Airport(YPZ) ------>  Dease Lake Airport(YDL) ". distance( 54.376389,  -125.951389,58.422222, -130.032222, "K") . " Kilometers<br>";

echo "Burns Lake Airport(YPZ)------>  Stewart Aerodrome(ZST) ". distance(54.376389,  -125.951389, 55.933333, -129.983333, "K") . " Kilometers<br>";
echo "Dease Lake Airport(YDL) ------>  Stewart Aerodrome(ZST) ". distance(58.422222, -130.032222, 55.933333, -129.983333, "K") . " Kilometers<br>";
