<html>
   <head>
      <title>Ohaiii-stripe</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link href="{{ asset('dashboard/bootstrap.min.css') }}" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="{{ asset('dashboard/bootstrap.bundle.min.js') }}"></script>      
   </head>
   <style>
      .subscriptionfee {
         height: 0;
         width: 0;
         padding: 0;
         border: 0;
      }
      .hide {
         display: none;
      }
   </style>
   <body>
      <div class="container mt-5">         
         <div class="row d-flex justify-content-center" style="border: 1px solid grey;">
            <div class="col-md-8 col-md-offset-3">
               <div class="panel panel-default credit-card-box">
                  <div class="panel-heading" >
                  </div>
                  <div class="panel-body">
                     @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p><br>
                     </div>
                     @endif
                     <br>
                     <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" style="border: 1px solid grey; padding: 10px">
                        @csrf
                        <input type="text" name="amount" value="{{$subscriptionfee}}" class="subscriptionfee">
                        <input type="text" name="model" value="{{$model}}" id="model" class="subscriptionfee model">
                        <div style="background-color:aquamarine; padding: 10px">
                           <h3>${{$subscriptionfee}} - Subscription(${{$subscriptionfee}}/month)</h3>
                           <p class="mb-0">This payment is for ${{$subscriptionfee*1.06}} incl.6% Transaction Fee.</p>
                           <p>Followed by payment for ${{$subscriptionfee*1.06}} incl.6% Transaction Fee every 30 days until canceled.</p>
                        </div>
                        <div style="border: 1px solid grey; padding: 10px" class="mt-4">
                           <div class='form-row row '>
                              <div class='col-xs-12 col-md-6 form-group required'>
                                 <label class='control-label'>Name on Card</label> 
                                 <input class='form-control' size='4' type='text' required>
                              </div>
                              <div class='col-xs-12 col-md-6 form-group required'>
                                 <label class='control-label'>Card Number</label> 
                                 <input autocomplete='off' class='form-control card-number' required size='20' type='text'>
                              </div>                           
                           </div>                        
                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-4 form-group cvc required'>
                                 <label class='control-label'>CVC</label> 
                                 <input autocomplete='off' class='form-control card-cvc' required placeholder='ex. 311' size='4' type='text'>
                              </div>
                              <div class='col-xs-12 col-md-4 form-group expiration required'>
                                 <label class='control-label'>Expiration Month</label> 
                                 <input class='form-control card-expiry-month' required placeholder='MM' size='2' type='text'>
                              </div>
                              <div class='col-xs-12 col-md-4 form-group expiration required'>
                                 <label class='control-label'>Expiration Year</label> 
                                 <input class='form-control card-expiry-year' required placeholder='YYYY' size='4' type='text'>
                              </div>
                           </div>
                           <div class="form-row row">
                                 <input class='mx-2 mt-2' type="checkbox" required>
                                 <label for="" style="margin-top: 2px">I have read and agree to the terms and conditions and privacy policy</label>
                           </div>
                           <div class='form-row row'>
                              <div class='col-md-12 error form-group hide'>
                                 <div class='alert-danger alert'>Please correct the errors and try
                                    again.
                                 </div>
                              </div>
                           </div>
                           <div class="form-row row d-flex justify-content-center mt-2">
                              <div class="col-xs-12">
                                 <button class="btn btn-success btn-lg btn-block" type="submit">Pay Now</button>
                              </div>
                           </div>
                        </div>
                        
                     </form>
                     <div class="spinner-border" id="loading" role="status" style="display: none; position: absolute; left: 50%; top: 50%">
                        <span class="sr-only">Loading...</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-md-offset-3 mt-5">
               <ul>
                  <li>By submitting this form you certify that you're 18 years of age or older.</li>
                  <li>By submitting this form you affirm that you have read and understood the Terms of Serviceand authorize Centrobill to bill your chosen payment method in accordance with the Terms of Service.</li>
               </ul>
               <p class="ml-4">Payment processed by Centrobill on behalf of ismygirl.com</p>
            </div>
         </div>
      </div>
      <div class="d-flex flex-column align-items-center mt-5">
         <p style="font-size: 13px">Customer Support | Terms of Service | Privacy Policy</p>
         <p class="mb-0">USA: CENTROBILL LTD, 253 Main Street #222, Matawan NJ 07747</p>
         <p class="mb-0">Canada: Services CentroBill Ltee, 2500-1751 Rue Richardson, Montreal, QC H3K 1G6</p>
         <p>EU: Eurobill Tech Ltd, formerly Centrobill(Cyprus) Limited 9 Karpenisios Street, 2021 Nicosia Cyprus</p>
         <p style="font-size: 13px">&copy; Centrobill 2012-2021. All Rights Reserved</p>
      </div>
   </body>   
</html>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    document.getElementById('loading').style.display='block';
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
   
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
              document.getElementById('loading').style.display='none';
      } else {
          console.log($('.model').val());
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
         //  $form.get(0).submit();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
         $.post("/subscriber", {
               subscriber: $('.model').val()
         }, function(result) {
            window.location.href = '/models/'+$('.model').val();
         });
      }
  }
});
</script>