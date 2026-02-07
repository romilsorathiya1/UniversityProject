<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements - Shreyarth University</title>

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
            --secondary-color: #f8f9fa;
            --accent-color: #1abc9c;
            --text-color: #34495e;
            --light-text: #ffffff;
            --heading-font: 'Montserrat', sans-serif;
            --body-font: 'Poppins', sans-serif;
            --border-color: #e0e0e0;
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

        /* --- PAGE-SPECIFIC STYLES: PLACEMENT --- */
        .page-header {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url(./assets/placementcell.398Z.png) no-repeat center center/cover;
            padding: 120px 20px;
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
            background-color: var(--secondary-color);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-family: var(--heading-font);
            font-size: 2.8em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .section-title p {
            font-size: 1.1em;
            max-width: 700px;
            margin: 0 auto;
            color: var(--text-color);
        }

        /* Placement Highlights */
        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .highlight-card {
            background: var(--light-text);
            padding: 40px 20px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-bottom: 4px solid var(--accent-color);
            transition: transform 0.3s;
        }

        .highlight-card:hover {
            transform: translateY(-8px);
        }

        .highlight-card .stat {
            font-family: var(--heading-font);
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .highlight-card .label {
            font-size: 1.1em;
            font-weight: 500;
        }

        /* Why Recruit Section */
        .recruit-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .feature-item .material-icons {
            font-size: 2.5em;
            color: var(--accent-color);
            background: var(--light-text);
            padding: 10px;
            border-radius: 50%;
        }

        .feature-item h4 {
            font-family: var(--heading-font);
            font-size: 1.3em;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        /* Placement Process Section */
        .process-timeline {
            display: flex;
            flex-direction: column;
            gap: 40px;
            margin-top: 40px;
        }

        .process-step {
            display: flex;
            align-items: center;
            gap: 30px;
            position: relative;
        }

        .process-step:nth-child(even) {
            flex-direction: row-reverse;
            text-align: right;
        }

        .process-step .step-number {
            font-size: 3em;
            font-family: var(--heading-font);
            color: var(--accent-color);
            background: #ecf0f1;
            min-width: 80px;
            height: 80px;
            display: grid;
            place-items: center;
            border-radius: 50%;
        }

        .process-step h4 {
            font-family: var(--heading-font);
            font-size: 1.4em;
            color: var(--primary-color);
        }

        /* Placement Partners Section */
        #placement-partners {
            padding: 60px 0 40px;
        }

        #placement-partners .section-title {
            margin-bottom: 30px;
        }

        .logo-carousel {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding: 20px 0;
            background: var(--secondary-color);
        }

        .logo-carousel:before,
        .logo-carousel:after {
            content: '';
            position: absolute;
            top: 0;
            width: 150px;
            height: 100%;
            z-index: 2;
        }

        .logo-carousel:before {
            left: 0;
            background: linear-gradient(to right, var(--secondary-color), transparent);
        }

        .logo-carousel:after {
            right: 0;
            background: linear-gradient(to left, var(--secondary-color), transparent);
        }

        .logo-track {
            display: flex;
            width: calc(250px * 32);
            animation: scroll 80s linear infinite;
        }

        .logo-track:hover {
            animation-play-state: paused;
        }

        .logo-slide {
            width: 250px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 25px;
        }

        .logo-slide img {
            height: 60px;
            width: auto;
            max-width: 180px;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: filter 0.3s, opacity 0.3s;
        }

        .logo-slide:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px * 16));
            }
        }

        /* Success Stories */
        .success-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .story-card {
            background: var(--light-text);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
        }

        .story-card-img {
            height: 250px;
        }

        .story-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .story-card-content {
            padding: 25px;
        }

        .story-card-content blockquote {
            font-style: italic;
            margin-bottom: 15px;
            border-left: 3px solid var(--accent-color);
            padding-left: 15px;
        }

        .story-card-content .author {
            font-weight: 600;
            font-size: 1.1em;
            color: var(--primary-color);
        }

        .story-card-content .company {
            color: var(--accent-color);
        }

        /* Meet the Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            justify-content: center;
        }

        .team-card {
            background: var(--light-text);
            text-align: center;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
        }

        .team-card img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--accent-color);
            margin-bottom: 20px;
        }

        .team-card h4 {
            font-family: var(--heading-font);
            font-size: 1.4em;
            color: var(--primary-color);
        }

        .team-card .designation {
            font-weight: 500;
            margin-bottom: 15px;
            color: #7f8c8d;
        }

        .team-card .contact-details {
            margin-top: 15px;
            font-size: 0.95em;
            color: var(--text-color);
        }

        .team-card .contact-details p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 5px;
        }

        .team-card .contact-details .material-icons {
            font-size: 1.2em;
            color: var(--accent-color);
        }

        /* ======================= MEDIA QUERIES FOR THIS PAGE ======================= */
        @media (max-width: 768px) {
            .section {
                padding: 60px 20px;
            }

            .page-header h1 {
                font-size: 2.5em;
            }

            .section-title h2 {
                font-size: 2.2em;
            }

            .process-step,
            .process-step:nth-child(even) {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .logo-carousel:before,
            .logo-carousel:after {
                width: 50px;
            }
        }
    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
   <?php include 'header.php'; ?>


    <!-- MAIN CONTENT -->
    <main>
        <section class="page-header">
            <div class="container">
                <h1>Corporate Relations & Placements</h1>
                <p>Connecting Ambitious Talent with Global Opportunities.</p>
            </div>
        </section>

        <!-- Placement Highlights Section -->
        <section class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Placement Highlights 2024</h2>
                </div>
                <div class="highlights-grid">
                    <div class="highlight-card">
                        <div class="stat">97%</div>
                        <div class="label">Placement Rate</div>
                    </div>
                    <div class="highlight-card">
                        <div class="stat">₹25 LPA</div>
                        <div class="label">Highest Package</div>
                    </div>
                    <div class="highlight-card">
                        <div class="stat">₹8.5 LPA</div>
                        <div class="label">Average Package</div>
                    </div>
                    <div class="highlight-card">
                        <div class="stat">200+</div>
                        <div class="label">Companies Visited</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Recruit Section -->
        <section class="section section-light">
            <div class="container">
                <div class="section-title">
                    <h2>Why Recruit from Shreyarth?</h2>
                    <p>Our students are groomed to be industry leaders, equipped with technical expertise and essential
                        soft skills to drive success.</p>
                </div>
                <div class="recruit-features">
                    <div class="feature-item"><i class="material-icons">school</i>
                        <div>
                            <h4>Academic Rigor</h4>
                            <p>A cutting-edge curriculum ensures our graduates are up-to-date with the latest trends.
                            </p>
                        </div>
                    </div>
                    <div class="feature-item"><i class="material-icons">construction</i>
                        <div>
                            <h4>Practical Skills & Exposure</h4>
                            <p>Emphasis on internships and live projects provides students with invaluable real-world
                                experience.</p>
                        </div>
                    </div>
                    <div class="feature-item"><i class="material-icons">groups</i>
                        <div>
                            <h4>Holistic Development</h4>
                            <p>We nurture well-rounded professionals with strong ethics, communication, and leadership
                                skills.</p>
                        </div>
                    </div>
                    <div class="feature-item"><i class="material-icons">diversity_3</i>
                        <div>
                            <h4>Diverse Talent Pool</h4>
                            <p>Access a wide range of talent from disciplines like engineering, management, and science.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Placement Process Section -->
        <section class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Our Placement Process</h2>
                    <p>A streamlined and collaborative process designed for efficiency and optimal outcomes for both
                        students and recruiters.</p>
                </div>
                <div class="process-timeline">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Corporate Outreach & Registration</h4>
                            <p>Our placement cell invites top companies and shares the student talent profile.
                                Recruiters register for the campus drive.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Pre-Placement Talks (PPT)</h4>
                            <p>Companies conduct presentations to inform students about their organization, roles, and
                                career opportunities.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Application & Shortlisting</h4>
                            <p>Interested students apply, and companies shortlist candidates based on their resumes and
                                academic records.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h4>Selection Process</h4>
                            <p>The core assessment stage, which includes aptitude tests, group discussions, and
                                technical/HR interviews.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <h4>Final Offers & Acceptance</h4>
                            <p>Companies extend job offers to the selected candidates, who then formally accept their
                                new roles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Esteemed Recruiters Section -->
        <section id="placement-partners" class="section section-light">
            <div class="container">
                <div class="section-title">
                    <h2>Our Placement Partners</h2>
                </div>
            </div>
            <div class="logo-carousel">
                <div class="logo-track">
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=google.com&sz=128" alt="Google"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=amazon.com&sz=128" alt="Amazon"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=microsoft.com&sz=128" alt="Microsoft"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=deloitte.com&sz=128" alt="Deloitte"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=tcs.com&sz=128" alt="TCS"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=infosys.com&sz=128" alt="Infosys"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=wipro.com&sz=128" alt="Wipro"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=gs.com&sz=128" alt="Goldman Sachs"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=accenture.com&sz=128" alt="Accenture"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ibm.com&sz=128" alt="IBM"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=oracle.com&sz=128" alt="Oracle"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=capgemini.com&sz=128" alt="Capgemini"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ey.com&sz=128" alt="EY"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=intel.com&sz=128" alt="Intel"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=cisco.com&sz=128" alt="Cisco"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=hdfcbank.com&sz=128" alt="HDFC Bank"></div>

                    <!-- Duplicate logos for seamless scroll -->
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=google.com&sz=128" alt="Google"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=amazon.com&sz=128" alt="Amazon"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=microsoft.com&sz=128" alt="Microsoft"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=deloitte.com&sz=128" alt="Deloitte"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=tcs.com&sz=128" alt="TCS"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=infosys.com&sz=128" alt="Infosys"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=wipro.com&sz=128" alt="Wipro"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=gs.com&sz=128" alt="Goldman Sachs"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=accenture.com&sz=128" alt="Accenture"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ibm.com&sz=128" alt="IBM"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=oracle.com&sz=128" alt="Oracle"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=capgemini.com&sz=128" alt="Capgemini"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ey.com&sz=128" alt="EY"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=intel.com&sz=128" alt="Intel"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=cisco.com&sz=128" alt="Cisco"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=hdfcbank.com&sz=128" alt="HDFC Bank"></div>
                </div>
            </div>
        </section>

        <!-- Student Success Stories -->
        <section class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Student Success Stories</h2>
                </div>
                <div class="success-grid">
                    <div class="story-card">
                        <div class="story-card-img"><img src="./assets/stu1.avif" alt="Rohan Mehra"></div>
                        <div class="story-card-content">
                            <blockquote>"Shreyarth provided the perfect platform to learn and grow. The projects I
                                worked on were directly relevant to the industry."</blockquote>
                            <p class="author">Rohan Mehra</p>
                            <p class="company">Data Analyst, Deloitte</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <div class="story-card-img"><img src="./assets/stu3.jpg" alt="Priya Sharma"></div>
                        <div class="story-card-content">
                            <blockquote>"The placement cell was incredibly supportive. Their grooming sessions gave me
                                the confidence to crack the interviews."</blockquote>
                            <p class="author">Priya Sharma</p>
                            <p class="company">Software Engineer, Microsoft</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <div class="story-card-img"><img src="./assets/stu2.jpg" alt="Aisha Khan"></div>
                        <div class="story-card-content">
                            <blockquote>"The connections our university has with top companies are amazing. I had the
                                opportunity to interview with my dream company."</blockquote>
                            <p class="author">Aisha Khan</p>
                            <p class="company">Management Trainee, Amazon</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Meet the Team Section -->
        <section class="section section-light">
            <div class="container">
                <div class="section-title">
                    <h2>Meet the Placement Team</h2>
                    <p>Our dedicated team works tirelessly to bridge the gap between students and the corporate world.
                    </p>
                </div>
                <div class="team-grid">
                    <div class="team-card">
                        <img src="./assets/pro1.webp" alt="Placement Head">
                        <h4>Dr. Sunita Desai</h4>
                        <p class="designation">Head of Corporate Relations</p>
                        <div class="contact-details">
                            <p><i class="material-icons">email</i> s.desai@shreyarth.edu</p>
                            <p><i class="material-icons">call</i> +1 234 567 8902</p>
                        </div>
                    </div>
                    <div class="team-card">
                        <img src="./assets/pro2.jpg" alt="Placement Coordinator">
                        <h4>Mr. Vikram Singh</h4>
                        <p class="designation">Placement Coordinator (Engineering)</p>
                        <div class="contact-details">
                            <p><i class="material-icons">email</i> v.singh@shreyarth.edu</p>
                            <p><i class="material-icons">call</i> +1 234 567 8903</p>
                        </div>
                    </div>
                    <div class="team-card">
                        <img src="./assets/pro3.jpg" alt="Placement Coordinator">
                        <h4>Ms. Anjali Mehta</h4>
                        <p class="designation">Placement Coordinator (Management)</p>
                        <div class="contact-details">
                            <p><i class="material-icons">email</i> a.mehta@shreyarth.edu</p>
                            <p><i class="material-icons">call</i> +1 234 567 8904</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ======================= FOOTER ======================= -->
   <?php include 'footer.php'; ?>

    <!-- No page-specific JavaScript needed -->

</body>

</html>