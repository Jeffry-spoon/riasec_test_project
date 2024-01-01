@extends('layouts.app') @section('content')
<div id="form-wrapper">
    <form action="/p/quote.php" method="post" class="test-form">
        <div
            class="alert alert-warning alert-dismissible fade show"
            role="alert"
            id="incompleteSectionAlert"
            style="display: none"
        >
            You should answer all questions in this section before moving on.
            <button
                type="button"
                class="btn-close d-flex align-items-center"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
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
                                name="inlineRadioOptions_{{ $sectionIndex }}_{{
                                    $index}}"
                                id="inlineRadio{{ $sectionIndex }}__{{ $index }}_{{
                                $i}}"
                                value="option{{ $i }}"
                            />
                            <label
                                class="form-check-label"
                                for="inlineRadio_{{ $sectionIndex }}_{{ $index }}_{{
                                    $index
                                }}">
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
                type="submit"
                class="btn btn-primary border-0 d-grid"
                style="padding: 12px 36px; background: #f72585"
                id="submitButton"
                disabled
            >
                Submit
            </button>
            @else
            <button
                type="button"
                class="btn btn-primary nextButton"
                data-section="{{ $category }}"
                onclick="return mainPage({{ json_encode($chunkedQuestions)}})"
            >
                Next
            </button>
            @endif
        </div>
        @endforeach
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function mainPage( chunkedQuestions ) {
        var isFormValid = true;
        const currentSection = $(".nextButton").data("section");
        const categoryOrder = ["REALISTIC","INVESTIGATIVE","ARTISTIC", "SOCIAL","ENTERPRISING","CONVENTIONAL"];

        const currentSectionIndex = categoryOrder.indexOf(currentSection);
        if (isNaN(currentSectionIndex) || currentSectionIndex === -1) {
            return isFormValid;
        }
        const nextSection = categoryOrder[currentSectionIndex +1];

       if (document.querySelectorAll('#checkRadio [type="radio"]:checked')
                .length < 6) {
            $('#incompleteSectionAlert').show();
            isFormValid = false;
        } else {
            $("#incompleteSectionAlert").hide();

            // Hide current section
            $(`#section_${currentSection}`).hide();

            // Show next section
            $(`#section_${nextSection}`).show();

            // Optional: Scroll to the top of the next section
            $(`#section_${nextSection}`)[0].scrollIntoView({
                behavior: "smooth",
            });

        // check if all questions are answered to enable the submit button
        const totalQuestionsInSection = chunkedQuestions[currentSection].length;
        const answeredQuestionsInSection = document.querySelectorAll(`#checkRadio_${nextSection} [type="radio"]:checked`).length;

        // If all questions in the current section are answered, enable the submit button
        if (answeredQuestionsInSection === totalQuestionsInSection * 6) {
            $("#submitButton").prop("disabled", false);
        }

        return isFormValid;
        };
    }
</script>

@endsection
