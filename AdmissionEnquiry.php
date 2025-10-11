<?php
// =========== START OF PHP LOGIC ===========

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

// --- FORM SUBMISSION HANDLING ---
$form_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve POST data
    $fullName = $_POST['fullName'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $course = $_POST['program'] ?? ''; // Note: form name is 'program'
    $qualification = $_POST['qualification'] ?? '';
    $last_school = $_POST['last_school'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $pincode = $_POST['pincode'] ?? '';
    $country = $_POST['country'] ?? '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO enquiries (name, dob, gender, email, mobile, course, qualification, last_school, address, city, state, pincode, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $fullName, $dob, $gender, $email, $mobile, $course, $qualification, $last_school, $address, $city, $state, $pincode, $country);

    if ($stmt->execute()) {
        $form_message = '<div class="success-message">Thank you! Your enquiry has been submitted successfully. We will get back to you soon.</div>';
    } else {
        $form_message = '<div class="error-message">Sorry, there was an error submitting your enquiry. Please try again later.</div>';
    }
    $stmt->close();
}
$conn->close();

// =========== END OF PHP LOGIC ===========
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Enquiry - Shreyarth University</title>

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
            --success-color: #2ecc71;
            --error-color: #e74c3c;
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
        
        /* Message styling */
        .success-message, .error-message {
            padding: 15px 20px;
            border-radius: 5px;
            color: var(--light-text);
            margin: 0 auto 30px auto;
            max-width: 900px;
            text-align: center;
            font-weight: 500;
        }
        .success-message { background-color: var(--success-color); }
        .error-message { background-color: var(--error-color); }

        .enquiry-form-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: var(--secondary-color);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .enquiry-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-section-title {
            font-family: var(--heading-font);
            font-size: 1.5em;
            color: var(--primary-color);
            margin-bottom: 20px;
            margin-top: 20px;
            grid-column: 1 / -1;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
        }

        .form-section-title:first-of-type {
            margin-top: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
            font-size: 0.95em;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: var(--body-font);
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #fff;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 8px rgba(26, 188, 156, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit-container {
            grid-column: 1 / -1;
            text-align: center;
            margin-top: 30px;
        }

        .btn-submit {
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 15px 40px;
            border: none;
            border-radius: 5px;
            font-family: var(--heading-font);
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-submit:hover {
            background-color: #16a085;
            transform: translateY(-3px);
        }

        @media (max-width: 1023px) {
            .enquiry-form-container {
                padding: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .section {
                padding: 60px 20px;
            }
            .enquiry-form-grid {
                grid-template-columns: 1fr;
            }
            .form-group {
                grid-column: 1 / -1;
            }
            .enquiry-form-container {
                padding: 20px;
            }
            .section-title {
                font-size: 2.2em;
            }
        }
    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>

    <!-- ======================= MAIN CONTENT ======================= -->
    <main>
        <section class="section">
            <div class="container">
                <h2 class="section-title">Admission Enquiry</h2>

                <?php echo $form_message; ?>

                <div class="enquiry-form-container">
                    <form action="AdmissionEnquiry.php" method="POST">
                        <div class="enquiry-form-grid">

                            <h3 class="form-section-title">Personal Details</h3>

                            <div class="form-group full-width">
                                <label for="fullName">Full Name</label>
                                <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="example@domain.com" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="tel" id="mobile" name="mobile" placeholder="+91-1234567890" required>
                            </div>

                            <h3 class="form-section-title">Academic Interest</h3>

                            <div class="form-group">
                                <label for="program">Program of Interest</label>
                                <select id="program" name="program" required>
                                    <option value="" disabled selected>Select a Program</option>
                                    <option value="School of Engineering">School of Engineering</option>
                                    <option value="School of Management">School of Management</option>
                                    <option value="School of Nursing">School of Nursing</option>
                                    <option value="School of Computer Science">School of Computer Science</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="qualification">Highest Qualification</label>
                                <select id="qualification" name="qualification" required>
                                    <option value="" disabled selected>Select Qualification</option>
                                    <option value="12th Grade / High School">12th Grade / High School</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label for="last_school">Name of Last School/College Attended</label>
                                <input type="text" id="last_school" name="last_school" placeholder="Enter name of your institution" required>
                            </div>

                            <h3 class="form-section-title">Address Information</h3>

                            <div class="form-group full-width">
                                <label for="address">Street Address</label>
                                <input type="text" id="address" name="address" placeholder="Enter your street address" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" placeholder="e.g., Ahmedabad" required>
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="e.g., Gujarat" required>
                            </div>

                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="text" id="pincode" name="pincode" placeholder="e.g., 380006" required>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" value="India" required>
                            </div>

                            <div class="btn-submit-container">
                                <button type="submit" class="btn-submit">Submit Enquiry</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

</body>
</html>