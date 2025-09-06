@extends('layouts.app')
@section('title', 'Pemesanan Tiket')

@section('content')
<section class="content mt-5">
    <div class="container">
        <h1 class="mb-3">@yield('title')</h1>

        @isset($transaction)
        <div class="row">
            <div class="col-md-3">
                @if(strtolower($transaction->TicketType) === 'pesawat')
                <div class="card shadow text-center py-5">
                    <i class="fa-solid fa-plane-departure fa-4x text-info"></i>
                </div>
                @elseif(strtolower($transaction->TicketType) === 'kereta')
                <div class="card shadow text-center py-5">
                    <i class="fa-solid fa-train-subway fa-4x text-dark"></i>
                </div>
                @endif
            </div>
        </div>
        <hr>

        {{-- Tampilkan data transaksi --}}

        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th style="width: 200px;">Nama Penumpang</th>
                    <td>{{ $transaction->CustomerName }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Usia</th>
                    <td>{{ $transaction->CustomerAge }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Jumlah Tiket</th>
                    <td>{{ $transaction->TicketQty }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Jenis Tiket</th>
                    <td>{{ $transaction->ticketClass->ClassName ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Jurusan</th>
                    <td>{{ $transaction->destination->DestinationName ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Tanggal Berangkat</th>
                    <td>{{ \Carbon\Carbon::parse($transaction->DepartureDate)->format('m-d-Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Harga Tiket</th>
                    <td>Rp. {{ number_format($transaction->ticketClass->TicketPrice, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Sub Total</th>
                    <td>
                        @php
                        $hargaTiket = $transaction->ticketClass->TicketPrice ?? 0;
                        $qty = $transaction->TicketQty;
                        $subtotal = $hargaTiket * $qty;

                        if ($subtotal > 10000000) {
                        $potongan = $subtotal * 0.05;
                        } elseif ($subtotal > 5000000) {
                        $potongan = $subtotal * 0.025;
                        } else {
                        $potongan = 0;
                        }

                        $total = $subtotal - $potongan;
                        @endphp

                        Rp. {{ number_format($subtotal, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <th style="width: 200px;">Potongan Harga</th>
                    <td>Rp. {{ number_format($potongan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Total Bayar</th>
                    <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        @endisset
        <hr>
        <a class="btn btn-primary text-white" href="{{ route('tiket') }}">Home</a>
    </div>
</section>
@endsection