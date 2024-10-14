<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK VERSE</title>
    <link rel="stylesheet" href="landing.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo.jpeg">

</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>BOOK VERSE!</h1>
        </div>
        <div class="auth-links">
            <a href="../landing/login/homepage.php" class="btn-auth">Sign In</a>
            <a href="../landing/login/homepage.php" class="btn-auth">Sign Up</a>
        </div>
    </header>


    <section id="hero">
        <div class="hero-content">
            <h1>Book Verse - Book Worm!</h1>
            <p>For the love of books</p>
            <a href="menu.html" class="cta-button">Explore Our Collection</a>
        </div>
    </section>


    <section class="hero">
        <video autoplay muted loop id="bg-video">
        <source src="../assets/herovid.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
        </video>

        <div class="hero-content">
        <h1>Discover Your Next Favorite Book</h1>
        <p>Browse thousands of ebooks and dive into a world of knowledge and adventure.</p>
        <div class="hero-buttons">
            <a href="genres.html" class="btn">Browse Genres</a>
            <a href="new-releases.html" class="btn">New Releases</a>
            <a href="top-rated.html" class="btn">Top Rated</a>
        </div>
        </div>
    </section>




    <section id="contact">
        <h2>Contact Us</h2>
        <form id="contactForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Submit</button>
        </form>
        <p>Phone: +91 9944216242 | Email: <a href="mailto:rithickrithik553@gmail.com">rithickrithik553@gmail.com</a></p>
    </section>


    <section id="about">
        <h2>About Us</h2>
        <p>Welcome to Book Verse, your ultimate destination for a curated collection of novels, short stories, comics, fantasy, humor, romance, and science fiction. Our mission is to provide readers with a diverse and engaging selection of books that fuel the imagination and inspire a love of reading.</p>
        <div class="about-images">
            
        </div>
    </section>







    <footer>
        <p>&copy; 2024 Book Verse. All Rights Reserved.</p>
        <p><a href="#privacy-policy">Privacy Policy</a> | <a href="#terms-of-service">Terms of Service</a></p>
    </footer>
    


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm = document.getElementById('contactForm');
    
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault(); 
                alert('This feature is under development.'); 
            });
        });
    </script>
    


</body>
</html>
