<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pending_order = Order::where('status','pending')->count();
        $in_progress_order = Order::where('status','in_progress')->count();
        $completed_order = Order::where('status','completed')->count();
        $data = [
            'Completed' => $completed_order, 
            'Pending' => $pending_order,   
            'In Progress' => $in_progress_order    
        ];

        return view('dashboard', compact('data'));
    }
}
