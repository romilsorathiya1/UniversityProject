<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Calendars - Shreyarth University</title>

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

        /* --- STYLES FOR PAGE SECTIONS --- */
        .section {
            padding: 80px 20px;
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

        /* --- STYLES FOR CALENDAR PAGE --- */
        .calendar-controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
        }

        .calendar-controls button {
            padding: 12px 25px;
            font-family: var(--heading-font);
            font-size: 1em;
            font-weight: 600;
            color: var(--primary-color);
            background-color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calendar-controls button:hover {
            background-color: #dce1e2;
            border-color: #dce1e2;
        }

        .calendar-controls button.active {
            background-color: var(--primary-color);
            color: var(--light-text);
            border-color: var(--primary-color);
        }

        .calendar-wrapper {
            display: none;
        }

        .calendar-wrapper.active {
            display: block;
        }

        .calendar-container {
            width: 100%;
            overflow-x: auto;
        }

        .calendar-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 1.05em;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .1);
            border-radius: 8px;
            overflow: hidden;
        }

        .calendar-table thead tr {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: left;
            font-family: var(--heading-font);
            font-size: 1.1em;
        }

        .calendar-table td,
        .calendar-table th {
            padding: 15px 20px;
        }

        .calendar-table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .calendar-table tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
        }

        .calendar-table tbody tr:last-of-type {
            border-bottom: 2px solid var(--accent-color);
        }

        .calendar-table tbody tr:hover {
            background-color: #e9ecef;
        }

        .tag {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: .85em;
            font-weight: 600;
            color: var(--light-text);
            white-space: nowrap;
        }

        .tag-teaching {
            background-color: #3498db;
        }

        .tag-exam {
            background-color: #e74c3c;
        }

        .tag-holiday {
            background-color: #2ecc71;
        }

        .tag-event {
            background-color: #9b59b6;
        }

        .tag-break {
            background-color: #f39c12;
        }

        .tag-lab {
            background-color: #34495e;
        }

        .tag-code {
            background-color: #8e44ad;
        }

        .tag-corp {
            background-color: #16a085;
        }

        .tag-clinical {
            background-color: #c0392b;
        }

        /* --- MEDIA QUERIES FOR THIS PAGE --- */
        @media (max-width:767px) {
            .section {
                padding: 60px 20px;
            }

            .section-title {
                font-size: 2.2em;
            }

            .calendar-table thead {
                display: none;
            }

            .calendar-table,
            .calendar-table tbody,
            .calendar-table td,
            .calendar-table tr {
                display: block;
                width: 100%;
            }

            .calendar-table tr {
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, .05);
            }

            .calendar-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .calendar-table td:last-child {
                border-bottom: none;
            }

            .calendar-table td:before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: calc(50% - 30px);
                text-align: left;
                font-weight: 700;
                color: var(--primary-color);
            }
        }
    </style>
</head>

<body>
    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>

    <!-- MAIN CONTENT -->
    <main>
        <section class="section">
            <div class="container">
                <h1 class="section-title">Academic Calendars 2025-2026</h1>

                <!-- Calendar Filter Buttons -->
                <div class="calendar-controls">
                    <button class="active" data-target="engineering-calendar">School of Engineering</button>
                    <button data-target="cs-calendar">School of Computer Science</button>
                    <button data-target="business-calendar">School of Business</button>
                    <button data-target="nursing-calendar">School of Nursing</button>
                </div>

                <!-- Engineering Calendar -->
                <div id="engineering-calendar" class="calendar-wrapper active">
                    <h2 style="text-align:center; margin-bottom: 20px; font-family: var(--heading-font);">School of
                        Engineering</h2>
                    <div class="calendar-container">
                        <table class="calendar-table">
                            <thead>
                                <tr>
                                    <th>Date(s)</th>
                                    <th>Event / Activity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Date(s)">Aug 18, 2025</td>
                                    <td data-label="Event">Semester I Begins</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Aug 19 - Oct 10, 2025</td>
                                    <td data-label="Event">Teaching & Lab Phase I</td>
                                    <td data-label="Category"><span class="tag tag-teaching">Teaching</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Sep 22, 2025</td>
                                    <td data-label="Event">Project Proposal Submissions Due</td>
                                    <td data-label="Category"><span class="tag tag-lab">Lab/Project</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 13 - Oct 17, 2025</td>
                                    <td data-label="Event">Mid-Term Theory & Practical Exams</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 03 - Dec 12, 2025</td>
                                    <td data-label="Event">Teaching & Lab Phase II</td>
                                    <td data-label="Category"><span class="tag tag-teaching">Teaching</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 17 - Nov 21, 2025</td>
                                    <td data-label="Event">Tech Fest 'Innovate 2025'</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Dec 15 - Dec 19, 2025</td>
                                    <td data-label="Event">Final Examinations & Project Viva</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Computer Science Calendar -->
                <div id="cs-calendar" class="calendar-wrapper">
                    <h2 style="text-align:center; margin-bottom: 20px; font-family: var(--heading-font);">School of
                        Computer Science</h2>
                    <div class="calendar-container">
                        <table class="calendar-table">
                            <thead>
                                <tr>
                                    <th>Date(s)</th>
                                    <th>Event / Activity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Date(s)">Aug 18, 2025</td>
                                    <td data-label="Event">Semester I Begins</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 04 - Oct 05, 2025</td>
                                    <td data-label="Event">24-Hour Hackathon: "Code for Good"</td>
                                    <td data-label="Category"><span class="tag tag-code">Coding Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 20 - Oct 24, 2025</td>
                                    <td data-label="Event">Mid-Term Examinations</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 10, 2025</td>
                                    <td data-label="Event">AI & ML Workshop with Industry Guest</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 24, 2025</td>
                                    <td data-label="Event">Software Project Milestone 1 Due</td>
                                    <td data-label="Category"><span class="tag tag-code">Coding Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Dec 15 - Dec 19, 2025</td>
                                    <td data-label="Event">Final Examinations</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Business Calendar -->
                <div id="business-calendar" class="calendar-wrapper">
                    <h2 style="text-align:center; margin-bottom: 20px; font-family: var(--heading-font);">School of
                        Business</h2>
                    <div class="calendar-container">
                        <table class="calendar-table">
                            <thead>
                                <tr>
                                    <th>Date(s)</th>
                                    <th>Event / Activity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Date(s)">Aug 18, 2025</td>
                                    <td data-label="Event">Semester I Begins</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Sep 15 - Sep 19, 2025</td>
                                    <td data-label="Event">Networking & Corporate Guest Lecture Week</td>
                                    <td data-label="Category"><span class="tag tag-corp">Corporate</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 20 - Oct 24, 2025</td>
                                    <td data-label="Event">Mid-Term Examinations</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 06 - Nov 07, 2025</td>
                                    <td data-label="Event">National Business Plan Competition</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 17, 2025</td>
                                    <td data-label="Event">Internship Fair</td>
                                    <td data-label="Category"><span class="tag tag-corp">Corporate</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Dec 15 - Dec 19, 2025</td>
                                    <td data-label="Event">Final Examinations</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Nursing Calendar -->
                <div id="nursing-calendar" class="calendar-wrapper">
                    <h2 style="text-align:center; margin-bottom: 20px; font-family: var(--heading-font);">School of
                        Nursing</h2>
                    <div class="calendar-container">
                        <table class="calendar-table">
                            <thead>
                                <tr>
                                    <th>Date(s)</th>
                                    <th>Event / Activity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Date(s)">Aug 18, 2025</td>
                                    <td data-label="Event">Semester I & Clinical Rotations Begin</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Sep 08 - Sep 12, 2025</td>
                                    <td data-label="Event">Simulation Lab Focus Week</td>
                                    <td data-label="Category"><span class="tag tag-clinical">Clinical</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 06, 2025</td>
                                    <td data-label="Event">Community Health Camp</td>
                                    <td data-label="Category"><span class="tag tag-event">Event</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Oct 27 - Oct 31, 2025</td>
                                    <td data-label="Event">Mid-Term Written & Practical Exams</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Nov 10 - Dec 12, 2025</td>
                                    <td data-label="Event">Clinical Placement II</td>
                                    <td data-label="Category"><span class="tag tag-clinical">Clinical</span></td>
                                </tr>
                                <tr>
                                    <td data-label="Date(s)">Dec 15 - Dec 19, 2025</td>
                                    <td data-label="Event">Final Examinations</td>
                                    <td data-label="Category"><span class="tag tag-exam">Exams</span></td>
                                </tr>
                            </tbody>
                        </table>
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
            // --- Academic Calendar Filtering Logic ---
            const filterButtons = document.querySelectorAll('.calendar-controls button');
            const calendarWrappers = document.querySelectorAll('.calendar-wrapper');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');

                    // Update button active state
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    // Update calendar visibility
                    calendarWrappers.forEach(calendar => {
                        if (calendar.id === targetId) {
                            calendar.classList.add('active');
                        } else {
                            calendar.classList.remove('active');
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>