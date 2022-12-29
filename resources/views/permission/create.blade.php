@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <strong>Add Permission</strong>
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


            <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name">Permission Name:</label>
                                <input type="text" class="form-control form-control-sm" id="role_name"
                                    placeholder="Enter Permission Name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

