@extends('layouts.app')
@section('content')
<script>
    // Define a global variable to hold your data
    var quizData = @json($chunkedQuestions);

    var userAnswers = {};

    function saveAnswer(category, questionId, answer) {
    if (!userAnswers[category]) {
        userAnswers[category] = {};
    }

    userAnswers[category][questionId] = answer;
}
</script>
<div id="form-wrapper">
    <form action="" method="post" class="test-form">
        @csrf
        <div id="alertMessage" class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
            <span id="alertText" class="text-black"></span>
            <button type="button" class="btn-close" onclick="closeAlert()" aria-label="Close"></button>
        </div>

        @foreach ($chunkedQuestions as $category => $sectionQuestions)

        <div
            class="section"
            id="section_{{ $category }}"
            style="{{ $loop->first ? '' : 'display: none;' }}"
        >
            <div class="category-title d-flex flex-row justify-content-center">
                <p class="me-2">Kategori:</p>
                <h5>{{ $category }}</h5>
            </div>

            @foreach ($sectionQuestions as $index => $question)
            @foreach ($question as $sectionIndex => $innerQuestion)

            <div class="soal text-center">
                <h4
                    id="form-title_{{ $sectionIndex }}_{{ $index }}"
                    class="text-center"
                >
                    {{ $innerQuestion["questions_text"] }}
                </h4>
                <div class="container d-flex justify-content-center">
                    <div id="checkRadio" class="checkRadio_{{ $index }}">
                        @for ($i = 1; $i <= 6; $i++)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions_{{ $sectionIndex }}_{{$index}}"
                                id="inlineRadio{{ $sectionIndex }}{{$index}}_{{ $i }}"
                                value="{{ $i }}"
                                onchange="saveAnswer('{{ $category }}', '{{ $innerQuestion["id"] }}', this.value)"
                            />
                            <label
                                class="form-check-label"
                                for="inlineRadio_{{ $sectionIndex }}_{{$index}}_{{ $i }}"
                            >
                                {{ $i }}
                            </label>
                        </div>
                        @endfor
                    </div>
                </div>
                <hr
                    class="border border-primary-emphasis border-1 opacity-75 mt-4 mb-4"
                    style="max-width: 400px; margin: 0 auto"
                />
            </div>

            @endforeach
            @endforeach
            @if ($loop->last)
            <button
                type="button"
                class="btn btn-primary"
                onclick="handleSubmitButtonClick()"
            >
            Submit
            </button>
            @else
            <button
                type="button"
                class="btn btn-primary nextButton"
                data-section="{{ $category }}"
                onclick="handleNextButtonClick()"
            >
            Next
            </button>
            @endif
        </div>
        @endforeach
    </form>
</div>

@include('components.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('js/quiz.js') }}"></script>
@endsection
