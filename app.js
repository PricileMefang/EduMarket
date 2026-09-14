/**
 * EduMarket - Core Frontend Interactive Application & Personal Student Store
 */

const EduMarketData = {
    products: [
        {
            id: 1,
            title: "Calculus: Early Transcendentals",
            category: "textbooks",
            tags: ["math", "calculus", "engineering", "stewart", "science"],
            condition: "Like New",
            price: 5000,
            originalPrice: 12000,
            boughtCount: 48,
            image: "images/calculus.jfif",
            author: "James Stewart (8th Edition)",
            seller: "Mefang P.",
            sellerPhone: "+237690123456",
            campus: "University of Douala (Faculty of Science)",
            verified: true,
            description: "Essential for Level 100 & 200 Engineering and Math students. Clean pages, no highlights or tears."
        },
        {
            id: 2,
            title: "HP Pavilion 15 (Core i5, 8GB, 512GB SSD)",
            category: "electronics",
            tags: ["laptop", "computer", "hp", "programming", "electronics"],
            condition: "Used - Good",
            price: 250000,
            originalPrice: 380000,
            boughtCount: 19,
            image: "images/hp pavilion.webp",
            author: "HP Electronics",
            seller: "Emmanuel K.",
            sellerPhone: "+237671234567",
            campus: "University of Buea (UB Main Campus)",
            verified: true,
            description: "Fast laptop perfect for programming, AutoCAD, design, and general coursework. 4 hours battery life, original charger included."
        },
        {
            id: 3,
            title: "Casio FX-991EX ClassWiz Scientific Calculator",
            category: "calculators",
            tags: ["calculator", "casio", "math", "engineering", "exam"],
            condition: "Like New",
            price: 8000,
            originalPrice: 15000,
            boughtCount: 64,
            image: "images/casio.webp",
            author: "Casio Official",
            seller: "Diane N.",
            sellerPhone: "+237682345678",
            campus: "Polytech Douala",
            verified: true,
            description: "High-resolution display with matrix and vector calculations. Authorized for all university exams."
        },
        {
            id: 4,
            title: "Comprehensive Civil Engineering Lecture Notes",
            category: "notes",
            tags: ["notes", "civil", "engineering", "exam", "summaries"],
            condition: "New",
            price: 3000,
            originalPrice: 6000,
            boughtCount: 37,
            image: "images/notes.jfif",
            author: "Top Level 300 Student",
            seller: "Kevin T.",
            sellerPhone: "+237699887766",
            campus: "National Advanced School of Public Works (ENSTP)",
            verified: true,
            description: "Complete summary notes with past questions and step-by-step solved tutorials from 2020-2024."
        },
        {
            id: 5,
            title: "Wireless Bluetooth Noise-Cancelling Earbuds",
            category: "electronics",
            tags: ["earbuds", "audio", "bluetooth", "music", "electronics"],
            condition: "Brand New",
            price: 7000,
            originalPrice: 12000,
            boughtCount: 52,
            image: "images/earbuds.jfif",
            author: "SoundTech",
            seller: "Sarah B.",
            sellerPhone: "+237655443322",
            campus: "Catholic University of Central Africa (UCAC)",
            verified: false,
            description: "Crystal clear audio with 24-hour charging case. Perfect for online lectures and library study sessions."
        },
        {
            id: 6,
            title: "Campus Dorm Mini Study Desk & Lamp",
            category: "hostel",
            tags: ["desk", "lamp", "dorm", "hostel", "furniture"],
            condition: "Good",
            price: 15000,
            originalPrice: 28000,
            boughtCount: 23,
            image: "images/images (7).jfif",
            author: "Hostel Furnishings",
            seller: "Patrick M.",
            sellerPhone: "+237677112233",
            campus: "University of Yaounde I (Ngoa-Ekelle)",
            verified: true,
            description: "Compact foldable wooden desk with an adjustable LED desk lamp. Fits smoothly inside any student hostel room."
        }
    ],

    studentPeers: [
        {
            name: "Mefang Pricile",
            role: "Science & Math Tutor / Seller",
            campus: "University of Douala",
            phone: "+237690123456",
            status: "Online",
            specialty: "Calculus, Physics Textbooks & Notes"
        },
        {
            name: "Emmanuel Kouam",
            role: "Tech Lead & Gadget Seller",
            campus: "University of Buea",
            phone: "+237671234567",
            status: "Online",
            specialty: "Laptops, Flash drives & Accessories"
        },
        {
            name: "Diane Ngo",
            role: "Engineering Rep",
            campus: "Polytech Douala",
            phone: "+237682345678",
            status: "Away",
            specialty: "Scientific Calculators & Drawing Kits"
        },
        {
            name: "Kevin Tchinda",
            role: "Civil Engineering Peer",
            campus: "ENSTP Yaoundé",
            phone: "+237699887766",
            status: "Online",
            specialty: "Solved Past Exams & Notes"
        }
    ]
};

// Global User Session & Store
const Store = {
    getUser: () => {
        let user = JSON.parse(localStorage.getItem('edumarket_user') || 'null');
        if (!user) {
            // Default active demo user session
            user = {
                name: "Pricile Mefang",
                email: "pricile.mefang@univ-douala.cm",
                campus: "University of Douala",
                matricule: "21S45899",
                phone: "+237 6 90 12 34 56",
                walletBalance: 45000,
                isLoggedIn: true
            };
            localStorage.setItem('edumarket_user', JSON.stringify(user));
        }
        return user;
    },
    setUser: (userData) => {
        localStorage.setItem('edumarket_user', JSON.stringify(userData));
    },
    logout: () => {
        localStorage.removeItem('edumarket_user');
        window.location.href = 'Login.php';
    },

    // User-specific Notifications
    getNotifications: () => {
        let notifs = JSON.parse(localStorage.getItem('edumarket_notifs') || 'null');
        if (!notifs) {
            notifs = [
                {
                    id: 1,
                    title: "🎉 Listing Sold!",
                    message: "A student from Polytech purchased your 'Calculus Notes'. Pickup passcode: EDUM-4821.",
                    time: "10 mins ago",
                    read: false
                },
                {
                    id: 2,
                    title: "💳 Payment Received in Escrow",
                    message: "+8,000 FCFA has been credited to your campus escrow wallet.",
                    time: "2 hours ago",
                    read: false
                },
                {
                    id: 3,
                    title: "💬 New Student Inquiry",
                    message: "Emmanuel K. inquired about your HP Pavilion listing via WhatsApp.",
                    time: "1 day ago",
                    read: true
                },
                {
                    id: 4,
                    title: "❤️ Price Drop Alert",
                    message: "An item on your liked list 'Casio Scientific Calculator' dropped to 8,000 FCFA.",
                    time: "2 days ago",
                    read: true
                }
            ];
            localStorage.setItem('edumarket_notifs', JSON.stringify(notifs));
        }
        return notifs;
    },
    markAllNotifsRead: () => {
        const notifs = Store.getNotifications().map(n => ({ ...n, read: true }));
        localStorage.setItem('edumarket_notifs', JSON.stringify(notifs));
        Store.updateBadges();
    },

    // User-specific Liked Items
    getWishlist: () => {
        let list = JSON.parse(localStorage.getItem('edumarket_wishlist') || 'null');
        if (!list) {
            list = [EduMarketData.products[0], EduMarketData.products[2]];
            localStorage.setItem('edumarket_wishlist', JSON.stringify(list));
        }
        return list;
    },
    setWishlist: (items) => {
        localStorage.setItem('edumarket_wishlist', JSON.stringify(items));
        Store.updateBadges();
    },

    // User-specific Things Bought (Purchases & Escrow Codes)
    getOrders: () => {
        let orders = JSON.parse(localStorage.getItem('edumarket_orders') || 'null');
        if (!orders) {
            orders = [
                {
                    id: 101,
                    productId: 3,
                    title: "Casio FX-991EX ClassWiz Scientific Calculator",
                    price: 8000,
                    image: "images/casio.webp",
                    code: "EDUM-8391",
                    seller: "Diane N.",
                    campus: "Polytech Douala",
                    status: "Ready for Pickup",
                    date: "Today, 14:20"
                }
            ];
            localStorage.setItem('edumarket_orders', JSON.stringify(orders));
        }
        return orders;
    },
    addOrder: (order) => {
        const orders = Store.getOrders();
        orders.unshift(order);
        localStorage.setItem('edumarket_orders', JSON.stringify(orders));
        // Add notification for purchase
        const notifs = Store.getNotifications();
        notifs.unshift({
            id: Date.now(),
            title: "🛍️ Item Purchased Successfully",
            message: `You purchased '${order.title}'. Present pickup code ${order.code} on campus.`,
            time: "Just now",
            read: false
        });
        localStorage.setItem('edumarket_notifs', JSON.stringify(notifs));
        Store.updateBadges();
    },

    // User-specific Things Sold (Items Listed & Sold by this Student)
    getSoldItems: () => {
        let sold = JSON.parse(localStorage.getItem('edumarket_sold_items') || 'null');
        if (!sold) {
            sold = [
                {
                    id: 1,
                    title: "Calculus: Early Transcendentals (James Stewart)",
                    price: 5000,
                    category: "Textbooks",
                    image: "images/calculus.jfif",
                    status: "Active Listing",
                    buyersCount: 48,
                    totalEarned: 240000,
                    lastBuyer: "Kevin T. (ENSTP)"
                },
                {
                    id: 4,
                    title: "Civil Engineering Complete Lecture Notes Pack",
                    price: 3000,
                    category: "Study Notes",
                    image: "images/notes.jfif",
                    status: "Sold Out",
                    buyersCount: 37,
                    totalEarned: 111000,
                    lastBuyer: "Sarah B. (UCAC)"
                }
            ];
            localStorage.setItem('edumarket_sold_items', JSON.stringify(sold));
        }
        return sold;
    },
    addListing: (listing) => {
        const sold = Store.getSoldItems();
        sold.unshift(listing);
        localStorage.setItem('edumarket_sold_items', JSON.stringify(sold));
    },

    getCart: () => JSON.parse(localStorage.getItem('edumarket_cart') || '[]'),
    setCart: (items) => {
        localStorage.setItem('edumarket_cart', JSON.stringify(items));
        Store.updateBadges();
    },

    updateBadges: () => {
        const cart = Store.getCart();
        const wishlist = Store.getWishlist();
        const notifs = Store.getNotifications();
        const unreadNotifs = notifs.filter(n => !n.read).length;
        
        document.querySelectorAll('.cart-count').forEach(el => el.textContent = cart.length);
        document.querySelectorAll('.wishlist-count').forEach(el => el.textContent = wishlist.length);
        document.querySelectorAll('.notif-count').forEach(el => el.textContent = unreadNotifs);
    }
};

// Toast Notification Manager
function showToast(message, type = 'success') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        document.body.appendChild(container);
    }
    
    const toast = document.createElement('div');
    toast.className = 'toast';
    const icon = type === 'success' ? '✓' : (type === 'pay' ? '💳' : 'ℹ');
    toast.innerHTML = `<span style="font-size: 1.1rem;">${icon}</span> <span>${message}</span>`;
    container.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 50);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3800);
}

// WhatsApp Launcher
function openWhatsAppChat(phone, message) {
    const cleanPhone = phone.replace(/[^0-9]/g, '');
    const url = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');
}

// Cart & Wishlist Operations
function addToCart(productId) {
    const product = EduMarketData.products.find(p => p.id === productId);
    if (!product) return;
    
    let cart = Store.getCart();
    const existing = cart.find(item => item.id === productId);
    if (existing) {
        existing.quantity = (existing.quantity || 1) + 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    Store.setCart(cart);
    showToast(`"${product.title}" added to cart!`);
    renderCartDrawer();
}

function removeFromCart(productId) {
    let cart = Store.getCart().filter(item => item.id !== productId);
    Store.setCart(cart);
    renderCartDrawer();
    showToast('Item removed from cart.');
}

function toggleWishlist(productId, btnElement) {
    const product = EduMarketData.products.find(p => p.id === productId);
    if (!product) return;
    
    let wishlist = Store.getWishlist();
    const index = wishlist.findIndex(item => item.id === productId);
    
    if (index > -1) {
        wishlist.splice(index, 1);
        if (btnElement) btnElement.classList.remove('active');
        showToast(`Removed from liked items.`);
    } else {
        wishlist.push(product);
        if (btnElement) btnElement.classList.add('active');
        showToast(`"${product.title}" added to your Dashboard Liked Items!`);
    }
    Store.setWishlist(wishlist);
    renderWishlistDrawer();
    if (typeof renderDashboardLikedItems === 'function') {
        renderDashboardLikedItems();
    }
}

// Direct In-App Payment Gateway Modal
let currentPaymentProduct = null;

function openPaymentModal(productId) {
    const product = EduMarketData.products.find(p => p.id === productId);
    if (!product) return;
    currentPaymentProduct = product;
    
    let modal = document.getElementById('payment-gateway-modal');
    if (!modal) {
        createPaymentModalDOM();
        modal = document.getElementById('payment-gateway-modal');
    }

    document.getElementById('pay-item-title').textContent = product.title;
    document.getElementById('pay-item-price').textContent = product.price.toLocaleString() + ' FCFA';
    document.getElementById('pay-item-seller').textContent = product.seller;
    document.getElementById('pay-item-campus').textContent = product.campus;
    document.getElementById('pay-item-img').src = product.image;

    // Reset view
    document.getElementById('pay-form-view').style.display = 'block';
    document.getElementById('pay-processing-view').style.display = 'none';
    document.getElementById('pay-success-view').style.display = 'none';

    modal.classList.add('open');
}

function createPaymentModalDOM() {
    const modalHTML = `
        <div id="payment-gateway-modal" class="modal-overlay">
            <div class="modal-content" style="max-width: 520px;">
                <button class="modal-close-btn" onclick="closeModal('payment-gateway-modal')">✕</button>
                
                <!-- View 1: Payment Selection -->
                <div id="pay-form-view">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
                        <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">💳</div>
                        <div>
                            <h3 style="font-size: 1.25rem;">Direct In-App Checkout</h3>
                            <p style="font-size: 0.82rem; color: var(--text-muted);">Buy directly without needing to chat with seller</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; padding: 12px; background: var(--bg-alt); border-radius: var(--radius-md); align-items: center; margin-bottom: 20px;">
                        <img id="pay-item-img" src="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        <div style="flex: 1;">
                            <h4 id="pay-item-title" style="font-size: 0.95rem; margin-bottom: 2px;"></h4>
                            <div style="font-size: 0.8rem; color: var(--text-muted);">Seller: <strong id="pay-item-seller"></strong> (<span id="pay-item-campus"></span>)</div>
                        </div>
                        <div id="pay-item-price" style="font-size: 1.15rem; font-weight: 800; color: var(--primary);"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Select Payment Method</label>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 14px;">
                            <label class="payment-method-card active" onclick="selectPayMethod('momo', this)">
                                <input type="radio" name="pay_method" value="momo" checked style="display: none;">
                                <span style="font-size: 1.2rem;">📱</span>
                                <div>
                                    <strong style="display:block; font-size: 0.9rem;">MTN MoMo</strong>
                                    <span style="font-size: 0.75rem; color: var(--text-muted);">Mobile Money</span>
                                </div>
                            </label>

                            <label class="payment-method-card" onclick="selectPayMethod('om', this)">
                                <input type="radio" name="pay_method" value="om" style="display: none;">
                                <span style="font-size: 1.2rem;">🍊</span>
                                <div>
                                    <strong style="display:block; font-size: 0.9rem;">Orange Money</strong>
                                    <span style="font-size: 0.75rem; color: var(--text-muted);">OM Wallet</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pay-phone-num">Your Mobile Money Phone Number</label>
                        <input type="tel" id="pay-phone-num" class="form-control" placeholder="e.g. 677 12 34 56" value="690123456" required>
                    </div>

                    <button onclick="processPayment()" class="btn btn-primary btn-full btn-lg">
                        🔒 Authorize & Pay Now
                    </button>
                    <p style="font-size: 0.75rem; color: var(--text-light); text-align: center; margin-top: 10px;">
                        Funds held in secure campus escrow until you collect the item from the student seller.
                    </p>
                </div>

                <!-- View 2: Processing Simulator -->
                <div id="pay-processing-view" style="display: none; text-align: center; padding: 40px 10px;">
                    <div class="spinner-pay" style="margin: 0 auto 20px;"></div>
                    <h3 style="margin-bottom: 8px;">Waiting for PIN Approval...</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Please enter your mobile money secret PIN on your phone to confirm payment.</p>
                </div>

                <!-- View 3: Payment Success Receipt -->
                <div id="pay-success-view" style="display: none; text-align: center; padding: 20px 10px;">
                    <div style="font-size: 3.5rem; margin-bottom: 10px;">🎉</div>
                    <h2 style="color: var(--success); font-size: 1.5rem; margin-bottom: 6px;">Payment Successful!</h2>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">Your purchase is saved in your Dashboard. Show your pickup code to the student seller.</p>
                    
                    <div style="background: var(--bg-alt); border: 2px dashed var(--primary); padding: 16px; border-radius: var(--radius-lg); margin-bottom: 20px; text-align: left;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 0.88rem;">
                            <span>Pickup Passcode:</span>
                            <strong id="receipt-passcode" style="font-size: 1.2rem; color: var(--primary); letter-spacing: 2px;">EDUM-9842</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 0.88rem;">
                            <span>Item:</span>
                            <strong id="receipt-item-name"></strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.88rem;">
                            <span>Meetup Location:</span>
                            <span id="receipt-campus-location" style="color: var(--text-muted);"></span>
                        </div>
                    </div>

                    <a href="Dashboard.php?tab=bought" class="btn btn-primary btn-full">
                        View in Dashboard Things Bought
                    </a>
                </div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);
}

function selectPayMethod(method, cardEl) {
    document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('active'));
    cardEl.classList.add('active');
    cardEl.querySelector('input').checked = true;
}

function processPayment() {
    const phone = document.getElementById('pay-phone-num').value.trim();
    if (!phone) {
        alert('Please provide your mobile money phone number.');
        return;
    }

    document.getElementById('pay-form-view').style.display = 'none';
    document.getElementById('pay-processing-view').style.display = 'block';

    setTimeout(() => {
        const orderCode = 'EDUM-' + Math.floor(1000 + Math.random() * 9000);
        document.getElementById('receipt-passcode').textContent = orderCode;
        document.getElementById('receipt-item-name').textContent = currentPaymentProduct.title;
        document.getElementById('receipt-campus-location').textContent = currentPaymentProduct.campus.split('(')[0];

        // Save order in store
        Store.addOrder({
            id: Date.now(),
            productId: currentPaymentProduct.id,
            title: currentPaymentProduct.title,
            price: currentPaymentProduct.price,
            image: currentPaymentProduct.image,
            code: orderCode,
            seller: currentPaymentProduct.seller,
            campus: currentPaymentProduct.campus.split('(')[0],
            status: "Ready for Campus Pickup",
            date: "Today, " + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
        });

        document.getElementById('pay-processing-view').style.display = 'none';
        document.getElementById('pay-success-view').style.display = 'block';

        if (typeof renderDashboardBoughtItems === 'function') renderDashboardBoughtItems();
    }, 2000);
}

// Drawer Controls
function openDrawer(drawerId) {
    const overlay = document.getElementById('drawer-overlay');
    const drawer = document.getElementById(drawerId);
    if (overlay && drawer) {
        overlay.classList.add('open');
        drawer.classList.add('open');
        if (drawerId === 'cart-drawer') renderCartDrawer();
        if (drawerId === 'wishlist-drawer') renderWishlistDrawer();
    }
}

function closeDrawers() {
    const overlay = document.getElementById('drawer-overlay');
    document.querySelectorAll('.drawer-panel').forEach(d => d.classList.remove('open'));
    if (overlay) overlay.classList.remove('open');
}

function renderCartDrawer() {
    const cartBody = document.getElementById('cart-drawer-body');
    const cartTotalEl = document.getElementById('cart-total-price');
    if (!cartBody) return;
    
    const cart = Store.getCart();
    if (cart.length === 0) {
        cartBody.innerHTML = `
            <div style="text-align: center; padding: 40px 10px; color: var(--text-light);">
                <div style="font-size: 3rem; margin-bottom: 10px;">🛒</div>
                <h4 style="color: var(--text-main); margin-bottom: 6px;">Your cart is empty</h4>
                <p style="font-size: 0.9rem;">Browse campus items and add them to your cart.</p>
                <a href="Marketplace.php" class="btn btn-primary btn-sm" style="margin-top: 16px;">Go to Marketplace</a>
            </div>
        `;
        if (cartTotalEl) cartTotalEl.textContent = '0 FCFA';
        return;
    }
    
    let total = 0;
    cartBody.innerHTML = cart.map(item => {
        const itemTotal = item.price * (item.quantity || 1);
        total += itemTotal;
        return `
            <div style="display: flex; gap: 12px; padding: 12px; background: var(--bg-alt); border-radius: var(--radius-md); align-items: center;">
                <img src="${item.image}" alt="${item.title}" style="width: 54px; height: 54px; object-fit: cover; border-radius: 8px;">
                <div style="flex: 1;">
                    <h5 style="font-size: 0.9rem; margin-bottom: 4px; line-height: 1.3;">${item.title}</h5>
                    <div style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">${item.price.toLocaleString()} FCFA × ${item.quantity || 1}</div>
                </div>
                <button onclick="openPaymentModal(${item.id})" class="btn btn-primary btn-sm" style="padding: 4px 8px; font-size: 0.75rem;" title="Pay Now">💳 Pay</button>
                <button onclick="removeFromCart(${item.id})" style="background: transparent; color: var(--danger); cursor: pointer; font-size: 1.1rem; padding: 4px;">✕</button>
            </div>
        `;
    }).join('');
    
    if (cartTotalEl) cartTotalEl.textContent = `${total.toLocaleString()} FCFA`;
}

function renderWishlistDrawer() {
    const wishlistBody = document.getElementById('wishlist-drawer-body');
    if (!wishlistBody) return;
    
    const wishlist = Store.getWishlist();
    if (wishlist.length === 0) {
        wishlistBody.innerHTML = `
            <div style="text-align: center; padding: 40px 10px; color: var(--text-light);">
                <div style="font-size: 3rem; margin-bottom: 10px;">❤️</div>
                <h4 style="color: var(--text-main); margin-bottom: 6px;">No saved items</h4>
                <p style="font-size: 0.9rem;">View and manage liked items with purchase counts on your Student Dashboard.</p>
                <a href="Dashboard.php?tab=liked" class="btn btn-primary btn-sm" style="margin-top: 14px;">Open Student Dashboard</a>
            </div>
        `;
        return;
    }
    
    wishlistBody.innerHTML = `
        <div style="padding: 10px; background: var(--primary-light); border-radius: var(--radius-md); font-size: 0.82rem; margin-bottom: 10px;">
            🔒 Liked items & buyer metrics are privately managed in your <a href="Dashboard.php?tab=liked" style="color: var(--primary); font-weight: 700;">Student Dashboard</a>.
        </div>
    ` + wishlist.map(item => `
        <div style="display: flex; gap: 12px; padding: 12px; background: var(--bg-alt); border-radius: var(--radius-md); align-items: center;">
            <img src="${item.image}" alt="${item.title}" style="width: 54px; height: 54px; object-fit: cover; border-radius: 8px;">
            <div style="flex: 1;">
                <h5 style="font-size: 0.9rem; margin-bottom: 2px;">${item.title}</h5>
                <div style="font-size: 0.78rem; color: #b45309; font-weight: 700;">🔥 ${item.boughtCount || 20} students bought this</div>
                <div style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">${item.price.toLocaleString()} FCFA</div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <button onclick="openPaymentModal(${item.id})" class="btn btn-primary btn-sm" style="padding: 4px 8px; font-size: 0.72rem;">Buy</button>
                <a href="Dashboard.php?tab=liked" class="btn btn-secondary btn-sm" style="padding: 4px 8px; font-size: 0.72rem;">View</a>
            </div>
        </div>
    `).join('');
}

// Quick View Modal
function openQuickView(productId) {
    const product = EduMarketData.products.find(p => p.id === productId);
    if (!product) return;
    
    const modal = document.getElementById('quickview-modal');
    const modalBody = document.getElementById('quickview-modal-body');
    if (!modal || !modalBody) return;
    
    modalBody.innerHTML = `
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <div>
                <img src="${product.image}" alt="${product.title}" style="width: 100%; border-radius: var(--radius-lg); object-fit: cover; max-height: 280px;">
                <div style="margin-top: 14px; background: var(--bg-alt); padding: 12px; border-radius: var(--radius-md); font-size: 0.85rem;">
                    <strong>📍 Meetup Campus:</strong>
                    <p style="color: var(--text-muted); margin-top: 2px;">${product.campus}</p>
                    <div style="margin-top: 8px; font-weight: 700; color: #b45309;">
                        🔥 ${product.boughtCount || 25} students bought this item
                    </div>
                </div>
            </div>
            <div>
                <span class="hero-tag" style="margin-bottom: 8px; font-size: 0.75rem;">${product.category.toUpperCase()}</span>
                <h3 style="font-size: 1.4rem; margin-bottom: 8px;">${product.title}</h3>
                <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary); margin-bottom: 12px;">
                    ${product.price.toLocaleString()} FCFA 
                    <span style="font-size: 0.9rem; color: var(--text-light); text-decoration: line-through; margin-left: 6px;">${product.originalPrice.toLocaleString()} FCFA</span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 16px; line-height: 1.5;">${product.description}</p>
                
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; font-size: 0.85rem; color: var(--text-muted);">
                    <span class="seller-avatar">${product.seller[0]}</span>
                    <span>Listed by <strong>${product.seller}</strong> ${product.verified ? '✓ (Verified)' : ''}</span>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button onclick="closeModal('quickview-modal'); openPaymentModal(${product.id});" class="btn btn-primary btn-full">
                        💳 Direct In-App Pay (${product.price.toLocaleString()} FCFA)
                    </button>
                    <a href="https://wa.me/${product.sellerPhone.replace(/[^0-9]/g, '')}?text=Hello%2C%20I%20am%20interested%20in%20your%20listing%20on%20EduMarket%3A%20${encodeURIComponent(product.title)}" target="_blank" class="btn btn-secondary btn-full">
                        💬 Or Chat with Seller on WhatsApp
                    </a>
                    <button onclick="toggleWishlist(${product.id}); closeModal('quickview-modal');" class="btn btn-outline">
                        ❤️ Add to Liked Items
                    </button>
                </div>
            </div>
        </div>
    `;
    modal.classList.add('open');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.remove('open');
}

// Initialize on DOM Ready
document.addEventListener('DOMContentLoaded', () => {
    Store.updateBadges();
    createPaymentModalDOM();

    // Accordion Toggle Handlers
    document.querySelectorAll('.faq-question').forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const isOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
            if (!isOpen) item.classList.add('open');
        });
    });

    // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileNav = document.getElementById('mobile-nav-menu');
    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', () => {
            mobileNav.classList.toggle('open');
        });
    }

    // Modal Close on click outside
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) overlay.classList.remove('open');
        });
    });
});
