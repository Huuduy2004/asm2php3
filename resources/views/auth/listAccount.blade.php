@extends('admin.layouts.master')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Fullname : {{ Auth::user()->fullname}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('indexAdmin') }}">Dashboard</a></li>
                                <li><a href="#">Table</a></li>
                                <li class="active">Basic table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between pt-3">
                            <strong class="card-title">Quản lí  tài khoản</strong>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session('errorDelete'))
                                <div class="alert alert-danger">
                                    {{ session('errorDelete') }}
                                </div>
                            @endif
                            <a href="{{ route('createAccount') }}"><button class="btn btn-succses">Thêm</button></a>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($account as $item)
                                        <tr>
                                            <td class="serial">{{ $item->id }}</td>
                                    
                                            <td> <span class="product">{{ $item->fullname }}</span> </td>
                                            <td> {{ $item->username }} </td>
                                            <td> <span class="name">{{ $item->email }}</span> </td>
                                            <td>
                                                <img src="{{asset('/storage/'.$item->image)}}" width="60px" alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('editAccount', $item->id) }}">Sửa</a>
                                                <a onclick="return confirm('Bạn có muốn xóa không')"
                                                    href="{{ route('deleteAccount', $item->id) }}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <td class="serial">2.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg"
                                                        alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5468 </td>
                                        <td> <span class="name">Gregory Dixon</span> </td>
                                        <td> <span class="product">iPad</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="serial">3.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg"
                                                        alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5467 </td>
                                        <td> <span class="name">Catherine Dixon</span> </td>
                                        <td> <span class="product">SSD</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="serial">4.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg"
                                                        alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5466 </td>
                                        <td> <span class="name">Mary Silva</span> </td>
                                        <td> <span class="product">Magic Mouse</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-pending">Pending</span>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
