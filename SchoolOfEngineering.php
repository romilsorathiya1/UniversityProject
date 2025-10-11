<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School of Engineering - Shreyarth University</title>

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
            background: linear-gradient(rgba(44, 62, 80, 0.75), rgba(44, 62, 80, 0.75)), url(./assets/schoolofengineering.721Z.png) no-repeat center center/cover;
            padding: 120px 20px;
            text-align: center;
            color: var(--light-text);
        }
        .page-header h1 { font-family: var(--heading-font); font-size: 3.5em; margin-bottom: 10px; }
        .page-header p { font-size: 1.2em; opacity: 0.9; max-width: 700px; margin: 0 auto; }

        .section { padding: 80px 20px; }
        .section-light { background-color: #f8f9fa; }
        .section-title {
            text-align: center; margin-bottom: 60px; font-family: var(--heading-font);
            font-size: 2.8em; color: var(--primary-color);
        }
        .section-title::after {
            content: ''; display: block; width: 80px; height: 4px;
            background: var(--accent-color); margin: 15px auto 0; border-radius: 2px;
        }
        
        /* Welcome Section */
        .welcome-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            font-size: 1.1em;
        }
        
        /* Vision & Mission Grid */
        .vision-mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            align-items: stretch; /* Makes cards equal height */
        }
        .vm-card {
            background: var(--light-text);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            text-align: center;
        }
        .vm-card .material-icons { font-size: 3.5em; color: var(--accent-color); margin-bottom: 20px; }
        .vm-card h3 { font-family: var(--heading-font); color: var(--primary-color); font-size: 1.8em; margin-bottom: 15px; }

        /* Courses Section */
        .courses-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .course-card {
            background: var(--light-text);
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            overflow: hidden;
            display: flex;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(44, 62, 80, 0.12);
        }
        .course-header {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 30px;
            flex: 0 0 280px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .course-header h3 {
            font-family: var(--heading-font);
            font-size: 1.6em;
            text-align: center;
            margin: 0;
        }
        .course-body {
            padding: 25px 30px;
            flex-grow: 1;
        }
        .course-description {
            font-size: 0.95em;
            margin-bottom: 25px;
        }
        .course-details {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--secondary-color);
        }
        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .detail-item .material-icons {
            color: var(--accent-color);
            font-size: 1.8em;
        }
        .detail-item-text h4 {
            margin: 0;
            font-size: 0.8em;
            color: #7f8c8d;
            font-weight: 500;
            text-transform: uppercase;
        }
        .detail-item-text p {
            margin: 0;
            font-weight: 600;
            font-size: 1em;
            color: var(--primary-color);
        }
        
        /* Why Choose Us Section */
        .why-us-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            align-items: stretch; /* Makes cards equal height */
        }
        .feature-item {
            background-color: var(--light-text);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: transform 0.3s;
        }
        .feature-item:hover { transform: translateY(-8px); }
        .feature-item .material-icons { font-size: 3em; color: var(--accent-color); margin-bottom: 15px; }
        .feature-item h3 { font-family: var(--heading-font); color: var(--primary-color); font-size: 1.3em; margin-bottom: 10px; }

        /* Animation Classes */
        .animated-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease-out, transform 0.7s ease-out;
        }
        .animated-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* ======================= MEDIA QUERIES FOR THIS PAGE ======================= */
        
        @media (max-width: 1023px) {
            .course-card {
                flex-direction: column; /* Stack vertically on tablets */
            }
            .course-header {
                flex-basis: auto; /* Reset fixed width */
                border-radius: 8px 8px 0 0;
                text-align: left;
                justify-content: flex-start;
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
                font-size: 2.5em;
            }
            .page-header p {
                font-size: 1em;
            }
            .course-header h3 {
                font-size: 1.4em;
            }
            .detail-item {
                flex-basis: 100%; /* Make each detail item take full width */
            }
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
                <h1>School of Engineering</h1>
                <p>Building the Future, One Innovation at a Time.</p>
            </div>
        </section>

        <section id="welcome" class="section">
            <div class="container animated-section">
                <div class="welcome-content">
                    <h2 class="section-title">Welcome to the School of Engineering</h2>
                    <p>The School of Engineering at Shreyarth University is a powerhouse of innovation and learning. We are committed to providing a world-class education that combines rigorous theoretical foundations with practical, hands-on experience. Our programs are designed to produce industry-ready engineers who are equipped to solve complex, real-world problems and drive technological progress in a multitude of sectors.</p>
                </div>
            </div>
        </section>

        <section id="vision-mission" class="section section-light">
            <div class="container">
                <div class="vision-mission-grid">
                    <div class="vm-card animated-section">
                        <i class="material-icons">visibility</i>
                        <h3>Our Vision</h3>
                        <p>To be a leading engineering school renowned for its academic excellence, impactful research, and for producing ethical engineers who contribute to societal well-being.</p>
                    </div>
                    <div class="vm-card animated-section">
                        <i class="material-icons">flag</i>
                        <h3>Our Mission</h3>
                        <p>To deliver a project-based, interdisciplinary engineering education, foster a culture of innovation and research, and build strong partnerships with industry.</p>
                    </div>
                </div>
            </section>

        <section id="programs" class="section">
            <div class="container">
                <h2 class="section-title">Our Programs</h2>
                <div class="courses-grid">
                    
                    <!-- B.Tech. Mechanical -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>B.Tech in Mechanical Engineering</h3></div>
                        <div class="course-body">
                            <p class="course-description">This core program covers the principles of mechanics, thermodynamics, and materials science to design, analyze, and manufacture mechanical systems.</p>
                            <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>4 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>10+2 (PCM)</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,75,000</p></div></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- B.Tech. Civil -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>B.Tech in Civil Engineering</h3></div>
                        <div class="course-body">
                            <p class="course-description">Focuses on the design, construction, and maintenance of the physical and naturally built environment, including infrastructure like roads, bridges, and buildings.</p>
                            <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>4 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>10+2 (PCM)</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,65,000</p></div></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- B.Tech. Electrical -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>B.Tech in Electrical Engineering</h3></div>
                        <div class="course-body">
                            <p class="course-description">Covers the study and application of electricity, electronics, and electromagnetism. Specializations include power systems, electronics, and communication.</p>
                             <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>4 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>10+2 (PCM)</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,70,000</p></div></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- B.Tech. CSE -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>B.Tech in Computer Science & Engineering</h3></div>
                        <div class="course-body">
                            <p class="course-description">An intensive engineering degree focused on the scientific and practical approach to computation, blending hardware and software principles.</p>
                            <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>4 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>10+2 (PCM)</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,80,000</p></div></div>
                            </div>
                        </div>
                    </div>

                    <!-- M.Tech. -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>Master of Technology (M.Tech)</h3></div>
                        <div class="course-body">
                            <p class="course-description">A postgraduate program for specialization in various engineering fields, emphasizing research and advanced technical skills to solve complex problems.</p>
                            <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>2 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>B.Tech + GATE</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,50,000</p></div></div>
                            </div>
                        </div>
                    </div>

                    <!-- Ph.D. -->
                    <div class="course-card animated-section">
                        <div class="course-header"><h3>Ph.D. in Engineering</h3></div>
                        <div class="course-body">
                            <p class="course-description">A doctoral program for candidates dedicated to pursuing original research that advances the frontiers of engineering knowledge and its application.</p>
                            <div class="course-details">
                                <div class="detail-item"><i class="material-icons">schedule</i><div class="detail-item-text"><h4>Duration</h4><p>3-5 Years</p></div></div>
                                <div class="detail-item"><i class="material-icons">school</i><div class="detail-item-text"><h4>Eligibility</h4><p>M.Tech/M.E.</p></div></div>
                                <div class="detail-item"><i class="material-icons">payments</i><div class="detail-item-text"><h4>Annual Fees</h4><p>₹1,10,000</p></div></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        <section id="why-us" class="section section-light">
            <div class="container">
                <h2 class="section-title">Why Choose Our School?</h2>
                <div class="why-us-grid">
                    <div class="feature-item animated-section">
                        <i class="material-icons">precision_manufacturing</i>
                        <h3>State-of-the-Art Labs</h3>
                        <p>Access modern workshops and labs for robotics, fluid mechanics, structural analysis, and more.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">construction</i>
                        <h3>Project-Based Learning</h3>
                        <p>Our curriculum emphasizes hands-on projects, allowing you to build real systems from day one.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">business_center</i>
                        <h3>Mandatory Internships</h3>
                        <p>Gain crucial industry experience with our network of partner companies and core engineering firms.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">groups</i>
                        <h3>Experienced Faculty</h3>
                        <p>Learn from professors with a blend of academic rigor and valuable industry experience.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">biotech</i>
                        <h3>Interdisciplinary Research</h3>
                        <p>Opportunities to collaborate on research projects that span multiple engineering disciplines.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">workspace_premium</i>
                        <h3>Professional Chapters</h3>
                        <p>Engage with student chapters of professional bodies like ASME, IEEE, and ASCE for networking.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ======================= FOOTER ======================= -->
   <?php include 'footer.php'; ?>


    <!-- ======================= JAVASCRIPT FOR THIS PAGE ONLY ======================= -->
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
                threshold: 0.1 // Trigger when 10% of the element is visible
            });

            animatedSections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>

</body>
</html>