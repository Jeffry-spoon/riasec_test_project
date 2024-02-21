@extends('layouts.app') @section('content')
    <div class="container d-flex align-items-center flex-column mb-3 justify-content-betweenm overlay">
        <div class="main h-100">
            <!-- Showcase -->

            <header class="showcase col-sm-12 justify-content-center" style="margin-top: 100">
                <p class="fs-5 text-center text-light col-lg-6 col-sm-12 mt-lg-5">
                    Kuesioner ini terdiri dari 30 aktivitas yang dilakukan dalam
                    pekerjaan yang berbeda. Quiz ini digunakan untuk menentukan
                    minat bidang anda. Harap perhatikan bahwa tidak ada jawaban yang
                    benar atau salah. Pililah jawaban yang paling mencerminkan
                    preferensi anda terhadap setiap aktivitas.
                </p>

                <div class="answer-desc">
                    <div class="answer-desc-title">
                        <p>Terdapat 6 pilihan untuk setiap pertanyaan</p>
                        <div class="answer-list d-flex text-light text-start">
                            <div class="left-list">
                                <ul>
                                    <li>1: Sangat Tidak Suka</li>
                                    <li>2: Tidak Suka</li>
                                    <li>3. Agak Tidak Suka</li>
                                </ul>
                            </div>
                            <div class="right-list">
                                <ul>
                                    <li>4: Agak Suka</li>
                                    <li>5: Suka</li>
                                    <li>6. Sangat Suka</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('quiz.create') }}" class="btn btn-primary border-0 d-grid"
                    style="padding: 12px 36px; background: #f72585">
                    Lanjut
                </a>
            </header>
        </div>


    </div>
    <!-- Footer -->
    <footer class="footer">
        <a href="https://ukrida.ac.id/studyprogram/ps/50/program-studi-psikologi"
            class="text-decoration-none text-light">Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            – Psikologi UKRIDA
        </a>
    </footer>

    <!-- Buat gambar bisa di zoom out atau diklik lalu responsive gambar masih statis -->
@endsection
