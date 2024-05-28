<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SpendingController extends Controller
{
    public function index(): View {
        return view('spending', [
            'spending' => Spending::all(),
        ]);
    }

    public function destroy(Spending $id): RedirectResponse {
        $id->delete();
        return Redirect::route('spending.index');
    }

    public function create(Request $request): RedirectResponse {
        $data = $request->validate([
            'price' => 'numeric|min:10000|max:500000000',
            'tax_percentage' => 'numeric|min:0|max:100',
        ]);

        $data['user_id'] = auth()->user()->id;
        Spending::create($data);
        return Redirect::route('spending.index');
    }
}
