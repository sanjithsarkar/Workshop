@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <strong>Add User with Role</strong>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    placeholder="Enter Name" name="name">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                    placeholder="Enter email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control form-control-sm" id="password"
                                    placeholder="Enter Password" name="password" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password">Confirm Password:</label>
                                <input type="password" class="form-control form-control-sm" id="confirm-password"
                                    placeholder="Enter Password" name="confirm-password" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul class="list-group list-group-flush">
                                @foreach ($roles as $role)
                                    <li class="list-group-item">
                                        <label class="ckbox">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                            <span>{{ $role->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div></br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
