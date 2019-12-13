@extends('layout')
@section('content-title','Provinces List')
@section('content')
<div class="row" style="padding:10px;">
    <div class="col-md-12">
        <a href="{{ route('get_city') }}" class="btn btn-primary">Get Api City</a>
    </div>
</div>
<div class="box box-warning">
    <div class="box-body">
      <form method="post" action="{{ action('PageController@processShipping') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <!-- text input -->
       <div class="row">
            <div class="form-group col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>City Name</th>
                        <th>Province Name</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($c as $c)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $c->city }} </td>
                                <td> {{ $c->province }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
      </form>
    </div>
</div>