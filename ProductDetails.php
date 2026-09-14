<?php
// ProductDetails.php - Single Listing View for EduMarket
$productId = isset($_GET['id']) ? intval($_GET['id']) : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            padding: 40px 0;
        }
        .main-gallery-img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-subtle);
        }
        .safety-box {
            background: #fffbeb;
            border: 1px solid #fef3c7;
            padding: 20px;
            border-radius: var(--radius-lg);
            margin-top: 24px;
        }
        @media (max-width: 992px) {
            .details-grid {
                grid-template-columns: 1fr;
                gap: 32px;
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
                    <li><a href="SellItem.php" class="nav-link">Sell Item</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <button onclick="openDrawer('wishlist-drawer')" class="icon-btn" title="Saved Items" aria-label="Wishlist">
                    ❤️
                    <span class="badge-count wishlist-count">0</span>
                </button>

                <button onclick="openDrawer('cart-drawer')" class="icon-btn" title="Cart" aria-label="Shopping Cart">
                    🛒
                    <span class="badge-count cart-count">0</span>
                </button>

                <a href="Login.php" class="btn btn-secondary btn-sm">Login</a>
                <a href="SellItem.php" class="btn btn-primary btn-sm">+ Post Listing</a>
            </div>
        </div>
    </header>

    <main class="page-main">
        <div class="container">
            <!-- Breadcrumbs -->
            <div style="padding: 16px 0; font-size: 0.88rem; color: var(--text-muted); display: flex; align-items: center; gap: 8px;">
                <a href="index.html">Home</a> <span>/</span>
                <a href="Marketplace.php">Marketplace</a> <span>/</span>
                <span id="breadcrumb-title" style="color: var(--text-main); font-weight: 600;">Product</span>
            </div>

            <div class="details-grid">
                <!-- Gallery & Visuals -->
                <div>
                    <img id="detail-img" src="images/calculus.jfif" alt="Product Image" class="main-gallery-img">
                    
                    <div class="safety-box">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                            <span style="font-size: 1.3rem;">🛡️</span>
                            <strong style="color: #92400e; font-size: 0.95rem;">Campus Safety Checklist</strong>
                        </div>
                        <ul style="padding-left: 20px; font-size: 0.85rem; color: #78350f; display: flex; flex-direction: column; gap: 6px;">
                            <li>Meet the seller in a well-lit, public campus spot (library, student center).</li>
                            <li>Inspect and test the item thoroughly before making any payment.</li>
                            <li>Use secure mobile money or cash directly upon inspection.</li>
                        </ul>
                    </div>
                </div>

                <!-- Product Information & Actions -->
                <div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                        <span id="detail-category" class="hero-tag" style="margin-bottom: 0;">TEXTBOOKS</span>
                        <span id="detail-condition" class="product-badge-condition" style="position: static; background: var(--text-main);">LIKE NEW</span>
                    </div>

                    <h1 id="detail-title" style="font-size: 2.2rem; line-height: 1.2; margin-bottom: 14px;">Calculus: Early Transcendentals</h1>

                    <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 20px;">
                        <span id="detail-price" style="font-family: var(--font-heading); font-size: 2rem; font-weight: 800; color: var(--primary);">5,000 FCFA</span>
                        <span id="detail-original-price" style="font-size: 1.1rem; color: var(--text-light); text-decoration: line-through;">12,000 FCFA</span>
                    </div>

                    <p id="detail-desc" style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.6; margin-bottom: 24px;">
                        Pristine condition with all chapters and problem sets intact. Perfect for mathematics, physics and engineering majors.
                    </p>

                    <!-- Seller Card -->
                    <div style="background: var(--bg-alt); border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 18px; margin-bottom: 28px;">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div class="seller-avatar" style="width: 44px; height: 44px; font-size: 1.2rem;">M</div>
                            <div style="flex: 1;">
                                <div style="display: flex; align-items: center; gap: 6px;">
                                    <strong id="detail-seller" style="font-size: 1rem;">Mefang P.</strong>
                                    <span class="verified-icon" title="Verified Campus Student">✓ Verified Student</span>
                                </div>
                                <div id="detail-campus" style="font-size: 0.82rem; color: var(--text-muted);">University of Douala</div>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Action Buttons -->
                    <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 24px;">
                        <button id="detail-momo-pay-btn" class="btn btn-primary btn-lg btn-full" style="font-size: 1.1rem; background: linear-gradient(135deg, #0f766e 0%, #0d9488 100%);">
                            💳 Direct MoMo / Orange Money Checkout
                        </button>
                        <a id="detail-wa-btn" href="#" target="_blank" class="btn btn-secondary btn-lg btn-full">
                            💬 Or Chat with Seller on WhatsApp
                        </a>
                        <div style="display: flex; gap: 12px;">
                            <button id="detail-add-cart-btn" class="btn btn-secondary" style="flex: 1;">🛒 Add to Cart</button>
                            <button id="detail-wishlist-btn" class="btn btn-outline" style="flex: 1;">❤️ Save to Liked</button>
                        </div>
                    </div>

                    <!-- Share Button -->
                    <button onclick="shareItem()" class="btn btn-sm" style="background: var(--bg-alt); color: var(--text-muted); border: 1px solid var(--border-subtle);">
                        🔗 Copy Listing Link to Share
                    </button>
                </div>
            </div>

            <!-- Related Campus Listings -->
            <section class="section" style="padding-top: 20px;">
                <div class="section-head">
                    <div>
                        <h2 class="section-title">More Items You Might Need</h2>
                        <p class="section-desc">Popular listings from your campus peers.</p>
                    </div>
                    <a href="Marketplace.php" class="section-link">View All Items →</a>
                </div>

                <div class="products-grid">
                    <div class="product-card">
                        <div class="product-media">
                            <img src="images/casio.webp" alt="Casio FX-991EX">
                            <span class="product-badge-condition">Like New</span>
                        </div>
                        <div class="product-content">
                            <span class="product-category-tag">Calculators</span>
                            <h3 class="product-title"><a href="ProductDetails.php?id=3">Casio FX-991EX ClassWiz</a></h3>
                            <div class="product-footer-row">
                                <span class="product-price">8,000 FCFA</span>
                                <button onclick="addToCart(3)" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-media">
                            <img src="images/hp pavilion.webp" alt="HP Pavilion">
                            <span class="product-badge-condition">Used</span>
                        </div>
                        <div class="product-content">
                            <span class="product-category-tag">Electronics</span>
                            <h3 class="product-title"><a href="ProductDetails.php?id=2">HP Pavilion 15 (Core i5, 8GB)</a></h3>
                            <div class="product-footer-row">
                                <span class="product-price">250,000 FCFA</span>
                                <button onclick="addToCart(2)" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-media">
                            <img src="images/notes.jfif" alt="Notes">
                            <span class="product-badge-condition">New</span>
                        </div>
                        <div class="product-content">
                            <span class="product-category-tag">Study Notes</span>
                            <h3 class="product-title"><a href="ProductDetails.php?id=4">Civil Engineering Exam Pack</a></h3>
                            <div class="product-footer-row">
                                <span class="product-price">3,000 FCFA</span>
                                <button onclick="addToCart(4)" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Slide-out Drawers -->
    <div id="drawer-overlay" class="drawer-overlay" onclick="closeDrawers()"></div>
    <div id="cart-drawer" class="drawer-panel">
        <div class="drawer-head">
            <h3 style="font-size: 1.2rem;">🛒 Shopping Cart</h3>
            <button onclick="closeDrawers()" style="background: transparent; font-size: 1.3rem; cursor: pointer;">✕</button>
        </div>
        <div id="cart-drawer-body" class="drawer-body"></div>
        <div class="drawer-footer">
            <div style="display: flex; justify-content: space-between; font-weight: 700; margin-bottom: 14px; font-size: 1.1rem;">
                <span>Total:</span>
                <span id="cart-total-price" style="color: var(--primary);">0 FCFA</span>
            </div>
            <a href="Marketplace.php" class="btn btn-primary btn-full" onclick="closeDrawers()">Checkout</a>
        </div>
    </div>

    <div id="wishlist-drawer" class="drawer-panel">
        <div class="drawer-head">
            <h3 style="font-size: 1.2rem;">❤️ Saved Items</h3>
            <button onclick="closeDrawers()" style="background: transparent; font-size: 1.3rem; cursor: pointer;">✕</button>
        </div>
        <div id="wishlist-drawer-body" class="drawer-body"></div>
    </div>

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
        const prodId = <?php echo $productId; ?>;
        
        document.addEventListener('DOMContentLoaded', () => {
            const product = EduMarketData.products.find(p => p.id === prodId) || EduMarketData.products[0];
            
            document.title = `${product.title} | EduMarket`;
            document.getElementById('breadcrumb-title').textContent = product.title;
            document.getElementById('detail-img').src = product.image;
            document.getElementById('detail-img').alt = product.title;
            document.getElementById('detail-category').textContent = product.category.toUpperCase();
            document.getElementById('detail-condition').textContent = product.condition.toUpperCase();
            document.getElementById('detail-title').textContent = product.title;
            document.getElementById('detail-price').textContent = product.price.toLocaleString() + ' FCFA';
            document.getElementById('detail-original-price').textContent = product.originalPrice ? product.originalPrice.toLocaleString() + ' FCFA' : '';
            document.getElementById('detail-desc').textContent = product.description;
            document.getElementById('detail-seller').textContent = product.seller;
            document.getElementById('detail-campus').textContent = product.campus;

            // WhatsApp link
            const cleanPhone = product.sellerPhone.replace(/[^0-9]/g, '');
            const waUrl = `https://wa.me/${cleanPhone}?text=Hello%2C%20I%20saw%20your%20listing%20on%20EduMarket%3A%20${encodeURIComponent(product.title)}%20(${product.price.toLocaleString()}%20FCFA).%20Is%20it%20still%20available%3F`;
            document.getElementById('detail-wa-btn').href = waUrl;

            // MoMo & Cart & Wishlist triggers
            document.getElementById('detail-momo-pay-btn').onclick = () => openPaymentModal(product.id);
            document.getElementById('detail-add-cart-btn').onclick = () => addToCart(product.id);
            document.getElementById('detail-wishlist-btn').onclick = function() {
                toggleWishlist(product.id, this);
            };
        });

        function shareItem() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Listing link copied to clipboard!');
            }).catch(() => {
                showToast('Link copied!');
            });
        }
    </script>
</body>
</html>
