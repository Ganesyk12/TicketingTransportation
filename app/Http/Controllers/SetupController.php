<?php

namespace App\Http\Controllers;

use App\Models\TicketClass;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Post;

class SetupController extends Controller
{
    public function addClass()
    {
        return view('setup.TicketClass');
    }

    public function addDestiny()
    {
        return view('setup.Destiny');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ClassName' => 'required|string|max:255',
            'TicketPrice' => 'required|numeric|min:0',
        ]);

        TicketClass::create([
            'ClassName' => $request->ClassName,
            'TicketPrice' => $request->TicketPrice,
            'UserCreated' => 'System',
            'DateCreated' => now(),
            'UserModified' => 'System',
            'DateModified' => now(),
            'Status' => 'A',
        ]);
        return redirect()->route('setup.ticketclass')->with('success', 'Data tiket class berhasil disimpan.');
    }

    public function storeDestiny(Request $request)
    {
        $request->validate([
            'DestinationName' => 'required|string|max:255',
        ]);

        Destination::create([
            'DestinationName' => $request->DestinationName,
            'UserCreated' => 'System',
            'DateCreated' => now(),
            'UserModified' => 'System',
            'DateModified' => now(),
            'Status' => 'A',
        ]);
        return redirect()->route('setup.destiny')->with('success', 'Data destinasi berhasil disimpan.');
    }
}
