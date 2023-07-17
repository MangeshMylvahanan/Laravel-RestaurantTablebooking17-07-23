@extends('User.master')
@section('user-content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <form action="/add-to-cart" method="POST">
                                @foreach ($dishes as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded"
                                                src="{{ asset('uploads/' . $item['image']) }}" alt=""
                                                style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item['name'] }}</span>
                                                </h5>
                                                <h4>
                                                    <span class="text-primary">Rs.{{ $item['price'] }}/-</span>
                                                </h4>
                                                <div>
                                                    <small class="fst-italic">{{ $item['description'] }}</small>
                                                </div>
                                                <div>
                                                    @csrf
                                                    <input type="number" min="0" max="100" value="0" name="qty[]">
                                                    <input hidden value={{ $item['id'] }} name="product_id[]">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                
                                <input hidden value={{ $orderId }} name="orderid">
                                <button type="submit" class="btn btn-success">Add to cart</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <a href="/cart/{{ $orderId }}" type="button" class="btn btn-primary">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
