@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

           <style>
            .card-title {
    float: none!important; 
}
           </style>

@if(auth()->user())
    @if(auth()->user()->isAdmin == 1)
    <div class="col-12 row text-right py-3">
    <div class="div">
    <a class='btn btn-primary' href='{{route("spareparts.create")}}'>Buat</a> 
    <a class='btn btn-success' href='{{route("spareparts.index")}}'>Tabel</a> 
    </div>
    </div>
    @endif
@endif

<div class="row col-12 py-5">
    <div class="col-6">
        <h3>Tembungspeedshop</h3>
       
        <p>Tembungspeedshop adalah sebuah bengkel kereta yang berfokus pada performance dan tampilan, di bengkel kami, kami juga menerima servisan kereta mulai dari servis bulanan sampe servis besar, pastinya harganya bersaing dengan bengkel manapun di dunia ini. Disini melalui website ini kami menampilkan katalog produk-produk yang kami jual dan yang tersedia di bengkel kami, kalo kelen sor sama produk produk yang kami jual silahkan datang ke bengkel kami yang beralamat di Tembung.






</p>
    </div>
    <div class="col-6">
        
<div id="demo" class="carousel slide" data-ride="carousel">

 

<!-- The slideshow -->
<div class="carousel-inner">

@foreach($allSpareparts as $key => $spareparts)

  <div class="carousel-item ">
    <img src=" {{ Storage::url($spareparts->image)}}"   alt="Los Angeles" width="100%" height="350">
  </div> 

  @endforeach 

</div>



<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

    </div>
</div>


<div class="row col-12 py-5 text-center">
    katalog Produk :
</div>





<div class="col-12 row">
                 
                    @foreach($allSpareparts as $key => $spareparts)
                    <div class="col-4">
                    <div class="card  text-center" >
                    <img  class="m-auto"  src=" {{ Storage::url($spareparts->image)}}"  width='150' height='156'>
                    <div class="card-body  text-center">
                    <h4 class="card-title  text-uppercase"> {{ $spareparts->name;}}</h4>
                    <p class="card-text text-center"> Rp. {{ $spareparts->price;}}</p>
                    </div>
                </div>
                    </div>
                  
                    @endforeach 
                    </div>


          
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(() => {
        document.querySelectorAll('.carousel-item')[0].classList.add('active')
    }, 500);
</script>