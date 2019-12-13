@extends('layout')
@section('content-title')
<h4>Dari: {{ $origin }}</h4>
<h4>Tujuan  : {{ $destination }}</h4>
@endsection
@section('content')
<div class="box box-warning">
    <div class="box-body">
      <form method="post" action="{{ action('PageController@processShipping') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <!-- text input -->
       <div class="row">
          <div class="form-group col-md-12">
              <h4>Ongkos Kirim JNE</h4>
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nama Layanan</th>
                  <th>Tarif</th>
                  <th>ETD (Estimates Days)</th>
                </tr>
                </thead>
                <tbody>
                  <?php for($i=0; $i<count($array_result["rajaongkir"]["results"][0]["costs"]); $i++){ ?>
                    <tr>
                      <td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?> </td>
                      <td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td>
                      <td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>  
          </div>

          <div class="form-group col-md-12">
              <h4>Ongkos Kirim TIKI</h4>
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nama Layanan</th>
                  <th>Tarif</th>
                  <th>ETD (Estimates Days)</th>
                </tr>
                </thead>
                <tbody>
                  <?php for($i=0; $i<count($array_result1["rajaongkir"]["results"][0]["costs"]); $i++){ ?>
                    <tr>
                      <td><?php echo $array_result1["rajaongkir"]["results"][0]["costs"][$i]["service"] ?> </td>
                      <td><?php echo $array_result1["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td>
                      <td><?php echo $array_result1["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>  
          </div>

          <div class="form-group col-md-12">
              <h4>Ongkos Kirim Pos Indonesia</h4>
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Nama Layanan</th>
                  <th>Tarif</th>
                  <th>ETD (Estimates Days)</th>
                </tr>
                </thead>
                <tbody>
                  <?php for($i=0; $i<count($array_result2["rajaongkir"]["results"][0]["costs"]); $i++){ ?>
                    <tr>
                      <td><?php echo $array_result2["rajaongkir"]["results"][0]["costs"][$i]["service"] ?> </td>
                      <td><?php echo $array_result2["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td>
                      <td><?php echo $array_result2["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
          </div>
       </div>

      </form>
    </div>
    <!-- /.box-body -->
  </div>

@endsection



