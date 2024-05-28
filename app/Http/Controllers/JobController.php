<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View {
        $works = Work::where('created_at', '>=', Carbon::now()->startOfMonth())->with('user')->orderByDesc('created_at')->get();
        return view('jobs', ['works' => $works]);
    }

    public function finish(Work $id): RedirectResponse {
        $id->is_finished = true;
        $id->save();
        return Redirect::route('works.index');
    }

    public function create(Request $request): RedirectResponse {
        $data = $request->validate([
            'description' => 'min:10|max:500',
            'price' => 'numeric|min:10000|max:500000000',
            'tax_percentage' => 'numeric|min:0|max:100',
        ]);
        Work::create(array_merge($data, ['user_id' => auth()->user()->id, 'is_finished' => false]));
        return Redirect::route('works.index');
    }
}
