<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class GroceryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function index() {
        return view("groceries/index");
    }

    function create(Request $request) {
        return view("groceries/create");
    }

    function store(Request $request) {
        $name   = $request->input("name", "UNSPECIFIED");
        $price  = $request->input("price", "-1");
        $amount = $request->input("amount", "-1");

        // Validate price input as a float
        if (!is_numeric($price) || $price < 0) {
            return redirect('/groceries')->withErrors(['price' => 'Invalid price input']);
        }

        // Validate amount input as an integer
        if (!is_numeric($amount) || $amount < 0) {
            return redirect('/groceries')->withErrors(['amount' => 'Invalid amount input']);
        }

        $grocery = Grocery::create([
            'name' => $name,
            'price' => $price,
            'amount' => $amount,
        ]);

        return redirect("/groceries");
    }

    function edit() {
        return view("groceries/edit");
    }

    function update() {
        return view("groceries/update");
    }

    function destroy() {
        return view("groceries/destroy");
    }
}
