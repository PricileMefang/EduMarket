<?php
// Marketplace.php - EduMarket Campus Catalog
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Marketplace | EduMarket</title>
    <link rel="icon" type="image/png" href="logos/edumarket logo 2.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .filter-header-bar {
            background: #ffffff;
            border-bottom: 1px solid var(--border-subtle);
            padding: 24px 0;
            margin-bottom: 20px;
        }
        .active-filter-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            border-radius: var(--radius-full);
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 700;
        }
        .products-list-view {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .products-list-view .product-card {
            flex-direction: row;
            height: 180px;
        }
        .products-list-view .product-media {
            width: 220px;
            height: 100%;
        }
        .products-list-view .product-content {
            flex: 1;
        }
    </style>
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

            <!-- Header Search Bar -->
            <div class="header-search">
                <div class="search-input-wrap">
                    <span class="search-icon-btn">🔍</span>
                    <input type="text" id="market-quick-search" placeholder="Search textbooks, laptops, notes..." oninput="filterMarketplace()">
                </div>
            </div>

            <!-- Navigation Links -->
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="Marketplace.php" class="nav-link active">Marketplace</a></li>
                    <li><a href="SellItem.php" class="nav-link">Sell Item</a></li>
                </ul>
            </nav>

            <!-- Action Buttons -->
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

    <div class="filter-header-bar">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
            <div>
                <h1 style="font-size: 1.8rem; margin-bottom: 4px;">Explore Campus Marketplace</h1>
                <p style="color: var(--text-muted); font-size: 0.95rem;">Browse affordable items uploaded by verified university students.</p>
            </div>
            <div>
                <a href="SellItem.php" class="btn btn-primary">🚀 Sell Your Own Item</a>
            </div>
        </div>
    </div>

    <main class="page-main">
        <div class="container">
            <div class="marketplace-layout">
                <!-- Filter Sidebar -->
                <aside class="filter-sidebar">
                    <div class="filter-head">
                        <h3 style="font-size: 1.1rem; display: flex; align-items: center; gap: 8px;">
                            ⚙️ Filters
                        </h3>
                        <button onclick="resetFilters()" style="background: transparent; color: var(--primary); font-size: 0.85rem; font-weight: 700; cursor: pointer;">Reset All</button>
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-group">
                        <h4 class="filter-title">Category</h4>
                        <ul class="filter-list">
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="all" checked onchange="filterMarketplace()">
                                    <span>All Categories</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="textbooks" onchange="filterMarketplace()">
                                    <span>📚 Textbooks</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="electronics" onchange="filterMarketplace()">
                                    <span>💻 Electronics & PCs</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="calculators" onchange="filterMarketplace()">
                                    <span>🔢 Calculators</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="notes" onchange="filterMarketplace()">
                                    <span>📝 Study Notes</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="radio" name="category_filter" value="hostel" onchange="filterMarketplace()">
                                    <span>🏠 Hostel & Dorm</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Max Price Range Filter -->
                    <div class="filter-group">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <h4 class="filter-title" style="margin-bottom: 0;">Max Price</h4>
                            <span id="price-range-val" style="font-weight: 700; color: var(--primary); font-size: 0.85rem;">300,000 FCFA</span>
                        </div>
                        <input type="range" id="price-range-input" min="1000" max="300000" step="1000" value="300000" style="width: 100%; accent-color: var(--primary); cursor: pointer;" oninput="updatePriceLabel(this.value); filterMarketplace();">
                    </div>

                    <!-- Condition Filter -->
                    <div class="filter-group">
                        <h4 class="filter-title">Condition</h4>
                        <ul class="filter-list">
                            <li>
                                <label class="filter-item-label">
                                    <input type="checkbox" name="condition_filter" value="Brand New" onchange="filterMarketplace()">
                                    <span>Brand New</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="checkbox" name="condition_filter" value="Like New" onchange="filterMarketplace()">
                                    <span>Like New</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-item-label">
                                    <input type="checkbox" name="condition_filter" value="Used" onchange="filterMarketplace()">
                                    <span>Used / Good</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- Product Catalog Area -->
                <section>
                    <!-- Toolbar -->
                    <div class="marketplace-toolbar">
                        <div style="font-size: 0.95rem; font-weight: 600; color: var(--text-muted);">
                            Showing <span id="items-count-num" style="color: var(--primary); font-weight: 700;">6</span> campus listings
                        </div>

                        <div style="display: flex; align-items: center; gap: 14px;">
                            <label style="font-size: 0.88rem; color: var(--text-muted); font-weight: 600;">Sort By:</label>
                            <select id="market-sort-select" class="form-control form-select" style="padding: 6px 30px 6px 12px; width: auto; font-size: 0.88rem;" onchange="filterMarketplace()">
                                <option value="default">Featured / Recommended</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                                <option value="title_asc">Name: A to Z</option>
                            </select>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div id="marketplace-grid" class="products-grid">
                        <!-- Rendered dynamically by JavaScript -->
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
            <a href="Marketplace.php" class="btn btn-primary btn-full" onclick="closeDrawers()">Checkout / Contact Sellers</a>
        </div>
    </div>

    <div id="wishlist-drawer" class="drawer-panel">
        <div class="drawer-head">
            <h3 style="font-size: 1.2rem;">❤️ Saved Items</h3>
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
        function updatePriceLabel(val) {
            document.getElementById('price-range-val').textContent = Number(val).toLocaleString() + ' FCFA';
        }

        function filterMarketplace() {
            const query = (document.getElementById('market-quick-search').value || '').toLowerCase();
            const selectedCat = document.querySelector('input[name="category_filter"]:checked')?.value || 'all';
            const maxPrice = Number(document.getElementById('price-range-input').value) || 300000;
            const sortVal = document.getElementById('market-sort-select').value;

            const conditionChecked = Array.from(document.querySelectorAll('input[name="condition_filter"]:checked')).map(cb => cb.value.toLowerCase());

            let filtered = EduMarketData.products.filter(item => {
                // Search query
                const matchesQuery = item.title.toLowerCase().includes(query) || 
                                     item.description.toLowerCase().includes(query) ||
                                     item.campus.toLowerCase().includes(query);
                if (!matchesQuery) return false;

                // Category
                if (selectedCat !== 'all' && item.category !== selectedCat) return false;

                // Price
                if (item.price > maxPrice) return false;

                // Condition
                if (conditionChecked.length > 0) {
                    const matchesCond = conditionChecked.some(c => item.condition.toLowerCase().includes(c));
                    if (!matchesCond) return false;
                }

                return true;
            });

            // Sorting
            if (sortVal === 'price_asc') {
                filtered.sort((a, b) => a.price - b.price);
            } else if (sortVal === 'price_desc') {
                filtered.sort((a, b) => b.price - a.price);
            } else if (sortVal === 'title_asc') {
                filtered.sort((a, b) => a.title.localeCompare(b.title));
            }

            renderCatalog(filtered);
        }

        function renderCatalog(items) {
            const grid = document.getElementById('marketplace-grid');
            const countEl = document.getElementById('items-count-num');
            if (countEl) countEl.textContent = items.length;

            if (items.length === 0) {
                grid.innerHTML = `
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #fff; border-radius: var(--radius-lg); border: 1px dashed var(--border-subtle);">
                        <div style="font-size: 3rem; margin-bottom: 12px;">🔍</div>
                        <h3 style="margin-bottom: 8px;">No campus items match your filters</h3>
                        <p style="color: var(--text-muted); margin-bottom: 20px;">Try adjusting your search criteria or resetting filters.</p>
                        <button onclick="resetFilters()" class="btn btn-primary btn-sm">Reset Filters</button>
                    </div>
                `;
                return;
            }

            grid.innerHTML = items.map(product => `
                <div class="product-card">
                    <div class="product-media">
                        <img src="${product.image}" alt="${product.title}">
                        <span class="product-badge-condition">${product.condition}</span>
                        <button class="product-wishlist-btn" onclick="toggleWishlist(${product.id}, this)" title="Save to wishlist">❤️</button>
                    </div>
                    <div class="product-content">
                        <span class="product-category-tag">${product.category}</span>
                        <h3 class="product-title"><a href="ProductDetails.php?id=${product.id}">${product.title}</a></h3>
                        <p class="product-meta-desc">${product.description}</p>
                        <div class="product-seller-info">
                            <span class="seller-avatar">${product.seller[0]}</span>
                            <span>${product.seller}</span>
                            ${product.verified ? '<span class="verified-icon" title="Verified Student">✓</span>' : ''}
                            <span style="margin-left: auto; font-size: 0.75rem; color: var(--text-light);">${product.campus.split('(')[0]}</span>
                        </div>
                        <div class="product-footer-row">
                            <span class="product-price">${product.price.toLocaleString()} FCFA</span>
                            <div class="product-card-actions">
                                <button onclick="openQuickView(${product.id})" class="btn btn-secondary btn-card-action">Quick View</button>
                                <button onclick="addToCart(${product.id})" class="btn btn-primary btn-card-action">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function resetFilters() {
            document.getElementById('market-quick-search').value = '';
            document.querySelector('input[name="category_filter"][value="all"]').checked = true;
            document.getElementById('price-range-input').value = 300000;
            updatePriceLabel(300000);
            document.querySelectorAll('input[name="condition_filter"]').forEach(cb => cb.checked = false);
            document.getElementById('market-sort-select').value = 'default';
            filterMarketplace();
        }

        // Read URL params on initial load
        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            const cat = params.get('category');
            const q = params.get('q');
            if (cat) {
                const radio = document.querySelector(`input[name="category_filter"][value="${cat}"]`);
                if (radio) radio.checked = true;
            }
            if (q) {
                document.getElementById('market-quick-search').value = q;
            }
            filterMarketplace();
        });
    </script>
</body>
</html>
