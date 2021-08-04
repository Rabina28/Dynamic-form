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
                <div class="container">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('pages.abouts.create') }}" data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add New</a>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered table-stripped">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th style="width:200px;">Action</th>
                                </tr>
                                </thead>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->description }}</td>
                                        <td>{{ $about->image }}</td>
                                        <td>
                                            <form  method="post" action="{{ route('pages.abouts.destroy',$about->id) }}" class="delete_form">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('pages.abouts.edit',$about->id) }}" class="btn btn-xs btn-primary">Edit</a>

                                                <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                            <p class="pull-right">
                                {{ $abouts->links() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 100vh"></div>
    </div>
    </main>
    </div>
@endsection
