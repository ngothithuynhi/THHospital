<?php

namespace App\Http\Controllers;

use App\Models\HoatChat;
use Illuminate\Http\Request;

class HoatChatController extends Controller
{
    public function index()
    {
        return HoatChat::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_hoat_chat' => 'required|string|max:255',
            'ghi_chu' => 'nullable|string',
            'trang_thai' => 'required|in:su_dung,ngung',
        ]);

        return HoatChat::create($validated);
    }

    public function show($id)
    {
        return HoatChat::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $hoatChat = HoatChat::findOrFail($id);

        $validated = $request->validate([
            'ten_hoat_chat' => 'sometimes|string|max:255',
            'ghi_chu' => 'nullable|string',
            'trang_thai' => 'sometimes|in:su_dung,ngung',
        ]);

        $hoatChat->update($validated);

        return $hoatChat;
    }

    public function destroy($id)
    {
        $hoatChat = HoatChat::findOrFail($id);
        $hoatChat->delete();

        return response()->noContent();
    }
}
