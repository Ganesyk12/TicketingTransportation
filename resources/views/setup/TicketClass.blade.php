@extends('layouts.app')
@section('title', 'Setup Ticket Class')

@section('content')
<section class="content mt-5">
    <div class="container">
        <h1 class="mb-4">@yield('title')</h1>
        <hr>

        <form method="POST" action="{{ route('setup.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="ticketName">Ticket Name</label>
                        <input id="ticketName" name="ClassName" class="form-control" placeholder="Masukkan Nama Tiket" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ticketPrice">Ticket Price</label>
                        <input id="ticketPrice" name="TicketPrice" class="form-control" type="number" placeholder="Masukkan Harga Tiket" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('tiket')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection