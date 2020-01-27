@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Products List') }}
                    <span class="float-right"><button class="btn btn-warning"><a href="{{ route("products.create") }}"> + NEW</a></button></span>
                </div>

                <div class="card-body">
                    
                    <div class="table table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Brand name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index=>$product)
                                    <tr>
                                        <td class="text-right">{{ ++$index }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ optional($product->Category)->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-info"><a href="{{ route("products.show", ["product" => $product]) }}">View</a></button>
                                                <a href="{{ route("products.edit",[ "product" => $product]) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route("products.delete", ["product" => $product])}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure want to delete?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
