<?php

class EasyGoogleMap {
    /* Find lat long based on address (address to latlong) */

    public static function getCurrentPosition($address) {
        /* Get Current lat long based on address */
        Yii::import('ext.gmap.*');

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

}
