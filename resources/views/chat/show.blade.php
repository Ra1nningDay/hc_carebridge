@extends('layouts.app')

@section('title', 'Chat')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5>Chat with {{ $conversation->users->where('id', '!=', auth()->id())->first()->name }}</h5>
                </div>
                <div class="card-body">
                    <!-- แสดงข้อความในบทสนทนา -->
                    <div class="chat-box mb-3" style="height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">
                        @foreach ($conversation->messages as $message)
                            <div class="mb-2">
                                <strong>{{ $message->user->name }}:</strong>
                                <p class="mb-0">{{ $message->message }}</p>
                                <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                            </div>
                        @endforeach
                    </div>

                    <!-- ฟอร์มสำหรับส่งข้อความ -->
                    <form action="{{ route('chat.send', $conversation->id) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Type your message..." required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
