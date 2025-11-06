<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create an Account</title>

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

    .text-link {
      color: var(--brand-color);
      text-decoration: underline;
      font-weight: 500;
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
      color: #fff;
    }

    .terms {
      color: #222;
      font-size: 13px;
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .terms a {
      text-decoration: underline;
      color: var(--brand-color);
      font-weight: 500;
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      color: #bdbdbd;
      margin: 18px 0;
    }

    .divider::before,
    .divider::after {
      content: "";
      height: 1px;
      background: #e6e6e6;
      flex: 1;
    }

    .bottom-cta {
      text-align: center;
      margin-top: 36px;
      font-size: 15px;
    }
  </style>
</head>
<body>

  <div class="auth-container">
    <div class="card auth-card p-4">
      <div class="card-body">

        <!-- Header -->
        <h1>Create an account</h1>
        <p class="lead-muted">Let’s create your account.</p>

        <!-- Form -->
        <form id="registerForm" method="POST" action="{{ route('register.store') }}">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input id="name"
                   name="name"
                   type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter your full name"
                   value="{{ old('name') }}"
                   required>
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email"
                   name="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter your email address"
                   value="{{ old('email') }}"
                   required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input id="password"
                     name="password"
                     type="password"
                     class="form-control @error('password') is-invalid @enderror"
                     placeholder="Enter your password"
                     required>
              <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <!-- Confirm password (not required client-side) -->
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation"
                   name="password_confirmation"
                   type="password"
                   class="form-control"
                   placeholder="Repeat your password">
          </div>

          <p class="terms">
            By signing up you agree to our
            <a href="#">Terms</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Use</a>.
          </p>

          <div class="d-grid">
            <button id="registerBtn" type="submit" class="btn btn-secondary btn-lg" disabled>Create an Account</button>
          </div>
        </form>

        <!-- Bottom link -->
        <div class="bottom-cta">
          <p class="mb-0">Already have an account? <a href="/login" class="text-link">Log In</a></p>
        </div>

      </div>
    </div>
  </div>

  <!-- JS for password toggle and button state -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    const emailField = document.getElementById('email');
    const nameField = document.getElementById('name');
    const registerBtn = document.getElementById('registerBtn');

    // Toggle password visibility
    togglePassword.addEventListener('click', function () {
      const type = passwordField.type === 'password' ? 'text' : 'password';
      passwordField.type = type;
      this.innerHTML = type === 'password'
        ? '<i class="bi bi-eye"></i>'
        : '<i class="bi bi-eye-slash"></i>';
    });

    // Enable button when all fields filled
    function updateButtonState() {
      if (nameField.value.trim() && emailField.value.trim() && passwordField.value.trim()) {
        registerBtn.disabled = false;
        registerBtn.classList.add('enabled');
      } else {
        registerBtn.disabled = true;
        registerBtn.classList.remove('enabled');
      }
    }

    nameField.addEventListener('input', updateButtonState);
    emailField.addEventListener('input', updateButtonState);
    passwordField.addEventListener('input', updateButtonState);
  </script>

</body>
</html>
