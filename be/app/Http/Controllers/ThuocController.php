<?php

namespace App\Http\Controllers;

use App\Models\Thuoc;
use Illuminate\Http\Request;

class ThuocController extends Controller
{
    public function index()
    {
        return Thuoc::with(['hoatChats', 'dangSuDungThuocs.duongDung'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_thuoc' => 'required|string|max:255',
            'trang_thai' => 'in:duoc_phep,ngung',
        ]);

        $thuoc = Thuoc::create($validated);

        if ($request->has('hoat_chats')) {
            $thuoc->hoatChats()->sync($request->hoat_chats);
        }

        return $thuoc->load('hoatChats');
    }

    public function show(Thuoc $thuoc)
    {
        return $thuoc->load(['hoatChats', 'dangSuDungThuocs.duongDung']);
    }

    public function update(Request $request, Thuoc $thuoc)
    {
        $validated = $request->validate([
            'ten_thuoc' => 'string|max:255',
            'trang_thai' => 'in:duoc_phep,ngung',
        ]);

        $thuoc->update($validated);

        if ($request->has('hoat_chats')) {
            $thuoc->hoatChats()->sync($request->hoat_chats);
        }

        return $thuoc->load('hoatChats');
    }

    public function destroy(Thuoc $thuoc)
    {
        $thuoc->delete();
        return response()->noContent();
    }
}
