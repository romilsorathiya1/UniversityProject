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

// --- DATA FETCHING FOR CIRCULARS PAGE ---
$sql_circulars = "SELECT * FROM circulars ORDER BY publish_date DESC";
$circulars = $conn->query($sql_circulars)->fetch_all(MYSQLI_ASSOC);

// Helper to map DB type to a CSS class for styling
function get_category_class($type) {
    switch (strtolower($type)) {
        case 'examination':
            return 'category-exam';
        case 'event':
            return 'category-event';
        case 'academic':
            return 'category-academic';
        default:
            return 'category-notice'; // For "Other" or any new types
    }
}

// =========== END OF PHP LOGIC ===========
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circulars - Shreyarth University</title>

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
            background-color: #f9f9f9;
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
        
        .no-circulars-message {
            text-align: center;
            font-size: 1.2em;
            color: #7f8c8d;
            padding: 40px;
            background: #ffffff;
            border: 1px dashed #ddd;
            border-radius: 8px;
        }

        .circulars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .circular-card {
            background-color: var(--light-text);
            border: 1px solid #e0e0e0;
            border-left: 5px solid var(--primary-color);
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }

        .circular-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .circular-card.category-exam { border-left-color: #e74c3c; } /* Red */
        .circular-card.category-event { border-left-color: #9b59b6; } /* Purple */
        .circular-card.category-academic { border-left-color: #3498db; } /* Blue */
        .circular-card.category-notice { border-left-color: #f39c12; } /* Orange */

        .circular-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .circular-date {
            font-weight: 600;
        }

        .circular-category-tag {
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 15px;
            color: white;
        }

        .category-exam .circular-category-tag { background-color: #e74c3c; }
        .category-event .circular-category-tag { background-color: #9b59b6; }
        .category-academic .circular-category-tag { background-color: #3498db; }
        .category-notice .circular-category-tag { background-color: #f39c12; }

        .circular-card h3 {
            font-family: var(--heading-font);
            font-size: 1.4em;
            color: var(--primary-color);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .circular-card p {
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .circular-download {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--light-text);
            background-color: var(--primary-color);
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s;
            align-self: flex-start;
        }

        .circular-download:hover {
            background-color: var(--accent-color);
        }

        @media (max-width:767px) {
            .section { padding: 60px 20px; }
            .section-title { font-size: 2.2em; }
            .circulars-grid { grid-template-columns: 1fr; }
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
                <h1 class="section-title">Circulars & Notices</h1>

                <div class="circulars-grid">
                    <?php if (!empty($circulars)): ?>
                        <?php foreach($circulars as $circular): ?>
                            <?php $category_class = get_category_class($circular['type']); ?>
                            <div class="circular-card <?php echo $category_class; ?>">
                                <div class="circular-meta">
                                    <span class="circular-date"><?php echo date('F j, Y', strtotime($circular['publish_date'])); ?></span>
                                    <span class="circular-category-tag"><?php echo htmlspecialchars($circular['type']); ?></span>
                                </div>
                                <h3><?php echo htmlspecialchars($circular['title']); ?></h3>
                                <p><?php echo nl2br(htmlspecialchars($circular['description'])); ?></p>
                                
                                <?php if (!empty($circular['file_path'])): ?>
                                <a href="<?php echo htmlspecialchars($circular['file_path']); ?>" class="circular-download" target="_blank" download>
                                    <i class="material-icons">download</i>
                                    <span>Download</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-circulars-message">
                            <p>No circulars have been posted at the moment. Please check back later.</p>
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