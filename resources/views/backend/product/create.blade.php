@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Product Add</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.products.index') }}"><i class="fa fa-reply"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" id="ProductForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="category">Select Category <b class="font-weight-bold text-danger">*</b></label>
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
                                        </select>
                                        @error('sub_category')
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
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Enter product price" value="{{ old('price') }}">
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="total_product">Total Product</label>
                                        <input type="text" name="total_product" id="total_product" class="form-control" placeholder="Enter total product " value="{{ old('total_product') }}">
                                        @error('total_product')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>{{--//.col-md-8--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image_one">Product Image one</label>
                                        <input type="file" name="image_one" data-height="110"   class="form-control dropify" id="image_one">
                                        @error('image_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image_two">Product Image Two</label>
                                        <input type="file" name="image_two" data-height="110"   class="form-control dropify" id="image_two">
                                        @error('image_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image_three">Product Image Three</label>
                                        <input type="file" name="image_three" data-height="110"   class="form-control dropify" id="image_three">
                                        @error('image_three')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>{{--//.col-md-4--}}
                            </div>{{-- //.row end--}}
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="product_detail">Product Details <b class="font-weight-bold text-danger">*</b></label>
                                        <textarea name="product_detail"  id="product_detail" class="form-control summernote" required>{{ old('product_detail') }}</textarea>
                                        @error('product_detail')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="product_feature">Product Feature</label>
                                        <textarea name="product_feature"  id="product_feature" class="form-control summernote">{{ old('product_feature') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label> Is Feature</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio"  value="1" name="is_feature" id="radioYes">
                                            <label for="radioYes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" checked  value="0" name="is_feature" id="radioNo">
                                            <label for="radioNo">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label> Status</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio"  checked value="1" name="status" id="radioActive">
                                            <label for="radioActive">
                                                Active
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" value="0" name="status" id="radioInactive">
                                            <label for="radioInactive">
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
    <style>
        .error {
            color: red;
            font-weight: 500 !important;
        }
    </style>
@endpush

{{-- page js link push--}}
@push('js')
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/backend/dist/js/dropify.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>
@endpush
{{-- page custom js  push--}}
@push('customJS')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            // dropify js active
            $('.dropify').dropify();
            // Summernote
            $('.summernote').summernote({
                height:250
            });


            $('#category').on('change',function(){
                const categoryId = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.getSubCategory') }}',
                    data: {
                        'id': categoryId
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var select = $("#sub_category");
                        select.empty();
                        select.append('<option value="0" selected disabled>Select Sub Category</option>');
                        $.each(data , function(index, subCategory) {
                            var content='<option value="' + subCategory.id + '">' + subCategory.name + '</option>';
                            select.append(content);
                        });

                    },
                    error: function(data) {
                        console.log(data);
                    }
                })

            })

            /*Client Side form validation */
            $('#ProductForm').validate({
                rules: {
                    category: "required",
                    sub_category: "required",
                    brand: "required",
                    name: "required",
                    price: {
                        required:true,
                        digits: true
                    },
                    total_product:{
                        required:true,
                        digits: true
                    },
                    product_detail: "required",
                    image_one:{
                        required:true,
                        extension: "jpeg|jpg|png"
                    },
                    image_two:{
                        required:true,
                        extension: "jpeg|jpg|png"
                    },
                    image_three:{
                        required:true,
                        extension: "jpeg|jpg|png"
                    },
                },

                submitHandler: function(form) {
                    if (confirm("Are you sure to add this Product?")) {
                        form.submit();
                    }
                }
            });

        });
    </script>
@endpush
