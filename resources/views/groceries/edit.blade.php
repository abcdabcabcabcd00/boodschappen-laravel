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
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $grocery->name) }}" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $grocery->price) }}" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $grocery->amount) }}" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="g-category">Category</label>
            <select class="form-select" name="category_id" id="g-category" value="{{ old('amount', $grocery->amount) }}">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $grocery->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" id="g-submit">Update</button>
    </form>
</div>
@endsection
