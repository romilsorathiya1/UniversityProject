<!-- ======================= HEADER ======================= -->
<?php include 'header.php'; ?>

<!-- CSS STYLES FOR HOME PAGE SECTIONS -->
<style>
    /* --- Homepage: Hero Slider --- */
    .hero-slider {
        width: 100%;
        height: 90vh;
        position: relative;
        overflow: hidden;
        background: #333;
    }

    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .slide.active {
        opacity: 1;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* --- Section Styling --- */
    .section {
        padding: 80px 20px;
    }

    .section-light {
        background-color: var(--secondary-color);
    }

    .section-dark {
        background-color: var(--primary-color);
        color: var(--light-text);
    }

    .section-title {
        text-align: center;
        margin-bottom: 60px;
        font-family: var(--heading-font);
        font-size: 2.8em;
        color: var(--primary-color);
    }

    .section-title.light {
        color: var(--light-text);
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

    /* --- Why Choose Us Section --- */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        text-align: center;
    }

    .feature-item .material-icons {
        font-size: 3.5em;
        color: var(--accent-color);
        background-color: #e8f8f5;
        padding: 20px;
        border-radius: 50%;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .feature-item:hover .material-icons {
        transform: scale(1.1) rotate(10deg);
    }

    .feature-item h3 {
        font-family: var(--heading-font);
        color: var(--primary-color);
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    /* --- Research & Innovation Section --- */
    .research-showcase {
        display: flex;
        flex-direction: column;
        gap: 80px;
    }

    .research-row {
        display: flex;
        align-items: center;
        gap: 50px;
    }

    .research-row:nth-child(even) {
        flex-direction: row-reverse;
    }

    .research-image {
        flex: 1;
        min-width: 0;
    }

    .research-content {
        flex: 1.5;
    }

    .research-image img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .research-content h3 {
        font-family: var(--heading-font);
        font-size: 2em;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    /* --- Statistics Section --- */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        text-align: center;
    }

    .stat-item h2 {
        font-size: 3.5em;
        font-weight: 700;
        color: var(--accent-color);
    }

    .stat-item p {
        font-size: 1.1em;
        font-weight: 500;
    }

    /* --- Recent Activities & Schools Section --- */
    .activities-grid,
    .schools-grid {
        display: grid;
        gap: 30px;
    }

    .activities-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }

    .schools-grid {
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    }

    .activity-card,
    .school-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .activity-card:hover,
    .school-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(44, 62, 80, 0.15);
    }

    .activity-card {
        background: var(--light-text);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .activity-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .activity-content {
        padding: 25px;
    }

    .school-card {
        background: var(--light-text);
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
    }

    .school-card .material-icons {
        font-size: 3em;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .school-card h3 {
        font-family: var(--heading-font);
        font-size: 1.3em;
        color: var(--accent-color);
        margin-bottom: 15px;
    }

    .school-card a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        margin-top: 15px;
        display: inline-block;
    }

    .school-card a:hover {
        color: var(--accent-color);
    }

    /* --- Placement Partners Section --- */
    .placement-slider {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
    }

    .company-logos {
        display: flex;
        width: calc(200px * 32); /* 16 logos * 2 */
        animation: scroll 60s linear infinite;
    }

    .logo-slide {
        width: 200px;
        text-align: center;
    }

    .company-logos img {
        height: 60px;
        max-width: 150px;
        object-fit: contain;
        filter: grayscale(100%) brightness(0.8);
        transition: filter 0.3s;
    }

    .company-logos:hover {
        animation-play-state: paused;
    }

    .logo-slide:hover img {
        filter: none;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-200px * 16));
        }
    }

    /* ======================= MEDIA QUERIES FOR HOME PAGE SECTIONS ======================= */
    @media (max-width: 1023px) {
        .hero-slider {
            height: 70vh;
        }
    }

    @media (max-width: 767px) {
        .section {
            padding: 60px 20px;
        }

        .section-title {
            font-size: 2.2em;
        }

        .hero-slider {
            height: 60vh;
        }

        .stats-container {
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .stat-item h2 {
            font-size: 2.5em;
        }

        .stat-item p {
            font-size: 0.9em;
        }

        .research-row,
        .research-row:nth-child(even) {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }

        .research-content h3 {
            font-size: 1.6em;
        }
    }
</style>

<!-- ======================= MAIN CONTENT ======================= -->
<main>
    <!-- Section: Hero Slider -->
    <section id="home" class="hero-slider">
        <div class="slide active">
            <img src="./assets/c1.webp">
        </div>
        <div class="slide">
            <img src="./assets/institute-7421918.jpg">
        </div>
        <div class="slide">
            <img src="./assets/021-Commencement-.jpg">
        </div>
        <div class="slide">
            <img src="./assets/kings-college-3889124.jpg">
        </div>
        <div class="slide">
            <img src="./assets/library-869061.jpg">
        </div>
        <div class="slide">
            <img src="./assets/new-zealand-4827784.jpg">
        </div>
        <div class="slide">
            <img src="./assets/pexels-kelly-1179532-2881370.jpg">
        </div>
    </section>

    <!-- Section: Why Choose Us -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Why Choose Shreyarth?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="material-icons">school</i>
                    <h3>Expert Faculty</h3>
                    <p>Learn from distinguished scholars and industry professionals dedicated to your success.</p>
                </div>
                <div class="feature-item">
                    <i class="material-icons">lightbulb</i>
                    <h3>Innovative Curriculum</h3>
                    <p>Our programs are designed to be relevant, challenging, and aligned with global industry
                        trends.</p>
                </div>
                <div class="feature-item">
                    <i class="material-icons">apartment</i>
                    <h3>Modern Infrastructure</h3>
                    <p>Experience learning in state-of-the-art labs, smart classrooms, and extensive libraries.</p>
                </div>
                <div class="feature-item">
                    <i class="material-icons">public</i>
                    <h3>Global Exposure</h3>
                    <p>We provide opportunities for international exchange programs and collaborations.</p>
                </div>
                <div class="feature-item">
                    <i class="material-icons">workspace_premium</i>
                    <h3>Strong Placement Record</h3>
                    <p>Benefit from our dedicated placement cell and strong network of top industry recruiters.</p>
                </div>
                <div class="feature-item">
                    <i class="material-icons">groups</i>
                    <h3>Vibrant Campus Life</h3>
                    <p>Engage in a rich campus experience with numerous clubs, events, and cultural activities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Research and Innovation -->
    <section class="section section-light">
        <div class="container">
            <h2 class="section-title">Research and Innovation</h2>
            <div class="research-showcase">
                <div class="research-row">
                    <div class="research-image">
                        <img src="./assets/Autonomous Surveillance Drone.926Z.png" alt="Students building a drone">
                    </div>
                    <div class="research-content">
                        <h3>Autonomous Surveillance Drone</h3>
                        <p>Our engineering students have developed an autonomous drone for security and
                            surveillance. Equipped with AI-powered object detection, it can patrol large areas,
                            identify anomalies, and provide real-time alerts. The project utilizes advanced
                            algorithms and machine learning frameworks, offering a scalable solution for enhancing
                            security on campus and at large industrial sites.</p>
                    </div>
                </div>
                <div class="research-row">
                    <div class="research-image">
                        <img src="./assets/Smart Agri-Tech Solution.982Z.png" alt="Agricultural tech in a field">
                    </div>
                    <div class="research-content">
                        <h3>Smart Agri-Tech Solution</h3>
                        <p>Students created an IoT-based system for precision farming. It uses soil sensors and
                            weather data for automated irrigation, optimizing water usage and increasing crop yield
                            to address critical agricultural challenges. This system not only conserves precious
                            water resources but also provides farmers with actionable, data-driven insights through
                            a custom-built mobile application for remote monitoring and control.</p>
                    </div>
                </div>
                <div class="research-row">
                    <div class="research-image">
                        <img src="./assets/AI-Powered Diagnostic Tool.656Z.png"
                            alt="AI and machine learning concept">
                    </div>
                    <div class="research-content">
                        <h3>AI-Powered Diagnostic Tool</h3>
                        <p>A team of nursing and computer science students developed an AI model that assists in the
                            early detection of diseases from medical images, aiming to support healthcare
                            professionals in making faster decisions. This innovative tool has been trained on
                            thousands of anonymized X-rays and scans to identify subtle patterns, holding the
                            potential to significantly improve diagnostic accuracy and make expert-level analysis
                            more accessible in underserved regions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Statistics -->
    <section class="section section-dark">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <h2 class="stat-number">12000</h2>
                    <p>Students Enrolled</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number">500</h2>
                    <p>Expert Faculty</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number">75</h2>
                    <p>Academic Programs</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number">300</h2>
                    <p>Top Recruiters</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Recent Activities -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Recent Activities</h2>
            <div class="activities-grid">
                <div class="activity-card">
                    <img src="./assets/techfest.320Z.png" alt="Tech Fest 2025">
                    <div class="activity-content">
                        <h3>Innovate 2025 Tech Fest</h3>
                        <p>Our annual tech festival brought together students and industry experts for workshops,
                            competitions, and keynote sessions on the future of technology.</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="./assets/sport meet.225Z.png" alt="Sports Day">
                    <div class="activity-content">
                        <h3>Annual Sports Meet</h3>
                        <p>Students showcased exceptional sportsmanship and talent in a week-long event featuring a
                            wide range of athletic competitions and team sports.</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="./assets/Global Business Conference.726Z.png" alt="International Conference">
                    <div class="activity-content">
                        <h3>Global Business Conference</h3>
                        <p>The School of Management hosted an international conference on sustainable business
                            practices, attracting speakers and delegates from around the world.</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="./assets/Cultural Night Sanskriti.120Z.png" alt="Cultural Night">
                    <div class="activity-content">
                        <h3>Cultural Night "Sanskriti"</h3>
                        <p>A vibrant celebration of diversity through music, dance, and drama, showcasing the rich
                            cultural heritage of our student community.</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="./assets/AI & Machine Learning Workshop.518Z.png" alt="AI Workshop">
                    <div class="activity-content">
                        <h3>AI & Machine Learning Workshop</h3>
                        <p>A hands-on workshop conducted by industry leaders, providing students with practical
                            skills in artificial intelligence and its applications.</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="./assets/Community Outreach Drive.699Z.png" alt="Community Service">
                    <div class="activity-content">
                        <h3>Community Outreach Drive</h3>
                        <p>Our students participated in a city-wide cleanliness and tree plantation drive,
                            reinforcing our commitment to social responsibility.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Explore Our Schools -->
    <section class="section section-light">
        <div class="container">
            <h2 class="section-title">Explore Our Schools</h2>
            <div class="schools-grid">
                <div class="school-card">
                    <i class="material-icons">engineering</i>
                    <h3>School of Engineering</h3>
                    <p>Fostering innovation in civil, mechanical, computer, and electrical engineering with hands-on
                        projects.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="school-card">
                    <i class="material-icons">business_center</i>
                    <h3>School of Management</h3>
                    <p>Developing future business leaders through programs in marketing, finance, and human
                        resources.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="school-card">
                    <i class="material-icons">science</i>
                    <h3>School of Nursing</h3>
                    <p>Providing excellence in healthcare education with advanced simulation labs and clinical
                        practice.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="school-card">
                    <i class="material-icons">computer</i>
                    <h3>School of Computer Science</h3>
                    <p>Exploring cutting-edge domains like AI, data science, and cybersecurity to build digital
                        solutions.</p>
                    <a href="#">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Placement Partners -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Our Placement Partners</h2>
            <div class="placement-slider">
                <div class="company-logos">
                    <!-- 16 LOGOS -->
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=google.com&sz=128" alt="Google"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=amazon.com&sz=128" alt="Amazon"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=microsoft.com&sz=128" alt="Microsoft"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=deloitte.com&sz=128" alt="Deloitte"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=tcs.com&sz=128" alt="TCS"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=infosys.com&sz=128" alt="Infosys"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=wipro.com&sz=128" alt="Wipro"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=gs.com&sz=128" alt="Goldman Sachs"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=accenture.com&sz=128" alt="Accenture"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ibm.com&sz=128" alt="IBM"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=oracle.com&sz=128" alt="Oracle"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=capgemini.com&sz=128" alt="Capgemini"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ey.com&sz=128" alt="EY"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=intel.com&sz=128" alt="Intel"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=cisco.com&sz=128" alt="Cisco"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=hdfcbank.com&sz=128" alt="HDFC Bank"></div>

                    <!-- Duplicate logos for seamless scroll -->
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=google.com&sz=128" alt="Google"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=amazon.com&sz=128" alt="Amazon"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=microsoft.com&sz=128" alt="Microsoft"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=deloitte.com&sz=128" alt="Deloitte"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=tcs.com&sz=128" alt="TCS"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=infosys.com&sz=128" alt="Infosys"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=wipro.com&sz=128" alt="Wipro"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=gs.com&sz=128" alt="Goldman Sachs"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=accenture.com&sz=128" alt="Accenture"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ibm.com&sz=128" alt="IBM"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=oracle.com&sz=128" alt="Oracle"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=capgemini.com&sz=128" alt="Capgemini"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=ey.com&sz=128" alt="EY"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=intel.com&sz=128" alt="Intel"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=cisco.com&sz=128" alt="Cisco"></div>
                    <div class="logo-slide"><img src="https://www.google.com/s2/favicons?domain=hdfcbank.com&sz=128" alt="HDFC Bank"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- JAVASCRIPT FOR HOME PAGE SECTIONS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- Hero Slider Functionality ---
        const heroSlides = document.querySelectorAll('.hero-slider .slide');
        if (heroSlides.length > 1) {
            let currentHeroSlide = 0;
            const heroSlideInterval = 5000;

            function nextHeroSlide() {
                heroSlides[currentHeroSlide].classList.remove('active');
                currentHeroSlide = (currentHeroSlide + 1) % heroSlides.length;
                heroSlides[currentHeroSlide].classList.add('active');
            }
            setInterval(nextHeroSlide, heroSlideInterval);
        }

        // --- Statistics Counter Animation ---
        const statSection = document.querySelector('.section-dark');
        const statNumbers = document.querySelectorAll('.stat-number');
        const animationDuration = 2000;

        const animateValue = (obj, start, end, duration) => {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const currentValue = Math.floor(progress * (end - start) + start);
                obj.innerHTML = currentValue.toLocaleString();
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    obj.innerHTML = end.toLocaleString();
                }
            };
            window.requestAnimationFrame(step);
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    statNumbers.forEach(stat => {
                        const goal = parseInt(stat.textContent.replace(/,/g, ''), 10);
                        if (!stat.hasAttribute('data-animated')) {
                            animateValue(stat, 0, goal, animationDuration);
                            stat.setAttribute('data-animated', 'true');
                        }
                    });
                    // observer.unobserve(entry.target); // Optional: stop observing after animation
                }
            });
        };

        const statObserver = new IntersectionObserver(observerCallback, {
            threshold: 0.5
        });

        if (statSection) {
            statObserver.observe(statSection);
        }
    });
</script>

<!-- ======================= FOOTER ======================= -->
<?php include 'footer.php'; ?>