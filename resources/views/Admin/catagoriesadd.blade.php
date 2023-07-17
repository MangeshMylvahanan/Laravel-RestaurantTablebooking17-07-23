@extends('Admin.master')
@section('admin-content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catagories</h4>
                    <div class="table-responsive">
                        @if(count($catagories) < 1)
                            <a href="/addcatagory" class="btn btn-outline-success">Add</a>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: aliceblue;font-size:15px;">Catagory Id</th>
                                        <th style="color: aliceblue;font-size:15px;">From Time</th>
                                        <th style="color: aliceblue;font-size:15px;">To Time</th>
                                        <th style="color: aliceblue;font-size:15px;">Edit</th>
                                        <th style="color: aliceblue;font-size:15px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catagories as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->fromtime }}</td>
                                            <td>{{ $item->totime }}</td>
                                            <td><a href="/editcatagory/{{ $item->id }}" class="badge badge-outline-primary">Edit</a></td>
                                            <td><a href="/deletecatagory/{{ $item->id }}" class="badge badge-outline-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    <td><a href="/addcatagory" class="btn btn-outline-success">Add</a></td>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
