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


    {{-- @dd($types); --}}

    <div id="form-wrapper">
        <form id="quizForm" method="POST" action="" class="test-form">
            @csrf

            <div id="alertMessage" class="alert alert-warning alert-dismissible fade show" role="alert"
                style="display: none;">
                <span id="alertText" class="text-black"></span>
                {{-- <button type="button" class="btn-close" onclick="closeAlert()" aria-label="Close"></button> --}}
            </div>

            @foreach ($chunkedQuestions as $category => $sectionQuestions)
                <div class="section" id="section_{{ $category }}" style="{{ $loop->first ? '' : 'display: none;' }}">
                    <div class="category-title d-flex flex-row justify-content-center">
                        <p class="me-2">Kategori:</p>
                        <h5>{{ $category }}</h5>
                    </div>

                    @foreach ($sectionQuestions as $index => $question)
                        @foreach ($question as $sectionIndex => $innerQuestion)
                            <div class="soal text-center">
                                <h4 id="form-title_{{ $sectionIndex }}_{{ $index }}" class="text-center">
                                    {{ $innerQuestion['questions_text'] }}
                                </h4>
                                <div class="container d-flex justify-content-center">
                                    <div id="checkRadio" class="checkRadio_{{ $index }}">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="inlineRadioOptions_{{ $category }}_{{ $sectionIndex }}_{{ $index }}"
                                                    id="inlineRadio{{ $sectionIndex }}{{ $index }}_{{ $i }}"
                                                    value="{{ $i }}"
                                                    onchange="saveAnswer('{{ $category }}', '{{ $innerQuestion['id'] }}', this.value)" />
                                                <label class="form-check-label"
                                                    for="inlineRadio_{{ $sectionIndex }}_{{ $index }}_{{ $i }}">
                                                    {{ $i }}
                                                </label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <hr class="border border-primary-emphasis border-1 opacity-75 mt-4 mb-4"
                                    style="max-width: 400px; margin: 0 auto" />
                            </div>
                        @endforeach
                    @endforeach
                    @if ($loop->last)
                        <button type="button" class="btn btn-primary" onclick="handleSubmitButtonClick()">
                            Submit
                        </button>
                    @else
                        <button type="button" class="btn btn-primary nextButton" data-section="{{ $category }}"
                            onclick="handleNextButtonClick()">
                            Next
                        </button>
                    @endif
                </div>
            @endforeach
        </form>
    </div>

    @include('components.footer')

    <script>
        // Inisialisasi variabel data sebagai objek kosong di luar fungsi mapping
        console.log('data lemparan', quizData);

        var data = {};
        var currentCategory = getCurrentCategory();
        var dataMapping = mapping();
        var alertElement = document.getElementById('alertElement');
        var currentCategoryIndex = 0;

        console.log('data mapping:', data);
        console.log('current cateogry', currentCategory);

        let checkValidationCategory = validation(data, currentCategory);

        function closeAlert() {
            document.getElementById('alertMessage').style.display = 'none';
        }

        // function untuk mendapatkan kategori yang sedang aktif
        function getCurrentCategory() {
            // medapatkan element html yang aktif atau terlihat
            var visibleSection = document.querySelector(
                '.section[style=""]'
            )

            // Ambil ID dari elemen tersebut
            if (visibleSection) {
                var categoryId = visibleSection.id.replace('section_', '');
                return categoryId;
            }

            // Jika tidak ada elemen yang aktif atau terlihat, kembalikan null
            return null;

        }

        // function untuk melakukan mapping data sementara
        function mapping() {
            // Loop melalui setiap kategori dalam quizData
            for (var category in quizData) {
                if (quizData.hasOwnProperty(category)) {
                    // Membuat array untuk menyimpan data pertanyaan
                    var questionsArray = quizData[category][0].map(question => {
                        return {
                            'id': question['id'],
                            'questions_text': question['questions_text'],
                            'types_id': question['types_id'],
                            'answer': null,
                        };
                    });

                    // Menyimpan array pertanyaan ke dalam objek data
                    data[category] = {
                        'questions': questionsArray
                    };
                }
            }
        }

        // function untuk mendapatkan jawaban masing - masing pertanyaan dan mengupdate jawaban pada answer
        function setValueQuestion(selectCategory) {
            // console.log(userAnswers[selectCategory]); // Debugging, lihat jawaban yang telah disimpan

            // Mendeklarasikan dan menginisialisasi tempCount ke 0
            var tempCount = 0;

            // Cek setiap pertanyaan dalam kategori
            for (var i = 0; i < data[selectCategory].questions.length; i++) {
                var questionId = data[selectCategory].questions[i].id;

                // Jika jawaban untuk pertanyaan ini belum disimpan atau undefined
                if (!userAnswers.hasOwnProperty(selectCategory) || userAnswers[selectCategory][questionId] === undefined) {
                    tempCount++;
                } else {
                    // Jika jawaban sudah disimpan, perbarui nilai answer di data
                    data[selectCategory].questions[i].answer = userAnswers[selectCategory][questionId];
                    // console.log(`Jawaban untuk pertanyaan ${questionId} diupdate menjadi: ${userAnswers[selectCategory][questionId]}`);

                }
            }

            console.log('Data yang sudah diperbarui:', data);


            // Kembalikan nilai tempCount
            return tempCount;
        }


        // function untuk menghitung jumlah pertanyaan yang belum di jawab dalam suatu kategori tertentu
        function validation(data, selectCategory) {
            var tempCount = 0;
            for (var i = 0; i < data.length; i++) {
                if (data[i].category == selectCategory) {
                    for (var x = 0; x < data[i].question_answer.length; x++) {
                        if (data[i].question_answer[x].answer == null) {
                            tempCount++;
                        }
                    }
                }
            }

            return tempCount;
        }

        // function untuk memvalidasi apakah semua pertanyaan pada kategori terakhir telah dijawab
        function validateLastCategory() {
            var lastCategory = Object.keys(data)[Object.keys(data).length - 1];

            // Cek setiap pertanyaan dalam kategori terakhir
            for (var i = 0; i < data[lastCategory].questions.length; i++) {
                if (data[lastCategory].questions[i].answer === null) {
                    return false; // Ada pertanyaan pada kategori terakhir yang belum dijawab
                }
            }

            return true; // Semua pertanyaan pada kategori terakhir telah dijawab
        }

        // function untuk mentrigger logic button next
        function handleNextButtonClick() {
            // Simpan jawaban pengguna ke backend atau lakukan tindakan lainnya
            console.log('User Answers:', userAnswers);

            if (showFeedback()) {
                moveToNextCategory();

                currentCategory = Object.keys(data)[currentCategoryIndex];
            }

        }

        // function untuk menampilkan umpan balik
        function showFeedback() {
            var unansweredCount = setValueQuestion(currentCategory);
            console.log('Current category for feedback:', currentCategory);
            console.log('Unanswered Count:', unansweredCount);

            if (unansweredCount > 0) {
                var alertText =
                    `Anda belum menjawab ${unansweredCount} pertanyaan di kategori ini. Silakan jawab semua pertanyaan sebelum melanjutkan.`;

                document.getElementById('alertText').innerText = alertText;
                document.getElementById('alertMessage').style.display = 'block';

                setTimeout(function() {
                    // Cek apakah alert masih terbuka
                    var alertMessage = document.getElementById('alertMessage');
                    if (alertMessage.style.display === 'block') {
                        // jika alert masih terbuka, tutup alert secara automatis
                        alertMessage.style.display = 'none';
                    }
                }, 5000);

                return false;
            }

            return true;
        }


        // function untuk pindah ke kategori berikutnya
        function moveToNextCategory() {
            // Cek apakah kategori saat ini adalah kategori terakhir
            if (currentCategoryIndex < Object.keys(data).length - 1) {
                currentCategoryIndex++;
                var alertMessage = document.getElementById('alertMessage');
                alertMessage.style.display = 'none';
                // Sembunyikan kategori saat ini
                hideCurrentCategory();

                // Tampilkan kategori berikutnya
                showNextCategory();
                console.log('Current category index:', currentCategoryIndex);

            } else {
                submitQuizAnswers();
            }
        }

        // function untuk mengirimkan data ke controller
        function submitQuizAnswers() {
            var unansweredCount = setValueQuestion(currentCategory);
            console.log('Current category for feedback:', currentCategory);
            console.log('Unanswered Count:', unansweredCount);

            if (unansweredCount > 0) {
                var alertText =
                    `Anda belum menjawab ${unansweredCount} pertanyaan di kategori ini. Silakan jawab semua pertanyaan sebelum melanjutkan.`;

                document.getElementById('alertText').innerText = alertText;
                document.getElementById('alertMessage').style.display = 'block';

                setTimeout(function() {
                    // Cek apakah alert masih terbuka
                    var alertMessage = document.getElementById('alertMessage');
                    if (alertMessage.style.display === 'block') {
                        // jika alert masih terbuka, tutup alert secara automatis
                        alertMessage.style.display = 'none';
                    }
                }, 5000);

                return false;
            }

            // Periksa apakah semua pertanyaan pada kategori terakhir telah dijawab
            if (!validateLastCategory()) {
                var alertText = 'Mohon lengkapi semua pertanyaan pada kategori terakhir sebelum mengirim jawaban.';
                document.getElementById('alertText').innerText = alertText;
                document.getElementById('alertMessage').style.display = 'block';

                setTimeout(function() {
                    // Cek apakah alert masih terbuka
                    var alertMessage = document.getElementById('alertMessage');
                    if (alertMessage.style.display === 'block') {
                        // jika alert masih terbuka, tutup alert secara automatis
                        alertMessage.style.display = 'none';
                    }
                }, 5000);

                return false;
            }

            sendDataToController();

            return true;
        }

        function sendDataToController() {
            // Menggunakan metode AJAX untuk mengirim data JSON ke endpoint '/submit-quiz'
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('quiz.store') }}", // URL endpoint POST harus diisi dengan endpoint yang benar
                type: 'POST',
                data: JSON.stringify({
                    data: data,
                    userAnswers: userAnswers,
                }),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(result) {
                    console.log('AJAX Response:', result);

                    // Check if 'id' is present
                    //var newlyCreatedId = result.id;
                    let url = "{{ route('result.show', ['id'=> ':id']) }}";
                    window.location.href = url.replace(':id', result.id);

                },
                error: function(xhr, status, error) {
                    console.error('Error submitting quiz answers:', error);
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                }
            });
        }


        // function untuk menyembunyikan kategori saat ini
        function hideCurrentCategory() {
            var currentCategory = Object.keys(data)[currentCategoryIndex - 1];
            var currentCategoryElement = document.getElementById('section_' + currentCategory);
            currentCategoryElement.style.display = 'none';
            console.log('category sebelum: ', currentCategory);
        }

        // function untuk menampilkan kategori berikutnya
        function showNextCategory() {
            var nextCategory = Object.keys(data)[currentCategoryIndex];
            var nextCategoryElement = document.getElementById('section_' + nextCategory);
            nextCategoryElement.style.display = '';
            console.log('category selanjutnya: ', nextCategory);

        }

        function handleSubmitButtonClick() {
            // Simpan jawaban pengguna ke backend atau lakukan tindakan lainnya

            if (showFeedback()) {

                moveToNextCategory();
            }
        }
    </script>
@endsection
