@extends('customer_include.main')
@section('pageSpecificStyles')
@endsection

@section('pageSpecificContent')

    <div id="video">
        <div class="preloader">
            <div class="preloader-bounce">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Background Video Start-->
            {{-- <video autoplay muted loop id="myVideo">
            <source src="{{ URL::asset('assets\images\video-bg.mp4') }}" type="video/mp4">
            </video>--}}
        <!-- Background Video End-->

        <div id="fullpage" class="fullpage-default">

            <div class="section animated-row" data-section="slide01">
                <div class="section-inner">
                    <div class="welcome-box">
                        <span class="welcome-first animate" data-animate="fadeInUp">Hello, welcome to</span>
                        <h1 class="welcome-title animate" data-animate="fadeInUp">global minds</h1>
                        <p class="animate" data-animate="fadeInUp">Our Vision is to “Build a Mindful Nation”. Global Minds is an organization which offers counselling, consultations and psycho-therapeutic services. These services will help people gain personal and professional development.</p>
                        <div class="scroll-down next-section animate data-animate="fadeInUp""><img src="images/mouse-scroll.png" alt=""><span>Scroll Down</span></div>
                </div>
            </div>
        </div>

        <div class="section animated-row" data-section="slide02">
            <div class="section-inner">
                <div class="about-section">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 wide-col-laptop">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-contentbox">

                                        <div class="animate" data-animate="fadeInUp">
                                            <span>About Us</span>
                                            <h2>Who we are?</h2>
                                            <p>GLOBAL MINDS is an organization which offers counselling, consultations and psycho-therapeutic services. These services will help people gain personal and professional development.</p>
                                        </div>

                                        <div class="facts-list owl-carousel">

                                            <div class="item animate" data-animate="fadeInUp">
                                                <div class="counter-box">
                                                    <i class="fa fa-trophy counter-icon" aria-hidden="true"></i><span class="count-number">5</span> Awards Won
                                                </div>
                                            </div>

                                            <div class="item animate" data-animate="fadeInUp">
                                                <div class="counter-box">
                                                    <i class="fa fa-smile-o counter-icon" aria-hidden="true"></i><span class="count-number">2500</span> Happy Clients
                                                </div>
                                            </div>

                                            <div class="item animate" data-animate="fadeInUp">
                                                <div class="counter-box">
                                                    <i class="fa fa-desktop counter-icon" aria-hidden="true"></i><span class="count-number">12</span> Years Experience
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <figure class="about-img animate" data-animate="fadeInUp"><img src="images/profile-girl.jpg" class="rounded" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section animated-row" data-section="slide03">
            <div class="section-inner">
                <div class="row justify-content-center">
                    <div class="col-md-8 wide-col-laptop">

                        <div class="title-block animate" data-animate="fadeInUp">
                            <span>Services</span>
                            <h2>What We Do?</h2>
                        </div>

                        <div class="services-section">
                            <div class="services-list owl-carousel">

                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="service-box">
                                        <span class="service-icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                                        <h3>Counselling</h3>
                                        <p>We provide specialized psychological services for children, adolescents, and adults of all ages. </p>
                                    </div>
                                </div>

                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="service-box">
                                        <span class="service-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                        <h3>Training Programmes</h3>
                                        <p>We conduct training programs to enhance critical and creative thinking to meet up with organizational and personal targets.</p>
                                    </div>
                                </div>

                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="service-box">
                                        <span class="service-icon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                                        <h3>Psycho Therapeutic Services</h3>
                                        <p>Relaxation techniques are vital tools to reduce stress symptoms and help to increase the quality of life. </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="section animated-row" data-section="slide04">
            <div class="section-inner">
                <div class="row justify-content-center">
                    <div class="col-md-7 wide-col-laptop">
                        <div class="title-block animate" data-animate="fadeInUp">
                            <span>My Skills</span>
                            <h2>What i’m good?</h2>
                        </div>
                        <div class="skills-row animate" data-animate="fadeInDown">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="skill-item">
                                        <h6>HTML CSS</h6>
                                        <div class="skill-bar">
                                            <span>70%</span>
                                            <div class="filled-bar"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <h6>PSD Design</h6>
                                        <div class="skill-bar">
                                            <span>90%</span>
                                            <div class="filled-bar-2"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <h6>Social Media</h6>
                                        <div class="skill-bar">
                                            <span>70%</span>
                                            <div class="filled-bar"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item last-skill">
                                        <h6>Leadership</h6>
                                        <div class="skill-bar">
                                            <span>90%</span>
                                            <div class="filled-bar-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        {{--<div class="section animated-row" data-section="slide06">
            <div class="section-inner">
                <div class="row justify-content-center">
                    <div class="col-md-8 wide-col-laptop">
                        <div class="title-block animate" data-animate="fadeInUp">
                            <span>My Work</span>
                            <h2>what i’ve done?</h2>
                        </div>
                        <div class="gallery-section">
                            <div class="gallery-list owl-carousel">
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-1.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap CSS templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-2.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap themes.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-3.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap layouts.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-1.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-2.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download Bootstrap CSS templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-3.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-1.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-2.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap templates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item animate" data-animate="fadeInUp">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('user_assets/images/item-3.jpg') }}" alt="">
                                        </div>
                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                            <h4>templatemo is the best</h4>
                                            <p>Please tell your friends about it. Templatemo is the best website to download free Bootstrap templates.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        {{--<div class="section animated-row" data-section="slide05">
            <div class="section-inner">
                <div class="row justify-content-center">
                    <div class="col-md-8 wide-col-laptop">
                        <div class="title-block animate" data-animate="fadeInUp">
                            <span>TESTIMONIALS</span>
                            <h2>what THEY SAY?</h2>
                        </div>
                        <div class="col-md-8 offset-md-2">
                            <div class="testimonials-section">
                                <div class="testimonials-slider owl-carousel">
                                    <div class="item animate" data-animate="fadeInUp">
                                        <div class="testimonial-item">
                                            <div class="client-row">
                                                <img src="{{ URL::asset('user_assets/images/profile-01.jpg') }}" class="rounded-circle" alt="profile 1">
                                            </div>
                                            <div class="testimonial-content">
                                                <h4>Sandar</h4>
                                                <p>"Ut varius leo eu mauris lacinia, eleifend posuere urna gravida. Aenean a mattis lacus."</p>
                                                <span>Managing Director</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item animate" data-animate="fadeInUp">
                                        <div class="testimonial-item">
                                            <div class="client-row">
                                                <img src="{{ URL::asset('user_assets/images/profile-01.jpg') }}" class="rounded-circle" alt="profile 2">
                                            </div>
                                            <div class="testimonial-content">
                                                <h4>Shinn</h4>
                                                <p>"Nam iaculis, leo nec facilisis sollicitudin, dui massa tempus odio, vitae malesuada ante elit vitae eros."</p>
                                                <span>CEO and Founder</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item animate" data-animate="fadeInUp">
                                        <div class="testimonial-item">
                                            <div class="client-row">
                                                <img src="{{ URL::asset('user_assets/images/profile-01.jpg') }}" class="rounded-circle" alt="profile 3">
                                            </div>
                                            <div class="testimonial-content">
                                                <h4>Marlar</h4>
                                                <p>"Etiam efficitur, tortor facilisis finibus semper, diam magna fringilla lectus, et fringilla felis urna posuere tortor."</p>
                                                <span>Chief Marketing Officer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="section animated-row" data-section="slide07">
            <div class="section-inner">
                <div class="row justify-content-center">
                    <div class="col-md-7 wide-col-laptop">
                        <div class="title-block animate" data-animate="fadeInUp">
                            <span>Contact</span>
                            <h2>Get In Touch!</h2>
                        </div>
                        <div class="contact-section">
                            <div class="row">
                                <div class="col-md-6 animate" data-animate="fadeInUp">
                                    <div class="contact-box">
                                        <div class="contact-row">
                                            <i class="fa fa-map-marker"></i> No. 26B, Nugegoda Road, Pepiliyana, Sri Lanka.

                                        </div>
                                        <div class="contact-row">
                                            <i class="fa fa-phone"></i> 0114 320 942
                                        </div>
                                        <div class="contact-row">
                                            <i class="fa fa-envelope"></i> globalmindsoffice@gmail.com
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 animate" data-animate="fadeInUp">
                                    <form id="ajax-contact" method="post" action="#">
                                        <div class="input-field">
                                            <input type="text" class="form-control" name="name" id="name" required placeholder="Name">
                                        </div>
                                        <div class="input-field">
                                            <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                                        </div>
                                        <div class="input-field">
                                            <textarea class="form-control" name="message" id="message" required placeholder="Message"></textarea>
                                        </div>
                                        <button class="btn" type="submit">Submit</button>
                                    </form>
                                    <div id="form-messages" class="mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div id="social-icons">
        <div class="text-right">
            <ul class="social-icons">
                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fa fa-behance"></i></a></li>
            </ul>
        </div>
    </div>--}}
    </div>


@endsection

@section('pageSpecificScript')
@endsection

