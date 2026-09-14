<?php
// Dashboard.php - Personalized Student Portal & Dashboard
$activeTab = $_GET['tab'] ?? 'notifications';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Student Dashboard | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .dash-search-box {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 24px;
        }
        .stat-badge-pill {
            background: var(--primary-light);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: var(--radius-full);
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
                    <li><a href="Dashboard.php" class="nav-link active">My Dashboard</a></li>
                    <li><a href="SellItem.php" class="nav-link">Sell Item</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <!-- Notifications Trigger -->
                <button onclick="switchTab('notifications')" class="icon-btn" title="Notifications" aria-label="Notifications">
                    🔔
                    <span class="badge-count notif-count">2</span>
                </button>

                <!-- Liked Items Trigger -->
                <button onclick="switchTab('liked')" class="icon-btn" title="My Liked Items" aria-label="Liked Items">
                    ❤️
                    <span class="badge-count wishlist-count">0</span>
                </button>

                <!-- Cart Trigger -->
                <button onclick="openDrawer('cart-drawer')" class="icon-btn" title="Cart" aria-label="Shopping Cart">
                    🛒
                    <span class="badge-count cart-count">0</span>
                </button>

                <a href="SellItem.php" class="btn btn-primary btn-sm">+ Post Listing</a>
            </div>
        </div>
    </header>

    <main class="page-main">
        <div class="container">
            <div class="dashboard-container">
                <!-- Personalized Student Sidebar -->
                <aside class="dashboard-sidebar">
                    <div class="dash-user-card">
                        <div class="seller-avatar" id="dash-user-avatar" style="width: 52px; height: 52px; font-size: 1.3rem;">P</div>
                        <div style="flex: 1;">
                            <strong id="dash-user-name" style="display: block; font-size: 1.05rem;">Pricile Mefang</strong>
                            <span style="font-size: 0.78rem; color: var(--primary); font-weight: 700;">✓ Verified Student</span>
                            <div id="dash-user-campus" style="font-size: 0.75rem; color: var(--text-light); margin-top: 2px;">Univ. of Douala</div>
                            <div id="dash-user-matricule" style="font-size: 0.72rem; color: var(--text-muted);">ID: 21S45899</div>
                        </div>
                    </div>

                    <div style="background: var(--primary-light); border: 1px solid var(--primary-border); padding: 14px; border-radius: var(--radius-md); margin-bottom: 20px;">
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase;">Escrow Wallet</span>
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <div style="font-size: 1.35rem; font-weight: 800; color: var(--primary);">45,000 FCFA</div>
                            <span style="font-size: 0.75rem; color: var(--success); font-weight: 700;">Active</span>
                        </div>
                    </div>

                    <nav>
                        <ul class="dash-nav-list">
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'notifications') ? 'active' : ''; ?>" onclick="switchTab('notifications', this)">
                                    <span>🔔 Notifications</span>
                                    <span class="stat-badge-pill notif-count">2</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'liked') ? 'active' : ''; ?>" onclick="switchTab('liked', this)">
                                    <span>❤️ Liked Items</span>
                                    <span class="stat-badge-pill wishlist-count">2</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'bought') ? 'active' : ''; ?>" onclick="switchTab('bought', this)">
                                    <span>🛍️ Things Bought</span>
                                    <span class="stat-badge-pill" id="bought-count-badge">1</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'sold') ? 'active' : ''; ?>" onclick="switchTab('sold', this)">
                                    <span>🏷️ Things Sold</span>
                                    <span class="stat-badge-pill" id="sold-count-badge">2</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'search') ? 'active' : ''; ?>" onclick="switchTab('search', this)">
                                    <span>🔍 Smart Buy & Search</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'payment') ? 'active' : ''; ?>" onclick="switchTab('payment', this)">
                                    <span>💳 Direct In-App Pay</span>
                                </button>
                            </li>
                            <li>
                                <button class="dash-nav-btn <?php echo ($activeTab === 'peerchat') ? 'active' : ''; ?>" onclick="switchTab('peerchat', this)">
                                    <span>💬 Peer WhatsApp Hub</span>
                                </button>
                            </li>
                            <li style="margin-top: 14px; border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                                <button onclick="Store.logout()" class="dash-nav-btn" style="color: var(--danger);">
                                    <span>🚪 Logout Account</span>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </aside>

                <!-- Dashboard Content Area -->
                <section class="dashboard-content">
                    
                    <!-- TAB 1: Personal Notifications -->
                    <div id="tab-notifications" class="dash-tab-content <?php echo ($activeTab === 'notifications') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                            <div>
                                <h2 style="font-size: 1.5rem; display: flex; align-items: center; gap: 8px;">
                                    🔔 Student Notifications
                                </h2>
                                <p style="color: var(--text-muted); font-size: 0.92rem; margin-top: 4px;">
                                    Alerts regarding your listings, purchases, escrow updates, and peer messages.
                                </p>
                            </div>
                            <button onclick="Store.markAllNotifsRead(); renderDashboardNotifications();" class="btn btn-secondary btn-sm">Mark All Read</button>
                        </div>

                        <div id="dashboard-notifs-list" style="display: flex; flex-direction: column; gap: 14px;">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <!-- TAB 2: Liked Items with Purchase Metric -->
                    <div id="tab-liked" class="dash-tab-content <?php echo ($activeTab === 'liked') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                            <div>
                                <h2 style="font-size: 1.5rem; display: flex; align-items: center; gap: 8px;">
                                    ❤️ My Liked Campus Items
                                </h2>
                                <p style="color: var(--text-muted); font-size: 0.92rem; margin-top: 4px;">
                                    Items saved to your private profile, displaying the number of students who bought each item.
                                </p>
                            </div>
                            <button onclick="switchTab('search')" class="btn btn-primary btn-sm">+ Find More Items</button>
                        </div>

                        <div id="dashboard-liked-grid" class="products-grid">
                            <!-- Loaded dynamically with "X students bought this" -->
                        </div>
                    </div>

                    <!-- TAB 3: Things Bought (Purchases & Escrow Pickup Codes) -->
                    <div id="tab-bought" class="dash-tab-content <?php echo ($activeTab === 'bought') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm);">
                            <h2 style="font-size: 1.5rem; display: flex; align-items: center; gap: 8px;">
                                🛍️ Things Bought & Pickup Passcodes
                            </h2>
                            <p style="color: var(--text-muted); font-size: 0.92rem; margin-top: 4px;">
                                All items you have purchased via in-app mobile money or cash. Present the passcode upon meetup.
                            </p>
                        </div>

                        <div id="dashboard-bought-list" style="display: flex; flex-direction: column; gap: 16px;">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <!-- TAB 4: Things Sold (Student's Listings & Sales Stats) -->
                    <div id="tab-sold" class="dash-tab-content <?php echo ($activeTab === 'sold') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                            <div>
                                <h2 style="font-size: 1.5rem; display: flex; align-items: center; gap: 8px;">
                                    🏷️ Things Sold & Active Listings
                                </h2>
                                <p style="color: var(--text-muted); font-size: 0.92rem; margin-top: 4px;">
                                    Track how many students bought your listed items, view total earnings, and manage products.
                                </p>
                            </div>
                            <a href="SellItem.php" class="btn btn-primary btn-sm">+ Post New Item</a>
                        </div>

                        <div id="dashboard-sold-list" style="display: flex; flex-direction: column; gap: 16px;">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <!-- TAB 5: Smart Buy & Search with Similar Items -->
                    <div id="tab-search" class="dash-tab-content <?php echo ($activeTab === 'search') ? 'active' : ''; ?>">
                        <div class="dash-search-box">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <span style="font-size: 1.3rem;">🔍</span>
                                <h2 style="font-size: 1.5rem;">Smart Campus Search & Buy</h2>
                            </div>
                            <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 16px;">
                                Search for any academic resource. EduMarket will display matches and automatically suggest <strong>similar campus items</strong>.
                            </p>

                            <div class="search-input-wrap">
                                <span class="search-icon-btn">🔍</span>
                                <input type="text" id="dash-smart-search-input" placeholder="Type to search (e.g., 'Calculus', 'Laptop', 'Casio', 'Notes')..." oninput="handleSmartSearch(this.value)">
                            </div>
                        </div>

                        <!-- Main Results Grid -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                            <h3 id="search-results-heading" style="font-size: 1.2rem;">Available Items</h3>
                            <span id="search-count-badge" style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">6 items</span>
                        </div>

                        <div id="dash-search-results-grid" class="products-grid">
                            <!-- Populated dynamically -->
                        </div>

                        <!-- Dynamic Similar Items Panel -->
                        <div id="similar-items-panel" class="similar-items-section" style="display: none;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <span style="font-size: 1.3rem;">✨</span>
                                <h3 style="font-size: 1.25rem;">Similar & Recommended Items</h3>
                            </div>
                            <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 18px;">Based on your current search query</p>
                            
                            <div id="similar-items-grid" class="products-grid">
                                <!-- Populated dynamically -->
                            </div>
                        </div>
                    </div>

                    <!-- TAB 6: Direct In-App Payment (No Chat) -->
                    <div id="tab-payment" class="dash-tab-content <?php echo ($activeTab === 'payment') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 28px; box-shadow: var(--shadow-sm);">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">💳</div>
                                <div>
                                    <h2 style="font-size: 1.5rem;">Direct In-App Checkout</h2>
                                    <p style="color: var(--text-muted); font-size: 0.92rem;">Skip WhatsApp chatting and pay instantly with mobile money.</p>
                                </div>
                            </div>

                            <div style="background: var(--bg-alt); padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle); margin-bottom: 24px;">
                                <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Select an Item to Buy Instantly:</h4>
                                <select id="direct-pay-select" class="form-control form-select" onchange="previewDirectPayItem(this.value)">
                                    <!-- Populated dynamically -->
                                </select>
                            </div>

                            <div id="direct-pay-item-preview" style="display: flex; gap: 16px; padding: 18px; border: 1.5px solid var(--primary-border); background: var(--primary-light); border-radius: var(--radius-lg); align-items: center; margin-bottom: 24px;">
                                <img id="dp-img" src="images/calculus.jfif" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
                                <div style="flex: 1;">
                                    <h4 id="dp-title" style="font-size: 1.05rem;">Calculus: Early Transcendentals</h4>
                                    <span id="dp-campus" style="font-size: 0.82rem; color: var(--text-muted);">University of Douala</span>
                                </div>
                                <div>
                                    <div id="dp-price" style="font-size: 1.3rem; font-weight: 800; color: var(--primary);">5,000 FCFA</div>
                                    <button id="dp-btn-trigger" class="btn btn-primary btn-sm" style="margin-top: 4px;">💳 Pay With MoMo / OM</button>
                                </div>
                            </div>

                            <div style="border-top: 1px solid var(--border-subtle); padding-top: 20px;">
                                <h4 style="font-size: 0.95rem; margin-bottom: 8px;">Direct In-App Escrow Guarantee:</h4>
                                <ol style="padding-left: 20px; font-size: 0.88rem; color: var(--text-muted); display: flex; flex-direction: column; gap: 8px;">
                                    <li>Pay securely using <strong>MTN MoMo</strong> or <strong>Orange Money</strong>.</li>
                                    <li>A unique <strong>Pickup Passcode</strong> is generated and placed in your 'Things Bought' tab.</li>
                                    <li>Present code when collecting item from peer.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 7: Peer WhatsApp Chat Hub -->
                    <div id="tab-peerchat" class="dash-tab-content <?php echo ($activeTab === 'peerchat') ? 'active' : ''; ?>">
                        <div style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm);">
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                                <span style="font-size: 1.4rem;">💬</span>
                                <h2 style="font-size: 1.5rem;">Campus Peer WhatsApp Chat Hub</h2>
                            </div>
                            <p style="color: var(--text-muted); font-size: 0.92rem;">
                                Connect directly with verified student sellers, course tutors, and campus representatives.
                            </p>
                        </div>

                        <div class="peer-chat-grid">
                            <?php 
                            $peers = [
                                ["name" => "Mefang Pricile", "role" => "Science & Math Rep", "campus" => "University of Douala", "phone" => "+237690123456", "status" => "online", "specialty" => "Calculus, Physics Textbooks & Notes"],
                                ["name" => "Emmanuel Kouam", "role" => "Tech & Gadget Seller", "campus" => "University of Buea", "phone" => "+237671234567", "status" => "online", "specialty" => "Laptops, Flash drives & Accessories"],
                                ["name" => "Diane Ngo", "role" => "Engineering Lead", "campus" => "Polytech Douala", "phone" => "+237682345678", "status" => "away", "specialty" => "Scientific Calculators & Drawing Kits"],
                                ["name" => "Kevin Tchinda", "role" => "Civil Engineering Student", "campus" => "ENSTP Yaoundé", "phone" => "+237699887766", "status" => "online", "specialty" => "Solved Past Exams & Notes"]
                            ];
                            foreach($peers as $peer):
                            ?>
                            <div class="peer-chat-card">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="peer-avatar-wrap">
                                        <?php echo substr($peer['name'], 0, 1); ?>
                                        <span class="peer-status-dot <?php echo $peer['status']; ?>"></span>
                                    </div>
                                    <div>
                                        <strong style="font-size: 1rem; color: var(--text-main);"><?php echo $peer['name']; ?></strong>
                                        <span style="display: block; font-size: 0.78rem; color: var(--primary); font-weight: 700;"><?php echo $peer['role']; ?></span>
                                    </div>
                                </div>
                                <div style="font-size: 0.82rem; color: var(--text-muted);">
                                    <div>📍 <?php echo $peer['campus']; ?></div>
                                    <div style="margin-top: 4px; color: var(--text-main); font-weight: 600;">📚 <?php echo $peer['specialty']; ?></div>
                                </div>
                                <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $peer['phone']); ?>?text=Hello%20<?php echo urlencode($peer['name']); ?>%2C%20I%20found%20you%20on%20EduMarket%20Dashboard%20and%20would%20like%20to%20connect%21" target="_blank" class="btn btn-primary btn-full btn-sm">
                                    💬 Chat on WhatsApp
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </main>

    <!-- Slide-out Cart & Wishlist Drawers -->
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
            <h3 style="font-size: 1.2rem;">❤️ Liked Items</h3>
            <button onclick="closeDrawers()" style="background: transparent; font-size: 1.3rem; cursor: pointer;">✕</button>
        </div>
        <div id="wishlist-drawer-body" class="drawer-body"></div>
    </div>

    <!-- Quick View Modal -->
    <div id="quickview-modal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close-btn" onclick="closeModal('quickview-modal')">✕</button>
            <div id="quickview-modal-body"></div>
        </div>
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
        function switchTab(tabId, btn) {
            document.querySelectorAll('.dash-tab-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.dash-nav-btn').forEach(b => b.classList.remove('active'));
            
            const target = document.getElementById('tab-' + tabId);
            if (target) target.classList.add('active');
            if (btn) btn.classList.add('active');

            if (tabId === 'notifications') renderDashboardNotifications();
            if (tabId === 'liked') renderDashboardLikedItems();
            if (tabId === 'bought') renderDashboardBoughtItems();
            if (tabId === 'sold') renderDashboardSoldItems();
        }

        // Render Notifications
        function renderDashboardNotifications() {
            const list = document.getElementById('dashboard-notifs-list');
            if (!list) return;

            const notifs = Store.getNotifications();
            if (notifs.length === 0) {
                list.innerHTML = `<div style="text-align: center; padding: 40px; background: #fff; border-radius: var(--radius-md);">No new notifications.</div>`;
                return;
            }

            list.innerHTML = notifs.map(n => `
                <div class="notif-card ${n.read ? '' : 'unread'}">
                    <div style="font-size: 1.4rem;">🔔</div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <strong style="font-size: 0.98rem; color: var(--text-main);">${n.title}</strong>
                            <span style="font-size: 0.75rem; color: var(--text-light);">${n.time}</span>
                        </div>
                        <p style="font-size: 0.88rem; color: var(--text-muted); margin-top: 4px;">${n.message}</p>
                    </div>
                </div>
            `).join('');
        }

        // Render Liked Items with Buyer Count Metric
        function renderDashboardLikedItems() {
            const grid = document.getElementById('dashboard-liked-grid');
            if (!grid) return;

            const wishlist = Store.getWishlist();
            if (wishlist.length === 0) {
                grid.innerHTML = `
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #fff; border-radius: var(--radius-lg); border: 1px dashed var(--border-subtle);">
                        <div style="font-size: 3rem; margin-bottom: 12px;">❤️</div>
                        <h3 style="margin-bottom: 6px;">No Liked Items Yet</h3>
                        <p style="color: var(--text-muted); margin-bottom: 20px;">Save products from the marketplace to view them with student purchase counts.</p>
                        <button onclick="switchTab('search')" class="btn btn-primary btn-sm">Search Campus Items</button>
                    </div>
                `;
                return;
            }

            grid.innerHTML = wishlist.map(product => `
                <div class="product-card">
                    <div class="product-media">
                        <img src="${product.image}" alt="${product.title}">
                        <span class="product-badge-condition">${product.condition || 'Good'}</span>
                        <button class="product-wishlist-btn active" onclick="toggleWishlist(${product.id}, this); renderDashboardLikedItems();" title="Remove from Liked">❤️</button>
                    </div>
                    <div class="product-content">
                        <span class="product-category-tag">${product.category}</span>
                        <h3 class="product-title"><a href="ProductDetails.php?id=${product.id}">${product.title}</a></h3>
                        
                        <!-- Metric: Number of students who bought it -->
                        <div class="buyer-count-badge">
                            🔥 ${product.boughtCount || 24} students bought this
                        </div>

                        <div class="product-seller-info">
                            <span class="seller-avatar">${product.seller ? product.seller[0] : 'S'}</span>
                            <span>${product.seller || 'Student Seller'}</span>
                            <span style="margin-left: auto; font-size: 0.72rem; color: var(--text-light);">${product.campus ? product.campus.split('(')[0] : 'Campus'}</span>
                        </div>

                        <div class="product-footer-row">
                            <span class="product-price">${product.price.toLocaleString()} FCFA</span>
                            <div class="product-card-actions">
                                <button onclick="openPaymentModal(${product.id})" class="btn btn-primary btn-card-action">💳 Buy</button>
                                <a href="https://wa.me/${(product.sellerPhone || '+237690123456').replace(/[^0-9]/g, '')}?text=Hello%2C%20I%20saw%20your%20listing%20in%20my%20Liked%20items%20on%20EduMarket%3A%20${encodeURIComponent(product.title)}" target="_blank" class="btn btn-secondary btn-card-action">💬 Chat</a>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Render Things Bought (Orders)
        function renderDashboardBoughtItems() {
            const container = document.getElementById('dashboard-bought-list');
            if (!container) return;

            const orders = Store.getOrders();
            document.getElementById('bought-count-badge').textContent = orders.length;

            if (orders.length === 0) {
                container.innerHTML = `<div style="text-align: center; padding: 40px; background: #fff; border-radius: var(--radius-md);">You haven't bought any items yet.</div>`;
                return;
            }

            container.innerHTML = orders.map(order => `
                <div class="order-card">
                    <img src="${order.image}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
                    <div style="flex: 1;">
                        <h4 style="font-size: 1.05rem; margin-bottom: 2px;">${order.title}</h4>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">Seller: <strong>${order.seller}</strong> | Location: <strong>${order.campus || 'Campus Meetup'}</strong></div>
                        <div style="font-size: 0.98rem; font-weight: 800; color: var(--primary); margin-top: 6px;">
                            ${order.price.toLocaleString()} FCFA 
                            <span style="font-size: 0.75rem; color: var(--success); font-weight: 700; background: #ecfdf5; padding: 2px 8px; border-radius: 999px; margin-left: 6px;">✓ Paid in Escrow</span>
                        </div>
                    </div>
                    <div style="text-align: right; background: var(--bg-alt); padding: 12px 18px; border-radius: var(--radius-md); border: 1.5px dashed var(--primary);">
                        <span style="font-size: 0.72rem; color: var(--text-muted); display: block; font-weight: 600;">Campus Pickup Code:</span>
                        <strong style="font-size: 1.25rem; color: var(--primary); letter-spacing: 2px;">${order.code}</strong>
                    </div>
                </div>
            `).join('');
        }

        // Render Things Sold (Student Listings & Sales Stats)
        function renderDashboardSoldItems() {
            const container = document.getElementById('dashboard-sold-list');
            if (!container) return;

            const sold = Store.getSoldItems();
            document.getElementById('sold-count-badge').textContent = sold.length;

            if (sold.length === 0) {
                container.innerHTML = `<div style="text-align: center; padding: 40px; background: #fff; border-radius: var(--radius-md);">You haven't posted any items yet.</div>`;
                return;
            }

            container.innerHTML = sold.map(item => `
                <div class="sold-item-card">
                    <img src="${item.image}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <h4 style="font-size: 1.05rem;">${item.title}</h4>
                            <span style="font-size: 0.75rem; font-weight: 700; color: var(--primary); background: var(--primary-light); padding: 2px 8px; border-radius: 999px;">${item.status}</span>
                        </div>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Category: <strong>${item.category}</strong> | Price: <strong>${item.price.toLocaleString()} FCFA</strong></div>
                        <div style="font-size: 0.85rem; color: #b45309; font-weight: 700; margin-top: 4px;">
                            🔥 ${item.buyersCount} students bought this listing (${item.totalEarned.toLocaleString()} FCFA total earned)
                        </div>
                    </div>
                    <div>
                        <a href="SellItem.php" class="btn btn-secondary btn-sm">Edit Listing</a>
                    </div>
                </div>
            `).join('');
        }

        // Smart Search & Similar Items Engine
        function handleSmartSearch(query) {
            query = (query || '').toLowerCase().trim();
            const resultsGrid = document.getElementById('dash-search-results-grid');
            const countBadge = document.getElementById('search-count-badge');
            const similarPanel = document.getElementById('similar-items-panel');
            const similarGrid = document.getElementById('similar-items-grid');

            if (!query) {
                renderProductCards(EduMarketData.products, resultsGrid);
                countBadge.textContent = `${EduMarketData.products.length} items`;
                similarPanel.style.display = 'none';
                return;
            }

            const matches = EduMarketData.products.filter(p => {
                return p.title.toLowerCase().includes(query) ||
                       p.description.toLowerCase().includes(query) ||
                       p.category.toLowerCase().includes(query) ||
                       (p.tags && p.tags.some(t => t.toLowerCase().includes(query)));
            });

            renderProductCards(matches, resultsGrid);
            countBadge.textContent = `${matches.length} matches found`;

            if (matches.length > 0) {
                const matchedCategories = new Set(matches.map(m => m.category));
                const matchedIds = new Set(matches.map(m => m.id));

                const similar = EduMarketData.products.filter(p => !matchedIds.has(p.id) && matchedCategories.has(p.category));
                const finalSimilar = similar.length > 0 ? similar : EduMarketData.products.filter(p => !matchedIds.has(p.id)).slice(0, 2);

                if (finalSimilar.length > 0) {
                    similarPanel.style.display = 'block';
                    renderProductCards(finalSimilar, similarGrid);
                } else {
                    similarPanel.style.display = 'none';
                }
            } else {
                similarPanel.style.display = 'none';
            }
        }

        function renderProductCards(items, container) {
            if (items.length === 0) {
                container.innerHTML = `
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px 20px; background: #fff; border-radius: var(--radius-lg); border: 1px dashed var(--border-subtle);">
                        <div style="font-size: 2.5rem; margin-bottom: 8px;">🔍</div>
                        <h4 style="margin-bottom: 4px;">No items match "${document.getElementById('dash-smart-search-input').value}"</h4>
                        <p style="color: var(--text-muted); font-size: 0.85rem;">Try searching for Calculus, Casio, Laptop, or Notes.</p>
                    </div>
                `;
                return;
            }

            container.innerHTML = items.map(product => `
                <div class="product-card">
                    <div class="product-media">
                        <img src="${product.image}" alt="${product.title}">
                        <span class="product-badge-condition">${product.condition}</span>
                        <button class="product-wishlist-btn" onclick="toggleWishlist(${product.id}, this)" title="Save to Liked">❤️</button>
                    </div>
                    <div class="product-content">
                        <span class="product-category-tag">${product.category}</span>
                        <h3 class="product-title"><a href="ProductDetails.php?id=${product.id}">${product.title}</a></h3>
                        
                        <div class="buyer-count-badge">
                            🔥 ${product.boughtCount || 20} students bought this
                        </div>

                        <div class="product-seller-info">
                            <span class="seller-avatar">${product.seller[0]}</span>
                            <span>${product.seller}</span>
                            <span style="margin-left: auto; font-size: 0.72rem; color: var(--text-light);">${product.campus.split('(')[0]}</span>
                        </div>

                        <div class="product-footer-row">
                            <span class="product-price">${product.price.toLocaleString()} FCFA</span>
                            <div class="product-card-actions">
                                <button onclick="openPaymentModal(${product.id})" class="btn btn-primary btn-card-action" title="Direct In-App Pay">💳 Buy</button>
                                <a href="https://wa.me/${product.sellerPhone.replace(/[^0-9]/g, '')}?text=Hello%20${encodeURIComponent(product.seller)}%2C%20I%20am%20interested%20in%20your%20listing%20on%20EduMarket%3A%20${encodeURIComponent(product.title)}" target="_blank" class="btn btn-secondary btn-card-action" title="WhatsApp">💬</a>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function initDirectPayTab() {
            const select = document.getElementById('direct-pay-select');
            if (!select) return;

            select.innerHTML = EduMarketData.products.map(p => `
                <option value="${p.id}">${p.title} - ${p.price.toLocaleString()} FCFA (${p.seller})</option>
            `).join('');

            previewDirectPayItem(EduMarketData.products[0].id);
        }

        function previewDirectPayItem(id) {
            const product = EduMarketData.products.find(p => p.id == id) || EduMarketData.products[0];
            document.getElementById('dp-img').src = product.image;
            document.getElementById('dp-title').textContent = product.title;
            document.getElementById('dp-campus').textContent = product.campus;
            document.getElementById('dp-price').textContent = product.price.toLocaleString() + ' FCFA';
            document.getElementById('dp-btn-trigger').onclick = () => openPaymentModal(product.id);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const user = Store.getUser();
            if (user) {
                document.getElementById('dash-user-name').textContent = user.name;
                document.getElementById('dash-user-avatar').textContent = user.name.charAt(0).toUpperCase();
                document.getElementById('dash-user-campus').textContent = user.campus;
                if (user.matricule) document.getElementById('dash-user-matricule').textContent = 'ID: ' + user.matricule;
            }

            renderDashboardNotifications();
            renderDashboardLikedItems();
            renderDashboardBoughtItems();
            renderDashboardSoldItems();
            handleSmartSearch('');
            initDirectPayTab();
        });
    </script>
</body>
</html>
