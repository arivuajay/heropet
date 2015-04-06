<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $categories = Category::model()->findAll();
        $list_category = CHtml::listData($categories, 'category_id', 'category_name');
        
        if (isset($_REQUEST['place'])) {
            $search_place = $_REQUEST['place'];
        } else {
            $search_place = '';
        }

        if (isset($_REQUEST['distance'])) {
            $search_distance = $_REQUEST['distance'];
        } else {
            $search_distance = '';
        }

        if (isset($_REQUEST['category'])) {
            $search_category = $_REQUEST['category'];
        } else {
            $search_category = '';
        }

        if (isset($_REQUEST['breed'])) {
            $search_breed = $_REQUEST['breed'];
        } else {
            $search_breed = '';
        }

        if ($search_place) {
            $egmap = new EasyGoogleMap();
            $search_place_details = $egmap->getCurrentPosition($search_place);
            $latitude = $search_place_details['lat'];
            $longitude = $search_place_details['lng'];
        } elseif (isset($_COOKIE['hpet_geo_lat']) && isset($_COOKIE['hpet_geo_lng'])) {
            $latitude = $_COOKIE['hpet_geo_lat'];
            $longitude = $_COOKIE['hpet_geo_lng'];
        }

        $lost_pets_result = $this->getLostPetsDetails($latitude, $longitude, $search_distance, $search_category, $search_breed);

        $lost_pets = $lost_pet_msg = '';

        if (!empty($lost_pets_result)) {
            $lost_pets = $lost_pets_result['lost_pets'];
            $lost_pet_msg = $lost_pets_result['lost_pet_msg'];
        }

        $this->render('index', array(
            'lost_pets' => $lost_pets,
            'lost_pet_msg' => $lost_pet_msg,
            'search_place' => $search_place,
            'search_distance' => $search_distance,
            'search_category' => $search_category,
            'search_breed' => $search_breed,
            'list_category' => $list_category,
        ));
    }

    protected function getLostPetsDetails($lat, $lng, $distance = '', $category = '', $breed = '') {
        $egmap = new EasyGoogleMap();
        $current_address = $egmap->gethpetCurrentAddress($lat, $lng);

        $current_street = $current_address['hpet_geo_street'];
        $current_city = $current_address['hpet_geo_city'];
        $current_state = $current_address['hpet_geo_state'];
        $current_state_code = $current_address['hpet_geo_state_code'];
        $current_country = $current_address['hpet_geo_country'];
        $current_country_code = $current_address['hpet_geo_country_code'];
        $current_postal_code = $current_address['hpet_geo_postal_code'];

        $lost_pets = '';
        $lost_pet_msg = '';

        if ($distance) {
            $lost_pets = Lost::model()->getLostPets($lat, $lng, "<", $distance, $category);
            $lost_pet_msg = sprintf("<span>Runaway</span> animals within <span>%sKM</span> from %s, %s, %s.", $distance, $current_city, $current_state, $current_country);
        } else {
            $default_distance = Myclass::defaultDistance();
            foreach ($default_distance as $distance_value) {
                $find_symbol = $distance_value['symbol'];
                $find_distance = $distance_value['distance'];
                $find_msg = $distance_value['msg'];
                
                $lost_pets = Lost::model()->getLostPets($lat, $lng, $find_symbol, $find_distance);
                $lost_pet_msg = sprintf("<span>Runaway</span> animals within <span>%s</span> from %s, %s, %s.", $find_msg, $current_city, $current_state, $current_country);
                if (!empty($lost_pets)) {
                    break;
                }
            }
        }

        $result = array();
        $result['lost_pets'] = $lost_pets;
        $result['lost_pet_msg'] = $lost_pet_msg;
        
        return $result;
    }
}