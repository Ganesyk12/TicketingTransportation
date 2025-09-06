@extends('layouts.app')
@section('title', 'Form Pemesanan Tiket ' . $title)

@section('content')
    <section class="content mt-3">
        <div class="container" data-aos="fade-down" data-aos-delay="100">
            <div class="row gy-4 align-items-center justify-content-between">
                <h1 class="mb-3 mt-5">@yield('title')</h1>
                <form method="POST" action="{{ route('addtransaction') }}">
                    @csrf

                    <input type="hidden" name="jenis" value="{{ $title }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="customerName" class="form-label">Nama Penumpang</label>
                                <input id="customerName" name="CustomerName" class="form-control"
                                    placeholder="Masukkan Nama Penumpang" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="customerAge" class="form-label">Usia</label>
                                <input class="form-control" name="CustomerAge" placeholder="Masukkan Usia" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ticketQty" class="form-label">Jumlah Tiket</label>
                                <input id="ticketQty" class="form-control" name="TicketQty" type="number" min="1"
                                    placeholder="Masukkan Jumlah Tiket" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Tiket</label>
                                <div class="d-flex">
                                    @foreach ($ticketClasses as $ticketClass)
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="radio" name="IdTicketClass"
                                                id="ticket_{{ $ticketClass->IdTicketClass }}"
                                                value="{{ $ticketClass->IdTicketClass }}" required>
                                            <label class="form-check-label" for="ticket_{{ $ticketClass->IdTicketClass }}">
                                                {{ $ticketClass->ClassName }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="destination" class="form-label">Jurusan</label>
                                <select id="destination" name="IdDestination" class="form-control select2" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->IdDestination }}">
                                            {{ $destination->DestinationName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dateDepart" class="form-label">Tanggal Berangkat</label>
                                <input id="dateDepart" name="DepartureDate" class="form-control" type="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('tiket') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
