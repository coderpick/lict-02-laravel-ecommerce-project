@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Product add</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.products.index') }}"><i class="fa fa-reply"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="category">Select Category </label>
                                        <select name="category" id="category" class="form-control select2">
                                            <option disabled selected value="0">Select Category</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_category">Select Sub Category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select sub category</option>
                                        </select>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Select Brand </label>
                                        <select name="brand" id="brand" class="form-control select2">
                                            <option disabled selected value="0">Select brand</option>
                                            @forelse($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('brand')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter product price" value="{{ old('price') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="total_product">Total Product</label>
                                        <input type="number" name="total_product" id="total_product" class="form-control" placeholder="Enter total product " value="{{ old('total_product') }}">
                                    </div>
                                </div>{{--//.col-md-8--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image_one">Product Image one</label>
                                        <input type="file" name="image_one" data-height="110"  data-max-width="100" class="form-control dropify" id="image_one">
                                    </div>
                                    <div class="form-group">
                                        <label for="image_two">Product Image Two</label>
                                        <input type="file" name="image_two" data-height="110"  data-max-width="100" class="form-control dropify" id="image_two">
                                    </div>
                                    <div class="form-group">
                                        <label for="image_three">Product Image Three</label>
                                        <input type="file" name="image_three" data-height="110"  data-max-width="100" class="form-control dropify" id="image_three">
                                    </div>
                                </div>{{--//.col-md-4--}}
                            </div>{{-- //.row end--}}
                            <div class="form-group">
                                <label for="product_feature">Product Feature</label>
                                <textarea name="product_feature"  id="product_feature" class="form-control summernote">{{ old('product_feature') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_detail">Product Details</label>
                                <textarea name="product_detail"  id="product_detail" class="form-control summernote">{{ old('product_detail') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label> Is Feature</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio"  value="1" name="is_feature" id="radioSuccess1">
                                            <label for="radioSuccess1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio"  value="0" name="is_feature" id="radioSuccess2">
                                            <label for="radioSuccess2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label> Status</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio"  checked value="1" name="status" id="radioSuccess1">
                                            <label for="radioSuccess1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" value="0" name="status" id="radioSuccess2">
                                            <label for="radioSuccess2">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                            </div>
                        </form>
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
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

@endpush
{{-- page custom css  push--}}
@push('customCSS')

@endpush

{{-- page js link push--}}
@push('js')
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/backend/dist/js/dropify.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
@endpush
{{-- page custom js  push--}}
@push('customJS')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            // dropify js active
            $('.dropify').dropify();
            // Summernote
            $('.summernote').summernote()
        });
    </script>
@endpush
