<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketClass;
use App\Models\Destination;
use Illuminate\Routing\Attributes\Get;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ticket/Index');
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function buymenu($jenis)
    {
        $ticketClasses = TicketClass::all();
        $destinations = Destination::where('Status', 'A')->get();

        return view('ticket.buymenu', [
            'title' => ucfirst($jenis),
            'ticketClasses' => $ticketClasses,
            'destinations' => $destinations,
        ]);
    }

    public function frmtiketpesawat()
    {
        return view('ticket/Buymenu');
    }

    public function frmtiketkereta()
    {
        return view('ticket/kereta');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
