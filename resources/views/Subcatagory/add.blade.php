@extends('Admin.master')
@section('admin-content')
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: rgb(38, 38, 41);">
            <div class="row">
                <div class="d-flex justify-content-center" style="width: 600px;height:300px;">
                    <form action="/addsubcatagory" method="POST">
                        <div class="col-md-">
                            <div>
                                <label for="validationCustom07" class="form-label text-light">Catagory</label>
                                <div>
                                    <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                        name="cat_id" class="form-select" id="validationCustom07" required>
                                        <option selected disabled value="">choose..</option>
                                        @foreach ($catagories as $item)
                                            <option value={{ $item->id }}>{{ $item->fromtime }}-{{ $item->totime }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="validationCustom02" class="form-label text-light">Type of dish</label>
                                <input type="text" name="names" class="form-control" id="validationCustom02">
                                <span style="display: none" id="producterror"></span>
                            </div>
                            <br>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">Add SubCategory</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
