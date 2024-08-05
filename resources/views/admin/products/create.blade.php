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
                                        <h3 class="text-center">Thêm sản phẩm</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data"
                                        novalidate="novalidate">
                                        @csrf
                                        {{-- <div class="form-group text-center">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i>
                                                </li>
                                                <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                            </ul>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="control-label mb-1">Title</label>
                                            <input name="title" type="text" class="form-control">
                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input id="cc-name" name="image" type="file" class="form-control">
                                            @error('image')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Price</label>
                                            <input name="price" type="text" class="form-control">
                                            @error('price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label mb-1">PriceDel</label>
                                            <input name="priceDel" type="text" class="form-control">
                                            @error('priceDel')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control-sm form-control" name="category_id">
                                                <option value="">Chọn</option>
                                                @foreach ($category as $cateName)
                                                    <option value="{{ $cateName->id }}">{{ $cateName->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        {{-- <i class="fa fa-lock fa-lg"></i>&nbsp; --}}
                                        Thêm
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
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
@endsection
