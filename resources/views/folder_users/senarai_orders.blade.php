@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">

                  @if ( count( $orders ) )
                  <table class="table table-bordered">

                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>ID</th>
                        <th>Purpose</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach( $orders as $item )

                        <tr>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->purpose }}</td>
                          <td>{{ $item->status }}</td>

                        </tr>

                      @endforeach
                    </tbody>

                  </table>

                  @else

                  Tiada rekod orders

                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
