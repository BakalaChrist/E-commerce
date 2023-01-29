@extends('layouts.master')

@section('content')
<center>
<div class="row container">
  <div class="row row-cols-2 row-cols-md-3 g-4 border rounded">
 <div class="col">
 <div class="card h-100" style="border:none" > <a  href="">
   <img src="../Images/{{$product->image}}"  class="card-img-top" width="20%"  alt="..."></a>
   </div>
   </div>
   
   <div class="col">
   <div class="card-body">
   <h5 class="card-title">{{$product->title}} </h5>
       <h6>Description</h6>
       <p>
           Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            corporis dolor voluptatum, ipsum eveniet ea veniam q
       </p>
   <p class="card-text" > 
       {{$product->description}}
       </p>
     <h4 class="card-text" > {{$product->getPrice()}}</h4>
     <center>

     <form action="{{route('Cart.store')}}" method="post">
     @csrf
   <input type="hidden" name='product_id' value="{{$product->id}}">
     <button  type='submit' class='btn btn-warning' > Acheter</button>
    
     </form>
    </center>
     </div>
    
 </div>
</div>


</div>


  </div>

</center>
  <br>
@endsection