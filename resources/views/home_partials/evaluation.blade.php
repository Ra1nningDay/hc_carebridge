<div class="feedback-section py-5 position-relative" style="background-color: #f9f9f9; margin-bottom: 72px; overflow: hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at center, rgba(70, 112, 97, 0.1), rgba(0, 0, 0, 0.02)); z-index: 1; pointer-events: none;"></div>
    <div class="container position-relative" style="z-index: 2;">
        <h5 class="text-primary text-center mb-4 fw-bold" style="font-size: 1.8rem;">คุณรู้สึกอย่างไรกับบริการของเรา?</h5>
        <p class="text-muted text-center mb-5" style="font-size: 1rem;">เราให้ความสำคัญกับความคิดเห็นของคุณ กรุณาให้คะแนนและแสดงความคิดเห็นเพิ่มเติม</p>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('ratings.update') }}" method="POST" class="mx-auto" style="max-width: 720px;">
            @csrf
            @method('PUT')

            @foreach ($evaluationTopics as $topic)
                @php
                    $userRating = $topic->ratings->where('user_id', auth()->id())->first();
                @endphp

                @if ($userRating)
                    <!-- แสดงผลการประเมิน -->
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px; overflow: hidden;">
                        <div class="card-body py-4 px-5">
                            <h6 class="card-title text-center fw-bold mb-3" style="font-size: 1.25rem; color: #2c3e50;">{{ $topic->title }}</h6>
                            <p class="card-text text-center text-muted mb-4" style="font-size: 1rem;">{{ $topic->description }}</p>
                            <div class="text-center">
                                <span class="text-warning" style="font-size: 1.5rem;">
                                    @for ($i = 1; $i <= $userRating->stars; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = $userRating->stars + 1; $i <= 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </span>
                            </div>
                            <p class="text-center mt-3"><strong>ความคิดเห็นของคุณ:</strong> {{ $userRating->feedback ?? 'ไม่มีความคิดเห็นเพิ่มเติม' }}</p>
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#editForm-{{ $topic->id }}">แก้ไขความคิดเห็น</button>
                            </div>
                        </div>

                        <!-- ฟอร์มแก้ไข -->
                        <div class="collapse mt-3" id="editForm-{{ $topic->id }}">
                            <div class="card-body py-4 px-5 bg-light">
                                <h6 class="text-center mb-3">แก้ไขคะแนนและความคิดเห็น</h6>
                                <div class="star-rating d-flex justify-content-center mt-3">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="edit-star{{ $i }}-{{ $topic->id }}" name="rating[{{ $topic->id }}]" value="{{ $i }}" @if($userRating->stars == $i) checked @endif required>
                                        <label for="edit-star{{ $i }}-{{ $topic->id }}" title="{{ $i }} ดาว">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    @endfor
                                </div>
                                <textarea name="feedback[{{ $topic->id }}]" class="form-control mt-4" rows="3" placeholder="แก้ไขความคิดเห็น...">{{ $userRating->feedback }}</textarea>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- ฟอร์มสำหรับหัวข้อที่ยังไม่เคยประเมิน -->
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px; overflow: hidden;">
                        <div class="card-body py-4 px-5">
                            <h6 class="card-title text-center fw-bold mb-3" style="font-size: 1.25rem; color: #2c3e50;">{{ $topic->title }}</h6>
                            <p class="card-text text-center text-muted mb-4" style="font-size: 1rem;">{{ $topic->description }}</p>
                            <div class="star-rating d-flex justify-content-center mt-3">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}-{{ $topic->id }}" name="rating[{{ $topic->id }}]" value="{{ $i }}" required>
                                    <label for="star{{ $i }}-{{ $topic->id }}" title="{{ $i }} ดาว">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>
                            <textarea name="feedback[{{ $topic->id }}]" class="form-control mt-4" rows="3" placeholder="แสดงความคิดเห็นเพิ่มเติม... (ไม่บังคับ)"></textarea>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50 py-2 fw-bold" style="border-radius: 25px; font-size: 1.2rem;">บันทึกการเปลี่ยนแปลง</button>
            </div>
        </form>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .star-rating {
        position: relative;
        display: flex;
        flex-direction: row-reverse;
        gap: 0.5rem;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 2rem;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s, transform 0.2s;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffd700; /* Hover color */
        transform: scale(1.2);
    }

    .star-rating input:checked ~ label {
        color: #ff9900; /* Selected color */
    }

    /* .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    } */

    textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>


