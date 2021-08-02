@extends('layouts.admin_layout')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h2>Hello welcome to the about page..</h2>
                <form  method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="row">
                        <div class="form-group col-md-5 mt-3">
                            <h3>Image</h3>
                            <img style="height: 30vh" src="{{(@$main->bg_img)?url($main->bg_img):asset("assets/img/1.jpg")}}" class="img-thumbnail">
                            <input class="mt-4" type="file" id="bg_img" name="bg_img">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <div class="mb-3">
                                <label for="title"><h4>Title</h4></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{(@$main->title)?$main->title:"The title"}}">
                            </div>
                            <div class="mb-5">
                                <label for="sub_title"><h4>Description</h4></label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{(@$main->sub_title)?$main->sub_title:" sub_Title"}} ">
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-5">
                </form>
                <div style="height: 100vh"></div>
            </div>
        </main>
    </div>
@endsection
