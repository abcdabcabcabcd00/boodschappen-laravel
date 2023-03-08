<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class GroceryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function index() {
        return view("groceries/index");
    }

    function create() {
        return view("groceries/create");
    }

    function store() {
        return view("groceries/store");
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
