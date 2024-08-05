@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <strong class="card-title">Credit Card</strong>
                        </div> --}}
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Sửa sản phẩm</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('updateProduct', $editproduct->id) }}"
                                        enctype="multipart/form-data" method="post" novalidate="novalidate">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Title</label>
                                            <input value="{{ $editproduct->title }}" id="cc-payment" name="title"
                                                type="text" class="form-control">
                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <img src="{{ asset('/storage/' . $editproduct->image) }}" alt=""
                                                width="50px">
                                            <input id="cc-name" value="{{ $editproduct->image }}" name="image"
                                                type="file" class="form-control ">
                                            @error('image')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Price</label>
                                            <input value="{{ $editproduct->price }}" id="cc-number" name="price"
                                                type="text" class="form-control">
                                            @error('price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">PriceDel</label>
                                                    <input value="{{ $editproduct->priceDel }}" id="cc-exp"
                                                        name="priceDel" type="text" class="form-control ">
                                                    @error('priceDel')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <select class="form-control-sm form-control" name="category_id">
                                                    @foreach ($category as $cateName)
                                                        <option value="{{ $cateName->id }}"
                                                            {{ $cateName->id == $editproduct->category_id ? 'selected' : '' }}>
                                                            {{ $cateName->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div> --}}
                                            <div class="form-group">
                                                <select class="form-control-sm form-control" name="category_id">
                                                    <option value="">Chọn</option>
                                                    @foreach ($category as $cateName)
                                                        <option value="{{ $cateName->id }}" {{$cateName->id==$editproduct->category_id ? 'selected' : "" }}>
                                                            {{ $cateName->name }}</option>
                                                    @endforeach
                                                </select>
                                                   
                                                
                                            </div> 
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                {{-- <i class="fa fa-lock fa-lg"></i>&nbsp; --}}
                                                <span id="payment-button-amount">Sửa</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
