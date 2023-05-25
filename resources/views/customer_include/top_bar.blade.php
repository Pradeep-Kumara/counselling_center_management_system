<header id="header">
    <div class="container-fluid">
        <div class="navbar">

            <a href="http://localhost/counselling_center_management_system/public/clientInterface" id="logo">
                <img src="{{ URL::asset('assets/images/logo.png')}}" height="100" alt="logo">
            </a>


            <div class="navigation-row">
                <nav id="navigation">
                    <button type="button" class="navbar-toggle"> <i class="fa fa-bars"></i> </button>
                    <div class="nav-box navbar-collapse">
                        <ul class="navigation-menu nav navbar-nav navbars" id="nav">
                            <li data-menuanchor="slide01" class="active"><a href="#slide01">Home</a></li>
                            <li data-menuanchor="slide02"><a href="#slide02">About Us</a></li>
                            <li data-menuanchor="slide03"><a href="#slide03">Services</a></li>
                            <li data-menuanchor="slide04"><a href="#slide04">Contact Us</a></li>
                            <li data-menuanchor="slide05"><a href="signin">Log In</a></li>
                            <li data-menuanchor="slide06"><a href="clientSignup">Sign Up</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>