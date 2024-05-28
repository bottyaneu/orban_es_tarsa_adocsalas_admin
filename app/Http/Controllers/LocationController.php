<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index(): View {
        return view('location', [
            'locations' => Location::all(),
        ]);
    }

    public function destroy(Location $id): RedirectResponse {
        $id->delete();
        return Redirect::route('location.index');
    }

    public function create(Request $request): RedirectResponse {
        $data = $request->validate([
            'country_code' => 'required|min:2|max:3',
            'city' => 'required|max:100',
            'address' => 'required|max:100'
        ]);

        $data['country_code'] = strtoupper($data['country_code']);
        Location::create($data);
        return Redirect::route('location.index');
    }
}
