<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $items = Item::with(['brand', 'pattern'])
            ->where('status', 'Pendiente')
            ->get();

        return view('admin.dashboard', compact('users', 'items'));
    }
}
