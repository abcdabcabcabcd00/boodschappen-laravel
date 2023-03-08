@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<?php
use App\Models\Grocery;

$groceries = Grocery::all();
?>
    <div class="container mt-5">
        <h1 class="text-center">Groceries</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groceries as $grocery)
                <tr>
                    <td>{{ $grocery->name }}</td>
                    <td>{{ $grocery->price }}</td>
                    <td>{{ $grocery->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
