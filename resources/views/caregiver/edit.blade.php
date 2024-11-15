<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit Caregiver Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            max-width: 900px;
            margin: auto;
            border-radius: 12px;
            overflow: hidden;
        }
        .card-header {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>

    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center py-3">
            <h3 class="h5 fw-bold mb-0">Edit Caregiver Profile</h3>
        </div>
        <div class="card-body px-4">
            <p class="text-muted text-center mb-4">
                Update your caregiver profile information to provide accurate and helpful details.
            </p>

            <form action="{{ route('caregiver.update') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PATCH')

                <!-- Specialization -->
                <div class="mb-4">
                    <label for="specialization" class="form-label fw-semibold">Specialization</label>
                    <input type="text" class="form-control rounded-pill px-3 py-2" id="specialization" name="specialization" value="{{ $caregiver->specialization }}" required>
                    @error('specialization')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Experience -->
                <div class="mb-4">
                    <label for="experience_years" class="form-label fw-semibold">Experience (Years)</label>
                    <input type="number" class="form-control rounded-pill px-3 py-2" id="experience_years" name="experience_years" value="{{ $caregiver->experience_years }}" required>
                    @error('experience_years')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Location -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="latitude" class="form-label fw-semibold">Latitude</label>
                        <input type="text" class="form-control rounded-pill px-3 py-2" id="latitude" name="latitude" value="{{ $caregiver->latitude }}" readonly>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="longitude" class="form-label fw-semibold">Longitude</label>
                        <input type="text" class="form-control rounded-pill px-3 py-2" id="longitude" name="longitude" value="{{ $caregiver->longitude }}" readonly>
                    </div>
                </div>

                <!-- Update Location Button -->
                <div class="d-flex justify-content-center mb-4">
                    <button type="button" id="update-location-btn" class="btn btn-info rounded-pill px-4">Update Location</button>
                </div>

                <!-- Map Preview -->
                <div class="mb-4">
                    <iframe 
                        id="map-preview" 
                        width="100%" 
                        height="300" 
                        frameborder="0" 
                        class="rounded"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q={{ $caregiver->latitude ?? 13.736717 }},{{ $caregiver->longitude ?? 100.523186 }}">
                    </iframe>
                </div>

                <!-- Save Changes Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&callback=initMap" async defer></script>
    <script>
        let map, marker;

        function initMap() {
            const initialPosition = {
                lat: {{ $caregiver->latitude ?? 13.736717 }},
                lng: {{ $caregiver->longitude ?? 100.523186 }}
            };

            map = new google.maps.Map(document.getElementById('map-preview'), {
                center: initialPosition,
                zoom: 15,
            });

            marker = new google.maps.Marker({
                position: initialPosition,
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                const position = marker.getPosition();
                document.getElementById('latitude').value = position.lat();
                document.getElementById('longitude').value = position.lng();
            });
        }

        document.getElementById('update-location-btn').addEventListener('click', () => {
            const position = marker.getPosition();
            document.getElementById('latitude').value = position.lat();
            document.getElementById('longitude').value = position.lng();
            alert("Location updated successfully!");
        });
    </script>
</body>
</html>
