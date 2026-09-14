<?php
// register.php - EduMarket Student Account Creation
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $campus = trim($_POST['campus'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($fullname) || empty($email) || empty($phone) || empty($password)) {
        $error = 'Please fill out all required fields to create your account.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please provide a valid email address.';
    } else {
        $success = "Account created successfully for $fullname! You can now log in.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student Account | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Top Sticky Header -->
    <header class="site-header">
        <div class="container header-container">
            <a href="index.html" class="logo-wrapper">
                <img src="logos/edumarket logo 1.png" alt="EduMarket Logo" class="logo-img">
                <div class="logo-text">
                    <span class="logo-title">EduMarket</span>
                    <span class="logo-subtitle">Student Trading Hub</span>
                </div>
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="Marketplace.php" class="nav-link">Marketplace</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="Login.php" class="btn btn-secondary btn-sm">Sign In</a>
            </div>
        </div>
    </header>

    <main class="page-main">
        <div class="auth-page-wrap">
            <div class="auth-card" style="max-width: 580px;">
                <div class="auth-header">
                    <img src="logos/edumarket logo 1.png" alt="EduMarket" class="auth-logo">
                    <h1 class="auth-title">Join EduMarket</h1>
                    <p class="auth-subtitle">Create your verified student account to buy and sell on campus.</p>
                </div>

                <?php if (!empty($error)): ?>
                    <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 12px 16px; border-radius: var(--radius-md); margin-bottom: 20px; font-size: 0.9rem;">
                        ⚠️ <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; padding: 12px 16px; border-radius: var(--radius-md); margin-bottom: 20px; font-size: 0.9rem;">
                        ✓ <?php echo htmlspecialchars($success); ?>
                        <div style="margin-top: 10px;">
                            <a href="Login.php" class="btn btn-primary btn-sm">Proceed to Login →</a>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="reg-fullname">Full Name</label>
                        <input type="text" id="reg-fullname" name="fullname" class="form-control" placeholder="e.g. Pricile Mefang" required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label" for="reg-email">Student Email</label>
                            <input type="email" id="reg-email" name="email" class="form-control" placeholder="student@univ.cm" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="reg-phone">WhatsApp Phone</label>
                            <input type="tel" id="reg-phone" name="phone" class="form-control" placeholder="+237 6XX XX XX XX" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label" for="reg-campus">University / Campus</label>
                            <select id="reg-campus" name="campus" class="form-control form-select" required>
                                <option value="University of Douala">University of Douala</option>
                                <option value="University of Buea">University of Buea (UB)</option>
                                <option value="University of Yaounde I">University of Yaounde I</option>
                                <option value="University of Yaounde II">University of Yaounde II (Soa)</option>
                                <option value="Polytech Douala">Polytech Douala</option>
                                <option value="Catholic University (UCAC)">Catholic University (UCAC)</option>
                                <option value="ENSTP">ENSTP Yaounde</option>
                                <option value="Other">Other Campus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="reg-matricule">Matricule / Student ID</label>
                            <input type="text" id="reg-matricule" name="matricule" class="form-control" placeholder="e.g. 21S45899">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="reg-password">Create Password</label>
                        <div class="input-password-wrap">
                            <input type="password" id="reg-password" name="password" class="form-control" placeholder="Minimum 6 characters" required oninput="checkStrength(this.value)">
                            <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('reg-password')">Show</button>
                        </div>
                        <div class="password-strength">
                            <div id="strength-bar" class="password-strength-bar"></div>
                        </div>
                        <span id="strength-text" style="font-size: 0.75rem; color: var(--text-light); margin-top: 4px; display: block;">Password strength</span>
                    </div>

                    <div class="form-group" style="display: flex; align-items: flex-start; gap: 10px;">
                        <input type="checkbox" id="terms" name="terms" required style="accent-color: var(--primary); width: 16px; height: 16px; margin-top: 4px; cursor: pointer;">
                        <label for="terms" style="font-size: 0.85rem; color: var(--text-muted); cursor: pointer;">
                            I agree to the <a href="#" onclick="alert('EduMarket terms: All trade must occur in public campus safety zones.'); return false;" style="color: var(--primary); font-weight: 600;">Terms & Campus Safety Guidelines</a>.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full btn-lg">Create Student Account</button>
                </form>

                <div style="text-align: center; margin-top: 24px; font-size: 0.92rem; color: var(--text-muted);">
                    Already registered? <br>
                    <a href="Login.php" style="color: var(--primary); font-weight: 700; display: inline-block; margin-top: 4px;">Sign in to your account →</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-bottom-row">
                <p>&copy; 2026 EduMarket. Designed for Students.</p>
                <div class="footer-social-links">
                    <a href="https://facebook.com" target="_blank" class="footer-social-btn"><img src="icons/facebook.png" alt="Facebook"></a>
                    <a href="https://instagram.com" target="_blank" class="footer-social-btn"><img src="icons/instagram.png" alt="Instagram"></a>
                    <a href="https://linkedin.com" target="_blank" class="footer-social-btn"><img src="icons/linkedin.jpg" alt="LinkedIn"></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const btn = input.nextElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = 'Hide';
            } else {
                input.type = 'password';
                btn.textContent = 'Show';
            }
        }

        function checkStrength(password) {
            const bar = document.getElementById('strength-bar');
            const text = document.getElementById('strength-text');
            let strength = 0;
            if (password.length >= 6) strength += 25;
            if (password.match(/[a-z]+/)) strength += 25;
            if (password.match(/[A-Z]+/)) strength += 25;
            if (password.match(/[0-9]+/)) strength += 25;

            bar.style.width = strength + '%';
            if (strength <= 25) {
                bar.style.backgroundColor = 'var(--danger)';
                text.textContent = 'Weak password';
                text.style.color = 'var(--danger)';
            } else if (strength <= 75) {
                bar.style.backgroundColor = 'var(--warning)';
                text.textContent = 'Moderate password';
                text.style.color = 'var(--warning)';
            } else {
                bar.style.backgroundColor = 'var(--success)';
                text.textContent = 'Strong password';
                text.style.color = 'var(--success)';
            }
        }
    </script>
</body>
</html>