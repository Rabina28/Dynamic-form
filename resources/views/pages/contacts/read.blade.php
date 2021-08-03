@extends('layouts.admin_layout')
@section('content')

    <div class="container">

        <div class="panel panel-success">
            <div class="panel-heading">
                Show the contact
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roll"> Name <span class="required">*</span></label>
                                <input type="text" disabled value="{{ $contacts->name }}" class="form-control" placeholder=" Name" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" disabled value="{{ $contacts->phone }}" class="form-control" placeholder="Phone" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled value="{{ $contacts->email }}" class="form-control" placeholder="Email" name="email" id="email">
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="address">Message</label>
                                <input type="text" disabled value="{{ $contacts->message }}" class="form-control" placeholder="Messsage" name="message" id="message" style="height: 10rem">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="{{ route('pages.contacts.index') }}" class="btn btn-danger">Back</a>

            </div>
        </div>
    </div>


@endsection
