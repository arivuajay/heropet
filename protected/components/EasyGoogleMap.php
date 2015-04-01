<?php

class EasyGoogleMap {
    /* Find lat long based on address (address to latlong) */

    public function __construct() {
        // import the library
        Yii::import('ext.gmap.*');
    }

    public static function getCurrentPosition($address) {
        /* Get Current lat long based on address */
        $gMap = new EGMap();

        $current_address = $address;

        // Create geocoded address
        $geocoded_address = new EGMapGeocodedAddress($current_address);
        $geocoded_address->geocode($gMap->getGMapClient());
        $geocoded_address->reverseGeocode($gMap->getGMapClient());

        // get lat long of pickup point
        $current_position = array();
        $current_position['lat'] = $geocoded_address->getLat();
        $current_position['lng'] = $geocoded_address->getLng();
        $current_position['country'] = $geocoded_address->getGeocodedCountry();
        $current_position['country_code'] = $geocoded_address->getGeocodedCountryCode();
        $current_position['state'] = $geocoded_address->getGeocodedState();
        $current_position['state_code'] = $geocoded_address->getGeocodedStateCode();
        $current_position['city'] = $geocoded_address->getGeocodedCity();

        return $current_position;
    }

    public function getPetsMap($lost_pets) {

        $gMap = new EGMap();
        $gMap->width = '100%';
        $gMap->zoom = 3;
        $gMap->setCenter($lost_pets[0]['latitude'], $lost_pets[0]['longitude']);

        foreach ($lost_pets as $key => $lost_pet) {
            $info_box_{$key} = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">'.$lost_pet["pet_name"].'</div>');
            // Create marker
            $marker_{$key} = new EGMapMarker($lost_pet["latitude"], $lost_pet["longitude"], array('title' => 'Marker With Info Box'));
            $marker_{$key}->addHtmlInfoBox($info_box_{$key});
            $gMap->addMarker($marker_{$key});
        }
        
        $gMap->centerOnMarkers();

        $gMap->renderMap();
    }

}
