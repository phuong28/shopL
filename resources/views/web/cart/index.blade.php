@extends('web/layouts.app')

@section('content') 
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php $sum=0; ?>
                            @foreach($cartItems as $key => $cartItem)
                    <tr>
                        <td class="align-middle"><img src="{{ asset("storage/{$cartItems[$key]['images']}")}}"
                                style="width: 50px">{{ $cartItems[$key]['name']}}</td>
                        <td class="align-middle">
                            {{number_format($cartItems[$key]['price'], 0, ".", ",")." VND"}}</td>
                        <td class="align-middle">
                            <form style="text-align: center;" action="{{route('cartM',['id'=>$key])}}" method="POST" id="<?php echo $key; ?>">
                                {{ csrf_field() }}   
                            <input style="width: 50%;border:none;border-radius:10px;padding: 10px 20px;background-color: #f5f5f5;" onchange="document.getElementById(<?php echo $key; ?>).submit()" type="number" class="quantity update-cart" name="quantity" autocomplete="off" min="1" value="<?php echo $cartItems[$key]['quantity']?>"/>
                            <input type="hidden" name="update" />
                                
                        </form>
                        </td>
                        <td class="align-middle">
                            <?php 
                            $cartItemTotalPrice = $cartItems[$key]['price'] * $cartItems[$key]['quantity']; 
                            $sum += $cartItemTotalPrice;
                    ?>
                        {{number_format($cartItemTotalPrice, 0, ".", ",") }} VND
                        </td>
                        <td class="align-middle">
                            <a  class="btn btn-sm btn-primary" href="{{route('cartD',['id'=>$key])}}">
                                X
                            </a>
                                </td>
                    </tr>
                    @endforeach 

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="" method="POST">
                <div class="input-group">
                    <p>Import UUDAI50K code for menu row on 300000VND</p>
                    <input type="text" class="form-control p-4" placeholder="Nhập mã UUDAI50K " name="code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal </h6>
                        <h6 class="font-weight-medium"><span>{{number_format($sum, 0, ".", ",")}}</span></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">10,000VND</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><span>{{ number_format($sum+10000, 0, ".", ",")}} VND</span></span></h5>
                    </div>
                    <a href="{{route('checkout')}}"  class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection