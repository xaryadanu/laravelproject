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

        @if (count($errors) > 0) 
            @foreach($errors->all() as $error)
                 <div class="alert alert-danger">
                      {{$error}}
                </div>
            @endforeach
        @endif
              
                    <form action="{{route('spareparts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">Nama Barang</label>
                                    <input type="text" class="form-control" name="name" placeholder="input nama ">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-inline mb-4">
                                    <label>Harga Barang(Rp)</label>
                                    <div class="d-flex"> 
                                    <input type="text" name="price" class="form-control"
                                        placeholder="  input harga">
                                        </div>
                                </div>
                              
                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" name="image">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form> 
                </div> 
              
              </div> 
            </div>
          </div>
        </div>
      </section> 
@endsection


