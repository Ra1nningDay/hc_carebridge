<section style="margin-bottom: 72px; background-color: #f9f9f9; padding: 40px 0;">
    <div class="container">
        <!-- Section Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: #003e29;">กระทู้ล่าสุด</h2>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-success rounded-pill px-4">สำรวจเพิ่มเติม</a>
        </div>

        <div class="row gy-4">
            <!-- Main article area -->
            <div class="col-lg-8">
                @if($posts->first())
                    <div class="card border-0 shadow-sm" style="overflow: hidden; border-radius: 16px; background-color: #ffffff;">
                        <img src="{{ asset($posts->first()->image) }}" 
                            class="card-img-top" 
                            alt="Main Article Image" 
                            style="height: 400px; object-fit: cover;">
                        <div class="card-body">
                            <p class="text-success fw-semibold mb-1">{{ $posts->first()->author->name ?? 'ผู้เขียนไม่ทราบชื่อ' }}</p>
                            <a href="{{ route('posts.show', $posts->first()->id) }}" class="text-decoration-none">
                                <h3 class="card-title fw-bold mb-3" style="color: #003e29;">{{ $posts->first()->title }}</h3>
                            </a>
                            <p class="text-muted">{{ Str::limit($posts->first()->content, 200) }}</p>
                            <small class="text-muted">{{ $posts->first()->created_at->format('d M, Y') }} • {{ $posts->first()->read_time ?? '5 นาที' }} อ่าน</small>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Smaller articles list -->
            <div class="col-lg-4">
                @foreach($posts->skip(1)->take(4) as $post)
                    <div class="card mb-4 border-0 shadow-sm d-flex flex-row" style="overflow: hidden; border-radius: 12px; background-color: #ffffff;">
                        <img src="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/100' }}" 
                            class="img-fluid" 
                            alt="Small Article Image" 
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <p class="text-success fw-semibold mb-1">{{ $post->author->name ?? 'ผู้เขียนไม่ทราบชื่อ' }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                                <h6 class="card-title mb-2 fw-bold" style="color: #003e29;">{{ $post->title }}</h6>
                            </a>
                            <small class="text-muted">{{ $post->created_at->format('d M, Y') }} • {{ $post->read_time ?? '5 นาที' }} อ่าน</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
