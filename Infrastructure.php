<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrastructure - Shreyarth University</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
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
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url(./assets/campusinfrastructure.jpg) no-repeat center center/cover;
            padding: 120px 20px;
            text-align: center;
            color: var(--light-text);
        }
        .page-header h1 { font-family: var(--heading-font); font-size: 3.5em; margin-bottom: 10px; }
        .page-header p { font-size: 1.2em; opacity: 0.9; max-width: 700px; margin: 0 auto; }

        .section { padding: 80px 20px; }
        .section-light { background-color: #f8f9fa; }
        
        /* Alternating Feature Layout */
        .feature-section {
            display: flex;
            align-items: center;
            gap: 60px;
        }
        .section-light .feature-section {
            flex-direction: row-reverse;
        }
        .feature-image, .feature-content {
            flex: 1;
        }
        .feature-image img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .feature-content h2 {
            font-family: var(--heading-font);
            font-size: 2.5em;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .feature-content p {
            margin-bottom: 30px;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-weight: 500;
        }
        .feature-list .material-icons {
            color: var(--accent-color);
            margin-right: 15px;
            font-size: 1.8em;
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

        /* ======================= MEDIA QUERIES FOR THIS PAGE ======================= */
        @media (max-width: 1023px) {
            .feature-section, .section-light .feature-section {
                flex-direction: column;
                gap: 40px;
            }
        }
        
        @media (max-width: 768px) {
            .section { padding: 60px 20px; }
            .page-header h1 { font-size: 2.5em; }
            .feature-content h2 { font-size: 2em; }
        }
    </style>
</head>
<body>

    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>

    <!-- MAIN CONTENT -->
    <main>
        <section class="page-header animated-section">
            <div class="container">
                <h1>Our Infrastructure</h1>
                <p>A Foundation Built for Excellence, Innovation, and Growth.</p>
            </div>
        </section>

        <!-- Library Section -->
        <section class="section">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/library.jpg" alt="University Library">
                </div>
                <div class="feature-content">
                    <h2>The Knowledge Hub</h2>
                    <p>Our central library is the heart of the academic life at Shreyarth University. It is a tranquil and resourceful space designed to support research, collaborative learning, and quiet study. We provide access to a vast repository of knowledge to ignite curiosity and foster intellectual growth.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">menu_book</i>Vast collection of books and journals</li>
                        <li><i class="material-icons">important_devices</i>Access to E-journals and digital archives</li>
                        <li><i class="material-icons">wifi</i>High-speed Wi-Fi connectivity</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Classrooms Section -->
        <section class="section section-light">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/classroom.jpg" alt="Smart Classroom">
                </div>
                <div class="feature-content">
                    <h2>Interactive Learning Spaces</h2>
                    <p>We have moved beyond traditional teaching methods. Our classrooms are equipped with state-of-the-art technology, including interactive smart boards, projectors, and audio-visual systems, to create a dynamic and engaging learning environment that encourages participation and collaboration.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">cast_for_education</i>Smart boards and digital projectors</li>
                        <li><i class="material-icons">mic</i>Advanced audio systems</li>
                        <li><i class="material-icons">chair</i>Ergonomic and flexible seating</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Auditorium Section -->
        <section class="section">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/Auditorium.jpg" alt="University Auditorium">
                </div>
                <div class="feature-content">
                    <h2>The Grand Stage</h2>
                    <p>Our multipurpose auditorium is a magnificent venue that serves as the center for university events. With a large seating capacity and professional-grade acoustics and lighting, it is the perfect setting for national conferences, cultural programs, and inspiring guest lectures.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">groups</i>500+ Seating Capacity</li>
                        <li><i class="material-icons">volume_up</i>Professional sound and lighting</li>
                        <li><i class="material-icons">videocam</i>Fully equipped for recording and live streaming</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Hostels Section -->
        <section class="section section-light">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/hostel.jpg" alt="Hostel Room">
                </div>
                <div class="feature-content">
                    <h2>A Home Away From Home</h2>
                    <p>Our hostels provide a secure, comfortable, and nurturing environment for students. We offer separate, well-furnished accommodation for boys and girls, complete with all modern amenities to ensure a pleasant and productive stay on campus.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">security</i>24/7 Security and CCTV surveillance</li>
                        <li><i class="material-icons">self_improvement</i>Recreational rooms and common areas</li>
                        <li><i class="material-icons">dining</i>Hygienic mess facilities</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Canteen Section -->
        <section class="section">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/canteen.jpg" alt="University Canteen">
                </div>
                <div class="feature-content">
                    <h2>Flavors of Campus</h2>
                    <p>The university canteen is a lively social spot offering a diverse menu of delicious, healthy, and affordable food options. It is the perfect place for students to relax, interact, and refuel between classes in a clean and friendly atmosphere.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">restaurant_menu</i>Multi-cuisine food court</li>
                        <li><i class="material-icons">sanitizer</i>Strict hygiene and quality standards</li>
                        <li><i class="material-icons">deck</i>Spacious indoor and outdoor seating</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- Sports Grounds Section -->
        <section class="section section-light">
            <div class="container feature-section animated-section">
                <div class="feature-image">
                    <img src="./assets/grounds.webp" alt="Sports Ground">
                </div>
                <div class="feature-content">
                    <h2>The Sporting Spirit</h2>
                    <p>We champion a culture of fitness and sportsmanship. The campus is equipped with expansive grounds and modern facilities for a variety of sports, encouraging students to pursue physical wellness and teamwork alongside their academic goals.</p>
                    <ul class="feature-list">
                        <li><i class="material-icons">sports_cricket</i>Dedicated cricket and football grounds</li>
                        <li><i class="material-icons">sports_basketball</i>Basketball and volleyball courts</li>
                        <li><i class="material-icons">fitness_center</i>Indoor facilities for table tennis and chess</li>
                    </ul>
                </div>
            </div>
        </section>

    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

    <!-- JAVASCRIPT FOR THIS PAGE ONLY -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                threshold: 0.15 // Trigger when 15% of the element is visible
            });

            animatedSections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>

</body>
</html>