<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Shreyarth University</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
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
        
        /* --- STYLES FOR FAQS PAGE --- */
        .faq-accordion {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background-color: var(--light-text);
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
            overflow: hidden;
        }

        .faq-question {
            background-color: transparent;
            width: 100%;
            border: none;
            text-align: left;
            padding: 20px 25px;
            font-family: var(--body-font);
            font-size: 1.1em;
            font-weight: 600;
            color: var(--primary-color);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }
        
        .faq-question:hover {
            background-color: var(--secondary-color);
        }

        .faq-item.active .faq-question {
            background-color: var(--secondary-color);
            color: var(--accent-color);
        }

        .faq-question .material-icons {
            font-size: 2em;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question .material-icons {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
            background-color: #f8f9fa;
        }

        .faq-answer p {
            padding: 0 25px 20px;
            line-height: 1.8;
        }

        /* --- Media Queries for This Page --- */
        @media (max-width:767px){
            .section{padding:60px 20px}
            .section-title{font-size:2.2em}
            .faq-question{padding: 15px 20px; font-size: 1em;}
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
                <h1 class="section-title">Frequently Asked Questions</h1>
                
                <div class="faq-accordion">
                    <!-- FAQ 1 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            What are the admission requirements for undergraduate programs?
                            <i class="material-icons">add</i>
                        </button>
                        <div class="faq-answer">
                            <p>For most undergraduate programs, applicants must have completed their higher secondary education (10+2) with a minimum of 60% aggregate marks from a recognized board. Specific programs, especially in Engineering and Sciences, may have additional subject requirements (e.g., Physics, Chemistry, Maths). Please visit the individual program page for detailed eligibility criteria.</p>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            Does the university provide hostel or dormitory facilities?
                            <i class="material-icons">add</i>
                        </button>
                        <div class="faq-answer">
                            <p>Yes, Shreyarth University offers separate, fully-equipped hostel facilities for male and female students. Our hostels provide a safe and comfortable living environment with amenities such as Wi-Fi, 24/7 security, laundry services, and mess facilities. Admissions to the hostel are on a first-come, first-served basis and can be applied for during the main admission process.</p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            Are there any scholarships available for new students?
                            <i class="material-icons">add</i>
                        </button>
                        <div class="faq-answer">
                            <p>Absolutely. We offer a range of scholarships to deserving students based on merit, financial need, and achievements in sports or other extracurricular activities. Merit-based scholarships are often automatically considered based on your admission application and past academic performance. For other scholarships, you may need to apply separately. Please check the "Scholarships" link in the top navigation bar for more details.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            What is the student-faculty ratio at Shreyarth University?
                            <i class="material-icons">add</i>
                        </button>
                        <div class="faq-answer">
                            <p>We are proud to maintain a healthy student-faculty ratio to ensure personalized attention and effective learning. Our current university-wide ratio is approximately 24:1. This allows for interactive classes, mentorship opportunities, and strong academic support from our distinguished faculty members.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ 5 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            How strong is the placement support at the university?
                            <i class="material-icons">add</i>
                        </button>
                        <div class="faq-answer">
                            <p>Shreyarth University has a dedicated Placement Cell that works tirelessly to connect students with top industry recruiters. We have a strong network of over 300 placement partners, including leading multinational corporations and startups. The cell provides career counseling, resume-building workshops, mock interviews, and organizes annual placement drives to ensure our students are well-prepared for their careers.</p>
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
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const questionButton = item.querySelector('.faq-question');
                const answerPanel = item.querySelector('.faq-answer');

                questionButton.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close any other open accordion items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                            otherItem.querySelector('.faq-answer').style.maxHeight = null;
                        }
                    });

                    // Toggle the clicked item
                    if (isActive) {
                        item.classList.remove('active');
                        answerPanel.style.maxHeight = null;
                    } else {
                        item.classList.add('active');
                        answerPanel.style.maxHeight = answerPanel.scrollHeight + "px";
                    }
                });
            });
        });
    </script>
</body>
</html>