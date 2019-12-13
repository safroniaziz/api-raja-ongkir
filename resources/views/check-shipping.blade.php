@extends('layout')
@section('content-title','Silahkan Cek Shipping')
@section('content')
<div class="box box-warning">
    <div class="box-body">
      <form method="post" action="{{ action('PageController@processShipping') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <!-- text input -->
       <div class="row">
        <div class="form-group col-md-12">
            <label>Origin</label>
            <select id="origin" class="form-control" name="origin">
              <option selected="selected" value="">Pilih Origin</option>
              @foreach($city as $c)
              <option value="{{ $c->id }}">{{ $c->city }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group col-md-12">
            <label>Destination</label>
            <select id="destination" class="form-control" name="destination">
              <option selected="selected" value="">Pilih Destination</option>
              @foreach($city as $c)
              <option value="{{ $c->id }}">{{ $c->city }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group col-md-12">
            <label>Weight</label>
            <input type="text" name="weight" class="form-control" placeholder="Enter ...">
          </div>
  
          <div class="box-footer col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
       </div>

      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection