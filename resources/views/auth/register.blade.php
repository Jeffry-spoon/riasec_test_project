@extends('layouts.app')

@section('content')
  <!-- Register -->

    <form method="post" action="{{ route('register.store') }}">
        @csrf
      <div class="title-form">
        <p class="fs-5 text-center">Sebelum Anda memulai tes, kami ingin mengenal Anda lebih baik. Kami tidak akan pernah membagikan data Anda kepada orang lain.</p>
      </div>
      <div class="register-form mb-5">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label required">Nama</label>
          <input class="form-control bg-transparent text-light @error('name')is-invalid @enderror" type="text" placeholder="Input your name" aria-label="default input example" name="name" required value="{{ old('name') }}" />
            @error('name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label required">Email</label>
          <input type="email" class="form-control bg-transparent text-light @error('email')is-invalid @enderror" placeholder="Input your email address" name="email" required value="{{ old('email') }}" />
            @error('email')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <!-- Gender -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label required">Jenis Kelamin</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="Male" />
            <label class="form-check-label ms-2" for="flexRadioDefault1"> Laki - Laki</label>
          </div>
          <div class="form-check mt-3 mb-3">
            <input class="form-check-input" type="radio" name="gender" value="Female" />
            <label class="form-check-label ms-2" for="flexRadioDefault2"> Perempuan</label>
          </div>
        </div>
          <!-- End Gender -->
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label required">Nomor Handphone</label>
            <input type="number" class="form-control bg-transparent text-light @error('phone-number')is-invalid @enderror" placeholder="Input your phone number" name="phone-number" required value="{{ old('phone-number') }}"/>
            @error('phone-number')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label required">Kelas</label>
            <input type="text" class="form-control bg-transparent text-light @error('grade')is-invalid @enderror" placeholder="Example: 12 IPA" name="grade" required value="{{ old('grade') }}" />
            @error('grade')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label required">Nama Instansi Sekolah/Kampus</label>
            <input type="text" class="form-control bg-transparent text-light @error('school-name')is-invalid @enderror" placeholder="Input your School name here" name="school-name" required value="{{ old('school-name') }}"/>
            @error('school-name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label required">Pekerjaan Masa Depan</label>
            <input type="text" class="form-control bg-transparent text-light @error('occupation')is-invalid @enderror" placeholder="Input your feature accupation" name="occupation" required value="{{ old('occupation') }}"/>
            @error('occupation')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
     <button type="submit" class="btn btn-primary border-0 d-grid" style="padding: 12px 36px; background: #f72585" disabled >Mulai Quiz</button>
    </form>

    @include('components.footer')

    <!-- Include JavaScript to handle button state -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Get all input fields
    const formInputs = document.querySelectorAll('form input');

    // Get the submit button
    const submitButton = document.querySelector('form button');

    // Function to check if all input fields, including radio buttons, are filled
    function checkFormInputs() {
        const allFilled = Array.from(formInputs).every(input => {
            if (input.type === 'radio') {
                // Check if at least one radio button in the group is checked
                const radioGroup = document.getElementsByName(input.name);
                return Array.from(radioGroup).some(radio => radio.checked);
            }
            return input.value.trim() !== '';
        });

        submitButton.disabled = !allFilled;
    }

    // Attach event listeners to input fields
    formInputs.forEach(input => {
        input.addEventListener('input', checkFormInputs);
    });
</script>


@endsection

