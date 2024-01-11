<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function create(): View
    {
        $divisions = Division::query()->get();

        return view('customer', compact('divisions'));
    }

    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        $store = Customer::create($request->validated());

        if(!$store) {
            return redirect()->back()->with('error', 'Customer store failed!');
        }

        return redirect()->back()->with('success', 'Customer stored successfully!');
    }
}
