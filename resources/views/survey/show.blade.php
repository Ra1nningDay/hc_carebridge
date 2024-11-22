@extends('layouts.app')

@section('title', $assessment->name)

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $assessment->name }}</h1>
    <p class="text-muted">{{ $assessment->description }}</p>
    
    <form method="POST" action="#">
        @csrf

        <!-- วนลูปคำถาม -->
        @foreach($assessment->questions as $index => $question)
        <div class="mb-4">
            <label for="question{{ $question->id }}" class="form-label">
                คำถามที่ {{ $index + 1 }}: {{ $question->question_text }}
            </label>

            @if($question->question_type === 'select')
            <!-- ตัวเลือกแบบ Select -->
            <select id="question{{ $question->id }}" name="answers[{{ $question->id }}]" class="form-select">
                @foreach(json_decode($question->options, true) as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            @elseif($question->question_type === 'radio')
            <!-- ตัวเลือกแบบ Radio -->
            @foreach(json_decode($question->options, true) as $option)
            <div class="form-check">
                <input type="radio" id="question{{ $question->id }}_{{ $loop->index }}" name="answers[{{ $question->id }}]" value="{{ $option }}" class="form-check-input">
                <label class="form-check-label" for="question{{ $question->id }}_{{ $loop->index }}">
                    {{ $option }}
                </label>
            </div>
            @endforeach

            @elseif($question->question_type === 'text')
            <!-- คำตอบแบบ Text -->
            <input type="text" id="question{{ $question->id }}" name="answers[{{ $question->id }}]" class="form-control">
            @endif
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">ส่งแบบประเมิน</button>
    </form>
</div>
@endsection
