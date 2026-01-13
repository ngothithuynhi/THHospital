<?php

namespace App\Http\Controllers;

use App\Models\CanLamSang;
use Illuminate\Http\Request;

class CanLamSangController extends Controller
{
    public function index()
    {
        return CanLamSang::with(['loaiCls', 'icds'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_cls' => 'required|string|max:255',
            'id_loai_cls' => 'required|exists:loai_cls,id',
            'chi_phi_cao' => 'boolean',
        ]);

        $canLamSang = CanLamSang::create($validated);

        if ($request->has('icds')) {
            $canLamSang->icds()->sync($request->icds);
        }

        return $canLamSang->load('icds');
    }

    public function show(CanLamSang $canLamSang)
    {
        return $canLamSang->load(['loaiCls', 'icds']);
    }

    public function update(Request $request, CanLamSang $canLamSang)
    {
        $validated = $request->validate([
            'ten_cls' => 'string|max:255',
            'id_loai_cls' => 'exists:loai_cls,id',
            'chi_phi_cao' => 'boolean',
        ]);

        $canLamSang->update($validated);

        if ($request->has('icds')) {
            $canLamSang->icds()->sync($request->icds);
        }

        return $canLamSang->load('icds');
    }

    public function destroy(CanLamSang $canLamSang)
    {
        $canLamSang->delete();
        return response()->noContent();
    }
}
