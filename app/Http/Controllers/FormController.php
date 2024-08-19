<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Jika validasi berhasil, lakukan sesuatu (misalnya, simpan data)
        // ...

        return redirect()->back()->with('success', 'Form berhasil disubmit!');
    }
}
