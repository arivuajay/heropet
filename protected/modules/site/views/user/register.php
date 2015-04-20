<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Register User';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php

$this->renderPartial('_form', array(
    'model' => $model,
    'user_profile' => $user_profile,
    'countries_list' => $countries_list,
    'country_dialing_code' => $country_dialing_code,
));
?>