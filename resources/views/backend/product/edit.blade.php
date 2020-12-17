@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Sub Category edit</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.subcategory.index') }}"><i class="fa fa-reply"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.subcategory.update',$subCategory->id) }}" method="post">
                            @csrf
                            @if($subCategory)
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="category">Select Category </label>
                                <select name="category" id="category" class="form-control select2">
                                    <option disabled selected value="0">Select Category</option>
                                    @forelse($categories as $category)
                                        <option {{ $subCategory->category_id==$category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Sub Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" value="{{ $subCategory->name??old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
{{-- page custom css  push--}}
@push('customCSS')

@endpush

{{-- page js link push--}}
@push('js')
<script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
@endpush
{{-- page custom js  push--}}
@push('customJS')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush
