<section style="background-color: #f4f4f4; padding: 100px 0; margin-bottom: 72px; position: relative; overflow: hidden;">
    <div class="container-fluid text-center">
        <!-- Background Shape -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(255, 127, 80, 0.15), rgba(0, 0, 0, 0.02)); z-index: 1; pointer-events: none;"></div>
        
        <!-- Content -->
        <div class="position-relative" style="z-index: 2;">
            <h2 class="fs-1 mb-4 fw-bold" style="color: #2c3e50;">Find Great Care for Your Loved Ones</h2>
            <p class="mb-4 text-muted fs-5">
                Easily connect with trusted caregivers nearby. Let us help you provide the best care.
            </p>
            <a href="/gps" class="btn btn-lg btn-primary btn-find-caregiver">Find a caregiver now</a>
        </div>
    </div>
</section>

<style>
    /* Button Styling */
    .btn-find-caregiver {
        background-color: #ff7f50;
        border-color: #ff7f50;
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 8px;
        font-size: 1.25rem;
        font-weight: bold;
        box-shadow: 0 8px 15px rgba(255, 127, 80, 0.3);
        transition: all 0.3s ease;
    }
    .btn-find-caregiver:hover {
        background-color: #ff5a36;
        border-color: #ff5a36;
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(255, 90, 54, 0.4);
    }

    /* Section Styling */
    section {
        position: relative;
        overflow: hidden;
    }

    /* Animated Shapes (Optional) */
    section::before,
    section::after {
        content: '';
        position: absolute;
        background: rgba(255, 127, 80, 0.1);
        z-index: 0;
        border-radius: 50%;
        animation: floating 8s infinite ease-in-out;
    }
    section::before {
        width: 200px;
        height: 200px;
        top: 10%;
        left: 15%;
    }
    section::after {
        width: 150px;
        height: 150px;
        bottom: 15%;
        right: 20%;
    }

    /* Floating Animation */
    @keyframes floating {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(20px);
        }
        100% {
            transform: translateY(0px);
        }
    }
</style>
