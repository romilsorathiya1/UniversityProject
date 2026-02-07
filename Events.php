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

// --- DATA FETCHING FOR EVENTS PAGE ---
$today = date('Y-m-d H:i:s');
$upcoming_events = [];
$past_events = [];

// Fetch all events and separate them
$sql_all_events = "SELECT * FROM events ORDER BY date DESC";
$result = $conn->query($sql_all_events);

if ($result->num_rows > 0) {
    while($event = $result->fetch_assoc()) {
        if ($event['date'] >= date('Y-m-d')) {
            // It's today or in the future, add to upcoming
            $upcoming_events[] = $event;
        } else {
            // It's in the past
            $past_events[] = $event;
        }
    }
}
// Sort upcoming events so the soonest is first
usort($upcoming_events, function($a, $b) {
    return strtotime($a['date']) - strtotime($b['date']);
});


// =========== END OF PHP LOGIC ===========
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Shreyarth University</title>

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

        .page-header {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url(./assets/events.995Z.png) no-repeat center center/cover;
            padding: 120px 20px;
            text-align: center;
            color: var(--light-text);
        }

        .page-header h1 {
            font-family: var(--heading-font);
            font-size: 3.5em;
            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 1.2em;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        .section {
            padding: 80px 20px;
        }

        .section-light {
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-family: var(--heading-font);
            font-size: 2.8em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .section-title p {
            font-size: 1.1em;
            max-width: 600px;
            margin: 0 auto;
            color: var(--text-color);
        }
        
        .no-events-message {
            text-align: center;
            font-size: 1.2em;
            color: #7f8c8d;
            padding: 40px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        }

        .upcoming-events-slider {
            position: relative;
            overflow: hidden;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .upcoming-event-card {
            display: flex;
            gap: 40px;
            align-items: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            margin: 0 15px;
        }

        .upcoming-event-card .event-img {
            flex: 1.2;
        }

        .upcoming-event-card .event-img img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
        }

        .upcoming-event-card .event-content {
            flex: 1.5;
        }

        .upcoming-event-card .event-content .tag {
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .upcoming-event-card .event-content h3 {
            font-family: var(--heading-font);
            font-size: 2.2em;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .upcoming-event-card .event-content .info {
            font-size: 1.05em;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .upcoming-event-card .event-content .info span {
            display: flex;
            align-items: center;
        }

        .upcoming-event-card .event-content .info .material-icons {
            color: var(--accent-color);
            margin-right: 12px;
        }

        .countdown {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .countdown-item {
            text-align: center;
            background: var(--secondary-color);
            padding: 10px;
            border-radius: 8px;
            min-width: 80px;
        }

        .countdown-item span {
            display: block;
            font-size: 1.8em;
            font-weight: 700;
            color: var(--primary-color);
        }

        .countdown-item p {
            margin: 0;
            font-size: 0.8em;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .slider-nav {
            text-align: center;
            margin-top: 40px;
        }

        .slider-btn {
            background: none;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5em;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .slider-btn:hover,
        .slider-btn:disabled {
            background-color: var(--primary-color);
            color: var(--light-text);
        }

        .slider-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .event-filters {
            text-align: center;
            margin-bottom: 50px;
        }

        .filter-btn {
            background: none;
            border: 2px solid #ddd;
            color: var(--text-color);
            padding: 10px 25px;
            margin: 5px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .filter-btn:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--light-text);
        }

        .filter-btn.active {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--light-text);
        }

        .past-event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .past-event-card {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.4s ease, transform 0.4s ease, box-shadow 0.3s;
        }

        .past-event-card.show {
            opacity: 1;
            transform: scale(1);
            display: block;
        }
        
        .past-event-card.hide {
            display: none;
        }

        .past-event-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .past-event-card .event-img {
            position: relative;
            height: 200px;
        }

        .past-event-card .event-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .past-event-card .event-img .tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--accent-color);
            color: var(--light-text);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
        }

        .past-event-card .event-content {
            padding: 25px;
        }

        .past-event-card .event-content h3 {
            font-family: var(--heading-font);
            font-size: 1.4em;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .past-event-card .info {
            color: #7f8c8d;
            font-size: 0.9em;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .past-event-card .info span {
            display: flex;
            align-items: center;
        }

        .past-event-card .info .material-icons {
            font-size: 1.1em;
            margin-right: 8px;
            color: var(--accent-color);
        }
        
        @media (max-width: 1023px) {
            .upcoming-event-card { flex-direction: column; padding: 30px; text-align: center; }
            .upcoming-event-card .event-content .info, .countdown { justify-content: center; }
            .upcoming-event-card .event-content { flex: 1; }
            .upcoming-event-card .event-img img { height: 280px; }
        }

        @media (max-width: 768px) {
            .section { padding: 60px 20px; }
            .page-header h1 { font-size: 2.5em; }
            .section-title h2 { font-size: 2.2em; }
            .upcoming-event-card h3 { font-size: 1.8em; }
            .countdown { gap: 10px; flex-wrap: wrap; justify-content: center; }
            .countdown-item { min-width: 70px; padding: 8px; }
            .countdown-item span { font-size: 1.5em; }
            .past-event-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
    <?php include 'header.php'; ?>


    <!-- MAIN CONTENT -->
    <main>
        <section class="page-header">
            <div class="container">
                <h1>University Events</h1>
                <p>Explore the vibrant happenings at Shreyarth University. Join us for a journey of learning, culture, and innovation.</p>
            </div>
        </section>

        <!-- Upcoming Events Slider Section -->
        <section class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Upcoming Events</h2>
                    <p>Don't miss out! Here's what's happening soon on campus.</p>
                </div>

                <?php if (!empty($upcoming_events)): ?>
                <div class="upcoming-events-slider">
                    <div class="slider-track">
                        <?php foreach($upcoming_events as $event): ?>
                        <div class="slider-slide" data-event-date="<?php echo date('Y-m-d\TH:i:s', strtotime($event['date'])); ?>">
                            <div class="upcoming-event-card">
                                <div class="event-img">
                                    <img src="<?php echo !empty($event['image_path']) ? htmlspecialchars($event['image_path']) : 'https://via.placeholder.com/600x400.png/2c3e50/ffffff?text=Shreyarth+Event'; ?>" alt="<?php echo htmlspecialchars($event['name']); ?>">
                                </div>
                                <div class="event-content">
                                    <span class="tag"><?php echo htmlspecialchars($event['type']); ?></span>
                                    <h3><?php echo htmlspecialchars($event['name']); ?></h3>
                                    <div class="countdown">
                                        <div class="countdown-item"><span class="days">0</span><p>Days</p></div>
                                        <div class="countdown-item"><span class="hours">0</span><p>Hours</p></div>
                                        <div class="countdown-item"><span class="minutes">0</span><p>Mins</p></div>
                                        <div class="countdown-item"><span class="seconds">0</span><p>Secs</p></div>
                                    </div>
                                    <div class="info">
                                        <span><i class="material-icons">event</i> <?php echo date('d F, Y', strtotime($event['date'])); ?></span>
                                        <span><i class="material-icons">location_on</i> <?php echo htmlspecialchars($event['location']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="slider-nav">
                    <button class="slider-btn" id="prev-slide"><i class="material-icons">arrow_back</i></button>
                    <button class="slider-btn" id="next-slide"><i class="material-icons">arrow_forward</i></button>
                </div>
                <?php else: ?>
                    <div class="no-events-message">
                        <p>No upcoming events scheduled at the moment. Please check back soon!</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Past Event Highlights Section -->
        <section class="section section-light">
            <div class="container">
                <div class="section-title">
                    <h2>Past Event Highlights</h2>
                    <p>A look back at the memorable moments and successful events we've hosted.</p>
                </div>
                
                <?php if (!empty($past_events)): ?>
                <!-- Event Filters -->
              
                <div class="event-filters">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="Academic">Academic</button>
                    <button class="filter-btn" data-filter="Cultural">Cultural</button>
                    <button class="filter-btn" data-filter="Sports">Sports</button>
                    <button class="filter-btn" data-filter="Workshop">Workshop</button>
                </div>

                <div class="past-event-grid">
                    <?php foreach($past_events as $event): ?>
                    <div class="past-event-card" data-category="<?php echo htmlspecialchars($event['type']); ?>">
                        <div class="event-img">
                            <img src="<?php echo !empty($event['image_path']) ? htmlspecialchars($event['image_path']) : 'https://via.placeholder.com/400x250.png/2c3e50/ffffff?text=Past+Event'; ?>" alt="<?php echo htmlspecialchars($event['name']); ?>">
                            <span class="tag"><?php echo htmlspecialchars($event['type']); ?></span>
                        </div>
                        <div class="event-content">
                            <h3><?php echo htmlspecialchars($event['name']); ?></h3>
                            <div class="info">
                                <span><i class="material-icons">event</i><?php echo date('d M, Y', strtotime($event['date'])); ?></span>
                                <span><i class="material-icons">location_on</i><?php echo htmlspecialchars($event['location']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <div class="no-events-message">
                        <p>No past events to display yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    </main>

    <!-- ======================= FOOTER ======================= -->
    <?php include 'footer.php'; ?>

    <!-- JAVASCRIPT FOR THIS PAGE ONLY -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Upcoming Events Slider Logic ---
            const track = document.querySelector('.slider-track');
            if (track && track.children.length > 0) {
                const slides = Array.from(track.children);
                const nextButton = document.getElementById('next-slide');
                const prevButton = document.getElementById('prev-slide');
                let currentIndex = 0;

                const setSlidePosition = () => {
                    const slideWidth = slides[0].getBoundingClientRect().width;
                    track.style.transform = 'translateX(-' + slideWidth * currentIndex + 'px)';
                };

                const updateNavButtons = () => {
                    if (slides.length <= 1) {
                         if(prevButton) prevButton.style.display = 'none';
                         if(nextButton) nextButton.style.display = 'none';
                        return;
                    }
                    if(prevButton) prevButton.disabled = currentIndex === 0;
                    if(nextButton) nextButton.disabled = currentIndex === slides.length - 1;
                };
                
                if(nextButton) {
                    nextButton.addEventListener('click', e => {
                        if (currentIndex >= slides.length - 1) return;
                        currentIndex++;
                        setSlidePosition();
                        updateNavButtons();
                    });
                }

                if(prevButton) {
                    prevButton.addEventListener('click', e => {
                        if (currentIndex === 0) return;
                        currentIndex--;
                        setSlidePosition();
                        updateNavButtons();
                    });
                }
                
                window.addEventListener('resize', setSlidePosition);
                setSlidePosition(); 
                updateNavButtons();
            }

            // --- Multiple Countdown Timers Logic ---
            const countdownSlides = document.querySelectorAll('.slider-slide[data-event-date]');
            countdownSlides.forEach(slide => {
                const countdownDate = new Date(slide.dataset.eventDate).getTime();
                
                const daysEl = slide.querySelector('.days');
                const hoursEl = slide.querySelector('.hours');
                const minutesEl = slide.querySelector('.minutes');
                const secondsEl = slide.querySelector('.seconds');
                const countdownEl = slide.querySelector('.countdown');

                const timerInterval = setInterval(() => {
                    const now = new Date().getTime();
                    const distance = countdownDate - now;

                    if (distance < 0) {
                        clearInterval(timerInterval);
                        if(countdownEl) countdownEl.innerHTML = "<h4 style='color: var(--accent-color); font-size: 1.2em;'>This Event Has Started!</h4>";
                        return;
                    }

                    if (daysEl) daysEl.innerText = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                    if (hoursEl) hoursEl.innerText = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                    if (minutesEl) minutesEl.innerText = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                    if (secondsEl) secondsEl.innerText = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                }, 1000);
            });

            // --- Past Event Filtering Logic ---
            const filterContainer = document.querySelector(".event-filters");
            const eventCards = document.querySelectorAll(".past-event-card");

            const filterCards = (filterValue) => {
                eventCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const shouldShow = filterValue === 'all' || cardCategory === filterValue;
                    
                    if (shouldShow) {
                        card.classList.remove('hide');
                        card.classList.add('show');
                    } else {
                        card.classList.remove('show');
                        card.classList.add('hide');
                    }
                });
            };

            if (filterContainer && eventCards.length > 0) {
                // Initially show all cards
                filterCards('all');

                filterContainer.addEventListener("click", (event) => {
                    if (event.target.classList.contains("filter-btn")) {
                        filterContainer.querySelector(".active").classList.remove("active");
                        event.target.classList.add("active");
                        const filterValue = event.target.getAttribute("data-filter");
                        filterCards(filterValue);
                    }
                });
            }
        });
    </script>

</body>
</html>