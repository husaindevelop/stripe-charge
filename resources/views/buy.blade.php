<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
body{
margin:0px;
}

    </style>
    </head>
    
    
    <body>
    <div class="container-fluid" style="width:100%;">

<div class="navbar navbar-dark bg-dark box-shadow" style="width:100%;margin-bottom:20px;">
<div class="col-5"></div>
    <div class="col-3">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <strong>Buy Product</strong>
      </a>
       </div>
       <div class="col-4">&nbsp;</div>
  </div>
    </div>

    <?php

    $users = DB::connection('mysql')->table('products')->where('id',$product)->first();
    
    
    ?>
    <div class="container-fluid" style="width:100%;">
    <div class="row">
    <div class="col-6"><div class="card">
            <div class="card-body">
              <div class="row align-items-end">
<div class="col-6"><h1 class="card-title"><?php echo $users->name; ?></h1></div>
<div class="col-6"><h3 class="text-right">Rs.<?php echo $users->price; ?></h1></div>
</div>
            
            <p class="card-text"><?php echo $users->description; ?></p>
            
            </div>
            </div>
        
        </div>
        <div class="col-2"></div>   
    
        <div class="col-4">   
    <div class="card">
    <div class="card-header">Payment</div>
            
    <div class="card-body">
    <form action="{{route('processPayment', [$product, $price])}}" method="POST" id="payment-form">
    @csrf
                    <label for="name">Name on Card</label>
                    <div class="input-group mb-2">
    <input id="card-holder-name" type="text" value="{{$user->name}}"  class="form-control"> 
                    </div>
 
 <!-- Stripe Elements Placeholder -->
 <label for="card">Card Details</label>
                    <div class="input-group mb-2">
 <div id="card-element" class="form-control"></div>
 <div id="card-errors" role="alert"></div>
                    </div>
    </form>
    <div class="row">
<div class="stripe-errors"></div>
@if (count($errors) > 0)
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
{{ $error }}<br>
@endforeach
</div>
</div>
@endif
                  
 <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-block btn-primary mt-1">
     Make Payment
 </button>
</div>
    </div>
    </div>
    
</div>
 <script src="https://js.stripe.com/v3/"></script>
 
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
var elements = stripe.elements();
var style = {
base: {
color: '#32325d',
fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
fontSmoothing: 'antialiased',
fontSize: '16px',
'::placeholder': {
color: '#aab7c4'
}
},
invalid: {
color: '#fa755a',
iconColor: '#fa755a'
}
};
var card = elements.create('card', {hidePostalCode: true, style: style});
card.mount('#card-element');
console.log(document.getElementById('card-element'));
card.addEventListener('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
displayError.textContent = event.error.message;
} else {
displayError.textContent = '';
}
});
const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;    cardButton.addEventListener('click', async (e) => {
console.log("attempting");
const { setupIntent, error } = await stripe.confirmCardSetup(
clientSecret, {
payment_method: {
card: card,
billing_details: { name: cardHolderName.value }
}
}
);        if (error) {
var errorElement = document.getElementById('card-errors');
errorElement.textContent = error.message;
}
else {
paymentMethodHandler(setupIntent.payment_method);
}
});
function paymentMethodHandler(payment_method) {
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'payment_method');
hiddenInput.setAttribute('value', payment_method);
form.appendChild(hiddenInput);
form.submit();
}
</script>

</body>
</html>

    

    

    
</body>
</html>