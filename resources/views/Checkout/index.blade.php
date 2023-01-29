@extends('layouts.master')


@section('content')
<!-- <br>

    <div class="container bg-light mt-4">
  <main>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Votre panier </span>
          <span class="badge bg-dark rounded-pill">  {{ Cart::count() }}</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Prix hors taxe </h6>
              <small class="text-muted"></small>
            </div>
            <span class="text-muted">{{ Cart::subTotal() }}   €</span>
          </li>
         
         
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Taxe</h6>
         
            </div>
            <span class="text-success">{{ Cart::Tax() }}   €</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total </span>
            <strong>{{ Cart::Total() }}   €</strong>
          </li>
        </ul>

      </div>


      <div class="col-md-7 col-lg-8">

 -->


      <form  action="{{route('paiement.store')}}" method="POST" >
            @csrf
          <div class="row g-3">

          <h4 class="mb-3">Paiement</h4>

            <div class="col-md-12">
  
<button class="w-100 btn btn-success btn-lg" type="submit" >Procéder au paiement</button>
</form>
        <!-- <form  action="{{route('paiement.store')}}" method="POST" id="payment-form">
            @csrf
          <div class="row g-3">

          <h4 class="mb-3">Paiement</h4>

            <div class="col-md-12">
                 
<div class="form-control " id="card-element">
</div>
<div id="card-error" role="alert"></div>
            </div>


          </div>
          <hr class="my-4">

          

          <div class="row gy-3">

<button class="w-100 btn btn-success btn-lg" id="submit" >Procéder au paiement</button> -->

        </form>
      </div>
    </div>
  </main>

</div>


   <br>
@endsection

    


<!-- @section('extra-js')
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields

var stripe= Stripe('pk_test_NkUtAyXSsBBCCJtarnWmLgZf00GDHArOnM');
var elements = stripe.elements();
var style = {
base:{
color:"#32325d",
font_Family:' "Helvetica Neue",Helvetica, sans-serif',
font_Smoothing:"antialiased",
fontSize:"16px",
"::placeholder":{
color:"#aab7c4"
}
},
invalid:{
color:"#fa755a",
iconColor:"#fa755a"
}
};
var card = elements.create("card", {style: style});
card.mount("#card-element");
card.addEventListener('change',({error}) =>{
    if(error){
        displayError.classList.add('alert', 'alert-warning')
        displayError.textContent = error.message;
    }
    else{
        displayError.classList.remove('alert', 'alert-warning')
        displayError.textContent =" ";
    }
});
var submitButton = document.getElementById('click', function(ev){
    ev.preventDefault();
    subtmitButton.disabled=true;
    stripe.confirmCardPayment("sk_test_VePHdqKTYQjKNInc7u56JBrQ", {
    payment_method:{
    card: card

        }
    
}).then(function(result){
    if(result.error){
        subtmitButton.disabled=false;
        console.log(result.error.message);
    }else{
        if(result.paymentIntent=='succeeded'){ 
var paymentIntent = result.paymentIntent;  
var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');       
var form = document.getElementById('payment-form');
var url = form.action;
var redirect = '/merci';
fetch( 
    url,
    {
        headers:{
           "content-Type":"application/json",
           "Accept":"application/json, text-plain, */*",
           "X-Requested-Width":"XMLHttpRequest",
           "X-CSRF-TOKEN": token
        },
        method :'post',
        body: JSON.stringify({
           paymentIntent : paymentIntent   
        })
    }).then((data)=> {
        console.log(data)
        //windows.loctation.href= redirect

    }).catch((error)=>{
        console.log(error)
    })


    }
}

});
});
</script> -->
@endsection

