<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination - Shreyarth University</title>

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
            --border-color: #e0e0e0;
        }

        /* Basic styles needed for page content if not already in header */
        body {
            font-family: var(--body-font);
            line-height: 1.7;
            color: var(--text-color);
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        /* --- PAGE-SPECIFIC STYLES: EXAMINATION --- */
        .page-header {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url(./assets/examination.865Z.png) no-repeat center center/cover;
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
            background-color: var(--light-text);
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
            max-width: 600px;
            margin: 0 auto;
            color: var(--text-color);
        }

        /* Main Content Layout */
        .exam-content-wrapper {
            display: flex;
            gap: 50px;
        }

        .main-content {
            flex: 2;
        }

        .sidebar {
            flex: 1;
        }

        .content-box {
            background: var(--light-text);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
            margin-bottom: 40px;
        }

        .content-box h3 {
            font-family: var(--heading-font);
            font-size: 1.8em;
            color: var(--primary-color);
            margin-bottom: 25px;
            border-bottom: 3px solid var(--accent-color);
            padding-bottom: 10px;
        }

        /* Rules List Styling */
        .rules-list {
            list-style: none;
            padding-left: 0;
        }

        .rules-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .rules-list .material-icons {
            font-size: 1.5em;
            color: var(--accent-color);
            margin-right: 15px;
            margin-top: 4px;
        }

        /* Grievance Box */
        .grievance-box p {
            margin-bottom: 20px;
        }

        .grievance-box .contact-info {
            font-weight: 600;
            color: var(--primary-color);
        }

        .grievance-box .contact-info a {
            color: var(--accent-color);
            text-decoration: none;
        }

        /* FAQ Accordion */
        .faq-accordion .faq-item {
            border-bottom: 1px solid var(--border-color);
        }

        .faq-accordion .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.1em;
            color: var(--primary-color);
        }

        .faq-question::after {
            content: '\e5cf';
            font-family: 'Material Icons';
            font-size: 1.5em;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }

        .faq-answer p {
            padding: 0 0 20px;
            border-top: 1px dashed var(--border-color);
            margin-top: -10px;
            padding-top: 20px;
        }
        
        /* ======================= MEDIA QUERIES FOR THIS PAGE ======================= */
        @media (max-width: 1023px) {
            .exam-content-wrapper { flex-direction: column; }
        }
        
        @media (max-width: 768px) {
            .section { padding: 60px 20px; }
            .page-header h1 { font-size: 2.5em; }
            .section-title h2 { font-size: 2.2em; }
            .content-box { padding: 30px; }
            .content-box h3 { font-size: 1.6em; }
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
                <h1>Examination Portal</h1>
                <p>Your central hub for all examination-related information, schedules, and guidelines.</p>
            </div>
        </section>

        <section class="section">
            <div class="container">

                <div class="exam-content-wrapper">
                    <!-- Main Content Area -->
                    <div class="main-content">
                        <div class="content-box">
                            <h3>Core Principles</h3>
                            <p>The Office of the Controller of Examinations is committed to conducting examinations and
                                evaluating student performance in a fair, transparent, and timely manner. We uphold the
                                principles of academic integrity and strive to provide a secure and standardized
                                environment for all assessments.</p>
                        </div>

                        <div class="content-box">
                            <h3>Rules & Regulations</h3>
                            <ul class="rules-list">
                                <li><i class="material-icons">badge</i>
                                    <div>Students must carry their University ID Card and Examination Hall Ticket at all
                                        times within the exam hall.</div>
                                </li>
                                <li><i class="material-icons">watch</i>
                                    <div>Students must be seated in the examination hall at least 15 minutes before the
                                        scheduled start time. No entry will be permitted after 30 minutes.</div>
                                </li>
                                <li><i class="material-icons">devices_other</i>
                                    <div>Mobile phones, smart watches, and any other electronic devices are strictly
                                        prohibited inside the examination hall.</div>
                                </li>
                                <li><i class="material-icons">edit_off</i>
                                    <div>No student will be allowed to leave the examination hall during the first hour
                                        and the last 30 minutes of the exam.</div>
                                </li>
                                <li><i class="material-icons">no_meeting_room</i>
                                    <div>Engaging in any form of malpractice, including talking, cheating, or exchanging
                                        materials, will result in immediate disqualification and disciplinary action.
                                    </div>
                                </li>
                                <li><i class="material-icons">menu_book</i>
                                    <div>Only approved stationery and non-programmable calculators (if permitted for the
                                        specific exam) are allowed.</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sidebar Area -->
                    <div class="sidebar">
                        <div class="content-box grievance-box">
                            <h3>Grievance Redressal</h3>
                            <p>For any discrepancies in timetables, seating arrangements, or results, students are
                                advised to contact the Examination Cell immediately.</p>
                            <p class="contact-info">
                                <i class="material-icons" style="vertical-align: middle; margin-right: 8px;">email</i>
                                Email: <a href="mailto:coe@shreyarth.edu">coe@shreyarth.edu</a>
                            </p>
                            <p class="contact-info">
                                <i class="material-icons" style="vertical-align: middle; margin-right: 8px;">call</i>
                                Phone: +1 234 567 8901
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- FAQ Section -->
        <section class="section section-light">
            <div class="container">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>Find quick answers to common questions about our examination process.</p>
                </div>
                <div class="content-box faq-accordion" id="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">What should I do if I lose my Hall Ticket?</div>
                        <div class="faq-answer">
                            <p>In case of a lost Hall Ticket, you must immediately report to the Student Services
                                Office. A duplicate ticket may be issued after verification and payment of a nominal
                                fee. It is mandatory to carry the Hall Ticket for every exam.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">How can I apply for re-evaluation?</div>
                        <div class="faq-answer">
                            <p>The re-evaluation application forms will be made available on the university website
                                shortly after the results are declared. Students can fill out the form online, pay the
                                prescribed fee, and submit it within the stipulated deadline.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Is there a provision for makeup exams if I miss one?</div>
                        <div class="faq-answer">
                            <p>A makeup examination may be granted only under exceptional circumstances, such as a
                                severe medical emergency (with valid proof from a registered medical practitioner) or a
                                family tragedy. The student must apply to the Controller of Examinations within three
                                working days of the missed exam.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">When are the results typically declared?</div>
                        <div class="faq-answer">
                            <p>The university strives to declare the results within 30-45 days from the date of the last
                                examination for the semester. All official result notifications will be published on the
                                university's main website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>


    <!-- JAVASCRIPT FOR THIS PAGE ONLY -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- FAQ Accordion Logic ---
            const faqContainer = document.getElementById('faq-container');
            if (faqContainer) {
                faqContainer.addEventListener('click', function (e) {
                    const question = e.target.closest('.faq-question');
                    if (!question) return;

                    const item = question.parentElement;
                    const answer = item.querySelector('.faq-answer');
                    
                    const currentlyActive = document.querySelector('.faq-item.active');
                    if (currentlyActive && currentlyActive !== item) {
                        currentlyActive.classList.remove('active');
                        currentlyActive.querySelector('.faq-answer').style.maxHeight = 0;
                    }

                    item.classList.toggle('active');

                    if (item.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                    } else {
                        answer.style.maxHeight = 0;
                    }
                });
            }
        });
    </script>

</body>

</html>