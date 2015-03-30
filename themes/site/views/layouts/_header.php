<header id="header">
    <div class="container">
        <div class="logo">
            <a href="index.html">
                <?php echo CHtml::link(CHtml::image("{$this->themeUrl}/img/logo.png", 'Porto', array("width"=>290, "height"=>93, "data-sticky-width"=>150, "data-sticky-height"=>48)), array('/'));
                 ?>
            </a>
        </div>
        <div class="search">
            <form id="searchForm" action="page-search-results.html" method="get">
                <div class="input-group">
                    <input type="text" class="form-control search" name="q" id="q" placeholder="Search..." required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <nav>
            <ul class="nav nav-pills nav-top">
                <li>
                    <a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
                </li>
                <li>
                    <a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
                </li>
                <li class="phone">
                    <span><i class="fa fa-phone"></i>(123) 456-7890</span>
                </li>
            </ul>
        </nav>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
            <ul class="social-icons">
                <li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
                <li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
                <li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
            </ul>
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main" id="mainMenu">
<!--                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="index.html">
                            LOST & FOUND										<i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Cat </a></li>
                            <li><a href="index-1.html">dog <span class="tip">hot</span></a></li>
                        </ul>
                    </li>-->

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                            Register
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                            Login
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>