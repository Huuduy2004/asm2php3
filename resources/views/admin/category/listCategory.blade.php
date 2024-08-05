@extends('admin.layouts.master')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Fullname : {{ Auth::user()->fullname }}</h1>
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
                            <strong class="card-title"></strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="avatar">Avatar</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>PriceDel</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pr as $product)
                                        <tr>
                                            <td class="serial">{{ $product->id }}</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <img class="rounded-circle"
                                                        src="{{ asset('/storage/' . $product->image) }}" alt="">
                                                    {{-- <img src="{{ asset('storage/' . $product->image) }}" alt=""> --}}
                                                </div>
                                            </td>
                                            <td> <span class="product">{{ $product->title }}</span> </td>
                                            <td> {{ $product->price }} </td>
                                            <td> <span class="name">{{ $product->priceDel }}</span> </td>
                                            <td>
                                               @foreach ($category as $cate )
                                                   @if ($cate->id == $product->category_id)
                                                       {{$cate->name}}
                                                   @endif
                                               @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('editProduct', $product->id) }}">Sửa</a>
                                                <a onclick="return confirm('Bạn có muốn xóa không')"
                                                    href="{{ route('deleteProduct', $product->id) }}">Xóa</a>
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
