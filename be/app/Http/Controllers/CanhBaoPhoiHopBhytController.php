<?php

namespace App\Http\Controllers;

use App\Models\CanhBaoPhoiHopBhyt;
use Illuminate\Http\Request;

class CanhBaoPhoiHopBhytController extends Controller
{
    public function index()
    {
        return CanhBaoPhoiHopBhyt::with(['hoatChat1', 'hoatChat2', 'icd'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_hoat_chat_1' => 'required|exists:hoat_chats,id',
            'id_hoat_chat_2' => 'required|exists:hoat_chats,id',
            'id_icd' => 'nullable|exists:icds,id',
            'muc_do' => 'required|in:cam_phoi_hop,khong_khuyen_nghi,can_can_nhac',
        ]);

        return CanhBaoPhoiHopBhyt::create($validated);
    }

    public function show(CanhBaoPhoiHopBhyt $canhBaoPhoiHopBhyt)
    {
        return $canhBaoPhoiHopBhyt->load(['hoatChat1', 'hoatChat2', 'icd']);
    }

    public function update(Request $request, CanhBaoPhoiHopBhyt $canhBaoPhoiHopBhyt)
    {
        $validated = $request->validate([
            'id_hoat_chat_1' => 'exists:hoat_chats,id',
            'id_hoat_chat_2' => 'exists:hoat_chats,id',
            'id_icd' => 'nullable|exists:icds,id',
            'muc_do' => 'in:cam_phoi_hop,khong_khuyen_nghi,can_can_nhac',
        ]);

        $canhBaoPhoiHopBhyt->update($validated);
        return $canhBaoPhoiHopBhyt;
    }

    public function destroy(CanhBaoPhoiHopBhyt $canhBaoPhoiHopBhyt)
    {
        $canhBaoPhoiHopBhyt->delete();
        return response()->noContent();
    }
}
