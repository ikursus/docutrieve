@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Users</div>

                <div class="panel-body">

                  <a class="btn btn-primary" href="{{ route('borangTambahUser') }}">
                    Tambah User
                  </a>

                  <li><a href="{{ url('users') }}?caw=1">Cawangan 1</a></li>
                  <li><a href="{{ url('users') }}?caw=2">Cawangan 2</a></li>
                  <li><a href="{{ url('users') }}?caw=3">Cawangan 3</a></li>

                  <table class="table table-bordered">

                    <thead>
                      <tr>
                        <th>Nama User</th>
                        <th>No. KP</th>
                        <th>Email</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach( $senarai_users as $user )

                        <tr>
                          <td>{{ $user->nama }}</td>
                          <td>{{ $user->no_kp }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            <a class="btn btn-xs btn-info" href="{{ route('borangEditUser', $user->id)  }}">Kemaskini</a>

                            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-{{ $user->id }}">
  Delete
</button>

<!-- Modal -->
<form method="post" action="{{ route('deleteUser', $user->id) }}">
  <input type="hidden" name="_method" value="DELETE">
  {{ csrf_field() }}

<div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        Adakah anda bersetuju untuk hapuskan data berikut?
        Nama: {{ $user->nama }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

</form>



                          </td>
                        </tr>

                      @endforeach
                    </tbody>

                  </table>

                  {{ $senarai_users->links() }}

                  Jumlah Users adalah: {{ $senarai_users->total() }} orang

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
