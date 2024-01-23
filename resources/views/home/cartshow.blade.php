<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image {
        td, th {
            vertical-align: middle;
        }
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if (session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
         {{session()->get('message')}}
         </div>
         @endif

         <div class="container">
            <div class="row">
              <div class="col-12">
                  <table class="table table-image">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <?php $totalprice=0; ?>
                    @foreach ($carts as $cart)
                    <tbody>
                      <tr>
                        <th scope="row">{{$cart->product_title}}</th>
                        <td class="w-25">
                            <img src="/product/{{$cart->image}}" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>{{$cart->quantity}}</td>
                        <td>${{$cart->price}}</td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove this.')" href="{{url('remove_cart', $cart->id)}}">Remove</a></td>
                      </tr>
                      <?php $totalprice = $totalprice + $cart->price ?>
                    </tbody>
                    @endforeach
                  </table>

                  <div>
                    <h1>Total Price : ${{$totalprice}}</h1>
                  </div>

                  <div style="">
                    <h1 style="font-size: 25px; padding-bottom: 15px">Proceed to Order</h1>
                    <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
                    <a href="" class="btn btn-danger">Pay Using Card</a>
                  </div>



              </div>
            </div>
          </div>

        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
