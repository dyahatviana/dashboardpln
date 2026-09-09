<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'id_pelanggan' => 'required|string|max:255',
            'no_ktp' => 'nullable|string|max:255',
            'no_kk' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'keperluan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'divisi' => 'required|string|max:255',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'deadline' => 'nullable|date',
        ]);

        $validated['created_by'] = auth()->id();

        Task::create($validated);

        return redirect('/dashboard')
            ->with('success', 'Tugas berhasil diberikan kepada divisi.');
    }
}
