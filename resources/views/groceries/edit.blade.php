@extends('layouts.app')

@section('title', 'Groceries - Edit')

@section('content')
<div class="container">
    <h1>Edit Grocery Item</h1>
    <form method="POST" action="{{ route('groceries.update', $grocery->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $grocery->name) }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $grocery->price) }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $grocery->amount) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
