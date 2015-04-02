<?php

class EasyGoogleMap {

    public function __construct() {
        // import the library
        Yii::import('ext.gmap.*');
    }

    /* Find lat long based on address (address to latlong) */

    public static function getCurrentPosition($address) {
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

    /* Find address based on latlong (latlong to address) */

    public function gethpetCurrentAddress($lat, $lng) {
        $get_address_from_latlng = new EGMapClient();
        
        $raw_data = $get_address_from_latlng->getReverseGeocodingInfo($lat, $lng);
        
        $geocoded_array = CJSON::decode($raw_data, true);
        $result = $geocoded_array['results'][0];
        $address_components = $result['address_components'];

        $return_data = array();

        foreach ($address_components as $component) {
            foreach ($component['types'] as $type) {
                switch ($type) {
                    case 'street_address':
                    case 'route':
                        $return_data['hpet_geo_street'] = $component['long_name'];
                        break;

                    case 'country':
                        $return_data['hpet_geo_country'] = $component['long_name'];
                        $return_data['hpet_geo_country_code'] = $component['short_name'];
                        break;

                    case 'locality':
                        $return_data['hpet_geo_city'] = $component['long_name'];
                        break;

                    case 'postal_code':
                        $return_data['hpet_geo_postal_code'] = $component['long_name'];
                        break;

                    case 'administrative_area_level_1':
                        $return_data['hpet_geo_state'] = $component['long_name'];
                        $return_data['hpet_geo_state_code'] = $component['short_name'];
                        break;

                    default:
                    // Do nothing
                }
            }
        }
        return $return_data;
    }

    public function getPetsMap($pet_details) {
        $gMap = new EGMap();
        
        $gMap->width = '100%';
        $gMap->zoom = 3;
        $gMap->setCenter($pet_details[0]['latitude'], $pet_details[0]['longitude']);

        foreach ($pet_details as $key => $pet_detail) {
            $info_box_{$key} = new EGMapInfoBox('<div style="color:#000; border: 1px solid black; margin-top: 8px; background: #fff; padding: 5px;">' . $pet_detail["pet_name"] . '</div>');
            
            // Create marker
            $marker_{$key} = new EGMapMarker($pet_detail["latitude"], $pet_detail["longitude"], array('title' => 'Marker With Info Box'));
            $marker_{$key}->addHtmlInfoBox($info_box_{$key});
            $gMap->addMarker($marker_{$key});
        }

        $gMap->centerOnMarkers();

        $gMap->renderMap();
    }

}
