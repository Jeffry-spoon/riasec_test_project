@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <form action="">
    <h2 class="text-align-center title-guide text-light">
        Bagaimana Cara Mengerjakan Career Assessment Quiz?
    </h2>
    <section class="mx-auto" data-testid="sectionHelpArticlePage">
        <div class="list-guide">
            <ol class="mb-2">
                <li class="mb-4">Isi data dirimu dengan <strong>lengkap.</strong>📝 
                    <img
                        alt="User-added image"
                        src="https://i.ibb.co/w0CKRnc/Halaman-produk-tokopedia.jpg"
                    />
                </li>
                <li class="mb-4">
                    Jawab tes RIASEC dengan <strong>jujur</strong>. 🤔
                    <img
                        alt="User-added image"
                        src="https://i.ibb.co/KXvqnX8/Cek-keranjang-produk-tokopedia.jpg"
                    />
                </li class="mb-4">
                <li>
                    Klik submit dan lihat hasilnya. 👀
                    <img
                        alt="User-added image"
                        src="https://i.ibb.co/hyrQZBW/checkout-tokopedia.png"
                    />
                </li>
                <li class="mb-4">
                    Temukan potensi karirmu!. 💼
                </li>
            </ol>
        </div>

        <a href="{{route('register')}}" class="btn btn-primary border-0 d-grid" style="background: #f72585; padding: 12px 36px;">Lanjut !!!</a>
    </section>
    </form>
    @include('components.footer')
</div>

<!-- Buat gambar bisa di zoom out atau diklik lalu responsive gambar masih statis -->

@endsection
