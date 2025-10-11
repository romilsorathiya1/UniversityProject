<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Shreyarth University</title>

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

        /* --- Contact Page Specific Styles --- */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            align-items: flex-start;
        }

        .contact-form-container h3 {
            font-family: var(--heading-font);
            font-size: 2em;
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .contact-form .form-group input,
        .contact-form .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: var(--body-font);
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .contact-form .form-group input:focus,
        .contact-form .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 8px rgba(26, 188, 156, 0.2);
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 150px;
        }

        .contact-form .btn-submit {
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-family: var(--heading-font);
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .contact-form .btn-submit:hover {
            background-color: #16a085;
            transform: translateY(-3px);
        }

        .contact-info-container {
            background-color: var(--secondary-color);
            padding: 40px;
            border-radius: 8px;
        }

        .contact-info-container h3 {
            font-family: var(--heading-font);
            font-size: 2em;
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .info-item .material-icons {
            font-size: 2.5em;
            color: var(--accent-color);
            margin-right: 20px;
            margin-top: 5px;
        }

        .info-item p {
            line-height: 1.6;
            margin: 0;
            font-weight: 500;
        }

        .map-container {
            margin-top: 80px;
        }

        .map-container iframe {
            width: 100%;
            height: 450px;
            border: 0;
            border-radius: 8px;
        }

        /* ======================= MEDIA QUERIES FOR THIS PAGE ======================= */
        @media (max-width: 1023px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: 60px 20px;
            }
            .section-title {
                font-size: 2.2em;
            }
            .contact-info-container {
                padding: 30px;
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
                <h2 class="section-title">Get In Touch</h2>
                <div class="contact-grid">
                    <!-- Contact Information -->
                    <div class="contact-info-container">
                        <h3>Contact Information</h3>
                        <div class="info-item">
                            <i class="material-icons">location_on</i>
                            <p>
                                <strong>Shreyarth University</strong><br>
                                Gujarat Bhavan<br>
                                Nr. M.J. Library, Ashram Rd, Ellis Bridge<br>
                                Ahmedabad, Gujarat 380 006
                            </p>
                        </div>
                        <div class="info-item">
                            <i class="material-icons">phone</i>
                            <p>(+91) - 79 4105 9999</p>
                        </div>
                        <div class="info-item">
                            <i class="material-icons">email</i>
                            <p>info@shreyarthuniversity.edu.in</p>
                        </div>
                        <div class="info-item">
                            <i class="material-icons">schedule</i>
                            <p>
                                <strong>Operating Hours:</strong><br>
                                Monday - Friday: 10:30 AM - 05:00 PM<br>
                                1st & 3rd Saturday, Sunday: Closed
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-container">
                        <h3>Send Us a Message</h3>
                        <form action="#" method="POST" class="contact-form">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Your Message</label>
                                <textarea id="message" name="message" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="map-container">
                    <h2 class="section-title">Find Us On Map</h2>
                    <iframe
                        src="https://maps.google.com/maps?q=Shreyarth%20University&t=m&z=13&output=embed&iwloc=near"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

    <!-- No page-specific JavaScript needed -->
    
</body>

</html>