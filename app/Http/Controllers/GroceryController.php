<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GroceryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function error(Request $request, string $error, string $description, int $code)
    {
        return response()->view("error.error", [
            "error" => $error,
            "description" => $description
        ], $code);
    }


    public function index()
    {
        try {
            $groceries = Grocery::all();
            return view("groceries/index", compact("groceries"));
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->error(request(), 'Database Error', $e->getMessage(), 500);
        } catch (\Exception $e) {
            return $this->error(request(), 'Error', $e->getMessage(), 500);
        }
    }

    public function create()
    {
        return view("groceries/create");
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0|max:100000',
                'amount' => 'required|integer|min:0|max:100000'
            ]);

            $grocery = Grocery::create([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'amount' => $validatedData['amount'],
            ]);

            return redirect("/groceries")->with('success', 'Grocery created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->error(request(), 'Validation Error', $e->getMessage(), 422);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->error(request(), 'Database Error', $e->getMessage(), 500);
        } catch (\Exception $e) {
            return $this->error(request(), 'Error', $e->getMessage(), 500);
        }
    }


    public function edit(int $id)
    {
        $validatedData = Validator::make(
            ['id' => $id],
            ['id' => 'required|exists:groceries,id']
        )->validate();

        $grocery = Grocery::findOrFail($validatedData['id']);
        return view("groceries/edit", compact("grocery"));
    }

    public function update(Request $request, Grocery $grocery)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0|max:100000',
                'amount' => 'required|integer|min:0|max:100000'
            ]);

            $grocery->name = $validatedData['name'];
            $grocery->price = $validatedData['price'];
            $grocery->amount = $validatedData['amount'];

            $grocery->save();

            return redirect()->route('groceries.index')->with('success', 'Grocery updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->error(request(), 'Validation Error', $e->getMessage(), 422);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->error(request(), 'Database Error', $e->getMessage(), 500);
        } catch (\Exception $e) {
            return $this->error(request(), 'Error', $e->getMessage(), 500);
        }
    }

    public function destroy(Grocery $grocery)
    {
        $grocery->delete();
        return redirect()->route('groceries.index')->with('success', 'Grocery deleted successfully.');
    }
}
