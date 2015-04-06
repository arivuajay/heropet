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

    //Map Basic Setup
    protected function getMapBasicSetUp($lat, $lng) {
        $gMap = new EGMap(array('minZoom' => 1));
        $gMap->width = '100%';
        $gMap->zoom = 3;

        $mapTypeControlOptions = array(
            'position' => EGMapControlPosition::LEFT_BOTTOM,
            'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
        );

        $gMap->mapTypeControlOptions = $mapTypeControlOptions;

        $gMap->setCenter($lat, $lng);

        return $gMap;
    }

    //Create Map Markers
    protected function createCustomMarker($lat, $lng, $information, $title, $icon = FALSE) {
        // Create GMapInfoWindows
        $info_window = new EGMapInfoWindow($information);

        if ($icon) {
            $icon_image = Yii::app()->theme->baseUrl . '/img/pet_icon.png';

            $icon = new EGMapMarkerImage($icon_image);

            $icon->setSize(30, 30);
            $icon->setAnchor(16, 16.5);
            $icon->setOrigin(0, 0);
            // Create marker
            $marker = new EGMapMarker($lat, $lng, array('title' => $title, 'icon' => $icon));
        } else {
            // Create marker
            $marker = new EGMapMarker($lat, $lng, array('title' => $title));
        }

        $marker->addHtmlInfoWindow($info_window);

        return $marker;
    }

    public function getHomePageMap($lost_pets = array(), $found_pets = array()) {
        //Basic Setup
        $gMap = $this->getMapBasicSetUp($lost_pets[0]['latitude'], $lost_pets[0]['longitude']);

        if (!empty($lost_pets)) {
            foreach ($lost_pets as $key => $value) {
                $information = "<div>{$value['pet_name']}</div>";
                $title = $value['pet_name'];
                $marker = $this->createCustomMarker($value['latitude'], $value['longitude'], $information, $title, TRUE);
                $gMap->addMarker($marker);
            }
        }

        // enabling marker clusterer just for fun
        // to view it zoom-out the map
        $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

        $gMap->renderMap();
    }

    public function getMapBylatlng($lat, $lng) {
        //Basic Setup
        $gMap = $this->getMapBasicSetUp($lat, $lng);
        
        $information = "<div>This is your current location</div>";
        $title = "Current Location";
        $marker = $this->createCustomMarker($lat, $lng, $information, $title);
        $gMap->addMarker($marker);

        $gMap->renderMap();
    }

//    public function getPetsMap($pet_details) {
//
//        //basic setup
//        $gMap = new EGMap(array('minZoom' => 2));
//        $gMap->setHeight(552);
//        $gMap->setWidth(1000);
//        $gMap->zoom = 10;
//        $gMap->setCenter($pet_details[0]['latitude'], $pet_details[0]['longitude']);
//
//        //setup marker icon
//        $icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/car.png");
//        $icon->setSize(30, 30);
//        $icon->setAnchor(16, 16.5);
//        $icon->setOrigin(0, 0);
//
//        $markers = array();
//        foreach ($pet_details as $key => $pet_detail) {
//            ${'marker' . $key} = new EGMapMarker(
//                    $pet_detail["latitude"], $pet_detail["longitude"], array(
//                'title' => 'Marker With Info Box',
//                'icon' => $icon,
//                    )
//            );
//            ${'info_window' . $key} = new EGMapInfoWindow('<div>I am a marker A with custom image!</div>');
//            ${'marker' . $key}->addHtmlInfoWindow(${'info_window' . $key});
//            $gMap->addMarker(${'marker' . $key});
//            $markers[] = ${'marker' . $key};
//        }
//
//        //try to map center and zoom them:
//        $gMap->centerAndZoomOnMarkers(0.5);
//
//        $gMap->renderMap();
//    }
//
//    protected function getPreparedMap($map_options = array()) {
//        $gMap = new EGMap(array('minZoom' => 2));
//        $gMap->width = '100%';
////        $gMap->height = 300;
//        $gMap->zoom = 10;
//        $mapTypeControlOptions = array(
//            'position' => EGMapControlPosition::LEFT_BOTTOM,
//            'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
//        );
//
//        $gMap->mapTypeControlOptions = $mapTypeControlOptions;
//
//        $gMap->setCenter(39.721089311812094, 2.91165944519042);
//
//        // Create GMapInfoWindows
//        $info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
//
//        $icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/gazstation.png");
//
//        $icon->setSize(32, 37);
//        $icon->setAnchor(16, 16.5);
//        $icon->setOrigin(0, 0);
//
//        // Create marker
//        $marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Custom Image', 'icon' => $icon));
//        $marker->addHtmlInfoWindow($info_window_a);
//        $gMap->addMarker($marker);
//
//// Create marker with label
//        $marker = new EGMapMarkerWithLabel(39.821089311812094, 2.90165944519042, array('title' => 'Marker With Label'));
//
//        $label_options = array(
//            'backgroundColor' => 'yellow',
//            'opacity' => '0.75',
//            'width' => '100px',
//            'color' => 'blue'
//        );
//
//        /*
//          // Two ways of setting options
//          // ONE WAY:
//          $marker_options = array(
//          'labelContent'=>'$9393K',
//          'labelStyle'=>$label_options,
//          'draggable'=>true,
//          // check the style ID
//          // afterwards!!!
//          'labelClass'=>'labels',
//          'labelAnchor'=>new EGMapPoint(22,2),
//          'raiseOnDrag'=>true
//          );
//
//          $marker->setOptions($marker_options);
//         */
//
//// SECOND WAY:
//        $marker->labelContent = '$425K';
//        $marker->labelStyle = $label_options;
//        $marker->draggable = true;
//        $marker->labelClass = 'labels';
//        $marker->raiseOnDrag = true;
//
//        //$marker->setLabelAnchor(new EGMapPoint(22, 0));
//
//        $marker->addHtmlInfoWindow($info_window_b);
//
//        $gMap->addMarker($marker);
//
//// enabling marker clusterer just for fun
//// to view it zoom-out the map
//        $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
//
//        $gMap->renderMap();
//    }
}
