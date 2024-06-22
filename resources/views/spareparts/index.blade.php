@extends('layouts.app')

@section('content')
@include('sidebar')


<div class="content-wrapper"> 
      
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
              <div class="card-body">

    @if (session('message'))        
         <div class="alert alert-success" role="alert">
            {{ session('message')}}
        </div>
    @endif



    <table class="table table-bordered" id='myTable'>
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga </th> 
            <th>Gambar </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
         
         @foreach($all_Spareparts as $key => $spareparts)
    
             <tr>
             <th>{{$key+1}}</th>
                <th>{{$spareparts->name}}</th>
                <th>{{$spareparts->description}}</th>
                <th>{{$spareparts->price}} </th>  
                <th><img src="{{ Storage::url($spareparts->image)}}" width="100"></th>
                <th> 
                    <a href="{{route('spareparts.edit',$spareparts->id)}}" class='btn btn-primary'>Edit</a>
                    <button class='btn btn-danger' data-toggle="modal" data-target="#myModal{{$spareparts->id}}">Hapus</button>
                    </th>
            </tr> 

            <!-- The Modal -->
  <div class="modal" id="myModal{{$spareparts->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('spareparts.delete',$spareparts->id)}}" method='post'>

       @csrf @method('DELETE')

        <div class="modal-header">
          <h4 class="modal-title">Mau dihapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>



         @endforeach 
       
        </tbody>
      </table>

      {{$all_Spareparts->links()}}




        </div> 
              
              </div> 
            </div>
          </div>
        </div>
    </section>
    <div>

@endsection
