@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Brand edit</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.brands.index') }}"><i class="fa fa-reply"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.brands.update',$brand->id) }}" method="post">
                            @csrf
                            @if(isset($brand))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter brand name" value="{{ $brand->name??old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                    <input type="radio" {{ $brand->status==1?'checked':'' }} value="1" name="status" id="radioSuccess1">
                                    <label for="radioSuccess1">
                                        Active
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" {{ $brand->status==0?'checked':'' }} value="0" name="status" id="radioSuccess2">
                                    <label for="radioSuccess2">
                                        Inactive
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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

@endpush
{{-- page custom css  push--}}
@push('customCSS')

@endpush

{{-- page js link push--}}
@push('js')

@endpush
{{-- page custom js  push--}}
@push('customJS')

@endpush
