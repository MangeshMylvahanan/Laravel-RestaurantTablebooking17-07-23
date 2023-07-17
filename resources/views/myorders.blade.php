@extends('User.master')
@section('user-content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <form action="/pay" method="POST">
                                @csrf
                                @foreach ($payments as $item)
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                {{-- <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item->items }}</span>
                                                </h5>
                                                <h4>
                                                    <span class="text-primary">Rs.{{ $item->qty }}/-</span>
                                                </h4>
                                                <div> --}}
                                                    @if ($item->payment_status == 1)
                                                        <small class="fst-italic">Payment Success!...</small>
                                                    @elseif($item->payment_status == 0)
                                                        <small class="fst-italic">Payment Failure!...</small>
                                                    @endif
                                                </div>
                                                <div>
                                                    {{-- <input type="hidden" name="orderid[]"
                                                        value="{{ $cart[$index]->order_id }}"> --}}
                                                    <label>OrderId: {{ $item->order_id }}</label>
                                                    {{-- <label>Total Amount:
                                                        Rs.{{ $cart[$index]->qty * $item->price }}/-</label> --}}
                                                    {{-- <input type="hidden" name="totalAmount[]"
                                                        value="{{ $cart[$index]->qty * $item->price }}"> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
