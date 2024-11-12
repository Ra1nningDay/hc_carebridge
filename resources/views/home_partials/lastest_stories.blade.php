<section style="margin-bottom: 72px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-4">Latest Stories</h2>
            <div class="p-2 mb-3 border border-3 rounded-5">
                <a href="{{ route('posts.index') }}" class="text-decoration-none text-dark">Explore More Stories</a>
            </div>
        </div>
        <div class="row">
            <!-- Main article area -->
            <div class="col-md-7">
                @if($posts->first())
                    <div class="card border-0 mb-4" style="height: 100%;">
                        <img src="{{ $posts->first()->image ? asset('storage/' . $posts->first()->image) : 'https://via.placeholder.com/600x300' }}" 
                            class="card-img-top" 
                            alt="Main Article Image" 
                            style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <p class="text-muted">{{ $posts->first()->author->name ?? 'Unknown Author' }}</p>
                            <a href="{{ route('posts.show', $posts->first()->id) }}">
                                <h5 class="card-title">{{ $posts->first()->title }}</h5>
                            </a>
                            <p class="card-text">{{ Str::limit($posts->first()->content, 150) }}</p>
                            <small class="text-muted">{{ $posts->first()->created_at->format('M d, Y') }} • {{ $posts->first()->read_time ?? '5 min' }} read</small>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Smaller articles list -->
            <div class="col-md-5">
                @foreach($posts->skip(1)->take(3) as $post)
                    <div class="card border-0 mb-4" style="height: calc(33.33% - 1rem);">
                        <div class="row g-0 h-100">
                            <div class="col-4">
                                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/100' }}" 
                                    class="img-fluid rounded-start h-100" 
                                    alt="Small Article Image" 
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-8">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="text-muted">{{ $post->author->name ?? 'Unknown Author' }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="mb-4">
                                        <p class="card-text">{{ $post->title }}</p>
                                    </a>
                                    <small class="text-muted">{{ $post->created_at->format('M d, Y') }} • {{ $post->read_time ?? '5 min' }} read</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>