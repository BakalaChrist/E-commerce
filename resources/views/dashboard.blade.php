<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Compte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Mes commandes 
                </div>


                </div>
<br>
               
            <div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($order as $commande)

  <div class="col">
    <div class="card bg-white p-3">
      <div class="card-body">
        <h6 class="card-title">facture N° {{$commande->id}}</h6>
        <div class="card-header">FACTURE My Market</div>
        <p class="card-text">
        {{$commande->products}}
        </p>
      </div>
<br>
<h5>Total :  {{$commande->amount}} €</h5>

    <button class="btn btn-primary">Télécharger (pdf)</button>
  </div>
  </div>
  <hr><br>
    @endforeach
            </div>



        </div>

    </div>


    

</x-app-layout>
