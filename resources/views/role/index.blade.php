@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Roles</h3>

                @can('role-create')
                    <a class="float-right mr-4 btn btn-outline-success" href="{{ route('roles.create') }}"><strong>Add
                            Role</strong></a>
                @endcan

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Access</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php
                            $i = 0;
                        @endphp
                        @can('role-access')
                            @foreach ($roles as $role)
                                <tr role="row" class="odd">
                                    <td width="20% " scope="row">{{ ++$i }}</td>
                                    <td width="20%">{{ $role->name }}</td>

                                    <td width="30%">
                                        @foreach ($role->permissions as $permission)
                                        <span style="background-color: gainsboro;" class="pl-2 pr-2">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>

                                    <td width="30%">
                                            <a href="#" class="btn btn-outline-success btn-sm mr-2">
                                                <i class="fa fa-eye" aria-hidden="true">
                                                    Show
                                                </i>
                                            </a>

                                        @can('role-edit')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-outline-primary btn-sm mr-2">
                                                <i class="fa fa-edit" aria-hidden="true">
                                                    Edit
                                                </i>
                                            </a>
                                        @endcan

                                        @can('role-delete')
                                        <form action="{{ route('roles.destroy', $role->id) }}"
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
