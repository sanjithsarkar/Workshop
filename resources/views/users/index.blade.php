@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>

                @can('user-create')
                    <a class="float-right mr-4 btn btn-outline-success" href="{{ route('users.create') }}"><strong>Add
                            User</strong></a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Access</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                      @php
                         $i = 0;
                      @endphp
                        @can('user-access')
                            @foreach ($users as $user)
                                <tr role="row" class="odd">
                                    <td width="10% " scope="row">{{ ++$i }}</td>
                                    <td width="10%">{{ $user->name }}</td>
                                    <td width="10%">{{ $user->email }}</td>
                                    @foreach ($user->roles as $role)
                                        <td width="10%">{{ $role->name }}</td>
                                    @endforeach

                                    <td width="30%">
                                        @can('user-edit')
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-success btn-sm mr-2">
                                                <i class="fa fa-eye" aria-hidden="true">
                                                    Show
                                                </i>
                                            </a>
                                        @endcan

                                        @can('user-edit')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-outline-primary btn-sm mr-2">
                                                <i class="fa fa-edit" aria-hidden="true">
                                                    Edit
                                                </i>
                                            </a>
                                        @endcan

                                        @can('user-delete')
                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                method="post" class="d-inline-block">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm mr-2">
                                                    <i class="fa fa-trash" aria-hidden="true">
                                                        Delete
                                                    </i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
