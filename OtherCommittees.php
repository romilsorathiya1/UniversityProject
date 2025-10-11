<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Committees - Shreyarth University</title>

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
            background: linear-gradient(rgba(44, 62, 80, 0.75), rgba(44, 62, 80, 0.75)), url(./assets/committees.580Z.png) no-repeat center center/cover;
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

        .committees-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 30px;
        }

        .committee-card {
            background-color: var(--light-text);
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .committee-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .committee-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .committee-icon .material-icons {
            font-size: 2.5em;
            color: var(--light-text);
            background-color: var(--accent-color);
            padding: 15px;
            border-radius: 50%;
        }

        .committee-title h3 {
            font-family: var(--heading-font);
            color: var(--primary-color);
            font-size: 1.5em;
            margin: 0;
        }

        .committee-body p {
            margin-bottom: 25px;
        }

        .committee-members h4 {
            font-family: var(--heading-font);
            color: var(--primary-color);
            font-size: 1.1em;
            margin-bottom: 15px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 8px;
        }

        .committee-members ul {
            list-style: none;
            padding-left: 0;
        }

        .committee-members li {
            margin-bottom: 8px;
            font-weight: 500;
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

        /* --- MEDIA QUERIES FOR THIS PAGE --- */
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

            .committees-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
   <?php include 'header.php'; ?>

    <!-- ======================= MAIN CONTENT ======================= -->
    <main>
        <section class="page-header animated-section">
            <div class="container">
                <h1>University Committees</h1>
                <p>Ensuring Excellence, Governance, and Student Welfare</p>
            </div>
        </section>

        <section class="section section-light">
            <div class="container">
                <div class="committees-grid">
                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">security</i></div>
                            <div class="committee-title">
                                <h3>Anti-Ragging Committee</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>Dedicated to maintaining a safe, welcoming, and ragging-free environment on campus, in
                                compliance with UGC regulations. This committee proactively addresses and resolves any
                                incidents of ragging.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Dr. Anjali Verma - Chairperson</li>
                                    <li>Prof. Sameer Khan - Member</li>
                                    <li>Ms. Priya Sharma - Student Representative</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">verified</i></div>
                            <div class="committee-title">
                                <h3>Internal Quality Assurance Cell (IQAC)</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>The IQAC is responsible for planning, guiding, and monitoring all quality assurance and
                                enhancement activities within the university, ensuring continuous improvement in
                                academic and administrative performance.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Dr. Rajendra Patel - Coordinator</li>
                                    <li>Prof. Neha Desai - Member</li>
                                    <li>Mr. Alok Gupta - Industry Expert</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">support_agent</i></div>
                            <div class="committee-title">
                                <h3>Grievance Redressal Cell</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>Provides a platform for students and staff to voice their grievances. The cell ensures
                                that all complaints are handled with confidentiality, impartiality, and efficiency to
                                promote a fair campus environment.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Prof. Mohan Kumar - Presiding Officer</li>
                                    <li>Mrs. Sunita Singh - Member</li>
                                    <li>Mr. Rohan Mehta - Student Representative</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">woman</i></div>
                            <div class="committee-title">
                                <h3>Women Development Cell (WDC)</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>The WDC works towards creating a gender-sensitive campus and empowering female students
                                and staff. It organizes workshops, seminars, and awareness programs on gender equality
                                and women's rights.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Dr. Geeta Iyengar - Chairperson</li>
                                    <li>Prof. Ritu Kapoor - Member</li>
                                    <li>Ms. Aisha Patel - Student Coordinator</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">local_library</i></div>
                            <div class="committee-title">
                                <h3>Library Committee</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>Advises on the development and management of the university's library resources. This
                                committee helps in formulating policies for book procurement, modernization, and
                                effective utilization of the library.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Dr. Harish Trivedi - Head Librarian</li>
                                    <li>Prof. Suresh Iyer - Faculty Representative</li>
                                    <li>Ms. Sneha Jain - Student Member</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="committee-card animated-section">
                        <div class="committee-header">
                            <div class="committee-icon"><i class="material-icons">sports_cricket</i></div>
                            <div class="committee-title">
                                <h3>Sports and Cultural Committee</h3>
                            </div>
                        </div>
                        <div class="committee-body">
                            <p>Responsible for organizing and promoting a wide range of sports and cultural activities
                                throughout the year. The committee fosters teamwork, creativity, and a vibrant campus
                                life beyond academics.</p>
                            <div class="committee-members">
                                <h4>Key Members</h4>
                                <ul>
                                    <li>Mr. Vikram Rathod - Sports Officer</li>
                                    <li>Mrs. Kavita Nair - Cultural Coordinator</li>
                                    <li>Mr. Arjun Das - Student Captain</li>
                                </ul>
                            </div>
                        </div>
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
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            animatedSections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>

</html>