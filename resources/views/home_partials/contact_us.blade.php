<section class="position-relative py-5">
    <!-- Bottom Green Background -->
    <div class="half-background-bottom"></div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="card shadow border-0 p-5">
            <!-- Heading Section -->
            <div class="text-center mb-5">
                <h2 class="fw-bold contact-title">ติดต่อเรา</h2>
                <p class="text-muted fs-5">เราพร้อมที่จะเชื่อมต่อกับคุณ ส่งข้อความหาหรือมาเยี่ยมเราได้ตามสะดวก</p>
            </div>
            
            <!-- Content Section -->
            <div class="row g-4 align-items-stretch">
                <!-- Contact Info -->
                <div class="col-md-6">
                    <div class="bg-white rounded-3 p-4 shadow h-100 d-flex flex-column justify-content-between">
                        <div>
                            <p class="mb-3"><i class="fas fa-map-marker-alt text-success me-2"></i> 123, Rev Avenue, Kolabagan<br> Dhaka, 1205, BD</p>
                            <p class="mb-3"><i class="fas fa-phone-alt text-success me-2"></i> +81 2545258568</p>
                            <p class="mb-3"><i class="fas fa-phone-alt text-success me-2"></i> +81 2466322840</p>
                            
                            <div class="d-flex gap-3 mt-3">
                                <a href="#" class="text-success"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-linkedin fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-google fa-lg"></i></a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <img src="https://via.placeholder.com/300x200" class="img-fluid rounded-3" alt="Map Placeholder">
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-md-6">
                    <div class="bg-white rounded-3 p-4 shadow h-100">
                        <h3 class="mb-4" style="color: #467061;">ฝากข้อความถึงเรา</h3>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="ชื่อ" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="อีเมล" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="เขียนข้อความของคุณที่นี่" required></textarea>
                            </div>
                            <button type="submit" class="btn w-100 text-white" style="background-color: #467061;">ส่งข้อความ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styles for Contact Section -->
<style>
    /* Background split horizontally with green at the bottom */
    .half-background-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background-color: #003e29;
        z-index: 0;
    }

    /* Contact Container Styling */
    .contact-title {
        color: #467061;
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Text and Icons Styling */
    .contact-info i, .social-icons a {
        color: #467061;
    }

    .contact-info i {
        margin-right: 10px;
    }

    .social-icons a {
        font-size: 1.5rem;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #003e29;
    }

    /* Contact Form Styling */
    .contact-form h3 {
        color: #467061;
    }

    .contact-form button:hover {
        background-color: #003e29;
    }

    /* Card Styling */
    .card {
        background-color: #ffffff;
        border-radius: 15px;
    }
</style>

<!-- Font Awesome and Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
