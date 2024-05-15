<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View {
        $works = Work::where('created_at', '>=', Carbon::now()->startOfMonth())->with('user')->get();
        return view('dashboard', ['works' => $works]);
    }

    public function finish(Work $id): RedirectResponse {
        $id->is_finished = true;
        $id->save();
        return redirect('dashboard');
    }
}
