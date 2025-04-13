<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            background-image: url("images/c0d6ec104884591.5f6cab1f1a1c7.gif");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: fixed;
        }
        .container {
            display: flex;
            justify-content: center;
            padding: 35px;
            color: lightgrey;
            flex-direction: column;
            align-items: center;
        }
        .faq-section {
            width: 60%;
            background-color: rgba(0, 0, 139, 0.3);
            color: white;
            text-align: center;
            padding: 10px 10px;
            align-items: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .faq-section h1 {
            margin: 10;
            font-size: 24px;
            color: lightgrey;
        }
        .faq-section p {
            margin: 10px;
            font-size: 20px;
            color: lightgrey;
        }
        .category-select {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .accordion {
            background-color: antiquewhite;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
            transition: max-height 0.4s ease-out;
            margin-bottom: 10px;
            border-radius: 5%;
        }
        .panel {
            padding: 12px;
            background-color: rgba(0, 0, 139, 0.3);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }
        .panel.open {
            max-height: 200px; /* Adjust as per content length */
        }
        .search-bar {
            margin-bottom: 20px;
            padding: 10px;
            width: 80%;
            font-size: 16px;
        }
        .toggle-all, .favorite-btn {
            margin-bottom: 20px;
            background-color: #0066cc; /* Button background color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .toggle-all:hover, .favorite-btn:hover {
            background-color: #004999; /* Darker shade on hover */
        }
        .favorites-list {
            margin-top: 20px;
            background-color: rgba(0, 0, 139, 0.5);
            padding: 10px;
            border-radius: 5px;
            color: white;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .faq-section {
                width: 90%;
            }
        }
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .loading {
            display: none;
            font-size: 20px;
            color: white;
            margin-top: 10px;
            position: relative;
        }
        .loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            border: 3px solid white;
            border-top: 3px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite; /* Add spin animation */
            left: 50%;
            transform: translateX(-50%);
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        /* Navigation styles */
        #navMenu {
            display: none;
            position: absolute;
            top: 70px; /* Adjust according to your layout */
            left: 10px; /* Adjust according to your layout */
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            transition: all 0.3s ease; /* Smooth transition */
        }
        #navMenu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: black;
            font-size: 16px;
            transition: background 0.3s ease, color 0.3s ease; /* Smooth transition for hover */
        }
        #navMenu a:hover {
            background: #f0f0f0;
            color: #007bff;
        }
        .toggle-nav {
            cursor: pointer;
            font-size: 35px; /* Increased icon size */
            position: absolute;
            top: 20px; /* Adjust according to your layout */
            left: 10px; /* Adjust according to your layout */
        }
    </style>
</head>
<body>
    <!-- Navigation Links -->
    <div class="toggle-nav">&#9776;</div>
    <div id="navMenu">
        <a href="http://localhost/IQT/p1.php">Home</a>
        <a href="http://localhost/IQT/p3.php">Register</a>
        <a href="http://localhost/IQT/FAQ.php">FAQ's</a>
        <a href="http://localhost/IQT/pr.php">View Result</a>
        <a href="http://localhost/IQT/IQ Certificate.php">IQ Certificate</a>
        <a href="http://localhost/IQT/p4.php">Admin</a>
        <a href="http://localhost/IQT/p2.php">Take The Test</a>
        <input type="text" id="searchBar" class="form-control mt-2" placeholder="Search..." />

    </div>
    <div class="container">
        <div class="faq-section" id="faq">
            <h1>Frequently Asked Questions</h1>
            <p>Have Any Questions? Look Here Now</p>
            <select class="category-select" id="categoryFilter">
                <option value="">All Categories</option>
                <option value="general">General</option>
                <option value="security">Security</option>
                <option value="intelligence">Intelligence</option>
            </select>
            <input type="text" class="search-bar" id="search" placeholder="Search FAQs..." />
            <button class="toggle-all" id="toggleAll">Toggle All</button>
            <button class="favorite-btn" id="showFavorites">Show Favorites</button>

            <div class="loading" id="loading">Loading...</div>

            <div id="faqContainer">
                <?php
                $faqs = [
                    ['question' => 'What is an IQ Test?', 'answer' => 'An IQ (Intelligence Quotient) Test is a standardized assessment designed to measure human intelligence, typically through a series of questions and tasks.', 'category' => 'general'],
                    ['question' => 'Why take an IQ Test?', 'answer' => 'The object of taking an IQ test is to assess intellect, logic and problem-solving skills, as well as mathematical comprehension, language abilities, short-term memory, and information processing speed.', 'category' => 'intelligence'],
                    ['question' => 'What are the results made for?', 'answer' => 'IQ test results are used to assess cognitive abilities, guide educational placements, inform career choices, support psychological evaluations, and contribute to research on intelligence.', 'category' => 'general'],
                    ['question' => 'Is my personal information secure?', 'answer' => 'Yes, we prioritize the privacy data and security of your personal information. We adhere to strict data protection and implement security measures to safeguard your data.', 'category' => 'security'],
                    ['question' => 'High IQ Test scores?', 'answer' => 'An IQ test score of 100 is considered normal by the bell curve, and a score above 100 is usually correlated with high intelligence. Extreme intelligence is classified as a score of 130 or higher on an IQ test, while giftedness is defined as a score of 140 or higher on an IQ test.', 'category' => 'intelligence'],
                ];

                foreach ($faqs as $index => $faq) {
                    echo '<article class="faq-item" data-category="' . $faq['category'] . '">';
                    echo '<button class="accordion" aria-expanded="false" aria-controls="panel' . $index . '">' . htmlspecialchars($faq['question']) . '</button>';
                    echo '<div class="panel" id="panel' . $index . '"><p>' . htmlspecialchars($faq['answer']) . '</p></div>';
                    echo '</article>';
                }
                ?>
            </div>

            <div class="favorites-list" id="favorites" style="display: none;">
                <h2>Favorite Questions</h2>
                <ul id="favoritesList"></ul>
            </div>
        </div>
        <button class="scroll-to-top" id="scrollToTop">↑</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordions = document.querySelectorAll('.accordion');
            const favoritesList = document.getElementById('favoritesList');
            const favorites = new Set(); // Store favorite FAQs

            // Toggle accordion panels
            accordions.forEach((accordion, index) => {
                accordion.addEventListener('click', function() {
                    const panel = accordion.nextElementSibling;
                    const isOpen = panel.classList.contains('open');
                    accordion.setAttribute('aria-expanded', !isOpen);
                    panel.classList.toggle('open');
                    if (!isOpen) {
                        favorites.add(accordion.innerText); // Add to favorites
                    } else {
                        favorites.delete(accordion.innerText); // Remove from favorites
                    }
                });
            });

            // Show favorites
            document.getElementById('showFavorites').addEventListener('click', function() {
                favoritesList.innerHTML = ''; // Clear previous favorites
                favorites.forEach(favorite => {
                    const li = document.createElement('li');
                    li.textContent = favorite;
                    favoritesList.appendChild(li);
                });
                document.getElementById('favorites').style.display = favorites.size > 0 ? 'block' : 'none';
            });

            // Toggle all accordions
            document.getElementById('toggleAll').addEventListener('click', function() {
                const allOpen = [...accordions].every(acc => acc.nextElementSibling.classList.contains('open'));
                accordions.forEach((accordion) => {
                    const panel = accordion.nextElementSibling;
                    accordion.setAttribute('aria-expanded', !allOpen);
                    panel.classList.toggle('open', !allOpen);
                });
            });

            // Search functionality with loading indicator
            const loadingIndicator = document.getElementById('loading');
            document.getElementById('search').addEventListener('keyup', function() {
                loadingIndicator.style.display = 'block';  // Show loading
                loadingIndicator.setAttribute('aria-live', 'assertive'); // For screen readers
                const query = this.value.toLowerCase();
                const items = document.querySelectorAll('.faq-item');
                setTimeout(() => {
                    items.forEach(item => {
                        const question = item.querySelector('.accordion').innerText.toLowerCase();
                        const category = item.getAttribute('data-category');
                        const filterCategory = document.getElementById('categoryFilter').value;
                        if (question.includes(query) && (filterCategory === "" || filterCategory === category)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    loadingIndicator.style.display = 'none'; // Hide loading
                }, 300); // Simulate a delay for loading
            });

            // Category filter functionality
            document.getElementById('categoryFilter').addEventListener('change', function() {
                const selectedCategory = this.value;
                const items = document.querySelectorAll('.faq-item');
                items.forEach(item => {
                    const category = item.getAttribute('data-category');
                    if (selectedCategory === "" || selectedCategory === category) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Scroll to top functionality
            const scrollToTopBtn = document.getElementById('scrollToTop');
            window.onscroll = function() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    scrollToTopBtn.style.display = "block";
                } else {
                    scrollToTopBtn.style.display = "none";
                }
            };
            scrollToTopBtn.onclick = function() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            };

            // Toggle navigation menu
            const navMenu = document.getElementById('navMenu');
            const toggleNavBtn = document.querySelector('.toggle-nav');
            toggleNavBtn.addEventListener('click', function() {
                const isVisible = navMenu.style.display === 'block';
                navMenu.style.display = isVisible ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
