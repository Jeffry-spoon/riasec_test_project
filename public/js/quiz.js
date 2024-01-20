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
    if(visibleSection) {
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
        }else {
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

// function untuk mentrigger logic button next
function handleNextButtonClick() {
    // Simpan jawaban pengguna ke backend atau lakukan tindakan lainnya
    console.log('User Answers:', userAnswers);

    if (showFeedback()) {
        console.log('Moving to the next category...');

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
        var alertText = `Anda belum menjawab ${unansweredCount} pertanyaan di kategori ini. Silakan jawab semua pertanyaan sebelum melanjutkan.`;

        document.getElementById('alertText').innerText = alertText;
        document.getElementById('alertMessage').style.display = 'block';

        setTimeout(function() {
            // Cek apakah alert masih terbuka
            var alertMessage = document.getElementById('alertMessage');
            if(alertMessage.style.display === 'block') {
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
        console.log('Ini adalah kategori terakhir.');
    }
}

// function untuk menyembunyikan kategori saat ini
function hideCurrentCategory() {
    var currentCategory = Object.keys(data)[currentCategoryIndex-1];
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




// Fungsi untuk mengambil jawaban dari formulir dan memperbarui variabel data
// function updateDataFromForm(dataToUpdate) {
//     // Iterasi melalui setiap kategori dalam dataToUpdate
//     for (var category in dataToUpdate) {
//         if (dataToUpdate.hasOwnProperty(category)) {
//             // Iterasi melalui setiap pertanyaan dalam kategori
//             for (var i = 0; i < dataToUpdate[category].questions.length; i++) {
//                 // Ambil jawaban dari formulir
//                 var answer = $('input[name="inlineRadioOptions_' + category + '_' + i + '"]:checked').val();
//                 console.log(answer);
//                 // Periksa apakah jawaban tidak null
//                 if (answer !== undefined) {
//                     // Update nilai jawaban pada variabel dataToUpdate
//                     dataToUpdate[category].questions[i].answer = answer;

//                 }
//             }
//         }
//     }
// }
// console.log(dataToUpdate);


//     function mainPage(button, chunkedQuestions, category) {

//         var isFormValid = true;
//         const currentSection = $(button).data("section")
//         const categoryOrder = [
//             "REALISTIC",
//             "INVESTIGATIVE",
//             "ARTISTIC",
//             "SOCIAL",
//             "ENTERPRISING",
//             "CONVENTIONAL",
//         ];

//         var currentsection_length = chunkedQuestions[currentSection][0].length;

//         console.log(currentsection_length);

//         const currentSectionIndex = categoryOrder.indexOf(currentSection);
//         // if (isNaN(currentSectionIndex) || currentSectionIndex === -1) {
//         //     return isFormValid;
//         // }
//         const nextSection = categoryOrder[currentSectionIndex + 1];

//         if (
//             document.querySelectorAll('#checkRadio [type="radio"]:checked')
//                 .length < currentsection_length
//         ) {
//             $("#incompleteSectionAlert").show();
//             isFormValid = false;
//         } else {
//             $("#incompleteSectionAlert").hide();

//             // Hide current section
//             $(#section_$,{currentSection}).hide();

//             // Show next section
//             $(#section_$,{nextSection}).show();
//             // $(#section_INVESTIGATIVE).show();

//             // Optional: Scroll to the top of the next section
//             $(#section_${nextSection})[0].scrollIntoView({
//                 behavior: "smooth",
//             });


//             // check if all questions are answered to enable the submit button
//             // const totalQuestionsInSection =
//             //     chunkedQuestions[currentsection_length].length;

//             // const answeredQuestionsInSection = document.querySelectorAll(
//             //     #checkRadio_${nextSection} [type="radio"]:checked
//             // );
//             // Check if all questions are answered to enable the submit button

//             // $(document).ready(function(){

//             //     $('#ccSelectForm').validate({
//             //         rules: {
//             //             inlineRadioOptions_0_0: {
//             //                 required: true,
//             //             },
//             //         }
//             //     });

//             //     $('#ccSelectForm input').on('keyup blur', function () {
//             //         if ($('#ccSelectForm').valid()) {
//             //     $('button.btn').prop('disabled', false);
//             //     } else {
//             //     $('button.btn').prop('disabled', 'disabled');
//             //     }
//             //     });
//             // });



//         }
//     }
