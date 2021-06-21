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
                    <li><a href="javascript:avoid(0)">Update-Brand</a></li>
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
                                    <h4>Brand Update Form</h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="{{route('manage-brand',$brand->id)}}" class="btn btn-primary">Manage Brand</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{route('update-brand',$brand->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="brand_name" class="col-sm-2 control-label">Brand Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{$brand->brand_name}}" placeholder="Brand Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                                <button type="submit" class="btn btn-primary">Save Brand</button>
                                            </div>
                                        </div>
                                    </form>
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

