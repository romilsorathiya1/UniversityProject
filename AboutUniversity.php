<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Shreyarth University</title>

    <!-- Google Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome for Social Icons (included via header.php, but good practice to keep if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS STYLES FOR THIS PAGE ONLY -->
    <style>
        /* Re-establishing root variables in case this page's CSS needs them */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #ecf0f1;
            --accent-color: #1abc9c;
            --text-color: #34495e;
            --light-text: #ffffff;
            --heading-font: 'Montserrat', sans-serif;
            --body-font: 'Poppins', sans-serif;
        }

        /* Basic styles needed for page content if not already in header */
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

        /* --- PAGE-SPECIFIC STYLES --- */
        .page-header {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url(./assets/aboutuniversity.webp) no-repeat center center/cover;
            padding: 100px 20px;
            text-align: center;
            color: var(--light-text);
        }

        .page-header h1 {
            font-family: var(--heading-font);
            font-size: 3.5em;
            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .section {
            padding: 80px 20px;
        }

        .section-light {
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            font-family: var(--heading-font);
            font-size: 2.8em;
            color: var(--primary-color);
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .about-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            font-size: 1.1em;
        }

        .vision-mission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: stretch;
        }

        .vm-card {
            background: var(--light-text);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .vm-card .material-icons {
            font-size: 3.5em;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .vm-card h3 {
            font-family: var(--heading-font);
            color: var(--primary-color);
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .history-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .history-text,
        .history-icon {
            flex: 1;
        }

        .history-icon {
            text-align: center;
        }

        .history-icon .material-icons {
            font-size: 8em;
            color: var(--accent-color);
            opacity: 0.2;
        }

        .history-text h3 {
            font-family: var(--heading-font);
            font-size: 2em;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .leader-profile {
            display: flex;
            align-items: center;
            gap: 50px;
            background-color: var(--light-text);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 50px;
        }

        .leader-profile:last-child {
            margin-bottom: 0;
        }

        .leader-profile.reverse {
            flex-direction: row-reverse;
        }

        .leader-image {
            flex: 0 0 350px;
        }

        .leader-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .leader-content {
            flex: 1 1 auto;
        }

        .leader-content h4 {
            font-family: var(--heading-font);
            font-size: 2em;
            color: var(--primary-color);
        }

        .leader-content p.title {
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 1.1em;
        }

        .leader-content blockquote {
            font-style: italic;
            border-left: 4px solid var(--accent-color);
            padding-left: 20px;
            margin-top: 20px;
        }

        .cta-section {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            border-radius: 8px;
            padding: 60px 40px;
        }

        .cta-section h2 {
            font-family: var(--heading-font);
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .cta-section a.btn {
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            display: inline-block;
            margin-top: 20px;
            transition: transform 0.3s, background-color 0.3s;
        }

        .cta-section a.btn:hover {
            background-color: #16a085;
            transform: translateY(-5px);
        }

        /* Animation Classes */
        .animated-section {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .animated-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- MEDIA QUERIES for This Page --- */
        @media (max-width: 1023px) {

            .leader-profile,
            .leader-profile.reverse {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }
        }

        @media (max-width: 767px) {
            .section {
                padding: 60px 20px;
            }

            .section-title {
                font-size: 2.2em;
            }

            .page-header h1 {
                font-size: 2.2em;
            }

            .vision-mission-grid {
                grid-template-columns: 1fr;
            }

            .history-content {
                flex-direction: column;
                text-align: center;
            }

            .history-icon {
                margin-top: 30px;
            }

            .leader-image {
                flex: 0 0 auto;
                width: 100%;
                max-width: 300px;
            }

            .leader-content h4 {
                font-size: 1.8em;
            }
        }
    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>

    <!-- ======================= MAIN CONTENT ======================= -->
    <main>

        <!-- Page Header -->
        <section class="page-header animated-section">
            <div class="container">
                <h1>About Shreyarth University</h1>
                <p>A Beacon of Transformative Education & Innovation</p>
            </div>
        </section>

        <!-- About Shreyarth University Section -->
        <section class="section">
            <div class="container">
                <div class="about-content animated-section">
                    <p>Shreyarth University, located in the heart of Ahmedabad, is a beacon of transformative education,
                        approved by the Government of Gujarat under the Private University Act, 2009, and recognized by
                        the University Grants Commission (UGC). Established in 2019 by a group of visionary educators
                        under the aegis of the Shreyarth Foundation—initiated by the esteemed family of the Gujarati
                        newspaper "Gujarat Samachar"—our university is committed to bridging the gap between theoretical
                        knowledge and real-world realities. We strive to nurture students into future professionals,
                        entrepreneurs, and global citizens through innovative and inclusive academic programs.</p>
                </div>
            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section class="section section-light">
            <div class="container">
                <div class="vision-mission-grid">
                    <div class="vm-card animated-section">
                        <i class="material-icons">visibility</i>
                        <h3>Our Vision</h3>
                        <p>To create a world-class institution that scales new possibilities through education,
                            fostering critical thinking, innovation, and ethical leadership across disciplines like
                            management, computer science, mass communication, journalism, and performing arts.</p>
                    </div>
                    <div class="vm-card animated-section">
                        <i class="material-icons">flag</i>
                        <h3>Our Mission</h3>
                        <p>To provide par excellence education with a focus on practical training, preparing students to
                            meet global challenges with professionalism, diversity, and a commitment to societal
                            welfare.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- History Section -->
        <section class="section">
            <div class="container">
                <div class="history-content animated-section">
                    <div class="history-text">
                        <h3>Our History</h3>
                        <p>Founded in 2019, Shreyarth University has grown into a renowned institution, building on a
                            legacy of academic excellence and social responsibility, driven by the philanthropic vision
                            of the Shreyarth Foundation.</p>
                    </div>
                    <div class="history-icon">
                        <i class="material-icons">history_edu</i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Leadership Section -->
        <section class="section section-light">
            <div class="container">
                <h2 class="section-title">Message from Leadership</h2>

                <div class="leader-profile animated-section">
                    <div class="leader-image">
                        <img src="./assets/shreyansh shah.jpg" alt="Shri Shreyans Shah">
                    </div>
                    <div class="leader-content">
                        <h4>Shri Shreyans Shah</h4>
                        <p class="title">President</p>
                        <blockquote>
                            "As the world is increasingly becoming a nano-reality, as we are embarking upon newer
                            possibilities, inventions and inclusive critical thinking processes, the role of education
                            is becoming definitive and decisive. Energetic youth need the right kind of education for
                            their growth... I hope that Shreyarth University will benefit the aspiring and promising
                            students in all their endeavor and mission. Let us collectively participate in making India
                            shine."
                        </blockquote>
                    </div>
                </div>

                <div class="leader-profile reverse animated-section">
                    <div class="leader-image">
                        <img src="./assets/sudhir nanavati.jpeg" alt="Shri Sudhir Nanavati">
                    </div>
                    <div class="leader-content">
                        <h4>Shri Sudhir Nanavati</h4>
                        <p class="title">Vice President</p>
                        <blockquote>
                            "The world outside your textbook is a world of ruthless realities and jerk awakenings. To
                            bridge the gap between theoretical knowledge and realities, the role of a torch bearer
                            becomes very critical for success... We aim to balance your equilibrium of education and
                            practical realities in order to shape you to be successful future professionals, start-ups,
                            entrepreneurs, etc. Welcome to Shreyarth University for achieving excellence."
                        </blockquote>
                    </div>
                </div>

            </div>
        </section>

        <!-- Commitment & Join Us Section -->
        <section class="section">
            <div class="container">
                <div class="cta-section animated-section">
                    <h2>Our Commitment & Your Future</h2>
                    <p>We celebrate the diverse perspectives of our students, faculty, and staff, fostering an inclusive
                        campus community. Located in Ahmedabad’s thriving cultural and economic hub, our campus provides
                        unparalleled opportunities for internships, networking, and career advancement. Explore
                        Shreyarth University and imagine yourself as part of our vibrant community. Your future begins
                        today.</p>
                    <a href="#" class="btn">Join Us on Our Journey</a>
                </div>
            </div>
        </section>

    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>


    <!-- ======================= JAVASCRIPT FOR THIS PAGE ONLY ======================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Animation on Scroll using Intersection Observer ---
            const animatedSections = document.querySelectorAll('.animated-section');
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Stop observing after animation
                    }
                });
            }, {
                threshold: 0.1 // Trigger when 10% of the element is visible
            });
            animatedSections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>

</body>

</html>

