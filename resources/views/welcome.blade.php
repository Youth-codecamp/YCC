<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Code Camp - lets train youth for free</title>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"rel="stylesheet" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/svg+xml">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('chaste/assets/css/style.css')}}">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;900&family=Quicksand:wght@400;500;600;700&display=swap"rel="stylesheet">
</head>

<body>

    <!--
    - HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="#" class="logo">
                <img src="{{ asset('chaste/assets/images/logo-1.png') }}" alt="YCC logo" style="width: 25px; height: 33px;">
            </a>

            <button class="menu-toggle-btn" data-nav-toggle-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <nav class="navbar">
                <ul class="navbar-list">

                    <li>
                        <a href="#hero" class="navbar-link">Home</a>
                    </li>

                    <li>
                        <a href="#about" class="navbar-link">About</a>
                    </li>



                    <li>
                        <a href="#contact" class="navbar-link">Contact Us</a>
                    </li>

                    <li>
                        <a href="#" class="navbar-link">Hackatons</a>
                    </li>

                </ul>

                <div class="header-actions">
                    <a href="{{ route('login') }}" class="header-action-link">Log in</a>

                    <a href="https://bank.hackclub.com/donations/start/youth-code-camp" target="_blank"
                        class="header-action-link">Donate</a>
                </div>
            </nav>

        </div>
    </header>



    <main>
        <article>

            <!--
        - HERO
      -->

            <section class="hero" id="hero">
                <div class="container">

                    <div class="hero-content">
                        <h1 class="h1 hero-title">Youth Code Camp</h1>

                        <p class="hero-text">
                            Youth code camp is a non-profit community which help youth to promote their programming
                            skills.
                        </p>

                        <p class="form-text">
                            After joining our community you will start to use youth code camp resources.
                        </p>

                        <form class="hero-form" action="https://formsubmit.co/liochastej@email.com" method="post">
                            <input type="email" name="email" required placeholder="Enter Your Email"
                                class="email-field">

                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>

                    <figure class="hero-banner">
                        <img src="{{ asset('chaste/assets/images/section.png') }}" alt="Hero image">
                    </figure>

                </div>
            </section>





            <!--
        - ABOUT
      -->

            <section class="about" id="about">
                <div class="container">

                    <div class="about-content">

                        <div class="about-icon">
                            <ion-icon name="accessibility-outline"></ion-icon>
                        </div>

                        <h2 class="h2 about-title">Why To Join Us ?</h2>

                        <p class="about-text">
                            We are dedicated to empowering our members with the knowledge and skills needed to excel in
                            programming. As a leading
                            platform for young enthusiasts, our mission is to promote a dynamic learning environment
                            where creativity and innovation
                            thrive.
                        </p>

                        <button class="btn btn-outline">Join Us</button>


                    </div>

                    <ul class="about-list">

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="school-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Online Education</h3>

                                <p class="card-text">
                                    By offering an online education add-on for programming,
                                    our community provide online meeting and learn on a given course
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="trophy-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Competition and prizes</h3>

                                <p class="card-text">
                                    To motivate learners, Youth code camp offers attractive prizes for the top
                                    performers
                                    in each competition.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="desktop-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Workshops</h3>

                                <p class="card-text">
                                    Our workshops are tailored to support your learning every step of the way. Whether
                                    you're a beginner or already have some coding experience, our expert instructors are
                                    here to guide you.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="calendar-clear-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Hackatons</h3>

                                <p class="card-text">
                                    Join us for exciting hackatons where you can immerse yourself in the world of
                                    coding, collaborate
                                    with other programmers, and create innovative projects
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>

            <section class="about-section">
                <div class="about-image">
                    <!-- You can replace this with your own image -->
                    <img src="{{ asset('chaste/assets/images/community.png') }}" alt="About Us Image">
                </div>
                <div class="about-content">
                    <h2>Empowering Future Innovators</h2>
                    <p>The reason to donate is to help young individuals continue developing their programming skills,
                        enabling them to pursue their dreams in technology.The purpose of donating is to empower young
                        minds in nurturing their programming skills, fostering a future where innovation thrives. By
                        supporting us, you enable aspiring youth to unlock their potential and contribute to the
                        ever-evolving world of technology. Join us in shaping tomorrow's creators.</p>
                    <a href="https://bank.hackclub.com/donations/start/youth-code-camp" target="_blank"
                        class="donate-button">Donate</a>
                    <a href="" target="_blank" class="donate-button">Elearning</a>
                </div>
            </section>

            <!--
        - BLOG
      -->


            <section id="other">
                <br>
                <h2 class="head-1">OUR PARTNERS</h2>
                <div class="wrapper">

                    <div class="single-card">
                        <div class="img-area">
                            <img src="{{ asset('chaste/assets/images/Hack_Club_Flag.png') }}" alt="">
                            <div class="overlay">

                                <a href="https://hackclub.com/" target="_blank"><button class="view-details">learn
                                        more</button></a>
                            </div>
                        </div>

                    </div>

                    <div class="single-card">
                        <div class="img-area">
                            <img src="{{ asset('chaste/assets/images/freecodecamp-log.png') }}" alt="">
                            <div class="overlay">
                                <a href="https://www.freecodecamp.org/" target="_blank"><button
                                        class="view-details">learn more</button></a>
                            </div>
                        </div>

                    </div>


                </div>
            </section>

            <!--
        - CONTACT
      -->

            <section class="contact" id="contact">
                <div class="container">

                    <h2 class="h2 section-title">Contact Us</h2>

                    <p class="section-text">
                        If you have any questions, feedback, or ideas, don't hesitate to get in touch with us.
                        We value your input and we are here to assist you on your coding journey.
                    </p>

                    <div class="contact-wrapper">

                        <form class="contact-form" action="https://formsubmit.co/liochastej@email.com"
                            method="post">

                            <div class="wrapper-flex">

                                <div class="input-wrapper">
                                    <label for="name">Name*</label>

                                    <input type="text" name="name" id="name" required
                                        placeholder="Enter Your Name" class="input-field">
                                </div>

                                <div class="input-wrapper">
                                    <label for="emai">Email*</label>

                                    <input type="text" name="email" id="email" required
                                        placeholder="Enter Your Email" class="input-field">
                                </div>

                            </div>

                            <label for="message">Message*</label>

                            <textarea name="message" id="message" required placeholder="Type Your Message" class="input-field"></textarea>

                            <button type="submit" class="btn btn-primary">
                                <span>Send Message</span>

                                <ion-icon name="paper-plane-outline"></ion-icon>
                            </button>

                        </form>

                        <ul class="contact-list">


                            <li>
                                <a href="#" class="contact-link">
                                    <ion-icon name="globe-outline"></ion-icon>

                                    <span>: www.youthcodecamp.net</span>
                                </a>
                            </li>

                            <li>
                                <a href="https://www.instagram.com/youthcodecamp/" class="contact-link"
                                    target="_blank">
                                    <ion-icon name="logo-instagram"></ion-icon>

                                    <span>: Instagram </span>
                                </a>
                            </li>





                        </ul>

                    </div>

                </div>
            </section>

        </article>
    </main>


    <!--
    - FOOTER
  -->

    <footer>


        <div class="footer-bottom">
            <div class="container">
                <p class="copyright">
                    &copy; 2023 <a href="">youth code camp</a>. All Right Reserved <a href=""> | cookie
                        policy </a>
                </p>
            </div>
        </div>

    </footer>





    <!--
    - custom js link
  -->
    <script src="{{ asset('chaste/assets/js/script.js') }}"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
