<?php
// Login.php - EduMarket Student Portal Login
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $campus = trim($_POST['campus'] ?? 'University of Douala');

    if (empty($email) || empty($password)) {
        $error = 'Please fill in both your student email/ID and password.';
    } else {
        $success = 'Login successful! Opening your Student Dashboard...';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .demo-pill {
            background: var(--primary-light);
            border: 1px dashed var(--primary);
            padding: 10px 14px;
            border-radius: var(--radius-md);
            font-size: 0.85rem;
            color: var(--primary);
            cursor: pointer;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .demo-pill:hover {
            background: #ccfbf1;
        }
    </style>
</head>
<body>

    <!-- Top Sticky Header with Clean Standalone Logo -->
    <header class="site-header">
        <div class="container header-container">
            <a href="index.html" class="logo-wrapper">
                <img src="logos/edumarket logo 1.png" alt="EduMarket Logo" class="logo-img">
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="Marketplace.php" class="nav-link">Marketplace</a></li>
                    <li><a href="Dashboard.php" class="nav-link">Dashboard</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="register.php" class="btn btn-outline btn-sm">Create Account</a>
            </div>
        </div>
    </header>

    <main class="page-main">
        <div class="auth-page-wrap">
            <div class="auth-card">
                <div class="auth-header">
                    <img src="logos/edumarket logo 1.png" alt="EduMarket" class="auth-logo">
                    <h1 class="auth-title">Student Portal Login</h1>
                    <p class="auth-subtitle">Login to view your notifications, liked items, bought orders and sales.</p>
                </div>

                <!-- Demo Auto-Fill Box -->
                <div class="demo-pill" onclick="fillDemoLogin()" title="Click to auto-fill demo credentials">
                    <span>⚡ <strong>Demo Student:</strong> Pricile Mefang</span>
                    <span style="font-weight: 700;">Fill Form →</span>
                </div>

                <?php if (!empty($error)): ?>
                    <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 12px 16px; border-radius: var(--radius-md); margin-bottom: 20px; font-size: 0.9rem;">
                        ⚠️ <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; padding: 12px 16px; border-radius: var(--radius-md); margin-bottom: 20px; font-size: 0.9rem;">
                        ✓ <?php echo htmlspecialchars($success); ?>
                        <script>
                            setTimeout(() => { 
                                Store.setUser({
                                    name: "Pricile Mefang",
                                    email: "<?php echo addslashes($email); ?>",
                                    campus: "<?php echo addslashes($campus); ?>",
                                    matricule: "21S45899",
                                    walletBalance: 45000,
                                    isLoggedIn: true
                                });
                                window.location.href = 'Dashboard.php'; 
                            }, 1000);
                        </script>
                    </div>
                <?php endif; ?>

                <form action="Login.php" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="login-email">Student Email / Matricule</label>
                        <input type="text" id="login-email" name="email" class="form-control" placeholder="e.g. pricile.mefang@univ.cm" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="login-campus">Your Campus / Institution</label>
                        <select id="login-campus" name="campus" class="form-control form-select" required>
                            <option value="University of Douala">University of Douala</option>
                            <option value="University of Buea">University of Buea (UB)</option>
                            <option value="University of Yaounde I">University of Yaounde I</option>
                            <option value="University of Yaounde II">University of Yaounde II (Soa)</option>
                            <option value="Polytech Douala">National Higher Polytechnic</option>
                            <option value="Catholic University (UCAC)">Catholic University (UCAC)</option>
                            <option value="Other">Other Campus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <label class="form-label" for="login-password" style="margin-bottom: 0;">Password</label>
                            <a href="#" onclick="alert('Password reset link has been dispatched to your student email!'); return false;" style="font-size: 0.82rem; color: var(--primary); font-weight: 600;">Forgot Password?</a>
                        </div>
                        <div class="input-password-wrap">
                            <input type="password" id="login-password" name="password" class="form-control" placeholder="••••••••" required>
                            <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('login-password')">Show</button>
                        </div>
                    </div>

                    <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" id="remember" name="remember" checked style="accent-color: var(--primary); width: 16px; height: 16px; cursor: pointer;">
                        <label for="remember" style="font-size: 0.88rem; color: var(--text-muted); cursor: pointer;">Remember me on this browser</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full btn-lg" style="margin-top: 10px;">Sign In to My Dashboard</button>
                </form>

                <div style="text-align: center; margin-top: 24px; font-size: 0.92rem; color: var(--text-muted);">
                    Don't have a student account yet? <br>
                    <a href="register.php" style="color: var(--primary); font-weight: 700; display: inline-block; margin-top: 4px;">Register Free Student Account →</a>
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
        function fillDemoLogin() {
            document.getElementById('login-email').value = 'pricile.mefang@univ-douala.cm';
            document.getElementById('login-password').value = 'Student2026!';
            showToast('Demo student credentials filled!');
        }

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
    </script>
</body>
</html>
