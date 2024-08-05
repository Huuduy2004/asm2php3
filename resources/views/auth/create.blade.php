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
                                        <h3 class="text-center">Thêm tài khoản</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('addAccount') }}" method="post" enctype="multipart/form-data"
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
                                            <label class="control-label mb-1">Fullname</label>
                                            <input name="fullname" type="text" class="form-control">
                                            @error('fullname')
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
                                            <label class="control-label mb-1">Username</label>
                                            <input name="username" type="text" class="form-control">
                                            @error('username')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input name="email" type="email" class="form-control">
                                            @error('email')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Password</label>
                                            <input name="password" type="password" class="form-control">
                                            @error('password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-6">
                                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                                <div class="input-group">
                                                    <input id="x_card_code" name="x_card_code" type="tel"
                                                        class="form-control cc-cvc" value="" data-val="true"
                                                        data-val-required="Please enter the security code"
                                                        data-val-cc-cvc="Please enter a valid security code"
                                                        autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover"
                                                            data-container="body" data-html="true"
                                                            data-title="Security Code"
                                                            data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>"
                                                            data-trigger="hover"></span>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        {{-- <div >
                                            <select  name="category_id">
                                                @foreach ($category as $cateName)
                                                    <option value="{{ $cateName->id }}">{{ $cateName->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
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
