<section class="services-section" style="margin-bottom: 72px;">
    <div class="container">
        <div class="row g-3">
            <!-- Service Card 1 -->
            <div class="col-md-4">
                <div class="services-card h-100 text-center p-4 shadow-sm border-0 rounded-4 position-relative">
                    <div class="services-icon mb-3">
                        <img src="{{ asset('images/icons/healthcare.png') }}" width="60" height="60" alt="Icon" class="img-fluid">
                    </div>
                    <h5 class="services-title fw-bold mb-3">Professional Caregivers</h5>
                    <p class="services-text text-muted mt-2">Our experienced caregivers provide compassionate and personalized support to ensure the highest quality of life and peace of mind for you and your loved ones.</p>
                    <div class="pt-2 pb-3">
                        <a href="#" class="services-btn text-decoration-none btn-sm px-4 py-1 rounded-5">Learn More</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Card 2 -->
            <div class="col-md-4">
                <div class="services-card h-100 text-center p-4 shadow-sm border-0 rounded-4 position-relative">
                    <div class="services-icon mb-3">
                        <img src="{{ asset('images/icons/handshake.png') }}" width="60" height="60" alt="Icon" class="img-fluid">
                    </div>
                    <h5 class="services-title fw-bold mb-3">Community Engagement</h5>
                    <p class="services-text text-muted mt-2">Building a supportive network, our community engagement initiatives foster strong relationships and provide valuable resources for all stakeholders involved.</p>
                    <div class="pt-2 pb-3">
                        <a href="#" class="services-btn text-decoration-none btn-sm px-4 py-1 rounded-5">Learn More</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Card 3 -->
            <div class="col-md-4">
                <div class="services-card h-100 text-center p-4 shadow-sm border-0 rounded-4 position-relative">
                    <div class="services-icon mb-3">
                        <img src="https://via.placeholder.com/60" alt="Icon" class="img-fluid">
                    </div>
                    <h5 class="services-title fw-bold mb-3">Smart Chatbot Assistance</h5>
                    <p class="services-text text-muted mt-2">Our advanced chatbot technology offers 24/7 support, answering your questions and providing guidance to make accessing services quick and efficient.</p>
                    <div class="pt-2 pb-3">
                        <a href="#" class="services-btn text-decoration-none btn-sm px-4 py-1 rounded-5">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Services Card Hover Effect */
    .services-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .services-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Services Icon Styling */
    .services-icon img {
        width: 60px;
        height: 60px;
    }

    /* Services Title Styling */
    .services-title {
        color: #2c3e50;
    }

    /* Services Button Styling */
    .services-btn {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        border: none;
        color: #ffffff;
        transition: all 0.3s ease;
    }
    .services-btn:hover {
        background: linear-gradient(135deg, #e67e22, #f39c12);
        transform: scale(1.05);
    }

    /* Services Text */
    .services-text {
        color: #6c757d; /* More subtle muted color */
    }
</style>
