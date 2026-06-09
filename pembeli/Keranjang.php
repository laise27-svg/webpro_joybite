<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Keranjang</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        :root {
            --primary: #F4D03F;
            --primary-hover: #D4B435;
            --soft-bg: #FCF9F2;
            --text-dark: #333;
            --gray: #888;
            --white: #FFFFDC;
            --border: #130101;
            --button: #F28B2A;
        }

        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            background-color: var(--white); 
            margin: 0; 
            color: var(--text-dark); 
        }

        header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 15px 5%; 
            background: white; 
            border-bottom: 1px solid var(--border); 
        }
        .logo { font-weight: bold; color: var(--primary); font-size: 24px; text-decoration: none; }
        
        nav { display: flex; gap: 30px; align-items: center; }
        nav a { 
            text-decoration: none; 
            color: var(--text-dark); 
            font-weight: 500; 
            font-size: 14px;
            display: flex; 
            align-items: center; 
            gap: 5px; 
        }
        
        .search-bar { 
            background: #f9f9f9; 
            border-radius: 20px; 
            padding: 8px 20px; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            width: 300px; 
        }
        .search-bar input { border: none; background: transparent; outline: none; width: 100%; }

        /* Icon Basket & User */
        .user-tools { display: flex; gap: 20px; align-items: center; }
        .user-tools a { text-decoration: none; color: inherit; display: flex; align-items: center; }

        .container { 
            display: flex; 
            padding: 40px 5%; 
            gap: 50px; 
            max-width: 1400px; 
            margin: 0 auto;
        }

        .main-content { flex: 2; }
        .back-link { text-decoration: none; color: var(--gray); font-size: 14px; display: block; margin-bottom: 20px; }
        .back-link:hover { color: var(--button); }
        h2 { margin-bottom: 30px; font-size: 28px; }

        .cart-item { 
            display: flex; 
            align-items: center; 
            gap: 20px; 
            padding: 25px 0; 
            border-bottom: 1px solid var(--border); 
        }
        
        .item-img { 
            width: 120px; 
            height: 120px; 
            border-radius: 15px; 
            background: #f0f0f0; 
            object-fit: cover; 
            border: 1px solid #ddd;
        }

        .item-info { flex: 1; }
        .item-info h4 { margin: 0 0 5px 0; font-size: 20px; text-transform: capitalize; }
        .item-info p { color: var(--gray); font-size: 14px; margin: 0; }
        
        .btn-hapus { 
            color: var(--button); 
            cursor: pointer; 
            font-size: 14px; 
            margin-top: 15px; 
            border: none; 
            background: none; 
            padding: 0; 
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: bold;
        }
        .btn-hapus:hover { opacity: 0.8; }

        .item-price-qty { text-align: right; min-width: 150px; }
        .price { font-weight: bold; font-size: 20px; display: block; margin-bottom: 15px; }
        
        .qty-control { 
            display: inline-flex; 
            align-items: center; 
            gap: 15px; 
            border: 1px solid #ddd; 
            border-radius: 25px; 
            padding: 5px 15px; 
            background: white;
        }
        .qty-btn { cursor: pointer; border: none; background: none; display: flex; align-items: center; padding: 0; color: var(--text-dark); }
        .qty-btn:hover { color: var(--button); }
        .qty-val { font-weight: bold; min-width: 20px; text-align: center; }

        .sidebar { 
            flex: 1; 
            background: var(--soft-bg); 
            padding: 30px; 
            border-radius: 20px; 
            height: fit-content; 
            position: sticky;
            top: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .sidebar h3 { margin-top: 0; margin-bottom: 25px; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 15px; color: #555; }
        .total-row { 
            display: flex; 
            justify-content: space-between; 
            margin-top: 25px; 
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            font-weight: bold; 
            font-size: 22px; 
            color: var(--button); 
        }
        
        .btn-checkout { 
            width: 100%; 
            background: var(--button); 
            color: white;
            border: none; 
            padding: 18px; 
            border-radius: 15px; 
            font-weight: bold; 
            font-size: 16px; 
            cursor: pointer; 
            margin-top: 25px; 
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .btn-checkout:hover { opacity: 0.9; transform: translateY(-2px); }

        .material-symbols-outlined { font-size: 22px; vertical-align: middle; }

        @media (max-width: 992px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; }
        }
    </style>
</head>
<body>

<header>
    <a href="menu.php" class="logo">Joybite</a>
    <nav>
        <a href="menu.php"><span class="material-symbols-outlined">home</span> Beranda</a>
        <a href="menu.php"><span class="material-symbols-outlined">menu_book</span> Menu</a>
        <div class="search-bar">
            <span class="material-symbols-outlined">search</span>
            <input type="text" placeholder="cari disini...">
        </div>
    </nav>
    <div class="user-tools">
        <a href="Keranjang.php">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; color: var(--button);">shopping_basket</span>
        </a>
        <a href="#" onclick="logout()" title="Logout" style="text-decoration: none; color: #ef4444;">
            <span class="material-symbols-outlined">logout</span>
        </a>
    </div>       
</header>

<div class="container">
    <div class="main-content">
        <a href="menu.php" class="back-link">
            <span class="material-symbols-outlined" style="font-size: 16px;">arrow_back</span> Kembali 
        </a>
        <h2 id="cart-title">Tas Belanja Anda (0)</h2>
        
        <div id="cart-items-container">
            <p id="loading-msg">Memuat keranjang...</p>
        </div>
    </div>

    <div class="sidebar">
        <h3>Ringkasan Pesanan</h3>
        <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">Rp 0</span>
        </div>
        <div class="summary-row">
            <span>Biaya Pengiriman</span>
            <span>Rp 15.000</span>
        </div>
        <div class="summary-row">
            <span>Diskon Promo</span>
            <span style="color:red;">-Rp 0</span>
        </div>
        
        <div class="total-row">
            <span>Total Akhir</span>
            <span id="grand-total">Rp 0</span>
        </div>
        
        <button class="btn-checkout">
            Lanjut ke Pembayaran
            <span class="material-symbols-outlined">payments</span>
        </button>
    </div>
</div>

<script>
    if(localStorage.getItem("isLoggedIn") !== "true") {
        window.location.href = "../login.html";
    }

    function logout() {
        if(confirm("Apakah kamu yakin ingin keluar?")) {
            localStorage.clear();
            window.location.href = "../login.html";
        }
    }

    const API_URL = 'cart.php'; 

    async function loadCart() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) throw new Error("Gagal mengambil data");
            const items = await response.json();
            renderCart(items);
        } catch (err) {
            document.getElementById('cart-items-container').innerHTML = `<p style="color:red;">Error: ${err.message}</p>`;
        }
    }

    function renderCart(items) {
        const container = document.getElementById('cart-items-container');
        const title = document.getElementById('cart-title');
        let html = '';
        let subtotal = 0;

        if (items.length === 0) {
            container.innerHTML = "<p>Keranjang kosong. <a href='menu.php'>Ayo belanja!</a></p>";
            title.innerText = "Tas Belanja Anda (0)";
            updateSummary(0);
            return;
        }

        items.forEach(item => {
            const itemSubtotal = parseInt(item.harga) * parseInt(item.jumlah);
            subtotal += itemSubtotal;

            const prompt = `delicious ${item.nama_dessert} dessert, high resolution, food photography`;
            const aiImageURL = `https://image.pollinations.ai/prompt/${encodeURIComponent(prompt)}?width=400&height=400&nologo=true`;

            html += `
            <div class="cart-item">
                <img src="${aiImageURL}" class="item-img" alt="${item.nama_dessert}" loading="lazy">
                <div class="item-info">
                    <h4>${item.nama_dessert}</h4>
                    <p>Dessert JoyBite Premium</p>
                    <button class="btn-hapus" onclick="deleteItem(${item.id})">
                        <span class="material-symbols-outlined">delete</span> Hapus
                    </button>
                </div>
                <div class="item-price-qty">
                    <span class="price">Rp ${parseInt(item.harga).toLocaleString('id-ID')}</span>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="updateQty(${item.id}, ${parseInt(item.jumlah) - 1})">
                            <span class="material-symbols-outlined">remove</span>
                        </button>
                        <span class="qty-val">${item.jumlah}</span>
                        <button class="qty-btn" onclick="updateQty(${item.id}, ${parseInt(item.jumlah) + 1})">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                </div>
            </div>
            `;
        });

        container.innerHTML = html;
        title.innerText = `Tas Belanja Anda (${items.length})`;
        updateSummary(subtotal);
    }

    function updateSummary(subtotal) {
        const shipping = subtotal > 0 ? 15000 : 0;
        document.getElementById('subtotal').innerText = `Rp ${subtotal.toLocaleString('id-ID')}`;
        document.getElementById('grand-total').innerText = `Rp ${(subtotal + shipping).toLocaleString('id-ID')}`;
    }

    async function updateQty(id, newQty) {
        if (newQty < 1) return deleteItem(id);
        await fetch(API_URL, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id, jumlah: newQty })
        });
        loadCart();
    }

    async function deleteItem(id) {
        if (confirm('Hapus item?')) {
            await fetch(`${API_URL}?id=${id}`, { method: 'DELETE' });
            loadCart();
        }
    }

    loadCart();
</script>
</body>
</html>