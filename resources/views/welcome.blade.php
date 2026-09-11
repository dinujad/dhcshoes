<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="DHC Footwear — luxury premium shoes crafted in black, signed in red.">
        <title>DHC Footwear</title>
        <link rel="icon" href="{{ asset('images/dhc-logo.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,600;0,800;1,800&family=Cormorant+Garamond:ital,wght@0,500;1,500&family=Oswald:wght@700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>
    <body class="home">
        <a class="skip-link" href="#main">Skip to content</a>
        <div class="atmosphere" aria-hidden="true">
            <span class="orb orb-red"></span>
            <span class="orb orb-soft"></span>
        </div>

        <header class="site-header" id="siteHeader">
            <nav class="nav glass" id="siteNav" aria-label="Primary">
                <a class="brand" href="#top">
                    <img class="brand-logo" src="{{ asset('images/dhc-logo.png') }}" alt="DHC Footwear">
                </a>

                <ul class="nav-links">
                    <li><a href="#collection">Collection</a></li>
                    <li><a href="#atelier">Atelier</a></li>
                    <li><a href="#lookbook">Lookbook</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

                <a class="btn btn-red nav-cta" href="#collection">Shop</a>
                <button class="nav-toggle" id="navToggle" type="button" aria-expanded="false" aria-label="Open menu">
                    <span></span>
                </button>
                </nav>
        </header>

        <main id="main">
            <section class="hero" id="top">
                <div class="hero-panel glass">
                    <img class="logo-lockup" src="{{ asset('images/dhc-logo.png') }}" alt="DHC Footwear">
                    <div class="hairline"></div>
                    <p class="eyebrow">Luxury premium footwear</p>
                    <h1>Walk in <em>quiet</em> distinction.</h1>
                    <p class="lead">An atelier of modern silhouettes. Transparent layers, black structure, and a signature red — the colours of DHC, worn with restraint.</p>
                    <div class="hero-actions">
                        <a class="btn btn-red" href="#collection">Explore collection</a>
                        <a class="btn btn-ghost" href="#atelier">The atelier</a>
                    </div>
                </div>
            </section>

            <div class="marquee" aria-hidden="true">
                <div class="marquee-track">
                    <span>Signature</span><span><b>DHC</b></span><span>Atelier</span><span>Limited</span><span>Hand finished</span><span>Black</span><span>Red</span>
                    <span>Signature</span><span><b>DHC</b></span><span>Atelier</span><span>Limited</span><span>Hand finished</span><span>Black</span><span>Red</span>
                </div>
            </div>

            <section class="section" id="collection">
                <div class="section-head">
                    <div>
                        <p class="section-kicker">Collection</p>
                        <h2>Forms that linger.</h2>
                    </div>
                    <p class="section-note">Three chapters. One language of proportion, leather, and light.</p>
                </div>
                <div class="cards">
                    <article class="card glass">
                        <div class="card-visual"><span class="shoe"></span></div>
                        <div class="card-top">
                            <span>01</span>
                            <h3>Signature</h3>
                        </div>
                        <div class="card-body">
                            <p>Daily architecture. Clean last, silent sole, a presence that does not need to speak.</p>
                            <a class="card-link" href="#contact">View signature</a>
                        </div>
                    </article>
                    <article class="card glass">
                        <div class="card-visual"><span class="shoe"></span></div>
                        <div class="card-top">
                            <span>02</span>
                            <h3>Evening</h3>
                        </div>
                        <div class="card-body">
                            <p>Polished lines for after dark. A deeper black, a restrained flash of red.</p>
                            <a class="card-link" href="#contact">View evening</a>
                        </div>
                    </article>
                    <article class="card glass">
                        <div class="card-visual"><span class="shoe"></span></div>
                        <div class="card-top">
                            <span>03</span>
                            <h3>Limited</h3>
                        </div>
                        <div class="card-body">
                            <p>Numbered pairs, seldom repeated. Made for collectors of the quiet kind.</p>
                            <a class="card-link" href="#contact">View limited</a>
                        </div>
                    </article>
                </div>
            </section>

            <section class="section" id="atelier">
                <div class="editorial">
                    <div class="editorial-copy glass">
                        <p class="section-kicker">Atelier</p>
                        <h2>Crafted to be felt, not announced.</h2>
                        <p>DHC is built on a simple palette: black for structure, red for signature, light for space. Every pair is finished by hand, then left uncluttered — luxury as transparency, not noise.</p>
                        <div class="stats">
                            <div><strong>01</strong><span>Atelier last</span></div>
                            <div><strong>12</strong><span>Hour finish</span></div>
                            <div><strong>∞</strong><span>Quiet steps</span></div>
                        </div>
                    </div>
                    <div class="editorial-frame glass" id="lookbook">
                        <img class="logo-lockup logo-lockup-frame" src="{{ asset('images/dhc-logo.png') }}" alt="">
                    </div>
                </div>
            </section>

            <section class="cta-band glass" id="contact">
                <p class="eyebrow">Private client</p>
                <h2>Request the lookbook.</h2>
                <p>Tell us your size, your city, and the chapter you want — Signature, Evening, or Limited. We answer with care, not haste.</p>
                <a class="btn btn-red" href="mailto:hello@dhcfootwear.com">hello@dhcfootwear.com</a>
            </section>
            </main>

        <footer class="site-footer glass">
            <a class="brand" href="#top">
                <img class="brand-logo brand-logo-footer" src="{{ asset('images/dhc-logo.png') }}" alt="DHC Footwear">
            </a>
            <div class="footer-grid">
                <div>
                    <h4>House</h4>
                    <a href="#collection">Collection</a>
                    <a href="#atelier">Atelier</a>
                    <a href="#lookbook">Lookbook</a>
                </div>
                <div>
                    <h4>Client</h4>
                    <a href="#contact">Private client</a>
                    <a href="mailto:hello@dhcfootwear.com">Email</a>
                    <p>By appointment</p>
                </div>
                <div>
                    <h4>Palette</h4>
                    <p>Black / Red / Light</p>
                    <p>Transparent layers</p>
                    <p>Premium finish</p>
                </div>
        </div>
            <div class="legal">© {{ date('Y') }} DHC Footwear. All rights reserved.</div>
        </footer>

        <script>
            const header = document.getElementById('siteHeader');
            const nav = document.getElementById('siteNav');
            const toggle = document.getElementById('navToggle');

            window.addEventListener('scroll', () => {
                header.classList.toggle('is-scrolled', window.scrollY > 12);
            });

            toggle.addEventListener('click', () => {
                const open = nav.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            });

            nav.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => nav.classList.remove('is-open'));
            });
        </script>
    </body>
</html>
