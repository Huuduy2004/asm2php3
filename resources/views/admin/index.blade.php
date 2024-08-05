@extends('admin.layouts.master')
@section('content')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="menu-icon fa fa-product-hunt"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$allProduct}}</span></div>
                                        <div class="stat-heading">Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="menu-icon fa fa-user-md"></i>

                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$allUser}}</span></div>
                                        <div class="stat-heading">User</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$allAdmin}}</span></div>
                                        <div class="stat-heading">AdMin</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pt-3">
                                <strong class="card-title">Sản phẩm theo danh mục</strong>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $cate )
                                            <tr>
                                              
                                                <td> <span class="count">{{$cate->id}}</span> </td>
                                                <td><span class="name">{{$cate->name}}</span></td>
                                                <td><span class="count">{{$cate->pr_count}}</span></td>

                                            </tr>
                                            @endforeach
                                            
                                         
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                    
                </div>
            </div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Sản phẩm có giá lớn nhất </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>PriceDel</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <tr>                                             
                                                <td> <span class="count">{{$maxPrice->id}}</span> </td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <img class="rounded-circle" src="{{ asset('/storage/' . $maxPrice->image)  }}" alt="">
                                                        {{-- <img src="{{ asset('storage/' . $product->image) }}" alt=""> --}}
                                                    </div>
                                                </td>
                                                <td><span class="name">{{$maxPrice->title}}</span></td>
                                                <td><span class="count">{{$maxPrice->price}}</span></td>
                                                <td><span class="count">{{$maxPrice->priceDel}}</span></td>
                                                <td><span class="name">{{$maxPrice->cateName}}</span></td>
                                            </tr>
                                                                                                 
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->                   
                </div>
            </div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Sản phẩm có giá nhỏ nhất </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>PriceDel</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <tr>                                             
                                                <td> <span class="count">{{$minPrice->id}}</span> </td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <img class="rounded-circle" src="{{ asset('/storage/' . $minPrice->image)  }}" alt="">
                                                        {{-- <img src="{{ asset('storage/' . $product->image) }}" alt=""> --}}
                                                    </div>
                                                </td>
                                                <td><span class="name">{{$minPrice->title}}</span></td>
                                                <td><span class="count">{{$minPrice->price}}</span></td>
                                                <td><span class="count">{{$minPrice->priceDel}}</span></td>
                                                <td><span class="name">{{$minPrice->cateName}}</span></td>
                                            </tr>
                                                                                                 
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->                   
                </div>
            </div>
            <!-- /.orders -->
           
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
@endsection