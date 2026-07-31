<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impoks Management System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=syne:400,700,800|dm-sans:300,400,500&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('images/Logo.png')}}?v=1">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

    <!-- BACKGROUND EFFECTS -->
    <div class="noise"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- TOP BAR -->
    <header class="topbar">
        <div class="logo-mark">Impoks</div>
        @if (Route::has('login'))
        <nav class="nav-links">
            @auth
            <a href="{{ url('/home') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="primary">Get Started →</a>
            @endif
            @endauth
        </nav>
        @endif
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="eyebrow">
            <span class="eyebrow-dot"></span> Now Powered by Laravel
        </div>
        <h1 class="hero-title">
            Impoks<br><span class="grad">Management System</span>
        </h1>
        <p class="hero-sub">Smart. Fast. Secure. Built for modern operations at provincial and enterprise scale.</p>
        <div class="cta-group">
            @auth
            <a href="{{ url('/home') }}" class="btn solid">Go to Dashboard →</a>
            @else
            <a href="{{ route('login') }}" class="btn solid">Get Started →</a>
            <a href="#about" class="btn ghost">Learn More</a>
            @endauth
        </div>
    </section>

    <!-- WELCOME CARD -->
    <div class="card-section">
        <div class="welcome-card">
            <h2>Welcome Back 👋</h2>
            <p>
                Manage users, records, transactions, and reports in one powerful system.
                Designed for performance, scalability, and security using Laravel.
            </p>
            @auth
            <a href="{{ url('/home') }}" class="btn solid">Go to Dashboard →</a>
            @else
            <a href="{{ route('login') }}" class="btn solid">Get Started →</a>
            @endauth
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <section class="about-section" id="about">
        <div class="divider"></div>
        <p class="section-label">About the Platform</p>
        <p class="about-intro">
            The <strong>Impoks Management System</strong> is a modern web-based platform built using Laravel,
            designed to streamline operations such as user management, transactions, records, and reporting.
            A fast, secure, and scalable solution for digital management in provincial and enterprise environments.
        </p>
        <div class="about-grid">
            <div class="about-box">
                <div class="box-icon icon-a">⚡</div>
                <h3>Fast Performance</h3>
                <p>Optimized backend architecture for quick response and a smooth user experience across all devices.</p>
            </div>
            <div class="about-box">
                <div class="box-icon icon-b">🔐</div>
                <h3>Secure System</h3>
                <p>Built with Laravel's security features — authentication, hashing, and full CSRF protection.</p>
            </div>
            <div class="about-box">
                <div class="box-icon icon-c">📊</div>
                <h3>Smart Management</h3>
                <p>Handles users, transactions, and records in one centralized, purpose-built system.</p>
            </div>
        </div>
    </section>

    <!-- LOCATION SECTION -->
    <section class="location-section" id="location">
        <div class="divider"></div>
        <p class="section-label">Our Location</p>
        <h2 class="location-title">Find Us Here</h2>
        <p class="location-sub">We are based in <strong>Nahulid, Libagon, Southern Leyte</strong>, Philippines.</p>

        <div class="location-wrapper">

            <!-- INFO CARD -->
            <div class="location-info">
                <div class="loc-item">
                    <div class="loc-icon">📍</div>
                    <div>
                        <p class="loc-label">Address</p>
                        <p class="loc-value">Nahulid, Libagon<br>Southern Leyte, Philippines</p>
                    </div>
                </div>
                <div class="loc-item">
                    <div class="loc-icon">🕐</div>
                    <div>
                        <p class="loc-label">Office Hours</p>
                        <p class="loc-value">Sunday<br>1:00 PM – 5:00 PM</p>
                    </div>
                </div>
                <div class="loc-item">
                    <div class="loc-icon">🌐</div>
                    <div>
                        <p class="loc-label">Region</p>
                        <p class="loc-value">Eastern Visayas<br>Region VIII, Philippines</p>
                    </div>
                </div>
                <a
                    href="https://maps.google.com/?q=Nahulid,Libagon,Southern+Leyte,Philippines"
                    target="_blank"
                    class="btn solid directions-btn">
                    Get Directions →
                </a>
            </div>

            <!-- MAP EMBED -->
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.4!2d125.05808780000001!3d10.355785299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33071a944e65e499%3A0x1f5e9b0a3d9d63ab!2sNahulid%2C+Libagon%2C+Southern+Leyte!5e0!3m2!1sen!2sph!4v1"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Nahulid Libagon Southern Leyte Map"></iframe>
            </div>

        </div>
    </section>

    <!-- CREATOR SECTION -->
    <section class="creator-section" id="creator">
        <div class="divider"></div>
        <p class="section-label">Meet the Creator</p>
        <h2 class="creator-heading">Built by a Passionate Developer</h2>
        <p class="creator-sub">The mind and hands behind the Impoks Management System.</p>

        <div class="creator-card">
            <div class="creator-avatar-wrap">
                <div class="avatar-ring">
                    <img src="{{ asset('images/Jasper.jpg') }}"
                        alt="User Avatar"
                        class="avatar-image">
                </div>
                <div class="avatar-glow"></div>
            </div>

            <div class="creator-info">
                <div class="creator-badge">👨‍💻 Project Creator</div>
                <h3 class="creator-name">John Jasper Pelias Gatila</h3>
                <p class="creator-role">Full Stack Developer</p>
                <p class="creator-bio">
                    Designed and developed the <strong>Impoks Management System</strong> from the ground up —
                    architecting the backend with Laravel, crafting a seamless user experience,
                    and delivering a secure, scalable solution for modern digital operations.
                </p>
                <div class="creator-tags">
                    <span class="tag tag-laravel">Laravel</span>
                    <span class="tag tag-php">PHP</span>
                    <span class="tag tag-mysql">MySQL</span>
                    <span class="tag tag-fullstack">Full Stack</span>
                    <span class="tag tag-uiux">UI/UX</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="site-footer">
        <p>© {{ date('Y') }} Impoks Management System. Crafted by <strong>John Jasper Pelias Gatila</strong>. Built with Laravel.</p>
    </footer>

</body>

</html>