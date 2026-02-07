<?php
// --- DATABASE CONFIGURATION ---
$db_host = 'localhost:3307';
$db_user = 'root';
$db_pass = '';
$db_name = 'college_db';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- FETCH OPENINGS DATA ---
$sql_openings = "SELECT * FROM openings ORDER BY posted_date DESC";
$openings_result = $conn->query($sql_openings);
$openings = $openings_result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - Shreyarth University</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome for Social Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS STYLES FOR THIS PAGE ONLY -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #ecf0f1;
            --accent-color: #1abc9c;
            --text-color: #34495e;
            --light-text: #ffffff;
            --heading-font: 'Montserrat', sans-serif;
            --body-font: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--body-font);
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--light-text);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
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

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .benefit-item {
            padding: 20px;
        }

        .benefit-item .material-icons {
            font-size: 3.5em;
            color: var(--accent-color);
        }

        .benefit-item h3 {
            font-family: var(--heading-font);
            font-size: 1.4em;
            color: var(--primary-color);
            margin: 15px 0 10px;
        }

        .job-listings-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .job-listing {
            background-color: var(--light-text);
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            padding: 25px 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            transition: border-left 0.3s, box-shadow 0.3s;
            border-left: 5px solid transparent;
        }
        
        .job-listing:hover {
            border-left-color: var(--accent-color);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .job-details {
            flex: 1 1 500px;
        }

        .job-details h3 {
            font-family: var(--heading-font);
            font-size: 1.5em;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            color: #7f8c8d;
            font-weight: 500;
        }

        .job-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .job-apply {
            flex-shrink: 0;
        }

        .apply-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--light-text);
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .apply-btn:hover {
            background-color: var(--accent-color);
        }

        .no-openings {
            text-align: center;
            padding: 40px;
            background-color: var(--secondary-color);
            border-radius: 8px;
        }

        .no-openings p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        @media (max-width:767px){
            .section{padding:60px 20px}
            .section-title{font-size:2.2em}
            .job-listing{flex-direction:column;align-items:flex-start}
            .job-details{width:100%;margin-bottom:20px}
            .job-apply{width:100%}
            .apply-btn{width:100%;text-align:center}
        }
    </style>
</head>
<body>
    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>


    <!-- MAIN CONTENT -->
    <main>
        <!-- Section 1: Why Work With Us -->
        <section class="section section-light">
            <div class="container">
                <h1 class="section-title">Join Our Team</h1>
                <p style="text-align: center; max-width: 800px; margin: -40px auto 60px;">At Shreyarth University, we believe that our faculty and staff are our greatest assets. We are dedicated to creating a supportive, inclusive, and dynamic environment where you can grow, innovate, and make a real impact on the future of education.</p>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <i class="material-icons">school</i>
                        <h3>Academic Freedom</h3>
                        <p>We encourage innovative teaching methods and provide the autonomy to pursue groundbreaking research.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="material-icons">trending_up</i>
                        <h3>Professional Growth</h3>
                        <p>Access continuous learning opportunities, workshops, and conferences to advance your career.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="material-icons">groups</i>
                        <h3>Collaborative Culture</h3>
                        <p>Be a part of a diverse and collaborative community that values teamwork and shared success.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Open Positions -->
        <section class="section">
            <div class="container">
                <h2 class="section-title">Current Openings</h2>
                <div class="job-listings-container">
                    
                    <?php if (empty($openings)): ?>
                        <!-- Display this message if no openings are found -->
                        <div class="no-openings">
                            <p>There are no open positions at this time.</p>
                            <p>Please check back later or send your resume to careers@shreyarth.edu to be considered for future opportunities.</p>
                        </div>
                    <?php else: ?>
                        <!-- Loop through and display each opening from the database -->
                        <?php foreach ($openings as $opening): ?>
                        <div class="job-listing">
                            <div class="job-details">
                                <h3><?php echo htmlspecialchars($opening['title']); ?></h3>
                                <div class="job-meta">
                                    <span><i class="material-icons">business</i><?php echo htmlspecialchars($opening['department']); ?></span>
                                    <span><i class="material-icons">location_on</i><?php echo htmlspecialchars($opening['location']); ?></span>
                                </div>
                            </div>
                            <div class="job-apply">
                                <a href="#" class="apply-btn">Visit Career Office</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

</body>
</html> 