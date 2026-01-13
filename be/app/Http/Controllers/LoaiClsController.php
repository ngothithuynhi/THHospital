<?php

namespace App\Http\Controllers;

use App\Models\LoaiCls;
use Illuminate\Http\Request;

class LoaiClsController extends Controller
{
    public function index()
    {
        return LoaiCls::with('canLamSangs')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_loai' => 'required|string|max:255',
            'trang_thai' => 'in:su_dung,ngung',
        ]);

        return LoaiCls::create($validated);
    }

    public function show(LoaiCls $loaiCls)
    {
        return $loaiCls->load('canLamSangs');
    }

    public function update(Request $request, LoaiCls $loaiCls)
    {
        $validated = $request->validate([
            'ten_loai' => 'string|max:255',
            'trang_thai' => 'in:su_dung,ngung',
        ]);

        $loaiCls->update($validated);
        return $loaiCls;
    }

    public function destroy(LoaiCls $loaiCls)
    {
        $loaiCls->delete();
        return response()->noContent();
    }
}
