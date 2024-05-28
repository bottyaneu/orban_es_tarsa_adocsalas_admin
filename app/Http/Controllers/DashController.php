<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashController extends Controller
{
    public function index(): View {
        $data =  [
            'total_spending' => Spending::sum('price'),
            'net_total_spending' => Spending::sum(DB::raw('price * (1 - tax_percentage / 100)')),
            'total_income' => Work::sum('price'),
            'net_total_income' => Work::sum(DB::raw('price * (1 - tax_percentage / 100)')),
        ];

        return view('dashboard', $data);
    }
}
