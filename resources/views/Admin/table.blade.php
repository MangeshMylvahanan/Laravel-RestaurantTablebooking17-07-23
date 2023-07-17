@extends('Admin.master')
@section('admin-content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catagories</h4>
                    <div class="table-responsive">
                        @if(count($tables) < 1)
                            <a href="/addtable" class="btn btn-outline-success">Add Table</a>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: aliceblue;font-size:15px;">Table No</th>
                                        <th style="color: aliceblue;font-size:15px;">Price</th>
                                        <th style="color: aliceblue;font-size:15px;">Members</th>
                                        <th style="color: aliceblue;font-size:15px;">Status</th>
                                        <th style="color: aliceblue;font-size:15px;">Edit</th>
                                        <th style="color: aliceblue;font-size:15px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tables as $item)
                                        <tr>
                                            <td>{{ $item->number }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->members }}</td>
                                            @if( $item->status == 1 )
                                            <td><a href="#" class="badge badge-outline-success">Available</a></td>
                                            @else
                                            <td><a href="#" class="badge badge-outline-danger">Booked</a></td>
                                            @endif
                                            <td><a href="/edittable/{{ $item->id }}" class="badge badge-outline-primary">Edit</a></td>
                                            <td><a href="/deletetable/{{ $item->id }}" class="badge badge-outline-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    <td><a href="/addtable" class="btn btn-outline-success">Add</a></td>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
