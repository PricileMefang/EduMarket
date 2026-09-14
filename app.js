/**
 * EduMarket - Core Frontend Interactive Application
 */

// Sample Product Catalog for dynamic rendering and interactivity
const EduMarketData = {
    products: [
        {
            id: 1,
            title: "Calculus: Early Transcendentals",
            category: "textbooks",
            condition: "Like New",
            price: 5000,
            originalPrice: 12000,
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
            condition: "Used - Good",
            price: 250000,
            originalPrice: 380000,
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
            condition: "Like New",
            price: 8000,
            originalPrice: 15000,
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
            condition: "New",
            price: 3000,
            originalPrice: 6000,
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
            condition: "Brand New",
            price: 7000,
            originalPrice: 12000,
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
            condition: "Good",
            price: 15000,
            originalPrice: 28000,
            image: "images/images (7).jfif",
            author: "Hostel Furnishings",
            seller: "Patrick M.",
            sellerPhone: "+237677112233",
            campus: "University of Yaounde I (Ngoa-Ekelle)",
            verified: true,
            description: "Compact foldable wooden desk with an adjustable LED desk lamp. Fits smoothly inside any student hostel room."
        }
    ]
};

// Global Store Helper
const Store = {
    getCart: () => JSON.parse(localStorage.getItem('edumarket_cart') || '[]'),
    setCart: (items) => {
        localStorage.setItem('edumarket_cart', JSON.stringify(items));
        Store.updateBadges();
    },
    getWishlist: () => JSON.parse(localStorage.getItem('edumarket_wishlist') || '[]'),
    setWishlist: (items) => {
        localStorage.setItem('edumarket_wishlist', JSON.stringify(items));
        Store.updateBadges();
    },
    updateBadges: () => {
        const cart = Store.getCart();
        const wishlist = Store.getWishlist();
        
        document.querySelectorAll('.cart-count').forEach(el => {
            el.textContent = cart.length;
        });
        document.querySelectorAll('.wishlist-count').forEach(el => {
            el.textContent = wishlist.length;
        });
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
    const icon = type === 'success' ? '✓' : 'ℹ';
    toast.innerHTML = `<span>${icon}</span> <span>${message}</span>`;
    container.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 50);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// Cart & Wishlist Actions
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
    showToast(`"${product.title}" added to your cart!`);
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
        showToast(`Removed from saved items.`);
    } else {
        wishlist.push(product);
        if (btnElement) btnElement.classList.add('active');
        showToast(`"${product.title}" saved to your wishlist!`);
    }
    Store.setWishlist(wishlist);
    renderWishlistDrawer();
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
                <p style="font-size: 0.9rem;">Click the heart on any product to save it for later.</p>
            </div>
        `;
        return;
    }
    
    wishlistBody.innerHTML = wishlist.map(item => `
        <div style="display: flex; gap: 12px; padding: 12px; background: var(--bg-alt); border-radius: var(--radius-md); align-items: center;">
            <img src="${item.image}" alt="${item.title}" style="width: 54px; height: 54px; object-fit: cover; border-radius: 8px;">
            <div style="flex: 1;">
                <h5 style="font-size: 0.9rem; margin-bottom: 4px;">${item.title}</h5>
                <div style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">${item.price.toLocaleString()} FCFA</div>
            </div>
            <button onclick="addToCart(${item.id})" class="btn btn-primary btn-sm" style="padding: 4px 10px; font-size: 0.75rem;">Add</button>
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
                    <span>Listed by <strong>${product.seller}</strong> ${product.verified ? '✓ (Verified Student)' : ''}</span>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="https://wa.me/${product.sellerPhone.replace(/[^0-9]/g, '')}?text=Hello%2C%20I%20am%20interested%20in%20your%20listing%20on%20EduMarket%3A%20${encodeURIComponent(product.title)}" target="_blank" class="btn btn-primary btn-full">
                        💬 Chat on WhatsApp
                    </a>
                    <div style="display: flex; gap: 10px;">
                        <button onclick="addToCart(${product.id}); closeModal('quickview-modal');" class="btn btn-secondary" style="flex: 1;">🛒 Add to Cart</button>
                        <a href="ProductDetails.php?id=${product.id}" class="btn btn-outline" style="flex: 1;">Full Details</a>
                    </div>
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
            if (e.target === overlay) {
                overlay.classList.remove('open');
            }
        });
    });
});
