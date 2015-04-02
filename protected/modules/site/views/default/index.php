<div class="slider-container">
    <?php
    $egmap = new EasyGoogleMap();
    if (!empty($lost_pets))
        $egmap->getPetsMap($lost_pets);
    ?>
</div>

<div class="home-intro" id="home-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p>
                    Your just lost your PET. HERO PET will help you to find your beloved animal! <em> Check out our options and features included.</em>
                </p>
            </div>
            <div class="col-md-2">
                <div class="get-started">
                    <?php echo CHtml::link('I LOST MY PET', array('/site/lost/create'), array("class" => "btn btn-lg btn-primary")); ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="get-started">
                    <a href="#" class="btn btn-lg btn-primary"> I FOUND A PET</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="filter-cont"> 
    <div class="container"> 
        <form class="jqtransform">
            <div class="row"> 
                <div class="col-xs-12 col-sm-6 col-md-3 search-fileds">  
                    <?php echo CHtml::image("{$this->themeUrl}/img/map-icon.png") ?>
                    <input name="" type="text" class="map-field" value="PLZ oder Ort eingeben"> </div>

                <div class="col-xs-12 col-sm-6 col-md-3 search-fileds">  
                    <?php echo CHtml::image("{$this->themeUrl}/img/filter-icon.png") ?>
                    <label>With in :</label>
                    <select name="select">
                        <option value="">500 Km</option>
                        <option value="opt1">200 Km</option>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 search-fileds">  


                    <label>Species :</label>
                    <select name="select">
                        <option value="">Dog</option>
                        <option value="opt1">cat</option>
                    </select>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 search-fileds">
                    <label>Breed :</label>
                    <select name="select">
                        <option value=""> Dobermann</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">    
            <div class="heading">  
                <?php echo $lost_pet_msg; ?>
            </div>
        </div>

        <?php
        if (!empty($lost_pets)) {
            foreach ($lost_pets as $lost_pet) {
                $lost_pet_user = User::model()->findByPk($lost_pet['pet_user_id']);
                $lost_pet_user_profile = UserProfile::model()->find('pet_user_id = :pet_user_id', array(':pet_user_id' => $lost_pet['pet_user_id']));
                $lost_pet_photo = LostPhoto::model()->getLostPetPhoto($lost_pet['lost_id']);
                ?>

                <div class="col-xs-12 col-sm-6 col-md-3"> 
                    <div class="search-result-thumb-cont"> 
                        <div class="dog-name"> 
                            <a href="#"><?php echo $lost_pet['pet_name']; ?> <br/> 
                                <span> <?php echo $lost_pet['breed']; ?>  </span>
                            </a> 
                        </div>
                        <a href="#">
                            <?php if (!empty($lost_pet_photo) && isset($lost_pet_photo->photos)) { ?>
                                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/pet_lost/' . $lost_pet_photo->photos, $lost_pet_photo->photos, array("class" => "img-responsive")); ?>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="dog-deatils"> 
                        <div class="dog-details-row">
                            <div class="details-icon"><?php echo CHtml::image("{$this->themeUrl}/img/reward-icon.png", '') ?></div>
                            <div class="details-txt"> REWARD: <?php echo $lost_pet['reward']; ?>  €  </div>                        
                        </div>
                        <div class="dog-details-row">
                            <div class="details-icon"><?php echo CHtml::image("{$this->themeUrl}/img/phone.png", '') ?></div>
                            <div class="details-txt"><?php echo $lost_pet_user_profile->user_phone; ?></div>                        
                        </div>
                        <div class="dog-details-row">
                            <div class="details-icon"><?php echo CHtml::image("{$this->themeUrl}/img/map-icon2.png", '') ?></div>
                            <div class="details-txt">  
                                <?php 
                                $address = new EasyGoogleMap();
                                $address_detail = $address->getCurrentPosition($lost_pet['lost_address']);
                                echo $address_detail['city'] . ',' . $address_detail['country']
                                ?>
                               <br/>
                                <?php 
                                echo date("H:i", strtotime($lost_pet['date_of_missing'])) . ' ' . date("d.M Y", strtotime($lost_pet['date_of_missing']));
                                ?>
                            </div>               
                            <div class="small-logo"><?php echo CHtml::image("{$this->themeUrl}/img/small-logo.png", '') ?></div>         
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
        <div class="viewmore"> <a href="#">View more results </a></div>
    </div>
</div>