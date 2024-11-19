<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use Illuminate\Http\Request;

class GroomingController extends Controller
{
    public function index()
    {
        $groomings = Grooming::all();
        return view('grooming', compact('groomings'));
    }

    public function show()
    {
        $groomings = Grooming::with('user')->get();
        return view('grooming.index', compact('groomings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hewan' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        Grooming::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'user_id' => auth()->id(),
            'hewan' => $request->hewan,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Reservasi Berhasil dibuat');        
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,process,approved,completed']);

        $grooming = Grooming::findOrFail($id);
        $grooming->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status changed successfully');        
    }
}
