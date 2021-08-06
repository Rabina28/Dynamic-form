@extends('layouts.admin_layout')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Contact</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
                <h2>Hello welcome to the contact page.</h2>
                <div class="container">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered table-stripped">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th style="width:200px;">Action</th>
                                </tr>
                                </thead>
                                @foreach ($indices as $index)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $index->name }}</td>
                                        <td>{{ $index->phone }}</td>
                                        <td>{{ $index->email }}</td>
                                        <td>{{ $index->message }}</td>
                                        <td>
                                            <form  method="post" action="{{ route('pages.contacts.destroy',$index->id) }}" class="delete_form">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="/admin/contacts/edit/{{$index->id}}" class="btn btn-xs btn-primary">Edit</a>

                                                <a href="{{ route('pages.contacts.read',$index->id) }}" class="btn btn-xs btn-success">View</a>

                                                <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>

                        </div>
                        </div>
                    </div>
                </div>
                <div style="height: 100vh"></div>
            </div>
        </main>
    </div>
@endsection
