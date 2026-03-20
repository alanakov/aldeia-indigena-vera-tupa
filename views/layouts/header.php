<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aldeia — Verá Tupã'i</title>
    <meta name="description" content="Bem-vindo à nossa comunidade indígena. Conheça nossa história, cultura e artesanato produzido com tradição e identidade.">
    <link rel="stylesheet" href="../public/assets/css/main.css">
</head>
<body>

<header class="header">
    <div class="container">
        <div class="header__inner">

            <!-- Logo -->
            <a href="#home" class="header__logo">
                <div class="header__logo-icon">
                    <div class="logo-inner"></div>
                </div>
                <div class="header__logo-text">
                    <strong>Aldeia</strong>
                    <small>Verá Tupã'i</small>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="header__nav">
                <a href="#home">Início</a>
                <a href="#about">Nossa História</a>
                <a href="#products">Artesanato</a>
                <a href="#contact">Contato</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="header__menu-toggle" id="menuToggle" aria-label="Abrir menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="header__mobile-nav" id="mobileNav">
        <ul class="header__mobile-nav__list">
            <li><a href="#home">Início</a></li>
            <li><a href="#about">Nossa História</a></li>
            <li><a href="#products">Artesanato</a></li>
            <li><a href="#contact">Contato</a></li>
        </ul>
    </div>
</header>

<script>
    // Simple mobile menu toggle
    var toggle = document.getElementById('menuToggle');
    var mobileNav = document.getElementById('mobileNav');

    toggle.addEventListener('click', function () {
        mobileNav.classList.toggle('is-open');
    });

    // Close menu when a link is clicked
    mobileNav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            mobileNav.classList.remove('is-open');
        });
    });
</script>
