<section class="newsletter">
    <div class="wrap newsletter-inner">
        <img src="{{ asset('images/products/p4.png') }}" alt="">
        <div>
            <h2>Stay ahead, step up!</h2>
            <p>Subscribe to our newsletter and get exclusive offers, new arrivals and style updates.</p>
        </div>
        <form class="news-form" action="{{ route('home') }}" method="get">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>
</section>
