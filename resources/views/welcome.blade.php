@extends('layouts.app') @section('content')

<!-- Showcase -->
<div class="container">
    <header class="showcase text-align-center">
        <h2>Ready to discover your ideal career?</h2>
        <p>
            Take the RIASEC Test and find the perfect match for your unique
            personality.
        </p>

        <div class="d-grid gap-2 col-md-3 mx-auto">
            <a
                href="{{ route('help') }}"
                class="btn btn-primary text-decoration-none border-0"
                style="padding: 12px 36px; background: #f72585"
            >
                Take the Test
            </a>
        </div>
    </header>
</div>

<!-- Footer -->
<footer class="footer" style="position: fixed;">
    <a
        href="https://ukrida.ac.id/studyprogram/ps/50/program-studi-psikologi"
        class="text-decoration-none text-light"
        >Copyright &copy;
        <script>
            document.write(new Date().getFullYear());
        </script>
        – Psikologi UKRIDA</a
    >
</footer>

@endsection
