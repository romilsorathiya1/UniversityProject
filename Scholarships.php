<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarships - Shreyarth University</title>

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
            background-color: var(--secondary-color);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }
        
        /* --- Section Styling --- */
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

        /* --- STYLES FOR SCHOLARSHIPS PAGE --- */
        .scholarship-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 30px;
        }

        .scholarship-card {
            background-color: var(--light-text);
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .scholarship-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
        }

        .scholarship-header {
            padding: 25px;
            border-bottom: 1px solid #eee;
        }

        .scholarship-header .icon-wrapper {
            background-color: var(--secondary-color);
            color: var(--accent-color);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .scholarship-header .icon-wrapper .material-icons {
            font-size: 2.5em;
        }

        .scholarship-header h3 {
            font-family: var(--heading-font);
            font-size: 1.6em;
            color: var(--primary-color);
        }

        .scholarship-body {
            padding: 25px;
            flex-grow: 1;
        }

        .scholarship-body h4 {
            font-size: 1.1em;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .scholarship-body p {
            margin-bottom: 15px;
        }

        .scholarship-body ul {
            list-style: none;
            padding: 0;
        }

        .scholarship-body ul li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 8px;
        }

        .scholarship-body ul li::before {
            content: 'check_circle';
            font-family: 'Material Icons';
            color: var(--accent-color);
            position: absolute;
            left: 0;
            top: 2px;
            font-size: 1.2em;
        }

        .scholarship-footer {
            padding: 25px;
            background-color: #f8f9fa;
            border-top: 1px solid #eee;
            border-radius: 0 0 8px 8px;
        }

        .scholarship-apply-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--light-text);
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            text-align: center;
            width: 100%;
            transition: background-color 0.3s;
        }

        .scholarship-apply-btn:hover {
            background-color: var(--accent-color);
        }

        /* --- Media Queries --- */
        @media (max-width:767px) {
            .section {
                padding: 60px 20px
            }

            .section-title {
                font-size: 2.2em
            }
            
            .scholarship-grid {
                grid-template-columns: 1fr
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
                <h1 class="section-title">Scholarships & Financial Aid</h1>
                <p style="text-align: center; max-width: 800px; margin: -40px auto 60px;">Shreyarth University is
                    committed to making quality education accessible. We offer a variety of scholarships to recognize
                    talent, reward academic excellence, and provide financial assistance to deserving students.</p>

                <div class="scholarship-grid">
                    <!-- Scholarship 1: Merit-Based -->
                    <div class="scholarship-card">
                        <div class="scholarship-header">
                            <div class="icon-wrapper"><i class="material-icons">star</i></div>
                            <h3>President's Merit Scholarship</h3>
                        </div>
                        <div class="scholarship-body">
                            <h4>Awarded for Academic Excellence</h4>
                            <p>This prestigious scholarship is for students with outstanding academic records.</p>
                            <ul>
                                <li><strong>Benefit:</strong> Up to 100% tuition fee waiver.</li>
                                <li><strong>Eligibility:</strong> Minimum 95% in qualifying board exams or a top rank in
                                    entrance tests.</li>
                            </ul>
                        </div>
                        <div class="scholarship-footer">
                            <a href="#" class="scholarship-apply-btn">Get More Details at Office</a>
                        </div>
                    </div>

                    <!-- Scholarship 2: Need-Based -->
                    <div class="scholarship-card">
                        <div class="scholarship-header">
                            <div class="icon-wrapper"><i class="material-icons">volunteer_activism</i></div>
                            <h3>Shreyarth Cares Grant</h3>
                        </div>
                        <div class="scholarship-body">
                            <h4>Financial Aid for Deserving Students</h4>
                            <p>This grant is designed to support students from economically disadvantaged backgrounds.
                            </p>
                            <ul>
                                <li><strong>Benefit:</strong> Tuition fee assistance and hostel fee waiver.</li>
                                <li><strong>Eligibility:</strong> Based on family income criteria and submission of
                                    relevant documents.</li>
                            </ul>
                        </div>
                        <div class="scholarship-footer">
                            <a href="#" class="scholarship-apply-btn">Get More Details at Office</a>
                        </div>
                    </div>

                    <!-- Scholarship 3: Sports -->
                    <div class="scholarship-card">
                        <div class="scholarship-header">
                            <div class="icon-wrapper"><i class="material-icons">sports_soccer</i></div>
                            <h3>Sports Excellence Scholarship</h3>
                        </div>
                        <div class="scholarship-body">
                            <h4>For Outstanding Athletes</h4>
                            <p>This scholarship recognizes and supports students who have excelled in sports at the
                                state or national level.</p>
                            <ul>
                                <li><strong>Benefit:</strong> 50% tuition fee waiver and access to specialized training.
                                </li>
                                <li><strong>Eligibility:</strong> Must have represented their state or country in a
                                    recognized sport.</li>
                            </ul>
                        </div>
                        <div class="scholarship-footer">
                            <a href="#" class="scholarship-apply-btn">Get More Details at Office</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
   <?php include 'footer.php'; ?>

    <!-- No page-specific JavaScript needed for this page -->
</body>

</html>