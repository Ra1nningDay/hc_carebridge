<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Home Page</title>
    <style>
        /* Apply left margin to main content based on screen size */
        @media (max-width: 767.98px) {
            #main-content {
                margin-left: 215px; /* Full width of the sidebar */
            }
        }
        @media (min-width: 768px) {
            #main-content {
                margin-left: 215px; /* Full width of the sidebar */
            }
        }
    </style>
</head>
<body>

    @include('layouts.navigation')

    <div class="d-flex justify-content-center">
        <!-- Fixed Sidebar -->
        <div id="sidebar">
            @include('profile.partials.sidebar')
        </div>
        <!-- Main Content with Left Margin -->
        <div id="main-content" class="p-3">          
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        @include('profile.partials.update-personal-info-form')
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
