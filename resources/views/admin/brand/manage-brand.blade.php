@extends('layouts.dashboard')
@section('content')
    <div class="content">
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="javascript:avoid(0)">Brand</a></li>
                    <li><a href="javascript:avoid(0)">Manage-Brand</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    @include('includes.message')
                    <div class="panel b-primary bt-md">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4>Manage Brand </h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="{{route('add-brand')}}" class="btn btn-primary">Add Brand</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel">
                                        <div class="panel-content">
                                            <div class="table-responsive">
                                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Brnad Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $i=1
                                                    @endphp
                                                    @foreach ($brands as $brand)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$brand->brand_name}}</td>
                                                        <td>{{$brand->status ==1 ? 'Active':'Inactive'}}</td>
                                                        <td>
                                                            @if ($brand->status==1)
                                                            <a href="{{route('inactive-brand',$brand->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-down"></i></a>
                                                            @else
                                                            <a href="{{route('active-brand',$brand->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-up"></i></a>
                                                            @endif
                                                            <a href="" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a href="{{route('delete-brand',$brand->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i++
                                                    @endphp
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
@endsection
