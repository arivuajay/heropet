<?php

class DefaultController extends Controller {

    public function actionIndex() {
        if (isset($_COOKIE['hpet_geo_lat']) && isset($_COOKIE['hpet_geo_lng'])) {

            $current_lat = $_COOKIE['hpet_geo_lat'];
            $current_lng = $_COOKIE['hpet_geo_lng'];

            $egmap = new EasyGoogleMap();
            $current_address = $egmap->gethpetCurrentAddress($current_lat, $current_lng);

            $current_street = $current_address['hpet_geo_street'];
            $current_city = $current_address['hpet_geo_city'];
            $current_state = $current_address['hpet_geo_state'];
            $current_state_code = $current_address['hpet_geo_state_code'];
            $current_country = $current_address['hpet_geo_country'];
            $current_country_code = $current_address['hpet_geo_country_code'];
            $current_postal_code = $current_address['hpet_geo_postal_code'];

            $lost_pets_10 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '< 10');
            $lost_pets_20 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '< 20');
            $lost_pets_50 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '< 50');
            $lost_pets_above_50 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '> 50');

            $lost_pets = '';
            $lost_pet_msg = '';
            if (!empty($lost_pets_10)) {
                $lost_pets = $lost_pets_10;
                $distance = '10KM';
            } elseif (!empty($lost_pets_20)) {
                $lost_pets = $lost_pets_20;
                $distance = '20KM';
            } elseif (!empty($lost_pets_50)) {
                $lost_pets = $lost_pets_50;
                $distance = '50KM';
            } elseif (!empty($lost_pets_above_50)) {
                $lost_pets = $lost_pets_above_50;
                $distance = 'Auto';
            }

            $lost_pet_msg = sprintf("<span>Runaway</span> animals within <span>%s</span> from %s, %s, %s.", $distance, $current_city, $current_state, $current_country);

            $this->render('index', array('lost_pets' => $lost_pets, 'lost_pet_msg' => $lost_pet_msg));
        }
    }

}
