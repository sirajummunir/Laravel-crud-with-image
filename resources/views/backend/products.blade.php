@extends('backend.master')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <div class="card my-4">
                            <div class="card-header d-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h5>Manage Products</h5> 
                                <a class="btn btn-info btn-sm" href="{{route('create')}}"><i class="fa fa-plus"></i> Add Product</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $sl=1; @endphp
                                    @foreach($products as $value)
                                        <tr>
                                            <td>{{ $sl++; }}</td>
                                            <td>{{ $value->name; }}</td>
                                            <td>{{ $value->category_name; }}</td>
                                            <td>{{ $value->brand_name; }}</td>
                                            <td>{{ $value->description; }}</td>
                                            <td>
                                                @if($value->status==1)
                                                    <span>Active</span>
                                                @else
                                                    <span>Inactive</span>
                                                @endif
                                            </td>
                                            <td><img src="{{ asset($value->image) }}" alt="" height="80" width="80"></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ Route('edit', $value->id )}}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm" href="{{ Route('delete', $value->id )}}" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection