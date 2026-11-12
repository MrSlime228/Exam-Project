<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $requests = RepairRequest::with('user')->latest()->get();
        return view('admin.index', compact('requests'));
    }

    public function updateStatus(Request $request, RepairRequest $repairRequest)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,completed,cancelled'],
        ]);

        $repairRequest->update($data);

        return back()->with('success', 'Статус обновлён');
    }
}