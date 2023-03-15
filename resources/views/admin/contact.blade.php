@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h1><strong>Send us a mail</strong></h1>
        </div>
        @if(session('message'))
        <div class="alert alert-secondary">{{ session('message') }}</div>
        @endif
        <div class="col-12">
            <form method="POST" action="{{ route('admin.send_email') }}">
                @csrf
                <div class="form-row">
                    <div class="col-12 d-flex flex-wrap justify-content-around mt-2">
                        <div class="col-5">
                            <label class="control-label" for="name"><strong>Name</strong></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
                        </div>
                        <div class="col-5">
                            <label class="control-label" for="surname"><strong>Surname</strong></label>
                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname...">
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-wrap justify-content-around my-4">
                        <div class="col-5">
                            <label class="control-label" for="email"><strong>Email</strong></label>
                            <input type="mail" class="form-control" name="email" id="email" placeholder="Email...">
                        </div>
                        <div class="col-5">
                            <label class="control-label" for="phone"><strong>Phone nr.</strong></label>
                            <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone nr....">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="content" class="control-label"><strong>Message</strong></label>
                        <textarea name="content" id="content" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-secondary py-2 px-4 my-3">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection