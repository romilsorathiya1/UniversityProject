<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School of Management - Shreyarth University</title>

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
            background: linear-gradient(rgba(44, 62, 80, 0.75), rgba(44, 62, 80, 0.75)), url(./assets/schoolofmanagement.815Z.png) no-repeat center center/cover;
            padding: 120px 0;
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
            max-width: 700px;
            margin: 0 auto;
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
            align-items: center;
        }

        .vm-card {
            background: var(--light-text);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
            height: 100%;
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

        /* Courses Section */
        .courses-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .course-card {
            background: var(--light-text);
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
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
        }

        .feature-item {
            background-color: var(--light-text);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s;
            height: 100%;
        }

        .feature-item:hover {
            transform: translateY(-8px);
        }

        .feature-item .material-icons {
            font-size: 3em;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .feature-item h3 {
            font-family: var(--heading-font);
            color: var(--primary-color);
            font-size: 1.3em;
            margin-bottom: 10px;
        }

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
                flex-direction: column;
            }

            .course-header {
                flex-basis: auto;
                justify-content: flex-start;
                text-align: left;
                border-radius: 8px 8px 0 0;
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
                flex-basis: 100%;
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
                <h1>School of Management</h1>
                <p>Developing ethical and innovative business leaders ready to navigate the complexities of the global
                    market.</p>
            </div>
        </section>

        <section id="welcome" class="section">
            <div class="container animated-section">
                <div class="welcome-content">
                    <h2 class="section-title">Welcome to the School of Management</h2>
                    <p>At Shreyarth University's School of Management, we are dedicated to fostering the next
                        generation of business pioneers. Our curriculum is a dynamic blend of rigorous academic theory
                        and practical, real-world application. We empower our students with the critical thinking,
                        strategic foresight, and ethical grounding necessary to excel and lead with integrity in
                        today's fast-paced corporate world.</p>
                </div>
            </div>
        </section>

        <section id="vision-mission" class="section section-light">
            <div class="container">
                <div class="vision-mission-grid">
                    <div class="vm-card animated-section">
                        <i class="material-icons">visibility</i>
                        <h3>Our Vision</h3>
                        <p>To be a globally recognized center for management education, known for nurturing
                            transformative leaders who create sustainable value for business and society.</p>
                    </div>
                    <div class="vm-card animated-section">
                        <i class="material-icons">flag</i>
                        <h3>Our Mission</h3>
                        <p>To deliver excellence in management education through innovative teaching,
                            industry-relevant research, and a commitment to fostering an entrepreneurial mindset among
                            our students.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="programs" class="section">
            <div class="container">
                <h2 class="section-title">Our Programs</h2>
                <div class="courses-grid">

                    <!-- MBA Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Master of Business Administration (MBA)</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">Our flagship MBA program develops comprehensive managerial
                                skills through a case-based methodology, preparing graduates for senior roles in the
                                global industry.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>2 Years</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>Graduate + CAT/MAT</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Annual Fees</h4>
                                        <p>₹2,50,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Executive MBA Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Executive MBA (EMBA)</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">Tailored for working professionals with weekend classes, the
                                EMBA program enhances strategic leadership capabilities without interrupting your
                                career.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>18 Months</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>Graduate + 3 Yrs Exp.</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Total Fees</h4>
                                        <p>₹3,50,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BBA Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Bachelor of Business Administration (BBA)</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">The BBA program provides a strong foundation in core business
                                disciplines, setting the stage for a successful career in management or for pursuing
                                higher education.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>3 Years</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>10+2 (Any Stream)</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Annual Fees</h4>
                                        <p>₹1,20,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- B.Com (Hons.) Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Bachelor of Commerce (B.Com Hons.)</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">This honors program offers an in-depth study of commerce,
                                accounting, and finance, equipping students with specialized knowledge for roles in the
                                financial sector.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>3 Years</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>10+2 (Commerce)</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Annual Fees</h4>
                                        <p>₹95,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PGDM Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Post Graduate Diploma in Management (PGDM)</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">An intensive, industry-focused program designed to build
                                sharp, analytical, and decision-making skills for the modern business landscape.
                                Equivalent to an MBA.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>2 Years</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>Graduate Degree</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Annual Fees</h4>
                                        <p>₹2,75,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ph.D. Card -->
                    <div class="course-card animated-section">
                        <div class="course-header">
                            <h3>Ph.D. in Management</h3>
                        </div>
                        <div class="course-body">
                            <p class="course-description">Our doctoral program provides rigorous training in research
                                methodologies to produce high-quality, impactful research that contributes to
                                management knowledge.</p>
                            <div class="course-details">
                                <div class="detail-item">
                                    <i class="material-icons">schedule</i>
                                    <div class="detail-item-text">
                                        <h4>Duration</h4>
                                        <p>3-5 Years</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">school</i>
                                    <div class="detail-item-text">
                                        <h4>Eligibility</h4>
                                        <p>Master's Degree</p>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <i class="material-icons">payments</i>
                                    <div class="detail-item-text">
                                        <h4>Annual Fees</h4>
                                        <p>₹90,000</p>
                                    </div>
                                </div>
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
                        <i class="material-icons">trending_up</i>
                        <h3>Industry-Relevant Curriculum</h3>
                        <p>Our courses are constantly updated in consultation with industry experts to ensure relevance
                            and rigor.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">groups</i>
                        <h3>Expert Faculty</h3>
                        <p>Learn from a distinguished group of academics and industry practitioners with vast
                            experience.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">lightbulb</i>
                        <h3>Case-Based Learning</h3>
                        <p>We use real-world case studies to develop your analytical and decision-making skills.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">business_center</i>
                        <h3>Strong Industry Connect</h3>
                        <p>Benefit from guest lectures, internships, and networking events with leading corporations.
                        </p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">rocket_launch</i>
                        <h3>Entrepreneurship Cell</h3>
                        <p>We provide robust support and mentorship for students with innovative startup ideas.</p>
                    </div>
                    <div class="feature-item animated-section">
                        <i class="material-icons">public</i>
                        <h3>Global Exposure</h3>
                        <p>Opportunities for international exchange programs and collaborations with global
                            universities.</p>
                    </div>
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