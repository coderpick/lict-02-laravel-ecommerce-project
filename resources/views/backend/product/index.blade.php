@extends('layouts.backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Product List</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="category" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                               @forelse($products as $key => $product)
                                   <tr>
                                       <td>{{ $key+1 }}</td>
                                       <td>{{ $product->name }}</td>
                                       <td>{{ $product->category->name??"" }}</td>
                                       <td>{{ $product->subCategory->name??"" }}</td>
                                       <td>{{ $product->brand->name??"" }}</td>
                                       <td>{{ $product->price }}</td>
                                       <td><span class="badge badge-info">{{ $product->total_product }}</span></td>
                                       <td><span class="badge badge-dark">{{ $product->view_count }}</span></td>
                                       <td>
                                           @if($product->status ==1)
                                               <span class="badge badge-success">Active</span>
                                           @else
                                               <span class="badge badge-warning">Inactive</span>
                                           @endif

                                       </td>
                                       <td>
                                           <a href="{{ route('admin.products.show',$product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                           <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>

                                           <a onclick="deleteProduct({{ $product->id }})"
                                              class="btn btn-danger btn-sm text-white">
                                               <i class="fa fa-trash"></i>
                                           </a>
                                           <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}"
                                                 method="POST" style="display: none;">
                                               @csrf
                                               @method('DELETE')
                                           </form>
                                       </td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td colspan="10">No sub category found (:</td>
                                   </tr>
                               @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
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
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
{{-- page custom css  push--}}
@push('customCSS')

@endpush

{{-- page js link push--}}
@push('js')
    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/sweetalert2.all.js') }}"></script>
@endpush
{{-- page custom js  push--}}
@push('customJS')
    <script>
        $(function () {
            $('#category').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        // sweet alert active
        function deleteProduct(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

        // document.getElementById('delete-form-'+id).submit();
    </script>
@endpush
