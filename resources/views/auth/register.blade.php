@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrati</div>

                <div class="card-body">
                    <form method="POST" id="registrationForm" action="{{ route('register') }}">
                        @csrf

                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                @error('surname')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">Data di nascita<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                                @error('birth_date')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo email<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma password<span class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="text-danger error-password mt-1" id="error-password"><i class="fa-solid fa-circle-exclamation"></i> Le password non corrispondono</div>
                            </div>
                            
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-footer mt-2">
                        <p class="text-muted"><span class="text-danger">*</span> I campi contrassegnati sono obbligatori.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
