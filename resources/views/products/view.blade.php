@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products Edit') }}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name ? $product->name : old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="integer" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price ? $product->price : old('price') }}" required>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __('Brand Name') }}</label>

                        <div class="col-md-6">
                            <input id="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ $product->brand_name ? $product->brand_name : old('brand_name') }}" required >

                            @error('brand_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="expire_date" class="col-md-4 col-form-label text-md-right">{{ __('Expired Date') }}</label>

                        <div class="col-md-6">
                            <input id="expire_date" type="date" class="form-control" name="expire_date" value="{{ $product->expire_date ? $product->expire_date : old('expire_date') }}" required >
                        </div>

                        @error('expire_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Producty Category') }}</label>

                        <div class="col-md-6">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                <option value="1">Laptop</option>
                                <option value="2">Desktop</option>
                                <option value="3">Mouse</option>
                                <option value="4">Monitor</option>
                            </select>
                        </div>

                        @error('expire_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
