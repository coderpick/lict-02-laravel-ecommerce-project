@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Product Details</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.products.index') }}"><i class="fa fa-reply"></i> Back to List</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Product Name</th>
                                        <td>{{ $product->name }} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Category</th>
                                        <td>{{ $product->category->name??"" }} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Sub Category</th>
                                        <td>{{ $product->subCategory->name??"" }} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Price</th>
                                        <td>{{ $product->price }} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Total Product</th>
                                        <td>{{ $product->total_product }} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Product Info</th>
                                        <td>{!! $product->details !!} </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Product features</th>
                                        <td>{!! $product->features !!}   </td>
                                    </tr>

                                </table>
                                <h2></h2>
                            </div>
                            <div class="col-md-4">
                                <div class="product-image">
                                    <h5>Product image One</h5>
                                    <img class="img-fluid" src="{{ Storage::disk('public')->url('product/' . $product->image_one) }}" alt="">
                                </div>
                                <div class="product-image">
                                    <h5>Product image One</h5>
                                    <img class="img-fluid" src="{{ Storage::disk('public')->url('product/' . $product->image_two) }}" alt="">
                                </div>
                                <div class="product-image">
                                    <h5>Product image One</h5>
                                    <img class="img-fluid" src="{{ Storage::disk('public')->url('product/' . $product->image_three) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
{{-- page css link push--}}
@push('css')
    <!-- DataTables -->

@endpush
{{-- page custom css  push--}}
@push('customCSS')
    <style>
        .product-image {
            width: 150px;
            height: 165px;
            margin-bottom: 20px;
        }
    </style>
@endpush

{{-- page js link push--}}
@push('js')

@endpush
{{-- page custom js  push--}}
@push('customJS')

@endpush
