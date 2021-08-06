@extends('layouts.admin_layout')
@section('content')

    <div class="container">

        <div class="panel panel-success">
            <div class="panel-heading">
                Create New contact
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pages.contacts.store') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roll"> Name </label>
                                <input type="text" class="form-control" placeholder=" Name" name="name" id="name" value="{{old('name')}}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" placeholder="Phone" name="phone" id="phone" value="{{old('phone')}}" required autocomplete="phone" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="address">Message</label>
                                <textarea type="text" class="form-control" placeholder="Messsage" name="message" id="message"  style="height: 10rem" required autocomplete="message" autofocus>{{old('message')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('pages.contacts.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>


@endsection
