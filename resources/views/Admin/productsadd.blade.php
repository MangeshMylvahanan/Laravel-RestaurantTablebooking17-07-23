@extends('Admin.master')
@section('admin-content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catagories</h4>
                    <div class="table-responsive">
                        @if(count($dishes) < 1)
                            <a href="/adddish" class="btn btn-outline-success">Add new dish</a>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: aliceblue;font-size:15px;">Name</th>
                                        <th style="color: aliceblue;font-size:15px;">Catagory</th>
                                        <th style="color: aliceblue;font-size:15px;">Subcatagory</th>
                                        <th style="color: aliceblue;font-size:15px;">Price</th>
                                        <th style="color: aliceblue;font-size:15px;">Edit</th>
                                        <th style="color: aliceblue;font-size:15px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->Catagory->fromtime }}-{{ $item->catagory->totime }}</td>
                                            <td>{{ $item->SubCatagory->names }}</td>
                                            <td><a href="/editdish/{{ $item->id }}" class="badge badge-outline-primary">Edit</a></td>
                                            <td><a href="/deletedish/{{ $item->id }}" class="badge badge-outline-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    <td><a href="/adddish" class="btn btn-outline-success">Add</a></td>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
