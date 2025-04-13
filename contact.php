<?php
$showThankYou = false;
$message = '';

// Process the form only on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : '';
    $message = preg_replace("/\s{2,}/", " ", $message); // Clean extra spaces

    if (strlen($message) >= 50 && strlen($message) <= 100 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $conn = new mysqli("localhost", "root", "", "test");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $stmt = $conn->prepare("INSERT INTO contact_messages (full_name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        $showThankYou = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - IQ Test Global</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
  body {
  background: linear-gradient(135deg, #dff1ff, #ffffff);
  background-attachment: fixed;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  position: relative;
  min-height: 100vh;
  overflow-x: hidden;
}

/* Abstract blurred circles */
body::before,
body::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  filter: blur(100px);
  opacity: 0.5;
  z-index: -1;
}

body::before {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, #8ec5fc, #e0c3fc);
  top: -100px;
  left: -100px;
}

body::after {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, #fbc2eb, #a6c1ee);
  bottom: -150px;
  right: -150px;
}


h1 {
  font-size: 2.8rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 20px;
}
.logo-img {
  display: block;
  max-width: 180px;
  height: auto;
  margin-bottom: 20px;
  filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.15));
  transition: transform 0.3s ease;
}

.logo-img:hover {
  transform: scale(1.05);
}


.contact-card {
  background: #ffffff;
  padding: 35px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  animation: fadeInUp 1s ease;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.contact-form {
    max-width: 600px;
    margin: 60px auto;
    padding: 30px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  .form-floating {
    position: relative;
    margin-bottom: 0.3rem;
  }

  .form-icon {
    position: absolute;
    top: 18px;
    left: 15px;
    font-size: 1.2rem;
    color: #6c757d;
    z-index: 2;
  }

  .form-control {
    padding-left: 2.5rem;
    border-radius: 12px;
    border: 1px solid #ced4da;
    transition: 0.3s ease;
  }

  .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
  }

  .form-text {
    font-size: 0.758rem;
    color: #6c757d;
  }

  .btn-primary {
    border-radius: 12px;
    padding: 0.6rem;
    background: linear-gradient(135deg, #0d6efd, #4f9ef9);
    border: none;
    transition: 0.3s ease;
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, #0b5ed7, #1f80ff);
  }

  label span {
    color: red;
  }
.thank-you-popup {
  display: <?= $showThankYou ? 'block' : 'none' ?>;
  position: fixed;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #d4edda;
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 0 25px rgba(0,0,0,0.2);
  z-index: 9999;
  animation: fadeInDown 0.8s ease;
}

    .contact-card {
      background: #ffffff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }

    .contact-card:hover {
      transform: scale(1.02);
    }

    .form-text {
      font-size: 0.875rem;
      color: #6c757d;
    }
    .form-control {
  white-space: pre-wrap;
  word-break: break-word;
}


    .btn-primary {
      background: linear-gradient(45deg, #007bff, #00c6ff);
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      transition: all 0.4s ease-in-out;
      font-weight: bold;
    }

    .btn-primary:hover {
      background: linear-gradient(45deg, #0056b3, #0096c7);
      transform: scale(1.05);
    }

    .form-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
      color: #6c757d;
    }

    .input-group {
      position: relative;
    }

    .input-group input,
    .input-group textarea {
      padding-left: 40px;
    }

    .contact-info {
      font-size: 1.1rem;
      margin-top: 20px;
    }

    .contact-info strong {
      color: #0056b3;
    }

  </style>
  <script>
    window.addEventListener("DOMContentLoaded", () => {
      const popup = document.querySelector('.thank-you-popup');
      if (popup && popup.style.display === 'block') {
        setTimeout(() => {
          popup.style.display = 'none';
          window.location.href = window.location.pathname;
        }, 4000);
      }
    });
  </script>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-10">
      <div class="row g-5 align-items-center">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
        <img src="images/11.png" alt="IQ Test Global Logo" style="max-width: 80px;">
<h1>Contact Us</h1>

          <p>We greatly appreciate your interest in proskillmind! Your feedback, questions, and suggestions are highly valued, and we are committed to providing you with outstanding support and service.

Should you have any inquiries or require assistance, please don’t hesitate to get in touch with us. Our team is always ready to help and ensure your experience with our products and services is nothing short of exceptional.

You can reach us via</p>
<div class="contact-info">
  <p>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H2a2 2 0 01-2-2V4zm2-1a1 1 0 00-1 1v.217l7 4.2 7-4.2V4a1 1 0 00-1-1H2zm13 2.383l-5.857 3.514L15 11.383V5.383zM1 5.383v5.999l5.857-3.486L1 5.383zM6.761 9.674L1.528 13h12.944l-5.233-3.326L8 10.882l-1.239-.708z"/>
    </svg> 
    Email: <strong><a href="mailto:pskill400@gmail.com">pskill400@gmail.com</a></strong>
  </p>
</div>

        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <?php if (!$showThankYou): ?>
          <div class="contact-card">
          <form method="POST" action="" class="contact-form">
  <h3 class="text-center mb-4">💬</h3>

  <div class="form-floating position-relative">
    <i class="bi bi-person-fill form-icon"></i>
    <input type="text" name="full_name" class="form-control" placeholder="Your Full Name"  style="height: 70px;" required>
    <label>--- Full Name <span>*</span></label>
  </div>

  <div class="form-floating position-relative">
    <i class="bi bi-envelope-fill form-icon"></i>
    <input type="email" name="email" class="form-control" placeholder="Your Email"  style="height: 70px;" required>
    <label>--- Email <span>*</span></label>
  </div>

  <div class="form-floating position-relative">
    <i class="bi bi-chat-dots-fill form-icon"></i>
    <textarea name="message" class="form-control" placeholder="Your Message" rows="5" style="height: 100px;" minlength="50" maxlength="100" required></textarea>
    <label> Message <span>*</span></label>
  </div>

  <div class="form-text mb-3 ms-2">Your message should be between 50 and 500 characters.</div>

  <button type="submit" class="btn btn-primary w-100">🚀 Send Message</button>
</form>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if ($showThankYou): ?>
  <div class="thank-you-popup text-center animate__animated animate__fadeIn">
    <h4>🎉 Thank You!</h4>
    <p>Your message has been successfully sent.</p>
  </div>
<?php endif; ?>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
