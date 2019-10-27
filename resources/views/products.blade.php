@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">price</th>
                <th scope="col">category</th>
            </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->short_description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
        <div>{{ $products->links() }}</div>
    </div>
@endsection
