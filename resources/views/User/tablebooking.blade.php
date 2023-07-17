@extends('User.master')
@section('user-content')
    <!-- Reservation Start -->
    <div>
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Table details</h5>
                        <div>
                            <label class="availabletable">Available</label>
                            <label class="unavailabletable">Reserved</label>
                        </div>
                        <br>
                        {{-- <h1 class="text-white mb-4">Book A Table Online</h1> --}}
                        <form action="{{ route('tableorder') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                @foreach ($tables as $item)
                                    @if ($item['status'] == 0)
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input disabled type="text" class="unavailabletable"name="table_no"
                                                    id="name">
                                                <p>{{ $item['members'] }} Members table.</p>
                                            </div>
                                        </div>
                                    @elseif($item['status'] == 1)
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" disabled class="availabletable"name="table_no"
                                                    id="name">
                                                <p>{{ $item['members'] }} Members table.</p>
                                                <p>Rs.{{ $item['price'] }}/-</p>
                                                <form action="/tableorder" method="POST">
                                                    @csrf
                                                    <input hidden value={{ $item['price'] }} name="amount">
                                                    <input hidden value={{ $orderId }} name="ord_id">
                                                    <input hidden value={{ $item['id'] }} name="table_id">
                                                    <button class="btn btn-primary" type="submit">Book Now</button>
                                                </form>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="col-md-6 bg-dark d-flex align-items-center"> --}}
                {{-- <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div> --}}
                {{-- </div> --}}

            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .availabletable {
        background-color: #b3ffb3;
        padding-top: 10px;
        /* Bright color for available tables */
    }

    .unavailabletable {
        background-color: #d44141;
        padding-top: 10px;
        /* Dim color for unavailable tables */
        pointer-events: none;
        /* Disable pointer events on unavailable tables */
    }

    .tabletable td {
        width: 50px;
        height: 50px;
    }

    .tabletable th {
        width: 50px;
        height: 50px;
    }

    .selected {
        background-color: #66b3ff;
        /* Highlight selected table */
    }

    .empty {
        height: 25px;
    }
</style>
