@extends('layouts.app')

@section('title', 'Groceries - Create')

@section('content')
<form action="/groceries" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="form-group">
        <label for="g-name">Name</label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="g-name" placeholder="Name" required autocomplete="off">
        </div>
        <div class="invalid-feedback">
            Please provide a name.
        </div>
    </div>
    <div class="form-group">
        <label for="g-price">Price</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="number" class="form-control" name="price" id="g-price" placeholder="Price" required autocomplete="off">
            <div class="invalid-feedback">
                Please provide a price.
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="g-amount">Amount</label>
        <div class="input-group">
            <input type="number" class="form-control" name="amount" id="g-amount" placeholder="Amount" required autocomplete="off">
        <div class="invalid-feedback">
            Please provide an amount.
        </div>
    </div>
    <input type="hidden" name="action" value="add-item">
    <button class="btn btn-primary btn-block">Create</button>
</form>
@endsection
