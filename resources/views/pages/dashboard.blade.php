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
            <h2>Hello welcome to the dashboard.</h2>
            <div style="height: 100vh"></div>
        </div>
    </main>
</div>
@endsection
