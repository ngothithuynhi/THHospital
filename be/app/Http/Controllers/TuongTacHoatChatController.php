<?php

namespace App\Http\Controllers;

use App\Models\TuongTacHoatChat;
use Illuminate\Http\Request;

class TuongTacHoatChatController extends Controller
{
    public function index()
    {
        return TuongTacHoatChat::with(['hoatChat1', 'hoatChat2'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_hoat_chat_1' => 'required|exists:hoat_chats,id',
            'id_hoat_chat_2' => 'required|exists:hoat_chats,id',
            'muc_do' => 'required|in:nghiem_trong,can_theo_doi,an_toan',
        ]);

        return TuongTacHoatChat::create($validated);
    }

    public function show(TuongTacHoatChat $tuongTacHoatChat)
    {
        return $tuongTacHoatChat->load(['hoatChat1', 'hoatChat2']);
    }

    public function update(Request $request, TuongTacHoatChat $tuongTacHoatChat)
    {
        $validated = $request->validate([
            'id_hoat_chat_1' => 'exists:hoat_chats,id',
            'id_hoat_chat_2' => 'exists:hoat_chats,id',
            'muc_do' => 'in:nghiem_trong,can_theo_doi,an_toan',
        ]);

        $tuongTacHoatChat->update($validated);
        return $tuongTacHoatChat;
    }

    public function destroy(TuongTacHoatChat $tuongTacHoatChat)
    {
        $tuongTacHoatChat->delete();
        return response()->noContent();
    }
}
