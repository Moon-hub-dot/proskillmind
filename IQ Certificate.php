<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate Samples</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url("aa91a7851f25f26169a9986f03732a37.gif");
      background-repeat: no-repeat;
      background-position: fixed;
      background-size: cover;
      transition: background-color 0.3s, color 0.3s;
    }

    h1, h2 {
      color: #FFAA33;
    }
    /* Carousel */
.carousel-item img {
  width: auto; /* Adjust the width */
  height: 300px; /* Reduce the height */
  object-fit: contain; /* Ensure the image fits properly without being cut off */
  margin: 0 auto; /* Center the image horizontally */
}


    .card {
      border: none;
      border-radius: 10%;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card img {
      height: 250px;
      object-fit: cover;
    }

    .card-body {
      background-color: #fff;
      padding: 15px;
      border-top: 1px solid #ddd;
    }

    .card-text {
      font-size: 1rem;
      color: #555;
    }

    .list-group-item {
      font-size: 1.2rem;
      padding: 15px;
    }

    .list-group-item i {
      color: #007bff;
      margin-right: 10px;
    }

    /* Navigation styles */
    #navMenu {
      display: none;
      position: absolute;
      top: 70px;
      left: 10px;
      background: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px;
      border-radius: 5px;
      z-index: 1000;
      transition: all 0.3s ease;
    }

    #navMenu a {
      display: block;
      padding: 10px 15px;
      text-decoration: none;
      color: black;
      font-size: 16px;
      transition: background 0.3s ease, color 0.3s ease;
    }

    #navMenu a:hover {
      background: #f0f0f0;
      color: #007bff;
    }

    .toggle-nav {
      cursor: pointer;
      font-size: 35px;
      position: absolute;
      top: 20px;
      left: 10px;
      transition: all 0.3s ease;
    }

    /* Toggle icon transition */
    .toggle-nav.open {
      transform: rotate(90deg);
    }

    /* Dark mode */
    body.dark-mode {
      background-color: #333;
      color: #fff;
    }

    body.dark-mode .card-body {
      background-color: #444;
      border-top: 1px solid #555;
    }

    body.dark-mode .list-group-item {
      background-color: #444;
      color: #fff;
    }

    /* Scroll to Top Button */
    #scrollTopBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
      font-size: 24px;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 50%;
      cursor: pointer;
    }

    #scrollTopBtn:hover {
      background-color: #0056b3;
    }

    /* Sticky Navigation */
    .sticky-nav {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Carousel */
    .carousel-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }

    /* Star rating in testimonials */
    .stars {
      color: #ffcc00;
      margin-bottom: 10px;
    }

    /* Responsive layout */
    @media (max-width: 768px) {
      .card img {
        height: 200px;
      }
    }
  </style>
</head>
<body>
  <!-- Toggle button -->
  <div class="toggle-nav">&#9776;</div>

  <!-- Dark Mode Toggle -->
  <button id="darkModeToggle" class="btn btn-outline-dark position-absolute top-0 end-0 m-3">Toggle Dark Mode</button>
  
  <!-- Scroll-to-Top Button -->
  <button id="scrollTopBtn" title="Go to top">⬆️</button>

  <!-- Navigation menu -->
  <div id="navMenu">
    <a href="http://localhost/IQT/p1.php">Home</a>
    <a href="http://localhost/IQT/p3.php">Register</a>
    <a href="http://localhost/IQT/FAQ.php">FAQ's</a>
    <a href="http://localhost/IQT/pr.php">View Result</a>
    <a href="http://localhost/IQT/profile.php">IQ Certificate</a>
    <a href="http://localhost/IQT/p4.php">Admin</a>
    <a href="http://localhost/IQT/p2.php">Take The Test</a>
    <input type="text" id="searchBar" class="form-control mt-2" placeholder="Search..." />
  </div>

  <!-- Main content -->
  <div class="container mt-5">
    <h1 class="text-center mb-4">MINDMASTER ACHIEVEMENT OF CERTIFICATE</h1>

    <!-- Certificate Carousel -->
    <div id="certificateCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="68.png" alt="Sample Certificate 1">
        </div>
        <div class="carousel-item">
          <img src="67.png" alt="Sample Certificate 2">
        </div>
        <div class="carousel-item">
          <img src="66.png" alt="Sample Certificate 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#certificateCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#certificateCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Use Cases Section -->
    <div class="mt-5">
      <h2 class="text-center mb-4">Where Can These Certificates Be Used?</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="fas fa-briefcase"></i> Apply for Professional Jobs</li>
        <li class="list-group-item"><i class="fas fa-graduation-cap"></i> Educational Credentials</li>
        <li class="list-group-item"><i class="fas fa-trophy"></i> Showcase Achievements</li>
        <li class="list-group-item"><i class="fas fa-university"></i> Support University Applications</li>
        <li class="list-group-item"><i class="fas fa-handshake"></i> Networking & Professional Communities</li>
      </ul>
    </div>

    <!-- Testimonials Section -->
    <div class="mt-5">
      <h2 class="text-center mb-4">What People Are Saying</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card p-3">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <blockquote class="blockquote mb-0">
              <p>"Congratulations, Animesh, on receiving the MINDMASTER Achievement Certificate! Your exceptional problem-solving, creative thinking, and dedication to the project have truly stood out. Your contributions were invaluable, and we look forward to seeing your continued success. Well done!"</p>
              <footer class="blockquote-footer">AMIMESH</footer>
            </blockquote>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <blockquote class="blockquote mb-0">
              <p>"Congratulations, Mansi, on receiving the MINDMASTER Achievement Certificate! Your hard work, creativity, and dedication have been outstanding throughout the project. Your contributions have been impactful, and we look forward to seeing more of your success. Well done!"</p>
              <footer class="blockquote-footer">MANSI</footer>
            </blockquote>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3">
            <div class="stars">⭐⭐⭐⭐</div>
            <blockquote class="blockquote mb-0">
              <p>"Congratulations, Sanar, on earning the MINDMASTER Achievement Certificate! Your commitment, innovative thinking, and excellent problem-solving skills have greatly contributed to the success of the project. You've demonstrated strong mastery and made a significant impact. Keep up the great work!"</p>
              <footer class="blockquote-footer">SANAR</footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle navigation menu
    const toggleNav = document.querySelector('.toggle-nav');
    const navMenu = document.getElementById('navMenu');
    toggleNav.addEventListener('click', () => {
      navMenu.style.display = navMenu.style.display === 'block' ? 'none' : 'block';
      toggleNav.classList.toggle('open');
    });

    // Dark mode toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    darkModeToggle.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
    });

    // Scroll to top button
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    window.onscroll = function() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopBtn.style.display = 'block';
      } else {
        scrollTopBtn.style.display = 'none';
      }
    };
    scrollTopBtn.addEventListener('click', () => {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });

    // Sticky navigation
    window.addEventListener('scroll', function() {
      const nav = document.querySelector('.toggle-nav');
      if (window.pageYOffset > 50) {
        nav.classList.add('sticky-nav');
      } else {
        nav.classList.remove('sticky-nav');
      }
    });
  </script>
</body>
</html>
