@extends('backend.master')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-pen me-1"></i>
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="{{ Route('update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-layout form-layout-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="name" value="{{ $product->name; }}" class="form-control" placeholder="Enter Product Name">
                                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                        </div>
                                    </div><!-- row -->
                                    <div class="row  mb-3">
                                        <label class="col-sm-4 form-control-label">Category: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select name="category" id="category" class="form-control">
                                                <option value="">----- Select Category -----</option>
                                                <option value="Electronics" @if($product->category_name=='Electronics') selected @endif>Electronics</option>
                                                <option value="Gadgets" @if($product->category_name=='Gadgets') selected @endif>Gadgets</option>
                                                <option value="Jewelery" @if($product->category_name=='Jewelery') selected @endif>Jewelery</option>
                                            </select>
                                            <span class="text-danger">@error('category') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="row  mb-3">
                                        <label class="col-sm-4 form-control-label">Brand: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select name="brand" class="form-control">
                                                <option value="">----- Select Brand -----</option>
                                                <option value="Apple" @if($product->brand_name=='Apple') selected @endif>Apple</option>
                                                <option value="Nokia" @if($product->brand_name=='Nokia') selected @endif>Nokia</option>
                                                <option value="Samsung" @if($product->brand_name=='Samsung') selected @endif>Samsung</option>
                                            </select>
                                            <span class="text-danger">@error('brand') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div><!-- col-6 -->
                                <div class="col-sm-6">
                                    <div class="row  mb-3">
                                        <label class="col-sm-4 form-control-label">Description: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <textarea rows="2" class="form-control" name="description" placeholder="Enter Product Description">{{ $product->description; }}</textarea>
                                            <span class="text-danger">@error('description') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="row  mb-3">
                                        <label class="col-sm-4 form-control-label align-text-bottom">Select Image: </label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{asset($product->image)}}" height="70">
                                        </div>
                                    </div>
                                    <div class="row  mb-3">
                                        <label class="col-sm-4 form-control-label">Status: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select name="status" class="form-control">
                                                <option value="0">----- Select Status -----</option>
                                                <option value="1" @if($product->status==1) selected @endif>Active</option>
                                                <option value="0" @if($product->status==0) selected @endif>Inative</option>
                                            </select>
                                            <span class="text-danger">@error('status') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div><!-- col-6 -->
                            </div><!-- row -->

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-info">Update Product</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </form>         
                </div>
            </div>
        </div>
    </main>
@endsection