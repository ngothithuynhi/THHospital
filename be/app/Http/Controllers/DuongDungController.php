<?php

namespace App\Http\Controllers;

use App\Models\DuongDung;
use Illuminate\Http\Request;

class DuongDungController extends Controller
{
    public function index()
    {
        return DuongDung::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_duong_dung' => 'required|string|max:255',
            'trang_thai' => 'in:su_dung,ngung',
        ]);

        return DuongDung::create($validated);
    }

    public function show(DuongDung $duongDung)
    {
        return $duongDung;
    }

    public function update(Request $request, DuongDung $duongDung)
    {
        $validated = $request->validate([
            'ten_duong_dung' => 'string|max:255',
            'trang_thai' => 'in:su_dung,ngung',
        ]);

        $duongDung->update($validated);
        return $duongDung;
    }

    public function destroy(DuongDung $duongDung)
    {
        $duongDung->delete();
        return response()->noContent();
    }
}
