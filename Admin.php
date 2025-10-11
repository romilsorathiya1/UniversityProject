<?php
// =========== START OF PHP LOGIC ===========

session_start();

// --- DATABASE CONFIGURATION ---
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'college_db';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- FILE UPLOAD HELPER FUNCTION ---
function handle_upload($file_key, $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx']) {
    if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = uniqid() . '-' . basename($_FILES[$file_key]['name']);
        $target_path = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $target_path)) {
                return $target_path;
            }
        }
    }
    return null; // Return null if no file or upload fails
}

// --- FORM & ACTION HANDLING (POST REQUESTS) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                header("Location: admin.php");
                exit;
            }
        }
        $login_error = "Invalid username or password.";
    }

    if (isset($_SESSION['admin_id'])) {
        $action = $_POST['action'] ?? '';
        switch ($action) {
            case 'add_event':
                $image_path = handle_upload('eventImage', ['jpg', 'jpeg', 'png', 'gif']);
                $stmt = $conn->prepare("INSERT INTO events (name, date, type, location, image_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $_POST['eventName'], $_POST['eventDate'], $_POST['eventType'], $_POST['eventLocation'], $image_path);
                $stmt->execute();
                header("Location: admin.php#events");
                exit;

            case 'add_circular':
                $file_path = handle_upload('circularFile', ['pdf', 'doc', 'docx']);
                $stmt = $conn->prepare("INSERT INTO circulars (title, description, publish_date, type, file_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $_POST['circularTitle'], $_POST['circularDescription'], $_POST['circularDate'], $_POST['circularType'], $file_path);
                $stmt->execute();
                header("Location: admin.php#circulars");
                exit;
            
            case 'add_achievement':
                $image_path = handle_upload('achievementImage', ['jpg', 'jpeg', 'png', 'gif']);
                $stmt = $conn->prepare("INSERT INTO achievements (title, awarded_to, description, field, achievement_date, image_path) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $_POST['achievementTitle'], $_POST['achievementAwardedTo'], $_POST['achievementDescription'], $_POST['achievementField'], $_POST['achievementDate'], $image_path);
                $stmt->execute();
                header("Location: admin.php#achievements");
                exit;

            case 'add_opening':
                $stmt = $conn->prepare("INSERT INTO openings (title, department, location) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $_POST['openingTitle'], $_POST['openingDepartment'], $_POST['openingLocation']);
                $stmt->execute();
                header("Location: admin.php#openings");
                exit;
        }
    }
}


// --- DELETION & LOGOUT HANDLING (GET REQUESTS) ---
if (isset($_SESSION['admin_id'])) {
    $action = $_GET['action'] ?? '';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($action === 'logout') {
        session_destroy();
        header("Location: admin.php");
        exit;
    }

    if ($id > 0) {
        $table = '';
        $redirect_hash = '';
        // Special handling for deleting files
        if ($action === 'delete_event' || $action === 'delete_circular' || $action === 'delete_achievement') {
            $field = '';
            if ($action === 'delete_event' || $action === 'delete_achievement') $field = 'image_path';
            if ($action === 'delete_circular') $field = 'file_path';
            
            if ($action === 'delete_event') $table = 'events';
            elseif ($action === 'delete_circular') $table = 'circulars';
            elseif ($action === 'delete_achievement') $table = 'achievements';

            if (!empty($table)) {
                $stmt = $conn->prepare("SELECT $field FROM $table WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_assoc();
                if ($result && !empty($result[$field]) && file_exists($result[$field])) {
                    unlink($result[$field]); // Delete the file from server
                }
            }
        }
        
        switch ($action) {
            case 'delete_event': $table = 'events'; $redirect_hash = '#events'; break;
            case 'delete_circular': $table = 'circulars'; $redirect_hash = '#circulars'; break;
            case 'delete_enquiry': $table = 'enquiries'; $redirect_hash = '#admission-enquiry'; break;
            case 'delete_achievement': $table = 'achievements'; $redirect_hash = '#achievements'; break;
            case 'delete_opening': $table = 'openings'; $redirect_hash = '#openings'; break;
        }
        
        if (!empty($table)) {
            $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            header("Location: admin.php" . $redirect_hash);
            exit;
        }
    }
}


// --- LOGIN PAGE ---
if (!isset($_SESSION['admin_id'])) {
    ?>
    <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Admin Login</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"><style>:root { --primary-color: #2c3e50; --accent-color: #3498db; --secondary-color: #f4f5f7; } body { font-family: 'Poppins', sans-serif; background: var(--secondary-color); display: grid; place-items: center; height: 100vh; margin: 0; padding: 1rem; } .login-container { background: white; padding: 2.5rem; border-radius: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; } .login-container h2 { margin-bottom: 0.5rem; color: var(--primary-color); } .login-container .logo-span { color: var(--accent-color); } .login-container p { margin-bottom: 2rem; color: #7d8da1; } .form-group { text-align: left; margin-bottom: 1.5rem; } .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; } .form-group input { box-sizing: border-box; width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.5rem; font-size: 1rem; } .btn-primary { background: var(--accent-color); color: white; padding: 0.8rem 1.5rem; border-radius: 0.5rem; cursor: pointer; display: block; width: 100%; font-size: 1rem; font-weight: 500; border: none; } .error { color: #e74c3c; margin-top: 1rem; }</style></head><body><div class="login-container"><h2>Admin Panel <span class="logo-span">Login</span></h2><p>Welcome back! Please enter your details.</p><form action="admin.php" method="POST"><input type="hidden" name="action" value="login"><div class="form-group"><label for="username">Username</label><input type="text" name="username" id="username" required></div><div class="form-group"><label for="password">Password</label><input type="password" name="password" id="password" required></div><button type="submit" class="btn-primary">Login</button><?php if (!empty($login_error)): ?><p class="error"><?php echo $login_error; ?></p><?php endif; ?></form></div></body></html>
    <?php
    exit;
}

// --- DATA FETCHING FOR LOGGED-IN ADMIN ---
$total_events = $conn->query("SELECT COUNT(*) as count FROM events")->fetch_assoc()['count'];
$total_enquiries = $conn->query("SELECT COUNT(*) as count FROM enquiries")->fetch_assoc()['count'];
$total_achievements = $conn->query("SELECT COUNT(*) as count FROM achievements")->fetch_assoc()['count'];
$total_circulars = $conn->query("SELECT COUNT(*) as count FROM circulars")->fetch_assoc()['count'];
$total_openings = $conn->query("SELECT COUNT(*) as count FROM openings")->fetch_assoc()['count'];

$event_search = $_GET['event_search'] ?? '';
$event_type_filter = $_GET['event_type'] ?? 'all';
$sql_events = "SELECT * FROM events WHERE name LIKE ? OR location LIKE ?";
$params_events = ["%$event_search%", "%$event_search%"];
if ($event_type_filter !== 'all') {
    $sql_events .= " AND type = ?";
    $params_events[] = $event_type_filter;
}
$sql_events .= " ORDER BY date DESC";
$stmt_events = $conn->prepare($sql_events);
$stmt_events->bind_param(str_repeat('s', count($params_events)), ...$params_events);
$stmt_events->execute();
$events = $stmt_events->get_result()->fetch_all(MYSQLI_ASSOC);

$sql_circulars = "SELECT * FROM circulars ORDER BY publish_date DESC";
$circulars = $conn->query($sql_circulars)->fetch_all(MYSQLI_ASSOC);

$sql_enquiries = "SELECT * FROM enquiries ORDER BY enquiry_date DESC";
$enquiries = $conn->query($sql_enquiries)->fetch_all(MYSQLI_ASSOC);

$sql_achievements = "SELECT * FROM achievements ORDER BY achievement_date DESC";
$achievements = $conn->query($sql_achievements)->fetch_all(MYSQLI_ASSOC);

$sql_openings = "SELECT * FROM openings ORDER BY posted_date DESC";
$openings = $conn->query($sql_openings)->fetch_all(MYSQLI_ASSOC);

// --- DYNAMIC CHART DATA FETCHING ---
$chart_labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$chart_data = array_fill(0, 12, 0); // Creates an array with 12 zeros

$current_year = date('Y');
$sql_chart = "SELECT MONTH(enquiry_date) as month, COUNT(id) as count 
              FROM enquiries 
              WHERE YEAR(enquiry_date) = ? 
              GROUP BY MONTH(enquiry_date)";
$stmt_chart = $conn->prepare($sql_chart);
$stmt_chart->bind_param("s", $current_year);
$stmt_chart->execute();
$chart_result = $stmt_chart->get_result();

while ($row = $chart_result->fetch_assoc()) {
    $month_index = $row['month'] - 1; // Adjust month to be 0-indexed for the array
    if ($month_index >= 0 && $month_index < 12) {
        $chart_data[$month_index] = $row['count'];
    }
}

// Convert PHP arrays to JSON for use in JavaScript
$chart_labels_json = json_encode($chart_labels);
$chart_data_json = json_encode($chart_data);


// =========== END OF PHP LOGIC ===========
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shreyarth College - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CSS STYLES -->
    <style>
        :root {
            --primary-color: #2c3e50; --secondary-color: #f4f5f7; --accent-color: #3498db; --danger-color: #e74c3c;
            --success-color: #2ecc71; --light-text: #ffffff; --dark-text: #363949; --sidebar-hover-color: #eaf2f8; 
            --card-border-radius: 1rem; --box-shadow: 0 1rem 2rem rgba(132, 139, 200, 0.1); --transition: all 300ms ease;
            --sidebar-width: 16rem;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; outline: 0; border: 0; text-decoration: none; list-style: none; }
        html { font-size: 14px; }
        body { font-family: 'Poppins', sans-serif; background: var(--secondary-color); color: var(--dark-text); min-height: 100vh; overflow-x: hidden; }
        .admin-container { display: grid; grid-template-columns: 1fr; }
        
        /* === SIDEBAR === */
        aside { height: 100vh; background: var(--light-text); box-shadow: 0 10px 20px rgba(0,0,0,0.1); position: fixed; top: 0; left: 0; width: var(--sidebar-width); z-index: 100; transform: translateX(-100%); transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
        aside.open { transform: translateX(0); }
        aside .top { display: flex; align-items: center; justify-content: space-between; margin-top: 1.4rem; padding: 0 1rem; }
        aside .logo { display: flex; gap: 0.5rem; align-items: center; }
        aside .logo h2 { font-size: 1.2rem; color: var(--primary-color); }
        aside .logo span { color: var(--accent-color); }
        aside .close-btn { cursor: pointer; display: inline-flex; }
        aside .sidebar { display: flex; flex-direction: column; height: calc(100vh - 8rem); position: relative; top: 3rem; overflow-y: auto; }
        aside .sidebar a { display: flex; color: var(--dark-text); margin-left: 2rem; gap: 1rem; align-items: center; position: relative; height: 3.7rem; transition: var(--transition); }
        aside .sidebar a.active, aside .sidebar a:hover { background: var(--sidebar-hover-color); color: var(--accent-color); margin-left: 0; }
        aside .sidebar a.active::before, aside .sidebar a:hover::before { content: ""; width: 6px; height: 100%; background: var(--accent-color); }
        aside .sidebar a span { font-size: 1.6rem; transition: var(--transition); }
        aside .sidebar a.active span, aside .sidebar a:hover span { margin-left: calc(1rem - 6px); }
        aside .sidebar a.logout { margin-top: auto; }
        .sidebar-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 99; }
        .sidebar-overlay.active { display: block; }

        /* === MAIN CONTENT === */
        main { padding: 1rem; }
        main .header { display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; }
        main .header .menu-btn { background: transparent; cursor: pointer; color: var(--dark-text); font-size: 2rem; }
        main .page-header h1 { font-size: 1.8rem; color: var(--primary-color); }
        main .section-content { display: none; }
        main .section-content.active { display: block; animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        main footer { margin-top: 2rem; padding: 1.5rem; text-align: center; color: #7d8da1; background: var(--light-text); border-top: 1px solid #dee2e6; border-radius: 0.5rem; }

        /* === DASHBOARD & CARDS (RESPONSIVE) === */
        .dashboard-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; }
        .dashboard-card { background: var(--light-text); padding: 1.5rem; border-radius: var(--card-border-radius); box-shadow: var(--box-shadow); transition: var(--transition); display: flex; align-items: center; gap: 1.5rem; }
        .dashboard-card:hover { box-shadow: 0 1.5rem 3rem rgba(132, 139, 200, 0.25); transform: translateY(-5px); }
        .dashboard-card .icon { background: var(--accent-color); color: var(--light-text); width: 50px; height: 50px; border-radius: 50%; display: grid; place-items: center; flex-shrink: 0; }
        .dashboard-card .icon span { font-size: 2rem; }
        .dashboard-card .info h3 { font-size: 1.6rem; }
        .dashboard-card .info small { color: #7d8da1; }
        .chart-container { background: var(--light-text); padding: 1.5rem; border-radius: var(--card-border-radius); box-shadow: var(--box-shadow); height: 350px; position: relative; }
        .chart-container h2 { margin-bottom: 1rem; color: var(--primary-color); font-size: 1.2rem; }
        
        /* === GENERIC COMPONENTS === */
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
        .section-controls { display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
        .search-bar, .filter-dropdown { display: flex; align-items: center; background: var(--light-text); padding: 0.6rem 1rem; border-radius: 0.5rem; box-shadow: var(--box-shadow); }
        .search-bar input, .filter-dropdown select { background: transparent; border: none; font-size: 0.9rem; }
        .btn-primary { background: var(--accent-color); color: var(--light-text); padding: 0.8rem 1.5rem; border-radius: 0.5rem; cursor: pointer; transition: var(--transition); display: inline-flex; align-items: center; gap: 0.5rem; border: none; font-family: 'Poppins', sans-serif; }
        .btn-secondary { background: #bdc3c7; color: var(--dark-text); padding: 0.8rem 1.5rem; border-radius: 0.5rem; cursor: pointer; transition: var(--transition); border: none; font-family: 'Poppins', sans-serif; }
        .btn-view { background: var(--primary-color); color: var(--light-text); padding: 0.6rem 1rem; border-radius: 0.5rem; cursor: pointer; font-size: 0.85rem; font-weight: 500; transition: var(--transition); }
        .btn-primary:hover, .btn-view:hover { background: #2980b9; }
        .btn-secondary:hover { background: #95a5a6; }
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; }
        .item-card { background: var(--light-text); border-radius: var(--card-border-radius); box-shadow: var(--box-shadow); overflow: hidden; position: relative; transition: var(--transition); display: flex; flex-direction: column; }
        .item-card:hover { transform: translateY(-5px); }
        .item-card .delete-icon { position: absolute; top: 10px; right: 10px; background: rgba(231, 76, 60, 0.8); color: var(--light-text); width: 30px; height: 30px; border-radius: 50%; display: grid; place-items: center; cursor: pointer; transition: var(--transition); z-index: 2; }
        .item-card .delete-icon:hover { background: var(--danger-color); }
        .item-card img { width: 100%; height: 180px; object-fit: cover; }
        .item-card-content { padding: 1.5rem; flex-grow: 1; }
        .item-card-content h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .item-card-content .item-meta { display: flex; align-items: center; gap: 0.5rem; color: #7d8da1; margin-bottom: 1rem; flex-wrap: wrap;}
        .item-card-content p { font-size: 0.9rem; color: #6c757d; margin-top: 0.5rem; line-height: 1.5; }
        .item-card-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #e9ecef; padding: 1rem 1.5rem; background: #f8f9fa; }
        .item-card-footer .item-type { background: #e9ecef; padding: 0.3rem 0.8rem; border-radius: 0.3rem; font-weight: 500; font-size: 0.8rem; }
        
        /* === TABLES === */
        .data-table-container { overflow-x: auto; background: var(--light-text); border-radius: var(--card-border-radius); box-shadow: var(--box-shadow); padding: 1rem; }
        .data-table { width: 100%; text-align: left; border-collapse: collapse; }
        .data-table th, .data-table td { padding: 1rem; border-bottom: 1px solid #dee2e6; vertical-align: middle;}
        .data-table th { font-weight: 600; color: var(--primary-color); }
        .data-table tbody tr:last-child td { border-bottom: none; }
        .data-table tbody tr:hover { background: #f8f9fa; }
        .action-icon { cursor: pointer; color: var(--danger-color); font-size: 1.4rem; vertical-align: middle; }
        .file-link { color: var(--accent-color); font-weight: 500; }
        .action-buttons { display: flex; align-items: center; gap: 0.5rem; flex-wrap: nowrap; }
        
        /* === SIDE PANEL FOR FORMS === */
        .side-panel { position: fixed; top: 0; right: -100%; width: 90%; max-width: 480px; height: 100%; background: var(--light-text); box-shadow: -10px 0 30px rgba(0,0,0,0.1); z-index: 102; transition: right 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); display: flex; flex-direction: column; }
        .side-panel.open { right: 0; }
        .side-panel-header { padding: 1.5rem; border-bottom: 1px solid #dee2e6; display: flex; justify-content: space-between; align-items: center; }
        .side-panel-header h2 { font-size: 1.4rem; color: var(--primary-color); }
        .side-panel-header .close-btn { cursor: pointer; }
        .side-panel-body { padding: 1.5rem; overflow-y: auto; flex-grow: 1; }
        .form-grid { display: grid; gap: 1.5rem; }
        .form-group { display: flex; flex-direction: column; }
        .form-group label { margin-bottom: 0.5rem; font-weight: 500; }
        .form-group input, .form-group select, .form-group textarea { padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.5rem; font-size: 0.9rem; font-family: 'Poppins', sans-serif; width: 100%; }
        .form-group textarea { resize: vertical; min-height: 100px; }
        .form-footer { padding: 1.5rem; border-top: 1px solid #dee2e6; text-align: right; display: flex; gap: 1rem; justify-content: flex-end;}
        
        /* === MODAL FOR DETAILS === */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; display: none; align-items: center; justify-content: center; padding: 1rem; }
        .modal-container { background: var(--light-text); padding: 2rem; border-radius: var(--card-border-radius); box-shadow: 0 10px 40px rgba(0,0,0,0.2); width: 100%; max-width: 700px; max-height: 90vh; overflow-y: auto; position: relative; transform: scale(0.9); opacity: 0; transition: transform 0.3s, opacity 0.3s; }
        .modal-overlay.active { display: flex; }
        .modal-overlay.active .modal-container { transform: scale(1); opacity: 1; }
        .modal-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #dee2e6; padding-bottom: 1rem; margin-bottom: 1.5rem; }
        .modal-header h2 { font-size: 1.5rem; color: var(--primary-color); }
        .modal-close-btn { cursor: pointer; font-size: 2rem; }
        .modal-body .detail-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; }
        .modal-body .detail-item { background: var(--secondary-color); padding: 1rem; border-radius: 0.5rem; }
        .modal-body .detail-item strong { display: block; font-weight: 600; color: var(--primary-color); margin-bottom: 0.5rem; font-size: 0.9rem; }
        .modal-body .detail-item span { color: var(--dark-text); word-wrap: break-word; }
        .modal-body .full-width { grid-column: 1 / -1; }

        /* === RESPONSIVENESS === */
        
        /* Medium Devices & smaller (Tablets, Mobiles) */
        @media (max-width: 991px) {
             main .page-header h1 { font-size: 1.5rem; }
        }

        /* Mobile Devices */
        @media (max-width: 767px) {
            /* Responsive Tables: Transform to card view */
            .data-table { border: 0; }
            .data-table thead { display: none; }
            .data-table tr { display: block; margin-bottom: 1.5rem; border-radius: var(--card-border-radius); box-shadow: var(--box-shadow); border: 1px solid #e9ecef; background: var(--light-text); }
            .data-table td { display: block; text-align: right; border-bottom: 1px solid #e9ecef; padding-left: 50%; position: relative; }
            .data-table td:last-child { border-bottom: 0; }
            .data-table td[data-label] { display: flex; justify-content: space-between; align-items: center; }
            .data-table td[data-label]::before { content: attr(data-label); position: absolute; left: 1rem; font-weight: 600; color: var(--primary-color); text-align: left; }
            .action-buttons { justify-content: flex-end; padding: 0.5rem 0;}
        }

        /* Large Devices (Desktops) */
        @media (min-width: 992px) {
            .admin-container { grid-template-columns: var(--sidebar-width) 1fr; }
            aside { transform: translateX(0); position: sticky; top: 0; box-shadow: none; border-right: 1px solid #dee2e6; align-self: start; }
            aside .close-btn { display: none; }
            .sidebar-overlay { display: none !important; }
            main { padding: 1.4rem 2.8rem; }
            main .header .menu-btn { display: none; }
            main .page-header h1 { font-size: 2.5rem; }
            .chart-container { height: 400px; }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay"></div>
    <div class="admin-container">
        <!-- SIDEBAR -->
        <aside id="sidebar">
            <div class="top"><div class="logo"><h2>SHREY<span>ARTH</span></h2></div><div class="close-btn" id="closeSidebarBtn"><span class="material-icons-sharp">close</span></div></div>
            <div class="sidebar">
                <a href="#dashboard" class="nav-link active"><span class="material-icons-sharp">dashboard</span><h3>Dashboard</h3></a>
                <a href="#events" class="nav-link"><span class="material-icons-sharp">event</span><h3>Events</h3></a>
                <a href="#achievements" class="nav-link"><span class="material-icons-sharp">emoji_events</span><h3>Achievements</h3></a>
                <a href="#openings" class="nav-link"><span class="material-icons-sharp">work</span><h3>Openings</h3></a>
                <a href="#circulars" class="nav-link"><span class="material-icons-sharp">campaign</span><h3>Circulars</h3></a>
                <a href="#admission-enquiry" class="nav-link"><span class="material-icons-sharp">help_center</span><h3>Admission Enquiry</h3></a>
                <a href="?action=logout" class="logout"><span class="material-icons-sharp">logout</span><h3>Logout</h3></a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main>
            <div class="header">
                 <button class="menu-btn" id="openSidebarBtn"><span class="material-icons-sharp">menu</span></button>
                <div class="page-header"><h1 id="pageTitle">Dashboard</h1></div>
            </div>
            
            <!-- Dashboard Section -->
            <section id="dashboard" class="section-content active">
                <div class="dashboard-grid">
                    <div class="dashboard-cards">
                        <div class="dashboard-card"><div class="icon"><span class="material-icons-sharp">event_available</span></div><div class="info"><h3><?php echo $total_events; ?></h3><small>Total Events</small></div></div>
                        <div class="dashboard-card"><div class="icon"><span class="material-icons-sharp">help_center</span></div><div class="info"><h3><?php echo $total_enquiries; ?></h3><small>Total Enquiries</small></div></div>
                        <div class="dashboard-card"><div class="icon"><span class="material-icons-sharp">emoji_events</span></div><div class="info"><h3><?php echo $total_achievements; ?></h3><small>Total Achievements</small></div></div>
                        <div class="dashboard-card"><div class="icon"><span class="material-icons-sharp">campaign</span></div><div class="info"><h3><?php echo $total_circulars; ?></h3><small>Total Circulars</small></div></div>
                        <div class="dashboard-card"><div class="icon"><span class="material-icons-sharp">work</span></div><div class="info"><h3><?php echo $total_openings; ?></h3><small>Total Openings</small></div></div>
                    </div>
                    <div class="chart-container"><h2>Monthly Admission Enquiries (<?php echo $current_year; ?>)</h2><canvas id="enquiriesChart"></canvas></div>
                </div>
            </section>

            <!-- Events Section -->
            <section id="events" class="section-content">
                <div class="section-header">
                    <form id="event-filter-form" action="admin.php#events" method="GET" class="section-controls">
                        <div class="search-bar"><span class="material-icons-sharp">search</span><input type="text" name="event_search" placeholder="Search by name or location..." value="<?php echo htmlspecialchars($event_search); ?>" onchange="this.form.submit()"></div>
                        <div class="filter-dropdown">
                            <select name="event_type" onchange="this.form.submit()">
                                <option value="all" <?php if($event_type_filter == 'all') echo 'selected'; ?>>All Types</option>
                                <option value="Tech Fest" <?php if($event_type_filter == 'Tech Fest') echo 'selected'; ?>>Tech Fest</option>
                                <option value="Cultural" <?php if($event_type_filter == 'Cultural') echo 'selected'; ?>>Cultural</option>
                                <option value="Sports" <?php if($event_type_filter == 'Sports') echo 'selected'; ?>>Sports</option>
                                <option value="Conference" <?php if($event_type_filter == 'Conference') echo 'selected'; ?>>Conference</option>
                            </select>
                        </div>
                    </form>
                    <button class="btn-primary open-panel-btn" data-form="addEventForm"><span class="material-icons-sharp">add</span> Add Event</button>
                </div>
                <div class="cards-grid">
                    <?php if (empty($events)): ?>
                        <p>No events found.</p>
                    <?php else: ?>
                        <?php foreach($events as $event): ?>
                        <div class="item-card">
                            <a href="?action=delete_event&id=<?php echo $event['id']; ?>" class="delete-icon" onclick="return confirm('Are you sure you want to delete this event?')"><span class="material-icons-sharp">delete</span></a>
                            <img src="<?php echo htmlspecialchars($event['image_path'] ?? 'https://via.placeholder.com/400x200.png/3498db/ffffff?text=No+Image'); ?>" alt="Event Image">
                            <div class="item-card-content">
                                <h3><?php echo htmlspecialchars($event['name']); ?></h3>
                                <div class="item-meta"><span class="material-icons-sharp" style="font-size: 1.2rem;">location_on</span> <?php echo htmlspecialchars($event['location']); ?></div>
                            </div>
                            <div class="item-card-footer">
                                <span class="item-type"><?php echo htmlspecialchars($event['type']); ?></span>
                                <small><b>Date:</b> <?php echo date('d M, Y', strtotime($event['date'])); ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>

             <!-- Achievements Section -->
            <section id="achievements" class="section-content">
                <div class="section-header">
                    <h2>Achievements</h2>
                    <button class="btn-primary open-panel-btn" data-form="addAchievementForm"><span class="material-icons-sharp">add</span> Add Achievement</button>
                </div>
                <div class="cards-grid">
                    <?php if (empty($achievements)): ?>
                        <p>No achievements found.</p>
                    <?php else: ?>
                        <?php foreach($achievements as $achievement): ?>
                        <div class="item-card">
                            <a href="?action=delete_achievement&id=<?php echo $achievement['id']; ?>" class="delete-icon" onclick="return confirm('Are you sure you want to delete this achievement?')"><span class="material-icons-sharp">delete</span></a>
                            <img src="<?php echo htmlspecialchars($achievement['image_path'] ?? 'https://via.placeholder.com/400x200.png/2ecc71/ffffff?text=Achievement'); ?>" alt="Achievement Image">
                            <div class="item-card-content">
                                <h3><?php echo htmlspecialchars($achievement['title']); ?></h3>
                                <div class="item-meta"><?php echo htmlspecialchars($achievement['awarded_to']); ?></div>
                                <p><?php echo nl2br(htmlspecialchars($achievement['description'])); ?></p>
                            </div>
                            <div class="item-card-footer">
                                <span class="item-type"><?php echo htmlspecialchars($achievement['field']); ?></span>
                                <small><b>Date:</b> <?php echo date('d M, Y', strtotime($achievement['achievement_date'])); ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
            
            <!-- Openings Section -->
            <section id="openings" class="section-content">
                <div class="section-header">
                    <h2>Current Job Openings</h2>
                    <button class="btn-primary open-panel-btn" data-form="addOpeningForm"><span class="material-icons-sharp">add</span> Add Opening</button>
                </div>
                <div class="cards-grid">
                    <?php if (empty($openings)): ?>
                        <p>No current job openings found.</p>
                    <?php else: ?>
                        <?php foreach($openings as $opening): ?>
                        <div class="item-card">
                            <a href="?action=delete_opening&id=<?php echo $opening['id']; ?>" class="delete-icon" onclick="return confirm('Are you sure you want to delete this opening?')"><span class="material-icons-sharp">delete</span></a>
                            <div class="item-card-content">
                                <h3><?php echo htmlspecialchars($opening['title']); ?></h3>
                                <div class="item-meta">
                                    <span style="display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <span class="material-icons-sharp" style="font-size: 1.2rem;">business</span>
                                        <?php echo htmlspecialchars($opening['department']); ?>
                                    </span>
                                </div>
                                <div class="item-meta">
                                    <span style="display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <span class="material-icons-sharp" style="font-size: 1.2rem;">location_on</span>
                                        <?php echo htmlspecialchars($opening['location']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="item-card-footer">
                                <span class="item-type">Job Opening</span>
                                <small><b>Posted:</b> <?php echo date('d M, Y', strtotime($opening['posted_date'])); ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Circulars Section -->
            <section id="circulars" class="section-content">
                <div class="section-header"><div></div><button class="btn-primary open-panel-btn" data-form="addCircularForm"><span class="material-icons-sharp">add</span> Add Circular</button></div>
                <div class="data-table-container">
                    <table class="data-table">
                        <thead><tr><th>Title</th><th>Description</th><th>Type</th><th>File</th><th>Date</th><th>Actions</th></tr></thead>
                        <tbody>
                            <?php if (empty($circulars)): ?>
                                <tr><td colspan="6" style="text-align: center;">No circulars found.</td></tr>
                            <?php else: ?>
                                <?php foreach($circulars as $circular): ?>
                                <tr>
                                    <td data-label="Title"><?php echo htmlspecialchars($circular['title']); ?></td>
                                    <td data-label="Description" style="max-width: 300px; white-space: pre-wrap; word-break: break-word;"><?php echo htmlspecialchars($circular['description']); ?></td>
                                    <td data-label="Type"><?php echo htmlspecialchars($circular['type']); ?></td>
                                    <td data-label="File">
                                        <?php if(!empty($circular['file_path'])): ?>
                                            <a href="<?php echo htmlspecialchars($circular['file_path']); ?>" target="_blank" class="file-link">View File</a>
                                        <?php else: ?>
                                            No File
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Date"><?php echo date('d M, Y', strtotime($circular['publish_date'])); ?></td>
                                    <td data-label="Actions"><a href="?action=delete_circular&id=<?php echo $circular['id']; ?>" onclick="return confirm('Are you sure you want to delete this circular?')"><span class="material-icons-sharp action-icon">delete</span></a></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Admission Enquiry Section -->
            <section id="admission-enquiry" class="section-content">
                <div class="data-table-container">
                    <table class="data-table">
                         <thead><tr><th>Name</th><th>Email</th><th>Course</th><th>Date</th><th>Actions</th></tr></thead>
                        <tbody>
                             <?php if (empty($enquiries)): ?>
                                <tr><td colspan="5" style="text-align: center;">No enquiries found.</td></tr>
                             <?php else: ?>
                                <?php foreach($enquiries as $enquiry): ?>
                                <tr>
                                    <td data-label="Name"><?php echo htmlspecialchars($enquiry['name']); ?></td>
                                    <td data-label="Email"><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                    <td data-label="Course"><?php echo htmlspecialchars($enquiry['course']); ?></td>
                                    <td data-label="Date"><?php echo date('d M, Y', strtotime($enquiry['enquiry_date'])); ?></td>
                                    <td data-label="Actions">
                                        <div class="action-buttons">
                                            <button class="btn-view view-enquiry-btn"
                                                data-name="<?php echo htmlspecialchars($enquiry['name']); ?>"
                                                data-email="<?php echo htmlspecialchars($enquiry['email']); ?>"
                                                data-mobile="<?php echo htmlspecialchars($enquiry['mobile']); ?>"
                                                data-dob="<?php echo date('d M, Y', strtotime($enquiry['dob'])); ?>"
                                                data-gender="<?php echo htmlspecialchars($enquiry['gender']); ?>"
                                                data-course="<?php echo htmlspecialchars($enquiry['course']); ?>"
                                                data-qualification="<?php echo htmlspecialchars($enquiry['qualification']); ?>"
                                                data-last-school="<?php echo htmlspecialchars($enquiry['last_school']); ?>"
                                                data-address="<?php echo htmlspecialchars($enquiry['address']); ?>"
                                                data-city="<?php echo htmlspecialchars($enquiry['city']); ?>"
                                                data-state="<?php echo htmlspecialchars($enquiry['state']); ?>"
                                                data-pincode="<?php echo htmlspecialchars($enquiry['pincode']); ?>"
                                                data-country="<?php echo htmlspecialchars($enquiry['country']); ?>"
                                                data-date="<?php echo date('d M, Y h:i A', strtotime($enquiry['enquiry_date'])); ?>"
                                            >Full Data</button>
                                            <a href="?action=delete_enquiry&id=<?php echo $enquiry['id']; ?>" onclick="return confirm('Are you sure you want to delete this enquiry?')"><span class="material-icons-sharp action-icon">delete</span></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
            
            <!-- FOOTER -->
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Shreyarth College. All Rights Reserved.</p>
            </footer>
        </main>
    </div>

    <!-- MODAL FOR ENQUIRY DETAILS -->
    <div class="modal-overlay" id="enquiryModal">
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="modalTitle">Enquiry Details</h2>
                <span class="material-icons-sharp modal-close-btn" id="modalCloseBtn">close</span>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="detail-item"><strong >Full Name</strong><span id="modalName"></span></div>
                    <div class="detail-item"><strong >Date of Birth</strong><span id="modalDob"></span></div>
                    <div class="detail-item"><strong >Gender</strong><span id="modalGender"></span></div>
                    <div class="detail-item"><strong >Email Address</strong><span id="modalEmail"></span></div>
                    <div class="detail-item"><strong >Mobile Number</strong><span id="modalMobile"></span></div>
                    <div class="detail-item"><strong >Course Interest</strong><span id="modalCourse"></span></div>
                    <div class="detail-item"><strong >Highest Qualification</strong><span id="modalQualification"></span></div>
                    <div class="detail-item"><strong >Last School/College</strong><span id="modalLastSchool"></span></div>
                    <div class="detail-item full-width"><strong >Address</strong><span id="modalAddress"></span></div>
                    <div class="detail-item"><strong >City</strong><span id="modalCity"></span></div>
                    <div class="detail-item"><strong >State</strong><span id="modalState"></span></div>
                    <div class="detail-item"><strong >Pincode</strong><span id="modalPincode"></span></div>
                    <div class="detail-item"><strong >Country</strong><span id="modalCountry"></span></div>
                    <div class="detail-item full-width"><strong >Enquiry Date</strong><span id="modalDate"></span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- SIDE PANEL FOR FORMS -->
    <div id="form-panel" class="side-panel">
        <div class="side-panel-header"><h2 id="form-title">Add New</h2><span class="close-btn" id="closePanelBtn"><span class="material-icons-sharp">close</span></span></div>
        <div class="side-panel-body" id="form-container">
            <!-- Event Form -->
            <form id="addEventForm" action="admin.php" method="POST" class="form-grid" style="display:none;" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_event">
                <div class="form-group"><label for="eventName">Event Name</label><input type="text" name="eventName" required></div>
                <div class="form-group"><label for="eventType">Event Type</label><input type="text" name="eventType" required></div>
                <div class="form-group"><label for="eventDate">Event Date</label><input type="date" name="eventDate" required></div>
                <div class="form-group"><label for="eventLocation">Location</label><input type="text" name="eventLocation" required></div>
                <div class="form-group"><label for="eventImage">Choose Image</label><input type="file" name="eventImage" accept="image/*"></div>
                <div class="form-footer"><button type="button" class="btn-secondary">Cancel</button><button type="submit" class="btn-primary">Add Event</button></div>
            </form>

            <!-- Achievement Form -->
            <form id="addAchievementForm" action="admin.php" method="POST" class="form-grid" style="display:none;" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_achievement">
                <div class="form-group"><label for="achievementTitle">Achievement Title</label><input type="text" name="achievementTitle" required></div>
                <div class="form-group"><label for="achievementAwardedTo">Awarded To</label><input type="text" name="achievementAwardedTo" required></div>
                <div class="form-group"><label for="achievementDescription">Description</label><textarea name="achievementDescription" required></textarea></div>
                <div class="form-group"><label for="achievementField">Field / Category</label><input type="text" name="achievementField" placeholder="e.g., Academics, Sports, Arts" required></div>
                <div class="form-group"><label for="achievementDate">Date of Achievement</label><input type="date" name="achievementDate" required></div>
                <div class="form-group"><label for="achievementImage">Choose Image/Card</label><input type="file" name="achievementImage" accept="image/*" required></div>
                <div class="form-footer"><button type="button" class="btn-secondary">Cancel</button><button type="submit" class="btn-primary">Add Achievement</button></div>
            </form>

            <!-- Opening Form -->
            <form id="addOpeningForm" action="admin.php" method="POST" class="form-grid" style="display:none;">
                <input type="hidden" name="action" value="add_opening">
                <div class="form-group"><label for="openingTitle">Job Title</label><input type="text" name="openingTitle" required></div>
                <div class="form-group"><label for="openingDepartment">Department</label><input type="text" name="openingDepartment" placeholder="e.g., Computer Science, Administration" required></div>
                <div class="form-group"><label for="openingLocation">Location</label><input type="text" name="openingLocation" placeholder="e.g., Main Campus, Remote" required></div>
                <div class="form-footer"><button type="button" class="btn-secondary">Cancel</button><button type="submit" class="btn-primary">Add Opening</button></div>
            </form>

            <!-- Circular Form -->
            <form id="addCircularForm" action="admin.php" method="POST" class="form-grid" style="display:none;" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_circular">
                <div class="form-group"><label for="circularTitle">Title</label><input type="text" name="circularTitle" required></div>
                <div class="form-group"><label for="circularType">Circular Type</label><input type="text" name="circularType" required></div>
                <div class="form-group"><label for="circularDate">Publish Date</label><input type="date" name="circularDate" required></div>
                <div class="form-group"><label for="circularFile">Attach File (PDF, DOC)</label><input type="file" name="circularFile" accept=".pdf,.doc,.docx"></div>
                <div class="form-group"><label for="circularDescription">Description</label><textarea name="circularDescription" required></textarea></div>
                <div class="form-footer"><button type="button" class="btn-secondary">Cancel</button><button type="submit" class="btn-primary">Create Circular</button></div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const sidebarOverlay = document.querySelector('.sidebar-overlay');
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.section-content');
        const pageTitle = document.getElementById('pageTitle');
        const formPanel = document.getElementById('form-panel');
        const formContainer = document.getElementById('form-container');
        const formTitle = document.getElementById('form-title');
        const openPanelBtns = document.querySelectorAll('.open-panel-btn');
        const closePanelBtn = document.getElementById('closePanelBtn');

        const openSidebar = () => { sidebar.classList.add('open'); sidebarOverlay.classList.add('active'); };
        const closeSidebar = () => { sidebar.classList.remove('open'); sidebarOverlay.classList.remove('active'); };
        openSidebarBtn.addEventListener('click', openSidebar);
        closeSidebarBtn.addEventListener('click', closeSidebar);
        
        const updateContent = (hash) => {
            const targetId = hash ? hash.substring(1) : 'dashboard';
            const activeLink = document.querySelector(`.nav-link[href="#${targetId}"]`);
            if (activeLink) {
                pageTitle.textContent = activeLink.querySelector('h3').textContent;
                navLinks.forEach(nav => nav.classList.remove('active'));
                activeLink.classList.add('active');
                sections.forEach(section => section.classList.remove('active'));
                document.getElementById(targetId)?.classList.add('active');
            }
        };

        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetHash = link.getAttribute('href');
                if(window.location.hash !== targetHash) history.pushState(null, '', 'admin.php' + targetHash);
                updateContent(targetHash);
                if (window.innerWidth < 992) closeSidebar();
            });
        });

        window.addEventListener('popstate', () => updateContent(window.location.hash));
        updateContent(window.location.hash || '#dashboard');

        const closeFormPanel = () => {
            formPanel.classList.remove('open');
            if(!sidebar.classList.contains('open') && !document.getElementById('enquiryModal').classList.contains('active')) {
                sidebarOverlay.classList.remove('active');
            }
        };
        
        openPanelBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const formId = btn.dataset.form;
                formContainer.querySelectorAll('form').forEach(f => f.style.display = 'none');
                const targetForm = document.getElementById(formId);
                targetForm.style.display = 'grid';
                if (formId === 'addEventForm') formTitle.textContent = 'Add New Event';
                if (formId === 'addCircularForm') formTitle.textContent = 'Add New Circular';
                if (formId === 'addAchievementForm') formTitle.textContent = 'Add New Achievement';
                if (formId === 'addOpeningForm') formTitle.textContent = 'Add New Opening';
                formPanel.classList.add('open');
                sidebarOverlay.classList.add('active');
            });
        });
        
        closePanelBtn.addEventListener('click', closeFormPanel);
        document.querySelectorAll('.btn-secondary').forEach(btn => btn.addEventListener('click', closeFormPanel));

        // --- ENQUIRY MODAL LOGIC ---
        const enquiryModal = document.getElementById('enquiryModal');
        const modalCloseBtn = document.getElementById('modalCloseBtn');
        const viewEnquiryBtns = document.querySelectorAll('.view-enquiry-btn');
        
        const openModal = () => {
            enquiryModal.classList.add('active');
            sidebarOverlay.classList.add('active');
        };
        
        const closeModal = () => {
            enquiryModal.classList.remove('active');
            if(!sidebar.classList.contains('open') && !formPanel.classList.contains('open')) {
                sidebarOverlay.classList.remove('active');
            }
        };

        viewEnquiryBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const data = btn.dataset;
                document.getElementById('modalName').textContent = data.name;
                document.getElementById('modalDob').textContent = data.dob;
                document.getElementById('modalGender').textContent = data.gender;
                document.getElementById('modalEmail').textContent = data.email;
                document.getElementById('modalMobile').textContent = data.mobile;
                document.getElementById('modalCourse').textContent = data.course;
                document.getElementById('modalQualification').textContent = data.qualification;
                document.getElementById('modalLastSchool').textContent = data.lastSchool;
                document.getElementById('modalAddress').textContent = `${data.address}, ${data.city}, ${data.state} - ${data.pincode}, ${data.country}`;
                document.getElementById('modalCity').textContent = data.city;
                document.getElementById('modalState').textContent = data.state;
                document.getElementById('modalPincode').textContent = data.pincode;
                document.getElementById('modalCountry').textContent = data.country;
                document.getElementById('modalDate').textContent = data.date;
                document.getElementById('modalTitle').textContent = `Enquiry: ${data.name}`;
                openModal();
            });
        });

        modalCloseBtn.addEventListener('click', closeModal);
        
        // --- OVERLAY CLICK HANDLER ---
        sidebarOverlay.addEventListener('click', () => {
            closeSidebar();
            closeFormPanel();
            closeModal();
        });


        // DYNAMIC Chart.js
        const ctx = document.getElementById('enquiriesChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line', 
                data: {
                    labels: <?php echo $chart_labels_json; ?>,
                    datasets: [{ 
                        label: 'Enquiries', 
                        data: <?php echo $chart_data_json; ?>, 
                        fill: true, 
                        backgroundColor: 'rgba(52, 152, 219, 0.2)', 
                        borderColor: 'rgba(52, 152, 219, 1)', 
                        tension: 0.3 
                    }]
                }, 
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false, 
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            ticks: {
                                // This ensures ticks are integers if the count is low
                                precision: 0 
                            }
                        } 
                    } 
                }
            });
        }
    });
    </script>
</body>
</html>