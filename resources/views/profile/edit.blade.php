<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Home Page</title>
</head>
<body>

    @include('layouts.navigation')

    <div class="container my-5">
        <h2 class="font-semibold text-xl text-center mb-4">
            {{ __('Profile') }}
        </h2>

        <div class="row g-4">   
            <div class="col-lg-8 mx-auto"> 
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
                        @include('profile.partials.update-personal-info-form') <!-- ฟอร์มข้อมูลส่วนตัวเพิ่มเติม -->
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
