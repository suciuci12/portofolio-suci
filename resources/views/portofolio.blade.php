<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portofolio — {{ $name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- LOAD CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

@php
    $initials = strtoupper(substr($name, 0, 2));
@endphp

<div class="container">

    <!-- HEADER -->
    <header>
        <div class="header-inner">
            <div class="logo">{{ strtoupper($name) }} <span>•</span></div>
            <nav>
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section id="home" class="hero reveal">
        <div>
            <div class="tag">
                <span></span> Available for freelance
            </div>

            <h1 class="hero-title">Hi, saya {{ $name }}.</h1>
            <div class="hero-role">{{ $role }}</div>
            <p class="hero-text">{{ $about }}</p>

            <div class="hero-actions">
                <a href="mailto:Sucican12.com" class="btn-primary">
                    ✉ Contact Me
                </a>
                <a href="#projects" class="btn-ghost">
                    ↓ Lihat project
                </a>
            </div>

            <div class="social-links">
                <a class="social-link" href="https://www.instagram.com/manuli_lilya" target="_blank">📸 Instagram</a>
                <a class="social-link" href="https://github.com/suciuci12" target="_blank">💻 GitHub</a>
                <a class="social-link" href="https://linkedin.com/in/suciuci12" target="_blank">🔗 LinkedIn</a>
                <a class="social-link" href="https://tiktok.com/@manuli_lilya" target="_blank">🎵 TikTok</a>
            </div>
        </div>

        <!-- AVATAR FLIP CARD -->
        <div class="flip-wrapper reveal">
            <div class="flip-card">
                <div class="flip-face flip-front">
                    <div class="avatar-circle"><img src="{{ asset('assets/suci.jpg') }}" alt="foto" /></div>
                    <div class="avatar-caption">Suci Indah Sari</div>
                </div>

                <div class="flip-face flip-back">
                    <h3>{{ $name }}</h3>
                    <p>{{ $role }}</p>

                    <div class="social-mini">
                        <a href="https://instagram.com/manuli_lilya" target="_blank">📸</a>
                        <a href="https://github.com/suciuci12" target="_blank">💻</a>
                        <a href="https://linkedin.com/in/suciuci12" target="_blank">🔗</a>
                    </div>

                    <p class="small-contact">Contact: sucican12@gmail.com</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="grid grid-2">
        <div class="card reveal">
            <div class="card-title">About</div>
            <p class="card-text">{{ $about }}</p>
        </div>

        <div id="skills" class="card reveal">
            <div class="card-title">Skills</div>
            <div class="skills-list">
                @foreach ($skills as $skill)
                    <div class="skill-pill">{{ $skill }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="grid">
        <div class="card reveal">
            <div class="card-title">Selected Projects</div>
            @foreach ($projects as $project)
                <div class="project-item">
                    <strong>{{ $project['title'] }}</strong>
                    <div class="card-text">{{ $project['description'] }}</div>

                    @if ($project['link'] !== '#')
                        <a href="{{ $project['link'] }}" target="_blank">View project →</a>
                    @else
                        <a href="#">Demo belum tersedia</a>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <footer class="reveal">
        &copy; {{ date('Y') }} {{ $name }}. Dibuat dengan Laravel 11.
    </footer>

</div>

<!-- Scroll to top -->
<div id="scrollTopBtn">↑</div>

<script>
    const btn = document.getElementById("scrollTopBtn");
    const navLinks = document.querySelectorAll("nav a");
    const reveals = document.querySelectorAll(".reveal");
    const sections = document.querySelectorAll("section");

    window.addEventListener("scroll", () => {
        btn.classList.toggle("visible", window.scrollY > 230);

        let current = "";
        sections.forEach(sec => {
            if (window.scrollY >= sec.offsetTop - 150) {
                current = sec.id;
            }
        });

        navLinks.forEach(a => {
            a.classList.toggle("active", a.getAttribute("href") === `#${current}`);
        });
    });

    btn.onclick = () => window.scrollTo({ top: 0, behavior: "smooth" });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add("visible");
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.2 });

    reveals.forEach(el => observer.observe(el));
</script>

</body>
</html>
