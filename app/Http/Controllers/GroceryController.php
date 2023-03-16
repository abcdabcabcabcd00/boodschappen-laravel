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

    public function index()
    {
        return view("groceries/index");
    }

    public function create(Request $request)
    {
        return view("groceries/create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
        ]);

        $name   = $validatedData["name"];
        $price  = $validatedData["price"];
        $amount = $validatedData["amount"];

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

    public function edit(string $grocery)
    {
        $grocery = Grocery::find($grocery);
        if ($grocery == null) {
            return "Error placeholder";
        }

        return view("groceries/edit", compact("grocery"));
    }

    public function update(Request $request, Grocery $grocery)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
        ]);

        $grocery->name = $validatedData['name'];
        $grocery->price = $validatedData['price'];
        $grocery->amount = $validatedData['amount'];

        $grocery->save();

        return redirect()->route('groceries.index');
    }


    public function destroy(Grocery $grocery)
    {
        $grocery->delete();
        return redirect()->route('groceries.index');
    }
}
