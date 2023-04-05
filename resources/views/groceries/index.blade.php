@extends('layouts.app')

@section('title', 'Groceries - Index')

@section('content')
    <?php
    use App\Models\Grocery;
    
    $groceries = Grocery::all();
    ?>
    <div class="container mt-5">
        <h1 class="text-center fs-1">Groceries</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($groceries as $grocery)
                    <tr>
                        <td><a href="{{ route('groceries.edit', $grocery->id) }}" class="btn btn-primary btn-block">Edit</a></td>
                        <td>
                            {{-- Create a form to delete the grocery --}}
                            <form action="{{ route('groceries.destroy', $grocery) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </td>
                        <td>{{ $grocery->name }}</td>
                        <td>{{ $grocery->price }}</td>
                        <td>{{ $grocery->amount }}</td>
                        <td>{{ $grocery->price * $grocery->amount }}</td>
                        <td>{{ $grocery->category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
