<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use Illuminate\Http\Request;

class RepairRequestController extends Controller
{
    public function index()
    {
        $requests = auth()->user()->repairRequests()->latest()->get();
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address'        => ['required', 'string', 'max:255'],
            'repair_type'    => ['required', 'in:cosmetic,capital,electrical'],
            'payment_method' => ['required', 'in:cash,card,bank_transfer'],
            'repair_datetime'=> ['required', 'date', 'after:now'],
        ]);

        $data['user_id'] = auth()->id();
        $data['status']  = 'new';

        RepairRequest::create($data);

        return redirect()->route('requests.index')
            ->with('success', 'Заявка успешно создана!');
    }
}