<?php
// =========== START OF PHP LOGIC ===========

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

// --- DATA FETCHING FOR ACHIEVEMENTS PAGE ---
$sql_achievements = "SELECT * FROM achievements ORDER BY achievement_date DESC";
$achievements = $conn->query($sql_achievements)->fetch_all(MYSQLI_ASSOC);

// =========== END OF PHP LOGIC ===========
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - Shreyarth University</title>

    <!-- Google Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap"
        rel="stylesheet">
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
        
        .no-achievements-message {
            text-align: center;
            font-size: 1.2em;
            color: #7f8c8d;
            padding: 40px;
            background: #ffffff;
            border: 1px dashed #ddd;
            border-radius: 8px;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .achievement-card {
            background-color: var(--light-text);
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .achievement-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .achievement-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .achievement-content {
            padding: 25px;
            flex-grow: 1;
        }

        .achievement-category {
            display: inline-block;
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .achievement-card h3 {
            font-family: var(--heading-font);
            font-size: 1.5em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .achiever-name {
            font-style: italic;
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 15px;
            display: block;
        }

        @media (max-width:767px) {
            .section {
                padding: 60px 20px;
            }

            .section-title {
                font-size: 2.2em;
            }

            .achievements-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>


    <!-- MAIN CONTENT -->
    <main>
        <section class="section section-light">
            <div class="container">
                <h1 class="section-title">Our Achievements</h1>

                <div class="achievements-grid">
                    <?php if (!empty($achievements)): ?>
                        <?php foreach ($achievements as $achievement): ?>
                        <div class="achievement-card">
                            <img src="<?php echo !empty($achievement['image_path']) ? htmlspecialchars($achievement['image_path']) : 'https://via.placeholder.com/400x220.png/1abc9c/ffffff?text=Achievement'; ?>"
                                alt="<?php echo htmlspecialchars($achievement['title']); ?>">
                            <div class="achievement-content">
                                <span class="achievement-category"><?php echo htmlspecialchars($achievement['field']); ?></span>
                                <h3><?php echo htmlspecialchars($achievement['title']); ?></h3>
                                <span class="achiever-name"><?php echo htmlspecialchars($achievement['awarded_to']); ?></span>
                                <p><?php echo nl2br(htmlspecialchars($achievement['description'])); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-achievements-message">
                            <p>No achievements have been recorded yet. Check back soon to see our accolades!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

</body>
</html>