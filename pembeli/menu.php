<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        :root {
            --primary: #F4D03F;
            --button: #F28B2A;
            --white: #FFFFDC;
            --text: #333;
            --soft-gray: #888;
        }

        body { font-family: 'Segoe UI', sans-serif; background-color: var(--white); margin: 0; color: var(--text); }
        
        /* Header */
        header { display: flex; justify-content: space-between; align-items: center; padding: 15px 5%; background: white; border-bottom: 1px solid #eee; }
        .logo { font-weight: bold; color: var(--primary); font-size: 24px; text-decoration: none; }
        nav { display: flex; gap: 30px; align-items: center; }
        nav a { text-decoration: none; color: var(--text); font-weight: 500; display: flex; align-items: center; gap: 5px; }
        .search-bar { background: #f9f9f9; border-radius: 20px; padding: 8px 20px; display: flex; align-items: center; gap: 10px; width: 300px; }
        .search-bar input { border: none; background: transparent; outline: none; width: 100%; }

        /* Layout */
        .main-container { display: flex; padding: 40px 5%; gap: 40px; }
        
        /* Sidebar */
        .sidebar { width: 250px; }
        .sidebar h3 { margin-bottom: 20px; }
        .sidebar-item { margin-bottom: 15px; cursor: pointer; color: var(--text); }
        .sidebar-item.active { color: white; background: var(--button); padding: 10px; border-radius: 5px; display: inline-block; width: 100%; }
        
        /* Menu Grid */
        .menu-grid { flex: 1; display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 30px; }
        .card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: 0.3s; position: relative; }
        .card:hover { transform: translateY(-5px); }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .card-content { padding: 15px; }
        .rating { font-size: 14px; color: var(--soft-gray); display: flex; align-items: center; gap: 5px; }
        .card h4 { margin: 10px 0 5px; font-size: 18px; }
        .card p { font-size: 13px; color: var(--soft-gray); margin-bottom: 15px; line-height: 1.4; }
        .card-footer { display: flex; justify-content: space-between; align-items: center; }
        .price { color: var(--button); font-weight: bold; font-size: 18px; }
        .add-btn { background: var(--button); color: white; border: none; width: 35px; height: 35px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; }

        .material-symbols-outlined { font-size: 20px; }
    </style>
</head>
<body>

<header>
    <a href="#" class="logo">Joybite</a>
    <nav>
        <a href="#"><span class="material-symbols-outlined">home</span> Beranda</a>
        <a href="#"><span class="material-symbols-outlined">menu_book</span> Menu</a>
        <div class="search-bar">
            <span class="material-symbols-outlined">search</span>
            <input type="text" placeholder="cari disini...">
        </div>
    </nav>
<div style="display: flex; gap: 20px;">
    <a href="Keranjang.php" style="text-decoration: none; color: inherit;">
        <span class="material-symbols-outlined">shopping_basket</span>
    </a>
    <a href="#" onclick="logout()" title="Logout" style="text-decoration: none; color: #ef4444;">
        <span class="material-symbols-outlined">logout</span>
    </a>
</div>       
</header>

<div class="main-container">
    <div class="sidebar">
        <h3>Kategori</h3>
        <div class="sidebar-item active">Kue</div>
        <div class="sidebar-item">Donat</div>
        <div class="sidebar-item">Roti</div>
        <div class="sidebar-item">Pastry</div>
        
        <h3 style="margin-top:40px;">Harga</h3>
        <input type="range" style="width:100%; accent-color: var(--button);">
        <p>Rp. 50.000</p>

        <h3 style="margin-top:40px;">Filter</h3>
        <label style="display:block; margin-bottom:10px;"><input type="checkbox"> Less Sugar</label>
        <label style="display:block;"><input type="checkbox"> Gluten-Free</label>
    </div>

    <div class="menu-grid" id="menu-container">
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

    const MENU_API = 'produk.php';
    const CART_API = 'cart.php';

    async function fetchMenu() {
        try {
            const response = await fetch(MENU_API);
            const data = await response.json();
            renderMenu(data);
        } catch (err) {
            console.error("Gagal load menu:", err);
        }
    }

    function renderMenu(items) {
        const container = document.getElementById('menu-container');
        container.innerHTML = items.map(item => {
            const imgSrc = item.gambar ? `images/${item.gambar}` : `https://image.pollinations.ai/prompt/delicious%20${encodeURIComponent(item.nama_produk)}%20dessert?width=400&height=300&nologo=true`;
            return `
            <div class="card">
                <img src="${imgSrc}" alt="${item.nama_produk}">
                <div class="card-content">
                    <div class="rating">
                        <span class="material-symbols-outlined" style="color:#FFD700; font-size:16px; font-variation-settings: 'FILL' 1;">star</span>
                        ${item.rating} (${item.jumlah_ulasan})
                    </div>
                    <h4>${item.nama_produk}</h4>
                    <p>${item.deskripsi}</p>
                    <div class="card-footer">
                        <span class="price">Rp.${parseInt(item.harga).toLocaleString('id-ID')}</span>
                        <button class="add-btn" onclick="addToCart('${item.nama_produk}', ${item.harga})">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                </div>
            </div>
        `}).join('');
    }

    async function addToCart(nama, harga) {
        const payload = {
            nama_dessert: nama,
            harga: harga,
            jumlah: 1
        };

        try {
            const response = await fetch(CART_API, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const result = await response.json();
            alert(result.message);
        } catch (err) {
            alert("Gagal menambahkan ke keranjang");
        }
    }

    fetchMenu();
</script>

</body>
</html>