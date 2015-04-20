<header id="header">
    <div class="container">
        <div class="logo">
            <?php echo CHtml::link(CHtml::image("{$this->themeUrl}/img/logo.png", 'HeroPet', array("width" => 290, "height" => 93, "data-sticky-width" => 150, "data-sticky-height" => 48)), array('/'));
            ?>
        </div>
        <div class="search">
            <div id="polyglotLanguageSwitcher">
                <form action="#">
                    <select id="polyglot-language-options">
                        <option id="en" value="en" selected>&nbsp;</option>
                        <option id="fr" value="fr">&nbsp;</option>
                        <option id="de" value="de">&nbsp;</option>
                        <option id="it" value="it">&nbsp;</option>
                        <option id="es" value="es">&nbsp;</option>
                    </select>
                </form>
            </div>
        </div>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main" id="mainMenu">
                    <li><?php echo CHtml::link('Lost & Found <i class="fa fa-angle-down"></i>'); ?></li>
                    <li><?php echo CHtml::link('Buy & Sell <i class="fa fa-angle-down"></i>'); ?></li>
                    <li><?php echo CHtml::link('Online Tiermesse <i class="fa fa-angle-down"></i>'); ?></li>
                    <li><?php echo CHtml::link('Voting <i class="fa fa-angle-down"></i>'); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</header>