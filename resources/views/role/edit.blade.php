@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <strong>Add Role</strong>
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


            <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control form-control-sm" id="role_name"
                                    placeholder="Enter Role Name" name="name" value="{{ $role->name }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul class="list-group list-group-flush">
                                @foreach ($permissions as $permission)
                                    <li class="list-group-item">
                                        <label class="ckbox">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                @if (count($role->permissions->where('id', $permission->id))) checked @endif>
                                            <span>{{ $permission->name }}</span>
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
