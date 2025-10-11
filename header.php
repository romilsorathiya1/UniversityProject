<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shreyarth University - Excellence & Innovation</title>

    <!-- Google Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome for Social Icons (Included here in case any header/footer icons need it) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <!-- CSS STYLES FOR HEADER -->
    <style>
        /* CSS Variables & General Body Styles (needed for header) */
        :root {
            --primary-color: #2c3e50;
            /* Midnight Blue */
            --secondary-color: #ecf0f1;
            /* Clouds (Light Gray) */
            --accent-color: #1abc9c;
            /* Turquoise */
            --text-color: #34495e;
            /* Wet Asphalt (Dark Gray) */
            --light-text: #ffffff;
            --heading-font: 'Montserrat',
            sans-serif;
            --body-font: 'Poppins',
            sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--body-font);
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--light-text);
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        /* --- HEADER & NAVIGATION --- */
        .brand-header {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            padding: 10px 0;
            font-family: var(--heading-font);
            font-size: 1.2em;
            letter-spacing: 2px;
        }

        .header-wrapper {
            background-color: var(--light-text);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .main-nav-container {
            display: flex;
            justify-content: space-between; /* Changed for better mobile layout */
            align-items: center;
            height: 70px;
        }

        .nav-logo {
            font-family: var(--heading-font);
            font-size: 1.8em;
            color: var(--primary-color);
            text-decoration: none;
        }

        .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .main-menu {
            list-style: none;
            display: flex;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        .main-menu li {
            position: relative;
            display: flex;
            align-items: center;
        }

        .main-menu>li>a {
            color: var(--primary-color);
            text-decoration: none;
            padding: 0 15px;
            font-weight: 600;
            font-size: 1.05em;
            transition: color 0.3s,
            background-color 0.3s;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .main-menu>li>a:hover {
            color: var(--accent-color);
            background-color: var(--secondary-color);
        }

        /* Hamburger Menu Icon */
        .menu-toggle {
            display: none;
            font-size: 2.5em;
            color: var(--primary-color);
            cursor: pointer;
            background: none;
            border: none;
        }

        /* LOGO hidden on desktop to avoid duplication with Brand Header, visible on mobile */
        .nav-logo {
            display: none;
        }

        /* Top (Secondary) Navbar */
        .top-nav {
            background-color: var(--secondary-color);
            padding: 10px 0;
            color: var(--text-color);
        }

        .top-nav .container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .top-nav .container::-webkit-scrollbar {
            display: none;
        }

        .top-nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            flex-wrap: nowrap;
            white-space: nowrap;
            margin: 0;
        }

        .top-nav ul li a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 0.9em;
            font-weight: 500;
            margin: 0 15px;
            transition: color 0.3s;
        }

        .top-nav ul li a:hover {
            color: var(--accent-color);
        }

        /* Dropdown Menus */
        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--light-text);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            list-style: none;
            min-width: 240px;
            border-top: 3px solid var(--accent-color);
            border-radius: 0 0 5px 5px;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease,
            transform 0.3s ease;
            z-index: 1100;
            padding: 0;
            margin: 0;
        }

        .dropdown li a {
            width: 100%;
            padding: 12px 20px;
            font-weight: 500;
            color: var(--text-color);
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown li a:hover {
            background-color: var(--secondary-color);
            color: var(--accent-color);
        }

        .main-menu li:hover>.dropdown {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Styles for Header */
        @media (max-width: 1023px) {
            .main-nav-container {
                justify-content: space-between;
            }
            .menu-toggle {
                display: block;
            }
            .nav-logo {
                display: block;
                font-size: 1.5em;
            }

            .main-nav {
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: var(--primary-color);
                flex-direction: column;
                align-items: flex-start;
                height: auto;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.5s ease-in-out;
            }

            .main-nav.active {
                max-height: 100vh;
                border-top: 1px solid var(--accent-color);
            }

            .main-menu {
                flex-direction: column;
                width: 100%;
                height: auto;
            }

            .main-menu li {
                width: 100%;
                border-top: 1px solid #34495e;
            }

            .main-menu>li>a {
                color: var(--light-text);
                padding: 15px 20px;
                width: 100%;
                justify-content: flex-start;
                height: auto;
            }

            .main-menu>li>a:hover {
                background-color: var(--accent-color);
                color: var(--light-text);
            }

            .dropdown {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                border-top: none;
                border-radius: 0;
                background-color: #34495e;
                transform: none;
                opacity: 1;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s ease-in-out;
            }

            .main-menu li:hover>.dropdown {
                display: none;
            }

            .dropdown.active {
                display: block;
                max-height: 500px;
            }

            .dropdown li a {
                color: var(--secondary-color);
                padding-left: 40px;
            }

            .dropdown li a:hover {
                background-color: var(--accent-color);
            }
        }
        
         @media (max-width: 767px) {
             .brand-header {
                font-size: 0.9em;
                letter-spacing: 1px;
            }
        }
    </style>
</head>

<body>

    <div class="brand-header">SHREYARTH UNIVERSITY</div>

    <header class="header-wrapper">
        <div class="container main-nav-container">
            <a href="#home" class="nav-logo">Shreyarth</a>
            <button class="menu-toggle material-icons">menu</button>
            <nav class="main-nav" id="main-nav">
                <ul class="main-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="#">About Us ▾</a>
                        <ul class="dropdown">
                            <li><a href="./AboutUniversity.php">About University</a></li>
                            <li><a href="./OtherCommittees.php">Other Committee</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Academics ▾</a>
                        <ul class="dropdown">
                            <li><a href="./SchoolOfManagement.php">School of Management</a></li>
                            <li><a href="./SchoolOfNursing.php">School of Nursing</a></li>
                            <li><a href="./SchoolOfComputerScience.php">School of Computer Science</a></li>
                            <li><a href="./SchoolOfEngineering.php">School of Engineering</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Life at Campus ▾</a>
                        <ul class="dropdown">
                            <li><a href="./Events.php">Events</a></li>
                            <li><a href="./Infrastructure.php">Infrastructure</a></li>
                        </ul>
                    </li>
                    <li><a href="./Examination.php">Examination</a></li>
                    <li><a href="./Placement.php">Placement</a></li>
                    <li><a href="./AdmissionEnquiry.php">Admission Enquiry</a></li>
                    <li><a href="./ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <!-- Secondary Navigation -->
        <div class="top-nav">
            <div class="container">
                <ul>
                    <li><a href="./AcademicCalendar.php">Academic Calendar</a></li>
                    <li><a href="./Circulars.php">Circulars</a></li>
                    <li><a href="./Achievement.php">Achievement</a></li>
                    <li><a href="./FAQs.php">FAQs</a></li>
                    <li><a href="./Scholarships.php">Scholarships</a></li>
                    <li><a href="./Careers.php">Careers</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- JAVASCRIPT FOR HEADER -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Mobile Menu Toggle ---
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNav = document.querySelector('#main-nav');
            menuToggle.addEventListener('click', () => {
                mainNav.classList.toggle('active');
            });

            // --- Mobile Dropdown Toggle (Click instead of Hover) ---
            document.querySelectorAll('.main-menu > li > a').forEach(toggle => {
                const dropdown = toggle.nextElementSibling;
                if (dropdown && dropdown.classList.contains('dropdown')) {
                    toggle.addEventListener('click', function (e) {
                        if (window.innerWidth <= 1023) {
                            e.preventDefault();
                            
                            this.parentElement.parentElement.querySelectorAll('.dropdown.active').forEach(dd => {
                                if (dd !== dropdown) {
                                    dd.classList.remove('active');
                                }
                            });
                            
                            dropdown.classList.toggle('active');
                        }
                    });
                }
            });
        });
    </script>