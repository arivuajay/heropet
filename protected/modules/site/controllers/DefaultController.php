<?php

class DefaultController extends Controller {

    public function actionIndex() {
        if (isset($_COOKIE['hpet_geo_lat']) && isset($_COOKIE['hpet_geo_lng'])) {
            $current_lat = $_COOKIE['hpet_geo_lat'];
            $current_lng = $_COOKIE['hpet_geo_lng'];

            $lost_pets_10 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '< 10');
            $lost_pets_20 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '< 20');
            $lost_pets_50 = Lost::model()->getLostPetsByDistance($current_lat, $current_lng, '> 20');

            if (!empty($lost_pets_10)) {
                $lost_pets = $lost_pets_10;
                setcookie('hpet_geo_dis', '10');
            } elseif (!empty($lost_pets_20)) {
                $lost_pets = $lost_pets_20;
                setcookie('hpet_geo_dis', '20');
            } elseif (!empty($lost_pets_50)) {
                $lost_pets = $lost_pets_50;
                setcookie('hpet_geo_dis', '50');
            }
        } else {
            $lost_pets = Lost::model()->getLostPets();
        }
        $this->render('index', array('lost_pets' => $lost_pets));
    }

}
