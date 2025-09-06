@extends('layouts.app')
@section('title', 'Setup Destiny')

@section('content')
<section class="content mt-5">
    <div class="container">
        <h1 class="mb-4">@yield('title')</h1>
        <hr>
        <form method="POST" action="{{ route('setup.storedestiny') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="destinyName" class="form-label">Destiny Name</label>
                        <input id="destinyName" name="DestinationName" class="form-control" placeholder="Masukkan Nama Destinasi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('tiket')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection