<!-- CSS STYLES FOR FOOTER -->
    <style>
        /* Ensure variables are available or redefine them if this file is used standalone */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #ecf0f1;
            --accent-color: #1abc9c;
            --light-text: #ffffff;
            --heading-font: 'Montserrat', sans-serif;
        }

        .main-footer {
            background-color: var(--primary-color);
            color: #bdc3c7;
            padding: 70px 20px 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-col .footer-logo {
            display: flex;
            align-items: center; /* Vertically align icon and text */
            margin-bottom: 25px;
        }

        .footer-col .footer-logo .material-icons {
            font-size: 2.5em;
            color: var(--accent-color);
            margin-right: 10px;
        }

        .footer-col h4 {
            font-family: var(--heading-font);
            color: var(--light-text);
            margin-bottom: 25px;
            font-size: 1.3em;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        /* Remove the underline from the h4 inside footer-logo */
        .footer-col .footer-logo h4::after {
            display: none;
        }

        .footer-col ul {
            list-style: none;
            padding: 0; /* Reset default padding */
        }

        .footer-col ul li a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: color 0.3s, padding-left 0.3s;
        }

        .footer-col ul li a:hover {
            color: var(--accent-color);
            padding-left: 5px;
        }

        .footer-socials {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        .footer-socials a {
            color: var(--primary-color);
            background-color: var(--secondary-color);
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s, color 0.3s;
        }

        .footer-socials a:hover {
            background-color: var(--accent-color);
            color: var(--light-text);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            font-size: 0.9em;
        }

        /* Responsive Styles for Footer */
        @media (max-width: 767px) {
            .footer-grid {
                text-align: center;
            }

            .footer-col h4::after {
                margin-left: auto;
                margin-right: auto;
            }

            .footer-col .footer-logo,
            .footer-socials {
                justify-content: center;
            }
        }
    </style>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-logo">
                        <i class="material-icons">school</i>
                        <h4>Shreyarth</h4>
                    </div>
                    <p>A premier institution dedicated to fostering academic excellence, research, and the holistic
                        development of our students.</p>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Student Portal</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Academics</h4>
                    <ul>
                        <li><a href="#">School of Engineering</a></li>
                        <li><a href="#">School of Management</a></li>
                        <li><a href="#">School of Computer Science</a></li>
                        <li><a href="#">School of Nursing</a></li>
                        <li><a href="#">Research Programs</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact & Follow</h4>
                    <p>
                        123 University Drive,<br>
                        Knowledge Park, City 12345<br>
                        Email: info@shreyarth.edu<br>
                        Phone: +1 234 567 8900
                    </p>
                    <div class="footer-socials">
                        <a href="https://www.facebook.com/share/19AZUtFmxv/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/shreyarth_universityofficial?igsh=MXNsYWhjNjZ4N200MA=="><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@shreyarthuniversity?si=GsJvn879BGy624WF"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.linkedin.com/company/shreyarth-university/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Shreyarth University. All Rights Reserved. | Designed for a college project.</p>
            </div>
        </div>
    </footer>

</body>
</html>