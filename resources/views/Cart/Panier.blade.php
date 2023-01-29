@extends('layouts.master')

@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
              <a href="#!" class=" btn btn-outline-primary">Continuer l'achat</a>

              <div class="row">
              <div class="col-6">

              </div>

              <div class="col-6 ">
 <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Quantité</a></li>
          <li><a href="#" class="nav-link px-4 text-secondary ">Prix</a></li>
          <li><a href="#" class="nav-link px-2 text-secondary ">Retiré</a></li>
        </ul>
              </div> 
            </div>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                   
                  </div>
                  <div>
                    
                  </div>
                </div>

@if(Cart::count()>0)
@foreach($item as $product)

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                        </div>
                        <div class="ms-3">
                          <b class="small mb-0 text-dark">{{$product->name}}</b>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">
                              <select class="custom-select border" name="qty" id="qty" data-id="{{$product->rowId}}" >
                                  @for( $i= 1; $i<=7; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                  @endfor
                              </select>
                          </h5>
                        </div>
                        <div style="width: 100px;">
                          <h5 class="mb-0">{{number_format($product->price, 2,',',' '). '  €'}}</h5>
                        </div>
                        <a href="{{route('delete', $product->rowId)}}" style="color: red;"><i class="ti-trash"></i> </a>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach  
              </div>
             

            </div>

            <a href="{{route('Panier_vide')}}" class=" btn btn-outline-danger">Vider le panier <i class="ti-trash"></i> </a>
<hr>
<div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">

        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Prix hors taxe </h6>
              <small class="text-muted"></small>
            </div>
            <span class="text-muted">{{ Cart::subTotal() }}   €</span>
          </li>
         
         
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-warning">
              <h6 class="my-0">Taxe</h6>
         
            </div>
            <div class="text-warning">
            <span class="text-warnig">{{ Cart::Tax() }}   €</span>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span  class="text-success">Total </span>
            <strong  class="text-success">{{ Cart::Total() }}   €</strong>
          </li>
        </ul>
        </div>
      </div>

     
      <div class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-dark mt-4" href="{{route('stripe')}}">Aller au paiement</a>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>


    </div>


             
@endif
   
  @if(Cart::count()<=0)



          <p>le panier est vide </p>
  

@endif


  <script>
var selects=document.querySelectorAll('#qty');
Array.from(selects).forEach((element)=>{
element.addEventListener('change', function(){
var rowId=this.getAttribute('data-id');
fetch(
    '/panier/${rowId}',
    {
headers:{
    "content-Type":"application/json",
    "Accept":"application/json, text-plain, */*",
    "X-Requested-with":"XMLHttpRequest",
    "X-CSRF-TOKEN":token

},
method:"patch",
body:JSON.stringify({
  qty: this.value
})

    }
).then((data)=>{
  console.log(data);
  location.reload();
}).catch((error)=>{
  console.log(data);
})
});
});
</script>

</section>
  <br>
@endsection


