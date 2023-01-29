@extends('layouts.master')

@section('content')

<main class="container">

  <div class="row mb-2">
  <div class="row row-cols-2 row-cols-md-6 g-4">
@foreach ($products as $product)
 <div class="col">
 <div class="card h-100" style="border:none" > <a   href="{{route('products.show', $product->id)}}">
   <img src="../Images/{{$product->image}}"  class="card-img-top"  alt="..."></a>
   <div class="card-body"><center>
     <h5 class="card-title">{{$product->title}} </h5>
     <b class="card-text" > {{$product->getPrice()}}</b>

     <center>
     <form action="{{route('Cart.store')}}" method="post">
     @csrf
   <input type="hidden" name='product_id' value="{{$product->id}}">
     <button  type='submit' class='btn btn-warning' > Acheter</button>
    
     </form>
    </center>


     </div></center>
    
 </div>
</div>

@endforeach


</div>


  </div>
<br><br>
  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
       
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title">My Market</h2>
        <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>

        <p>This shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
        <hr>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <h2>Faites vous plaisir avec My market</h2>
        <p>This is an example blockquote in action:</p>
        <blockquote class="blockquote">
          <p>Quoted text goes here.</p>
        </blockquote>
     

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Contact</a>
        <a class="btn btn-outline-secondary disabled">My Market</a>
      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">Qui sommes-nous ?</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
          </ol>
        </div>

        <div class="p-4">
      
        </div>
      </div>
    </div>
  </div>

</main>

@endsection





