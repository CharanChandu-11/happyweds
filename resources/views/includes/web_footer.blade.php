<!-- Modern Footer -->
<footer class="site-footer">
    <!-- Footer Top Section -->
    <div class="footer-top pt-0">
        <div class="container pt-4">
            <div class="row">
                <!-- Brand & Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="footer-brand">
                        <div class="footer-logo mb-3">
                            <i class="bi bi-heart-fill"></i>
                            <span class="footer-logo-text">HappilyWeds</span>
                        </div>
                        <p class="footer-description">
                            Your trusted partner in creating beautiful, memorable weddings. 
                            From planning to inspiration, we're here for every step of your journey.
                        </p>
                        <div class="footer-social mt-4">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Pinterest">
                                <i class="bi bi-pinterest"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="TikTok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/planning">Wedding Planning</a></li>
                        <li><a href="/inspiration">Inspiration</a></li>
                        <li><a href="/vendors">Vendors</a></li>
                        <li><a href="/real-weddings">Real Weddings</a></li>
                        <li><a href="/blog">Blog</a></li>
                    </ul>
                </div>

                <!-- Planning Tools -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-heading">Planning Tools</h4>
                    <ul class="footer-links">
                        <li><a href="/planning/checklist">Wedding Checklist</a></li>
                        <li><a href="/planning/budget">Budget Calculator</a></li>
                        <li><a href="/planning/guest-list">Guest List Manager</a></li>
                        <li><a href="/planning/seating">Seating Chart Tool</a></li>
                        <li><a href="/planning/timeline">Timeline Planner</a></li>
                        <li><a href="/planning/vendor-list">Vendor Checklist</a></li>
                    </ul>
                </div>

                <!-- Newsletter & Contact -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-heading">Stay Updated</h4>
                    <p class="footer-newsletter-text">
                        Get wedding tips, trends, and inspiration delivered to your inbox.
                    </p>
                    
                    <form class="newsletter-form mt-3" action="/newsletter/subscribe" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   placeholder="Your email address" 
                                   aria-label="Email address"
                                   required>
                            <button class="btn btn-newsletter" type="submit">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="privacyCheck" checked>
                            <label class="form-check-label" for="privacyCheck">
                                I agree to the privacy policy
                            </label>
                        </div>
                    </form>

                    <!-- Contact Info -->
                    <div class="footer-contact mt-4">
                        <div class="contact-item mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:info@happilyweds.com">info@happilyweds.com</a>
                        </div>
                        <div class="contact-item mb-2">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:+918557856150">(+91) 85578-56150</a>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-geo-alt me-2"></i>
                            <span>123 Wedding Avenue, NY 10001</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Middle - App Download & Awards -->
    <div class="footer-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="app-download">
                        <h5 class="mb-3">Download Our App</h5>
                        <div class="app-buttons">
                            <a href="#" class="app-btn app-store">
                                <i class="bi bi-apple"></i>
                                <div class="app-text">
                                    <span class="small">Download on the</span>
                                    <span class="large">App Store</span>
                                </div>
                            </a>
                            <a href="#" class="app-btn google-play">
                                <i class="bi bi-google-play"></i>
                                <div class="app-text">
                                    <span class="small">Get it on</span>
                                    <span class="large">Google Play</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-awards">
                        <h5 class="mb-3">Awards & Recognition</h5>
                        <div class="awards-grid">
                            <div class="award-item">
                                <i class="bi bi-award-fill"></i>
                                <span>Best Wedding Website 2023</span>
                            </div>
                            <div class="award-item">
                                <i class="bi bi-star-fill"></i>
                                <span>4.9/5 Customer Rating</span>
                            </div>
                            <div class="award-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Trusted Vendor Network</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="copyright">
                        &copy; {{ date('Y') }} HappilyWeds.com. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="footer-legal">
                        <a href="/privacy-policy" class="legal-link">Privacy Policy</a>
                        <a href="/terms-of-service" class="legal-link">Terms of Service</a>
                        <a href="/cookies" class="legal-link">Cookie Policy</a>
                        <a href="/sitemap" class="legal-link">Sitemap</a>
                        <button class="back-to-top" aria-label="Back to top">
                            <i class="bi bi-arrow-up"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>