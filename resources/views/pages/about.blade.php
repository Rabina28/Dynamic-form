@extends('layouts.admin_layout')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">About</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
                <h2>Hello welcome to the about page..</h2>
                <form action="{{route('pages.about.update',$about->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="row">
                        <div class="form-group col-md-5 mt-3">
                            <h3>Image</h3>
                            <img style="height: 30vh" src="{{url($about->image)}}" class="img-thumbnail">
                            <input class="mt-4" type="file" id="image" name="image">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <div class="mb-3">
                                <label for="title"><h4>Title</h4></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$about->title}}">
                            </div>
                            <div class="mb-5">
                                <label for="sub_title"><h4>Description</h4></label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$about->description}} ">
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
