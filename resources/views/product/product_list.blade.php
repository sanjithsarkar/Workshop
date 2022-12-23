@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <a class="float-right mr-4 btn btn-outline-success" href="{{ route('products.create')}}"><strong>Add Product</strong></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php$i = 0; @endphp
                        @foreach ($Productlist as $key => $product)
                            <tr role="row" class="odd">
                                <td width="10% " scope="row">{{ ++$key }}</td>
                                <td width="10%">{{ $product->name }}</td>
                                <td width="10%">{{ $product->pro_quantity }}</td>
                                <td width="10%">{{ $product->pro_price }}</td>
                                <td width="30%">
                                    <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                        class="btn btn-outline-primary btn-sm mr-2">
                                        <i class="fa fa-eye" aria-hidden="true">
                                            Show
                                        </i>
                                    </a>

                                    @if (Auth::user()->usertype == 'Admin' || Auth::user()->usertype == "Operator")
                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            class="btn btn-outline-success btn-sm mr-2">
                                            <i class="fa fa-edit" aria-hidden="true">
                                                Edit
                                            </i>
                                        </a>
                                    @endif

                                    @if (Auth::user()->usertype == 'Admin')
                                    <a href="{{ route('products.destroy', ['product' => $product->id]) }}"
                                        class="btn btn-outline-danger btn-sm mr-2">
                                        <i class="fa fa-eye" aria-hidden="true">
                                            Delete
                                        </i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
