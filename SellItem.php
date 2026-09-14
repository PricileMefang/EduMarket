<?php
// SellItem.php - Post a Student Listing on EduMarket
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $campus = trim($_POST['campus'] ?? '');

    if (empty($title) || empty($category) || empty($price)) {
        $error = 'Please fill out the title, category, and price for your item.';
    } else {
        $success = 'Your item listing has been published to the campus marketplace!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Student Listing | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .sell-layout {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 36px;
            padding: 40px 0 60px;
        }
        .preview-sticky {
            position: sticky;
            top: 100px;
        }
        .upload-dropzone {
            border: 2px dashed var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 30px;
            text-align: center;
            background: var(--bg-alt);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .upload-dropzone:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        @media (max-width: 992px) {
            .sell-layout {
                grid-template-columns: 1fr;
            }
            .preview-sticky {
                position: static;
            }
        }
    </style>
</head>
<body>

    <!-- Top Sticky Header -->
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
                <a href="Marketplace.php" class="btn btn-secondary btn-sm">Browse Items</a>
            </div>
        </div>
    </header>

    <main class="page-main">
        <div class="container">
            <div class="sell-layout">
                <!-- Listing Creation Form -->
                <div class="auth-card" style="max-width: 100%; box-shadow: var(--shadow-sm);">
                    <div style="margin-bottom: 24px;">
                        <span class="hero-tag" style="margin-bottom: 8px;">🚀 Free Student Ad</span>
                        <h1 style="font-size: 1.8rem; margin-bottom: 6px;">Sell or Exchange an Item</h1>
                        <p style="color: var(--text-muted); font-size: 0.95rem;">List your textbooks, tech gadgets, course notes or room items for fellow campus peers.</p>
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
                                <a href="Marketplace.php" class="btn btn-primary btn-sm">View in Marketplace →</a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="SellItem.php" method="POST" oninput="updateLivePreview()">
                        <div class="form-group">
                            <label class="form-label" for="item-title">Item Title *</label>
                            <input type="text" id="item-title" name="title" class="form-control" placeholder="e.g. Calculus Early Transcendentals (James Stewart)" required>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group">
                                <label class="form-label" for="item-category">Category *</label>
                                <select id="item-category" name="category" class="form-control form-select" required>
                                    <option value="textbooks">📚 Textbooks</option>
                                    <option value="electronics">💻 Electronics & PCs</option>
                                    <option value="calculators">🔢 Calculators</option>
                                    <option value="notes">📝 Study Notes & Summaries</option>
                                    <option value="hostel">🏠 Hostel & Dorm Items</option>
                                    <option value="services">🛠️ Student Services</option>
                                    <option value="others">✨ Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="item-condition">Condition *</label>
                                <select id="item-condition" name="condition" class="form-control form-select" required>
                                    <option value="Brand New">Brand New</option>
                                    <option value="Like New" selected>Like New</option>
                                    <option value="Used - Good">Used - Good</option>
                                    <option value="Used - Fair">Used - Fair</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group">
                                <label class="form-label" for="item-price">Price (FCFA) *</label>
                                <input type="number" id="item-price" name="price" class="form-control" placeholder="e.g. 5000" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="item-campus">Campus Meetup Location *</label>
                                <select id="item-campus" name="campus" class="form-control form-select" required>
                                    <option value="University of Douala">University of Douala</option>
                                    <option value="University of Buea">University of Buea</option>
                                    <option value="Polytech Douala">Polytech Douala</option>
                                    <option value="ENSTP Yaounde">ENSTP Yaounde</option>
                                    <option value="University of Yaounde I">Univ. Yaounde I</option>
                                    <option value="Catholic Univ. (UCAC)">UCAC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="item-phone">Your WhatsApp Contact Number *</label>
                            <input type="tel" id="item-phone" name="phone" class="form-control" placeholder="+237 6XX XX XX XX" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="item-desc">Item Description</label>
                            <textarea id="item-desc" name="description" class="form-control" rows="3" placeholder="Describe the item condition, courses it is used for, or any included accessories..."></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Photo</label>
                            <div class="upload-dropzone" onclick="document.getElementById('file-upload').click()">
                                <div style="font-size: 2.2rem; margin-bottom: 8px;">📷</div>
                                <div style="font-weight: 700; color: var(--primary); margin-bottom: 4px;">Click to select photo</div>
                                <div style="font-size: 0.8rem; color: var(--text-light);">PNG, JPG, WEBP up to 5MB</div>
                                <input type="file" id="file-upload" accept="image/*" style="display: none;" onchange="handleImagePreview(event)">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full btn-lg" style="margin-top: 10px;">Publish Listing Free 🚀</button>
                    </form>
                </div>

                <!-- Live Card Preview Sidebar -->
                <div class="preview-sticky">
                    <h3 style="font-size: 1.1rem; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                        👁️ Live Listing Preview
                    </h3>
                    
                    <div class="product-card" style="box-shadow: var(--shadow-md);">
                        <div class="product-media">
                            <img id="prev-img" src="images/calculus.jfif" alt="Preview Image">
                            <span id="prev-condition" class="product-badge-condition">Like New</span>
                        </div>
                        <div class="product-content">
                            <span id="prev-category" class="product-category-tag">TEXTBOOKS</span>
                            <h3 id="prev-title" class="product-title">Your Item Title Here</h3>
                            <p id="prev-desc" class="product-meta-desc">Item description will appear here...</p>
                            <div class="product-seller-info">
                                <span class="seller-avatar">Y</span>
                                <span>You (Verified Student)</span>
                                <span class="verified-icon">✓</span>
                                <span id="prev-campus" style="margin-left: auto; font-size: 0.75rem; color: var(--text-light);">Univ. Douala</span>
                            </div>
                            <div class="product-footer-row">
                                <span id="prev-price" class="product-price">0 FCFA</span>
                                <span class="btn btn-primary btn-sm" style="pointer-events: none;">💬 WhatsApp</span>
                            </div>
                        </div>
                    </div>
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
        function updateLivePreview() {
            const title = document.getElementById('item-title').value || 'Your Item Title Here';
            const category = document.getElementById('item-category').value.toUpperCase();
            const condition = document.getElementById('item-condition').value;
            const price = Number(document.getElementById('item-price').value || 0).toLocaleString() + ' FCFA';
            const campus = document.getElementById('item-campus').value;
            const desc = document.getElementById('item-desc').value || 'Item description will appear here...';

            document.getElementById('prev-title').textContent = title;
            document.getElementById('prev-category').textContent = category;
            document.getElementById('prev-condition').textContent = condition;
            document.getElementById('prev-price').textContent = price;
            document.getElementById('prev-campus').textContent = campus.split('(')[0];
            document.getElementById('prev-desc').textContent = desc;
        }

        function handleImagePreview(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById('prev-img').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
