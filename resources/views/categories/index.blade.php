@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Products List') }}
                    <span class="float-right"><button class="btn btn-warning"><a href="{{route("categories.create")}}"> + NEW</a></button></span>
                </div>

                <div class="card-body">
                    
                    <div class="table table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index=>$category)
                                    <tr>
                                        <td class="text-right">{{ ++$index }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->detail }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-info"><a href="{{ route("categories.show", ["category" => $category]) }}">View</a></button>
                                                <a href="{{ route("categories.edit",[ "category" => $category]) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route("categories.destroy", ["category" => $category])}}" method="POST">
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
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
