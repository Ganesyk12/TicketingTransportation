@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <section class="content mt-5">
        <div class="container">
            <div class="row">
                <!-- Card Pesawat -->
                <div class="col-md-3 mb-4">
                    <a href="{{ route('tiket.menu', ['jenis' => 'pesawat']) }}" class="text-decoration-none">
                        <div class="card shadow text-center py-5">
                            <i class="fa-solid fa-plane-departure fa-7x text-info"></i>
                        </div>
                    </a>
                </div>

                <!-- Card Kereta -->
                <div class="col-md-3 mb-4">
                    <a href="{{ route('tiket.menu', ['jenis' => 'kereta']) }}" class="text-decoration-none">
                        <div class="card shadow text-center py-5">
                            <i class="fa-solid fa-train-subway fa-7x text-dark"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
