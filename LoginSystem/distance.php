<!DOCTYPE html>
<html>
<body>

<?php
function calculateDistance($lat1, $lon1, $lat2, $lon2){
        $R = 6371; // km
        $dLat = convertRadians($lat2-$lat1);
        $dLon = convertRadians($lon2-$lon1);
        $lat1 = convertRadians($lat1);
        $lat2 = convertRadians($lat2);

        $a = sin($dLat/2) * sin($dLat/2) +sin($dLon/2) * sin($dLon/2) * cos($lat1) * cos($lat2); 
        $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
        $d = $R * $c;
        return $d;
}

// Converts numeric degrees to radians
function convertRadians($Value) 
{
    return $Value * pi() / 180;
}
//calculateDistance(43.8561,79.3370,43.6532,79.3832)
?>

</body>
</html>
