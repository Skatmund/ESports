<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ArenaHub | Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/landing-design.css">
    <link rel="stylesheet" href="../assets/css/register-design.css">
    <link rel="stylesheet" href="../assets/css/login-design.css">

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar auth-navbar">

    <div class="container navbar-content">

        <div class="brand">
            <div class="brand-icon">🎮</div>
            <h1>ArenaHub</h1>
        </div>

        <div class="nav-actions">
            <a href="landingpage.html" class="btn btn-outline">Home</a>
        </div>

    </div>

</nav>

<div class="auth-container">

    <div class="auth-card">

        <div class="auth-left">

            <div class="brand">
                <div class="brand-icon">🎮</div>
                <h1>ArenaHub</h1>
            </div>

            <h2>Welcome Back!</h2>

            <p>
                Continue managing tournaments, teams,
                and your esports community.
            </p>

            <div class="stats">

                <div class="stat-box">
                    <h3>500+</h3>
                    <span>Tournaments</span>
                </div>

                <div class="stat-box">
                    <h3>10K+</h3>
                    <span>Players</span>
                </div>

                <div class="stat-box">
                    <h3>300+</h3>
                    <span>Organizations</span>
                </div>

            </div>

        </div>

        <div class="auth-right">

            <div class="auth-header">

                <h2>Login</h2>

                <p>
                    Sign in to your ArenaHub account.
                </p>

            </div>

            <!-- INCORRECT CREDENTIALS -->

            <?php
            if (isset($_GET['error'])) {

                if ($_GET['error'] == "invalid") {
                    echo '<div class="error-message">
                            Invalid username or password.
                        </div>';
                }

            }
            ?>

            <form class="auth-form" action="login-process.php" method="POST">

                <div class="input-group">

                    <label>Email or Username</label>

                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your email or username"
                        required>

                </div>

                <div class="input-group">

                    <label>Password</label>

                    <div class="password-box">

                        <input
                            type="password"
                            id="loginPassword"
                            name="password"
                            placeholder="Password"
                            required>

                        <button
                            type="button"
                            class="toggle-password"
                            data-target="loginPassword">

                            <i data-lucide="eye"></i>

                        </button>

                    </div>

                </div>

                <div class="login-options">

                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember">

                        Remember Me

                    </label>

                    <a href="#">Forgot Password?</a>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary auth-btn">

                    Login

                </button>

            </form>

            <div class="auth-footer">

                <p>
                    Don't have an account?
                    <a href="../register/register.php">Create Account</a>
                </p>

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script src="assets/js/auth.js"></script>

</body>
</html>