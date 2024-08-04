@extends('layouts.app')
@section('content')
    <div id="loader" class="spinner-wrapper">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
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
                                <div class="mt-4 d-flex align-items-center justify-content-center radios">
                                    <h6 class="me-4 fs-5 desc">Sangat tidak <br> suka</h6>
                                    <div id="checkRadio"
                                        class="checkRadio_{{ $index }}  d-flex align-items-center justify-content-between">
                                        <div class="checkbox-container">
                                            @for ($i = 1; $i <= 6; $i++)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions_{{ $category }}_{{ $sectionIndex }}_{{ $index }}"
                                                        id="inlineRadio{{ $sectionIndex }}{{ $index }}_{{ $i }}"
                                                        value="{{ $i }}"
                                                        onchange="saveAnswer('{{ $category }}', '{{ $innerQuestion['id'] }}', this.value)"
                                                        @if ($i == 1) first
                                                        @elseif ($i == 3) middle
                                                        @elseif ($i == 6) last @endif" />
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <h6 class="ms-4 fs-5 desc">Sangat suka</h6>
                                </div>
                                <div class="desc-text mt-3">
                                    <div class="row justify-content-between align-items-center g-2">
                                        <div class="col">
                                            <p class="me-4 fs-5 text-start">Sangat tidak <br> suka</p>
                                        </div>
                                        <div class="col">
                                            <p class="ms-4 fs-5 text-end">Sangat suka</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border border-primary-emphasis border-1 opacity-75 mt-4 mb-4"
                                    style="width: 100%; margin: 0 auto" />
                            </div>
                        @endforeach
                    @endforeach
                    @if ($loop->last)
                        <button type="button" class="btn btn-primary d-flex justify-content-center mx-auto "
                            id="submitButton" onclick="handleSubmitButtonClick()" style="width: 300px;">
                            Submit
                        </button>
                    @else
                        <button type="button" class="btn btn-primary nextButton mx-auto"
                            data-section="{{ $category }}" onclick="handleNextButtonClick()"
                            style="width: 300px;
                            display: flex;
                            justify-content: center;">
                            Next
                        </button>
                    @endif
                </div>
            @endforeach
        </form>
    </div>

    <div id="start-time" style="display: none;"></div>
    <div id="end-time" style="display: none;"></div>
    <div id="time-difference" class="text-center mb-4" style="display: none;"></div>

    @include('components.footer')

    <script>
        // Inisialisasi variabel data sebagai objek kosong di luar fungsi mapping

        var data = {};
        var currentCategory = getCurrentCategory();
        var dataMapping = mapping();
        var alertElement = document.getElementById('alertElement');
        var currentCategoryIndex = 0;

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
                }
            }

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

            if (showFeedback()) {
                moveToNextCategory();

                currentCategory = Object.keys(data)[currentCategoryIndex];
            }

        }

        // function untuk menampilkan umpan balik
        function showFeedback() {
            var unansweredCount = setValueQuestion(currentCategory);

            if (unansweredCount > 0) {
                var alertText =
                    `Anda belum menjawab ${unansweredCount} pertanyaan di kategori ini. Silakan jawab semua pertanyaan sebelum melanjutkan.`;

                document.getElementById('alertText').innerText = alertText;
                document.getElementById('alertMessage').style.display = 'block';

                // Scroll ke atas halaman saat alert muncul
                window.scrollTo({
                top: 0,
                behavior: 'smooth'
                });

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

                 // Scroll ke atas halaman
                window.scrollTo({
                top: 0,
                behavior: 'smooth'
                });

            } else {
                submitQuizAnswers();
            }
        }

        // function untuk mengirimkan data ke controller
        function submitQuizAnswers() {
            var unansweredCount = setValueQuestion(currentCategory);

            if (unansweredCount > 0) {
                // Scroll ke atas halaman
                window.scrollTo({
                top: 0,
                behavior: 'smooth'
                });
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

            var endTimeData = recordEndTime(); // Get the end time and duration

            var quizData = {
                data: data,
                userAnswers: userAnswers,
                startTime: startTime,
                endTime: endTimeData.endTime,
                formattedTime: endTimeData.formattedTime // Get the duration from the returned object
            };

            $.ajax({
                url: "{{ route('quiz.store') }}", // URL endpoint POST harus diisi dengan endpoint yang benar
                type: 'POST',
                data: JSON.stringify(quizData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(result) {
                    console.log('AJAX Response:', result);

                    // Check if 'id' is present
                    //var newlyCreatedId = result.id;
                    let url = "{{ route('result.show', ['id' => ':id']) }}";
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
        }

        // function untuk menampilkan kategori berikutnya
        function showNextCategory() {
            var nextCategory = Object.keys(data)[currentCategoryIndex];
            var nextCategoryElement = document.getElementById('section_' + nextCategory);
            nextCategoryElement.style.display = '';
        }

        // Declare a global variable to hold the start time
        var startTime;

        // Function to start the quiz and record the start time
        function startQuiz() {
            startTime = new Date(); // Record the start time
        }

        // Call the startQuiz() function when the window is loaded
        window.addEventListener('load', function() {
            startQuiz(); // Call the function when the window is loaded
        });

        // Function to get the start time
        function getStartTime() {
            return startTime; // Return the start time
        }

        function recordEndTime() {
            var endTime = new Date();
            var difference = endTime - startTime; // Calculate the difference
            var durationInSeconds = Math.floor(difference / 1000); // Calculate duration in seconds

            var minutes = Math.floor(durationInSeconds / 60);
            var seconds = durationInSeconds % 60;

            // Format nilai untuk penyimpanan dalam kolom waktu MySQL
            var formattedTime = ('00' + minutes).slice(-2) + ':' + ('00' + seconds).slice(-2) + ':00';

            return {
                endTime: endTime,
                formattedTime: formattedTime
            }; // Return the end time and duration
        }

        // Fungsi yang dipanggil Setiap soal dikerjakan

        function handleSubmitButtonClick() {
            var button = document.getElementById('submitButton');
            button.disabled = true;  // Disable the button
             button.innerHTML = '<div class="spinner-border spinner-border-sm text-light" style="width: 1rem; height: 1rem;" role="status"><span class="sr-only"></span></div>';  // Change the button text to a spinner
            // Simulate form submission delay
            setTimeout(() => {
                // Re-enable the button after some time (for demo purposes)
                button.disabled = false;
                button.innerHTML = 'Submit';
            }, 3000);  // Change the delay time as needed
            // Simpan jawaban pengguna ke backend atau lakukan tindakan lainnya

            if (showFeedback()) {
                recordEndTime();
                moveToNextCategory();
            }
        }

        // Periksa lebar layar saat halaman dimuat
        window.addEventListener('load', function() {
            toggleDescTextVisibility(); // Panggil fungsi saat halaman dimuat
        });

        // Periksa lebar layar saat ukuran layar berubah
        window.addEventListener('resize', function() {
            toggleDescTextVisibility(); // Panggil fungsi saat ukuran layar berubah
        });

        // Fungsi untuk menampilkan atau menyembunyikan elemen desc-text berdasarkan lebar layar
        function toggleDescTextVisibility() {
            var screenWidth = window.innerWidth; // Dapatkan lebar layar

            var descTextElements = document.querySelectorAll('.desc-text');
            var descTextElementslg = document.querySelectorAll('.desc');

            descTextElements.forEach(function(descTextElement) {
                if (screenWidth < 500) {
                    // Jika lebar layar kurang dari 500px, tampilkan elemen desc-text
                    descTextElement.style.display = 'block';
                    // descTextElementslg.style.display = 'none';
                } else {
                    // Jika lebar layar 500px atau lebih, sembunyikan elemen desc-text
                    descTextElement.style.display = 'none';
                    // descTextElementslg.style.display = 'block';
                }
            });
        }

        // Wait for all resources to be loaded
        window.addEventListener('load', () => {
            console.log('All resources loaded');

            // Hide the spinner
            const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
            if (spinnerWrapperEl) {
                spinnerWrapperEl.style.opacity = '0';

                setTimeout(() => {
                    spinnerWrapperEl.style.display = 'none';
                    console.log('Spinner hidden');
                }, 200);
            } else {
                console.error('Spinner wrapper element not found');
            }
        });

        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

        // Tampilkan spinner saat halaman dimuat ulang
        window.addEventListener('beforeunload', () => {
            spinnerWrapperEl.style.display = 'flex';
            spinnerWrapperEl.style.opacity = '100';
        });

        document.addEventListener('DOMContentLoaded', () => {
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Check if the user has viewed the result page
        const hasViewedResult = getCookie('hasViewedResult');
        if (hasViewedResult === 'true') {
            // Delete the cookie
            document.cookie = "hasViewedResult=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

            // Redirect to the registration page
            window.location.href = "{{ route('register') }}";
        }
    });
    </script>
@endsection
