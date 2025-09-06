<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function addTransaction(Request $request)
    {
        $request->validate([
            'IdTicketClass' => 'required',
            'IdDestination' => 'required',
            'CustomerName' => 'required|string|max:255',
            'CustomerAge' => 'required|numeric|min:0',
            'TicketQty' => 'required|numeric|min:0',
            'DepartureDate' => 'required|date',
        ]);

        $transaction = new Transaction();
        $transaction->CustomerName = $request->CustomerName;
        $transaction->CustomerAge = $request->CustomerAge;
        $transaction->TicketQty = $request->TicketQty;
        $transaction->IdTicketClass = $request->IdTicketClass;
        $transaction->IdDestination = $request->IdDestination;
        $transaction->DepartureDate = $request->DepartureDate;
        $transaction->UserCreated = 'System';
        $transaction->DateCreated = now();
        $transaction->UserModified = 'System';
        $transaction->DateModified = now();
        $transaction->Status = 'A';
        $transaction->TicketType = strtolower($request->jenis);
        $transaction->save();

        if ($transaction->jenis === 'pesawat') {
            return redirect()->route('detail.tiket.pesawat', ['id' => $transaction->IdTransactions])
                ->with('success', 'Tiket pesawat berhasil dipesan!');
        } else {
            return redirect()->route('detail.tiket.kereta', ['id' => $transaction->IdTransactions])
                ->with('success', 'Tiket kereta berhasil dipesan!');
        }
    }

    public function detailPesawat($id)
    {
        $transaction = Transaction::with(['ticketClass', 'destination'])->findOrFail($id);
        return view('ticket.Details', compact('transaction'));
    }

    public function detailKereta($id)
    {
        $transaction = Transaction::with(['ticketClass', 'destination'])->findOrFail($id);
        return view('ticket.Details', compact('transaction'));
    }
}