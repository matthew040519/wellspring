<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellspring Nutra Corp | Longevity Engineered</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;800&family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1e3d1a;
            --mid-green: #2d5a27;
            --light-green: #f4f9f3;
            --accent-gold: #b89146; 
            --promo-orange: #ff7a50; 
            --text-dark: #121212;
            --white: #ffffff;
        }

        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; margin: 0; color: var(--text-dark); line-height: 1.7; scroll-behavior: smooth; }

        /* Navigation */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 8%;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .logo-container { display: flex; align-items: center; gap: 15px; }
        .brand-logo { height: 50px; width: auto; }
        nav a { margin-left: 25px; text-decoration: none; color: var(--text-dark); font-size: 0.75rem; font-weight: 800; letter-spacing: 1px; transition: 0.3s; text-transform: uppercase; }
        nav a:hover { color: var(--accent-gold); }

        /* Hero Section with Video Background */
        .hero {
            position: relative;
            height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            overflow: hidden; /* Clips the video */
        }

        .video-background {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -2;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45); /* Darkens video for text readability */
            z-index: -1;
        }

        .hero-content { max-width: 900px; z-index: 1; padding: 0 5%; }
        .hero h1 { font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; line-height: 1.1; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.3); }
        .hero p { font-size: 1.2rem; margin-bottom: 30px; font-weight: 300; opacity: 0.95; text-shadow: 0 1px 5px rgba(0,0,0,0.3); }

        .btn-main {
            background: var(--accent-gold);
            color: white;
            padding: 16px 40px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
            transition: 0.4s;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
        }
        .btn-main:hover { background: var(--primary-green); transform: translateY(-2px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }

        /* Rest of the styles remain the same */
        .purpose-section { padding: 80px 8%; background: var(--light-green); display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .purpose-card { padding: 40px; background: white; border-radius: 12px; text-align: center; border: 1px solid #eef2ed; }
        .purpose-card h2 { color: var(--primary-green); margin-bottom: 15px; font-size: 1.5rem; }

        .promo-spotlight { padding: 80px 8%; background: var(--white); text-align: center; }
        .promo-container { max-width: 1000px; margin: 0 auto; position: relative; }
        .promo-image { width: 100%; height: auto; border-radius: 15px; box-shadow: 0 25px 50px rgba(0,0,0,0.1); }
        .badge-organic { background: var(--promo-orange); color: white; padding: 5px 15px; border-radius: 20px; font-size: 0.7rem; font-weight: bold; position: absolute; top: 20px; right: 20px; z-index: 5; }

        .science-section { padding: 100px 8%; background: var(--white); }
        .section-header { text-align: center; margin-bottom: 60px; }
        .science-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .science-card { padding: 30px; border-bottom: 3px solid var(--light-green); transition: 0.3s; }
        .science-card:hover { border-color: var(--accent-gold); background: var(--light-green); }

        .stockist-section { background: var(--primary-green); color: var(--white); padding: 100px 8%; }
        .stockist-container { display: flex; flex-wrap: wrap; align-items: center; gap: 60px; }
        .stockist-text { flex: 1; min-width: 320px; }
        .stockist-text h2 { font-size: 2.8rem; margin-bottom: 20px; color: var(--accent-gold); }
        .stockist-benefits { list-style: none; padding: 0; margin: 30px 0; }
        .stockist-benefits li { margin-bottom: 12px; display: flex; align-items: center; }
        .stockist-benefits li::before { content: '✓'; color: var(--accent-gold); margin-right: 15px; font-weight: bold; }
        .stockist-form { flex: 1; min-width: 320px; background: var(--white); padding: 40px; border-radius: 8px; color: var(--text-dark); }
        .stockist-form input, .stockist-form select { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }

        .faq-section { padding: 100px 8%; max-width: 900px; margin: 0 auto; }
        .faq-item { border-bottom: 1px solid #eee; padding: 20px 0; cursor: pointer; }
        .faq-trigger { font-weight: 700; display: flex; justify-content: space-between; align-items: center; color: var(--primary-green); }
        .faq-answer { display: none; padding-top: 15px; color: #666; font-size: 0.9rem; }

        footer { background: #0a1508; color: white; padding: 80px 8% 40px; text-align: center; }
        .footer-logo { height: 80px; margin-bottom: 25px; filter: brightness(0) invert(1); }

        @media (max-width: 768px) {
            header { flex-direction: column; padding: 20px; }
            nav { margin-top: 20px; gap: 10px; display: flex; flex-wrap: wrap; justify-content: center; }
            .hero h1 { font-size: 2.2rem; }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="WELLSPRING_LOGO.png" alt="Wellspring Nutra Logo" class="brand-logo">
        </div>
        <nav>
            <a href="#about">About</a>
            <a href="#featured">Featured Deals</a>
            <a href="#science">Science</a>
            <a href="#stockist">Stockist Program</a>
            <a href="#faq">FAQ</a>
        </nav>
    </header>

    <section class="hero">
        <video autoplay muted loop playsinline class="video-background">
            <source src="Cellmax MD Vid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>BIO-ENGINEERING<br>FOR LONGEVITY.</h1>
            <p>Elevate your wellness with physician-inspired protocols and high-purity antioxidants.</p>
            <a href="#featured" class="btn-main">View Promotion</a>
        </div>
    </section>

    <section id="about" class="purpose-section">
        <div class="purpose-card">
            <h2>Our Mission</h2>
            <p>To bridge the gap between clinical biotechnology and daily nourishment, delivering nitrogen-flushed, bio-available formulas that target cellular potential.</p>
        </div>
        <div class="purpose-card">
            <h2>Our Vision</h2>
            <p>To be the gold standard in the Philippine longevity market, fostering an ecosystem where cellular health is the foundation of every thriving life.</p>
        </div>
    </section>

    <section id="featured" class="promo-spotlight">
        @if (session('error'))
                                                                                            <div style="color: #b94a48; background: #f2dede; border: 1px solid #ebccd1; padding: 10px 15px; border-radius: 4px; margin-bottom: 18px; text-align: left;">
                                                                                                <strong>Whoops! Something went wrong.</strong>
                                                                                                <p>{{ session('error') }}</p>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if(session('success'))
                                                                                            <div style="color: #3c763d; background: #dff0d8; border: 1px solid #d6e9c6; padding: 10px 15px; border-radius: 4px; margin-bottom: 18px; text-align: left;">
                                                                                                <strong>Success!</strong>
                                                                                                <p>{{ session('success') }}</p>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if($errors->any())
                                                                                            <div style="color: #b94a48; background: #f2dede; border: 1px solid #ebccd1; padding: 10px 15px; border-radius: 4px; margin-bottom: 18px; text-align: left;">
                                                                                                <strong>Whoops! Something went wrong.</strong>
                                                                                                <ul style="margin-top: 10px;">
                                                                                                    @foreach ($errors->all() as $error)
                                                                                                        <li>{{ $error }}</li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        @endif
        @foreach ($products as $product)
                <div class="section-header">
            <h2 style="color: var(--promo-orange); font-size: 2.5rem;">{{ $product->name }}</h2>
            <p style="font-family: 'Lora', serif; font-style: italic;">Elevate Your Wellness with {{ $product->name }}</p>
        </div>
        <div class="promo-container">
            <div class="badge-organic">CERTIFIED ORGANIC</div>
            
            <img src="{{ asset('storage/product_images/' . $product->image) }}" alt="{{ $product->name }} Promotional Deal" class="promo-image">
            <div style="margin-top: 30px;">
                 
                                <button id="orderNowBtn{{ $product->id }}" class="btn-main" style="background: var(--promo-orange);">Order Now</button>
                                <!-- Modal -->
                                <div id="orderModal{{ $product->id }}" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; overflow:auto; background:rgba(0,0,0,0.4);">
                                    <div class="modal-content" style="background:#fff; margin:10% auto; padding:30px 20px; border-radius:10px; max-width:400px; position:relative; box-shadow:0 4px 24px rgba(0,0,0,0.2); text-align:center;">
                                        <span id="closeModal{{ $product->id }}" style="position:absolute;top:10px;right:18px;font-size:2rem;cursor:pointer;">&times;</span>
                                        <h3 style="margin-bottom:18px; color:var(--promo-orange);">Order {{ $product->name }}</h3>
                                        <form method="POST" action="{{ route('buy-product') }}" enctype="multipart/form-data">
                                                                                       
                                            @csrf
                                            <div style="margin-bottom: 18px;">
                                                <label for="username" style="display:block; margin-bottom:6px;">Username:</label>
                                                <input type="text" id="username" name="username" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                                            </div>
                                            <div style="margin-bottom: 18px;">
                                                <label for="file" style="display:block; margin-bottom:6px;">Choose file:</label>
                                                <input type="file" id="file" name="file" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px; background:#f9f9f9; cursor:pointer;">
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn-main" style="width:100%;">Upload</button>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var modal = document.getElementById("orderModal<?php echo $product->id; ?>");
                                    var btn = document.getElementById("orderNowBtn<?php echo $product->id; ?>");
                                    var span = document.getElementById("closeModal<?php echo $product->id; ?>");
                                    btn.onclick = function() { modal.style.display = 'block'; };
                                    span.onclick = function() { modal.style.display = 'none'; };
                                    window.onclick = function(event) {
                                        if (event.target == modal) { modal.style.display = 'none'; }
                                    }
                                });
                                </script>
            </div>
        </div>
        @endforeach
        
    </section>

    <section id="science" class="science-section">
        <div class="section-header">
            <h2 style="text-align:center">The Wellspring Science</h2>
        </div>
        <div class="science-grid">
            <div class="science-card">
                <h3 style="color:var(--accent-gold)">DNA Repair</h3>
                <p>Supporting the NAD+ pathways crucial for genetic integrity and metabolic energy.</p>
            </div>
            <div class="science-card">
                <h3 style="color:var(--accent-gold)">Senolytic Action</h3>
                <p>Designed to target and clear senescent cells, reducing the systemic biological age markers.</p>
            </div>
            <div class="science-card">
                <h3 style="color:var(--accent-gold)">Stability Control</h3>
                <p>Utilizing nitrogen-flushed amber glass to prevent oxidation of delicate ingredients like Resveratrol.</p>
            </div>
        </div>
    </section>

    <section id="stockist" class="stockist-section">
        <div class="stockist-container">
            <div class="stockist-text">
                <h2>Join our Stockist Program</h2>
                <p>Partner with Wellspring Nutra Corp to bring premium cellular health to your local community in Roxas City, Capiz, and beyond.</p>
                <ul class="stockist-benefits">
                    <li>Exclusive Wholesale Tier Pricing</li>
                    <li>PHXView Ecosystem Support</li>
                    <li>Marketing & POS Toolkits</li>
                </ul>
            </div>
            <div class="stockist-form">
                <h3 style="margin-bottom: 20px;">Partner Application</h3>
                <form>
                    <input type="text" placeholder="Full Name / Business" required>
                    <input type="email" placeholder="Email Address" required>
                    <input type="tel" placeholder="Contact Number" required>
                    <select required>
                        <option value="">Select Territory</option>
                        <option value="roxas">Roxas City / Capiz</option>
                        <option value="iloilo">Iloilo / Panay</option>
                        <option value="manila">Metro Manila</option>
                    </select>
                    <button type="submit" class="btn-main" style="width: 100%; border-radius: 0;">Apply Now</button>
                </form>
            </div>
        </div>
    </section>

    <section id="faq" class="faq-section">
        <h2 style="text-align: center; color: var(--primary-green); margin-bottom: 40px;">Frequently Asked Questions</h2>
        <div class="faq-item" onclick="toggleFaq(this)">
            <div class="faq-trigger">What is Cellmax-MD? <span>+</span></div>
            <div class="faq-answer">Cellmax-MD is a premium cellular regeneration protocol designed to combat aging markers and boost daily vitality through organic, high-purity ingredients.</div>
        </div>
        <div class="faq-item" onclick="toggleFaq(this)">
            <div class="faq-trigger">Is this available in Roxas City? <span>+</span></div>
            <div class="faq-answer">Yes, we are currently expanding our local stockist network in Roxas City. Local delivery is available via our PHXView partnership.</div>
        </div>
        <div class="faq-item" onclick="toggleFaq(this)">
            <div class="faq-trigger">Are these certified organic? <span>+</span></div>
            <div class="faq-answer">Absolutely. We use 100% organic-sourced food supplements, third-party tested for purity and potency.</div>
        </div>
    </section>

    <footer>
        <img src="WELLSPRING_LOGO.png" alt="Wellspring Nutra" class="footer-logo">
        <p style="letter-spacing: 2px; font-weight: bold; margin-bottom: 15px;">CERTIFIED ORGANIC | GMP CERTIFIED | FDA REGISTERED</p>
        <p style="opacity: 0.6; font-size: 0.8rem;">
            &copy; 2026 Wellspring Nutra Corp. | Arnaldo Boulevard, Roxas City, Capiz<br>
            A PHXView Ecosystem Partner | www.phxview.com
        </p>
    </footer>

    <script>
        function toggleFaq(el) {
            const ans = el.querySelector('.faq-answer');
            const span = el.querySelector('span');
            const isOpen = ans.style.display === 'block';
            
            document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
            document.querySelectorAll('.faq-trigger span').forEach(s => s.textContent = '+');

            if (!isOpen) {
                ans.style.display = 'block';
                span.textContent = '−';
            }
        }
    </script>
</body>
</html>