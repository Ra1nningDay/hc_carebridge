<div class="container">
    <footer class="row justify-content-between align-items-center py-4 mb-4 border-top">
        <!-- Logo and Text -->
        <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
            <a href="/" class="me-2 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24" fill="currentColor">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="text-muted">© 2024 Chumphon Vocational College, HVC</span>
        </div>

        <!-- Social Media Icons -->
        <ul class="nav col-12 col-md-6 justify-content-center justify-content-md-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted social-icon" href="#">
                    <i class="bi bi-twitter"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted social-icon" href="#">
                    <i class="bi bi-instagram"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted social-icon" href="#">
                    <i class="bi bi-facebook"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>

<!-- Custom Styles -->
<style>
    .social-icon {
        font-size: 1.5rem;
        color: #6c757d;
        transition: color 0.3s;
    }

    .social-icon:hover {
        color: #e67e22;
    }

    footer {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .feedback-form {
        background-color: #f4f9fd;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #e3e3e3;
        margin-top: 20px;
    }

    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        gap: 5px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 2rem;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s, transform 0.3s;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffd700;
        transform: scale(1.2);
    }

    .star-rating input:checked ~ label {
        color: #ffa500;
    }
</style>
