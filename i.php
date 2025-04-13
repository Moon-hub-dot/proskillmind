
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="shortcut icon" href="images/Icons/home-icon.png">
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
    .profile-container {
    position: relative;
    display: inline-block;
    margin-left: 10px;  /* Spacing from other links */
}

.profile-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;   /* Circular profile icon */
    cursor: pointer;      /* Clickable */
    border: 2px solid #fff; /* Border for clear visibility */
}

.online-status {
    position: absolute;
    bottom: 2px;         /* Position the indicator */
    right: 2px;
    width: 10px;
    height: 10px;
    background-color: #00FF00;  /* Green for online */
    border: 2px solid #fff;     /* Border for clarity */
    border-radius: 50%;         /* Circular shape */
}
.contact-info {
      font-size: 1.1rem;
      margin-top: 20px;
    }

    .contact-info strong {
      color:rgb(1, 6, 11);
    }
    .logo-wrapper {
  position: absolute;
  top: 20px;
  left: 20px;
  text-align: center;
  font-family: Arial, sans-serif;
  color: #000;
}

.logo-img {
  width: 100px;
  height: auto;
  display: block;
  margin: 0 auto 10px auto;
}

.certified-text {
  font-weight: bold;
  font-size: 14px;
  margin-bottom: 8px;
}

.email-text {
  font-size: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.email-text a {
  color: #0000ee;
  text-decoration: none;
  margin-left: 5px;
}

.email-icon {
  vertical-align: middle;
}


</style>
</head>
<body>
<div class="section-1" id="section-1">
    <!-- Logo -->
    <div class="logo-wrapper">
  <img src="images/logo.png" alt="ProSkill Mind Logo" class="logo-img" />
  <p class="certified-text">Certified Institute</p>
  <p class="email-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor" class="email-icon" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H2a2 2 0 01-2-2V4zm2-1a1 1 0 00-1 1v.217l7 4.2 7-4.2V4a1 1 0 00-1-1H2zm13 2.383l-5.857 3.514L15 11.383V5.383zM1 5.383v5.999l5.857-3.486L1 5.383zM6.761 9.674L1.528 13h12.944l-5.233-3.326L8 10.882l-1.239-.708z"/>
    </svg>
    <a href="mailto:pskill400@gmail.com"><strong>pskill400@gmail.com</strong></a>
  </p>
</div>



    <!-- Navbar -->
    <nav class="navbar">
        <a href="i.php" class="navbar-link">Home</a>
        <a href="#section-2" class="navbar-link">About Us</a>
        <a href="FAQ.php" class="navbar-link">FAQ's</a>
        <a href="leaderboard.php" class="navbar-link">Leaderboard</a>
        <a href="adminlogin.php" class="navbar-link">Admin</a>
        <a href="contact.php" class="navbar-link">Contact US</a>
        <!-- Profile Icon with Online Indicator -->
    <a href="profile.php" class="navbar-link profile-container">
        <img src="images/profile.png" alt="Profile" class="profile-icon">
        <span class="online-status"></span>
    </a>
    </nav>

    <!-- Banner Section -->
    <div class="section-1-banner">
        <h1>ProSkill Mind</h1>
        <p>Elevate Your Thinking, <span>Enhance Your Skills.</span></p>
        <a href="#iq-test-section" class="get-started-button">Get Started</a> <!-- Scroll to IQ Test -->
    </div>
</div>

<!-- IQ Test Section -->
<div id="iq-test-section">
    <h2>"Choose Your Path to Unlock Potential!"</h2>
    </div>


            <!-- Slideshow -->
            <div class="slideshow"></div>
            <!-- End of Slideshow -->
        </section>
        <!-- End of Section 1 -->
         <!-- Section for IQ Tests -->
<section class="iq-test-section" id="section-iq-test">
    <!-- Quick IQ Test -->
    <div class="iq-test-box">
        <div class="iq-test-icon quick-test-icon">
            <img src="images/logo.png" alt="Quick IQ Test Icon"> <!-- Replace with actual icon if needed -->
        </div>
        <div class="iq-test-content">
            <h3>"Think Smarter, Test Freely"</h3>
            <p>Free IQ Test provides Basic IQ Test and You'll receive your <strong>reliable results </strong> </p>
            <button type="button" class="start-test-btn" onclick="window.location.href='p2.php'">Start the Test</button>
        </div>
    </div>

    <!-- Advanced IQ Test -->
    <div class="iq-test-box">
        <div class="iq-test-icon advanced-test-icon">
            <img src="images/logo.png" alt="Advanced IQ Test Icon"> <!-- Replace with actual icon if needed -->
        </div>
        <div class="iq-test-content">
            <h3>"Get the full Picture of Your Genius"</h3>
            <p>Premium IQ test provides advance IQ Test with detailed insights. Get your <strong>IQ score, robust results, and certificate</strong> after completion.</p>
            <button type="button" class="start-test-btn" onclick="window.location.href='instructions.php'">Start the Test</button>
        </div>
    </div>
    
</section>



        <!-- Section 2 -->
        <section class="section-2" id="section-2">
            <!-- Section 2 Heading -->
            <h1 class="section-2-heading">About Us</h1>
            <!-- End of Section 2 Heading -->
             <!-- About Us Description -->
            <div class="about-us-description">
                <p>ProSkill Mind is dedicated to helping individuals assess and enhance their cognitive abilities through our IQ testing platform. We offer both free and premium test options tailored to different needs. The free test provides a straightforward experience with a static set of questions and a basic result summary. For a more comprehensive evaluation, the premium test offers dynamic, adaptive questions that adjust based on your responses, delivering an in-depth analysis, personalized results, and a certificate of achievement upon completion. With ProSkill Mind, you can explore your cognitive strengths and gain valuable insights to support your growth.</p>
            </div>
            <!-- End of About Us Description -->


            <!-- Section 2 Images -->
            <div class="iphones">
                <img src="images/bran1.png" class="iphone-img-1">
                <img src="images/bran2.png" class="iphone-img-2">
            </div>
            <!-- End of Section 2 Images -->

            <!-- Section 2 Buttons -->
            <div class="iphone-btns">
                <a href="#" class="iphone-btn center"><span>Learn More</span></a>
            </div>
            <!-- End of Section 2 Buttons -->
        </section>
        <!-- End of Section 2 -->

        <section class="personalities-section">
    <h1>IQ's Famous Personalities</h1>
    <div id="personalitiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <!-- First slide with circular cards -->
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-3">
                    <!-- Albert Einstein -->
                    <div class="personality-card">
                        <img src="images/22.png" alt="Albert Einstein">
                        <div class="content">
                            <h5>Albert Einstein</h5>
                            <p>Albert Einstein, with an estimated IQ between 160-180, is celebrated for his groundbreaking theories in physics.</p>
                        </div>
                    </div>
                    <!-- Isaac Newton -->
                    <div class="personality-card">
                        <img src="images/21.png" alt="Isaac Newton">
                        <div class="content">
                            <h5>Isaac Newton</h5>
                            <p>Isaac Newton made revolutionary contributions to mathematics, physics, and astronomy with an IQ around 190 or higher.</p>
                        </div>
                    </div>
                    <!-- Marie Curie -->
                    <div class="personality-card">
                        <img src="images/23.png" alt="Marie Curie">
                        <div class="content">
                            <h5>Marie Curie</h5>
                            <p>Marie Curie, a pioneering physicist and chemist, was the first person to win Nobel Prizes in two sciences.</p>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Stephen Hawking -->
                    <div class="personality-card">
                        <img src="images/24.png" alt="Stephen Hawking">
                        <div class="content">
                            <h5>Stephen Hawking</h5>
                            <p>Stephen Hawking, a theoretical physicist with an IQ around 160, made fundamental contributions to cosmology and black holes.</p>
                        </div>
                    </div>
                    <!-- Terence Tao -->
                    <div class="personality-card">
                        <img src="images/25.png" alt="Terence Tao">
                        <div class="content">
                            <h5>Terence Tao</h5>
                            <p>Mathematician Terence Tao, with an IQ over 220, is known for breakthroughs in number theory and harmonic analysis.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        
        
</section>



<div class="stats-section"> <canvas id="countryChart" width="100" height="100"></canvas>
    <h2 class="gradient-text">Country Statistics</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="images/usa.png">
            <h3>USA</h3>
            <p><strong>Population:</strong> 331 million</p>
            <p><strong>GDP:</strong> $21.43 trillion</p>
            <p><strong>Education Rate:</strong> 89%</p>
        </div>
        <div class="col-md-4">
            <img src="images/uk.jfif">
            <h3>UK</h3>
            <p><strong>Population:</strong> 67 million</p>
            <p><strong>GDP:</strong> $2.83 trillion</p>
            <p><strong>Education Rate:</strong> 86%</p>
        </div>
        <div class="col-md-4">
            <img src="images/india.png">
                <h3>India</h3>
            <p><strong>Population:</strong> 1.366 billion</p>
            <p><strong>GDP:</strong> $2.87 trillion</p>
            <p><strong>Education Rate:</strong> 74%</p>
        </div>
    </div>
</div>




<div class="testimonials-section">
  <h1 class="gradient-text" class="gradient-text">-WHAT OUR USERS SAY-</h1>
  <div class="testimonial-slider">
    <div class="testimonial">
      <img src="images/user1.jfif" alt="User 1">
      <p>"This IQ test was a great experience!"</p>
      <h3 style="color: lightblue;">Riya</h3>
    </div>
    <div class="testimonial">
      <img src="images/user2.jfif" alt="User 2">
      <p>"I loved the design and interactivity."</p>
      <h3 style="color: lightblue;">MAX</h3>
    </div>
    <!-- More testimonials -->
  </div>
</div>




    <!-- Footer -->
    <!-- Footer -->
<!-- Footer -->
<footer class="footer">
    <div class="footer-links">
        <a href="#">Home</a>
        <a href="FAQ.php">FAQ's</a>
        <a href="#section-2">About</a>
        <a href="contact.php">Contact Us</a>
    </div>
  <!-- Contact Info -->
  <div class="contact-info">
  <p>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H2a2 2 0 01-2-2V4zm2-1a1 1 0 00-1 1v.217l7 4.2 7-4.2V4a1 1 0 00-1-1H2zm13 2.383l-5.857 3.514L15 11.383V5.383zM1 5.383v5.999l5.857-3.486L1 5.383zM6.761 9.674L1.528 13h12.944l-5.233-3.326L8 10.882l-1.239-.708z"/>
    </svg> 
    Email: <strong><a href="mailto:pskill400@gmail.com">pskill400@gmail.com</a></strong>
  </p>
</div>
    <div class="social-icons">
        <a href="https://www.facebook.com/profile.php?id=61575335060520" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/proskillmind3?igsh=Z3Y5Nnk3NWY0YjNw" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://twitter.com" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://plus.google.com" target="_blank">
            <i class="fab fa-google-plus-g"></i>
        </a>
        <a href="https://youtube.com/@proskillmind?si=V3Z0rpGOPJCLaxNX" target="_blank">
            <i class="fab fa-youtube"></i>
        </a>
    </div>

    <p class="copyright">Copyright © 2024; Designed by <strong>ProSkill Mind</strong></p>
</footer>


    <script src="s.js"></script>
    <script>
        <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        const navbar = document.querySelector('.navbar');
        const burger = document.querySelector('.burger'); // Add burger in HTML for mobile


    const ctx = document.getElementById('countryChart').getContext('2d');
    const countryChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['USA', 'UK', 'India'],
            datasets: [{
                label: 'Country GDP (Trillions)',
                data: [21.43, 2.83, 2.87],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'GDP Distribution by Country'
                }
            }
        }
    });
    

// JavaScript to handle scroll event
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.backgroundColor = "#333";
        navbar.style.transition = "background-color 0.3s";
    } else {
        navbar.style.backgroundColor = "#1E2A38";
    }
});
// Scroll-triggered animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
        }
    });
});

document.querySelectorAll('.info-section, .features-section').forEach(section => {
    observer.observe(section);
});
function animateCounter(id, endValue) {
    let counter = 0;
    const increment = endValue / 100;
    const element = document.getElementById(id);
    const updateCounter = setInterval(() => {
        counter += increment;
        element.innerText = Math.ceil(counter);
        if (counter >= endValue) clearInterval(updateCounter);
    }, 20);
}

document.addEventListener('DOMContentLoaded', () => {
    animateCounter('stat1', 1000);
    animateCounter('stat2', 500);
    animateCounter('stat3', 300);
});
    </script>
</body>
</html>
