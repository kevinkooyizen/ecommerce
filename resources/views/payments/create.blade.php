<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Zenomni Pay</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

  <link rel="stylesheet" type="text/css" href="/css/core-style.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="order-details-confirmation">

          <div class="cart-page-heading">
            <h5>Your Order</h5>
          </div>

          <ul class="order-details-form mb-4">
            <li><span>Total To Pay:</span> <span>${{ $cart->total }}</span></li>
          </ul>
        </div>
      </div>
      
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-2">
         <div id="dropin-container"></div>
         <button id="submit-button">Request payment method</button>
      </div>
    </div>
  </div>
  <script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{ Braintree_ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          payload.cartId = {{ $cart->id }}

          // Converted to post request to improve security
          $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '/payment/process',
            data: {payload},
            dataType: 'JSON',
            success: function (data) {
              if (data.success) {
                alert('Payment successfull!');
                window.location.replace('/carts/' + data.cartId);
              } else {
                alert('Payment failed');
                window.location.replace('/payments/failed');
              }
            },
            error: function (data) {
              alert('Payment failed');
              window.location.replace('/payments/failed')
            },
          });
          // $.get('{{ route('payment.process') }}', {payload}, function (response) {
          //   if (response.success) {
          //     alert('Payment successfull!');
          //     window.location.replace('/payments/success')
          //   } else {
          //     alert('Payment failed');
          //     window.location.replace('/payments/failed')
          //   }
          // }, 'json');
        });
      });
    });
  </script>
</body>
</html>