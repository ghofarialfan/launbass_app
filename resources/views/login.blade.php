<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --brand-color: #1c5062;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
    }

    .auth-container {
      max-width: 420px;
      margin: 60px auto;
      padding: 20px;
    }

    .auth-card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    h1 {
      font-size: 24px;
      font-weight: 700;
      color: var(--brand-color);
    }

    .lead-muted {
      color: #9da1a6;
      font-size: 15px;
      margin-top: 6px;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: 600;
      color: #222;
    }

    .form-control {
      border-radius: 10px;
      padding: 14px;
      font-size: 15px;
    }

    .btn-secondary {
      border-radius: 12px;
      padding: 12px;
      font-weight: 600;
      font-size: 16px;
      background-color: #bfbfbf; /* disabled state */
      border: none;
    }

    .btn-secondary.enabled {
      background-color: var(--brand-color);
    }

    .text-link {
      color: var(--brand-color);
      text-decoration: underline;
      font-weight: 500;
    }

    .bottom-cta {
      text-align: center;
      margin-top: 48px;
      font-size: 15px;
    }

    .small-muted {
      color: #6c757d;
      font-size: 12px;
    }
  </style>
</head>
<body>

  <div class="auth-container">
    <div class="card auth-card p-4">
      <div class="card-body">

        <!-- Header -->
        <h1>Login to your account</h1>
        <p class="lead-muted">It’s great to see you again.</p>

        <!-- Form -->
        <form id="loginForm" method="POST" action="#">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address" required>
          </div>

          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password" required>
              <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <p class="small-muted mb-0">
              Forgot your password?
              <a href="#" class="text-link">Reset your password</a>
            </p>
          </div>

          <div class="d-grid">
            <button id="loginBtn" type="submit" class="btn btn-secondary btn-lg" disabled>Login</button>
          </div>
        </form>

        <!-- Bottom link -->
        <div class="bottom-cta">
          <p class="mb-0">Don’t have an account? <a href="#" class="text-link">Sign Up</a></p>
        </div>

      </div>
    </div>
  </div>

  <!-- JS for password toggle and button state -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    const emailField = document.getElementById('email');
    const loginBtn = document.getElementById('loginBtn');

    // Toggle password visibility
    togglePassword.addEventListener('click', function () {
      const type = passwordField.type === 'password' ? 'text' : 'password';
      passwordField.type = type;
      this.innerHTML = type === 'password'
        ? '<i class="bi bi-eye"></i>'
        : '<i class="bi bi-eye-slash"></i>';
    });

    // Enable button when both fields filled
    function updateButtonState() {
      if (emailField.value.trim() && passwordField.value.trim()) {
        loginBtn.disabled = false;
        loginBtn.classList.add('enabled');
      } else {
        loginBtn.disabled = true;
        loginBtn.classList.remove('enabled');
      }
    }

    emailField.addEventListener('input', updateButtonState);
    passwordField.addEventListener('input', updateButtonState);
  </script>

</body>
</html>
