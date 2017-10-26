<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-4 control-label">Nama User</label>

    <div class="col-md-6">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" autofocus>
        {!! $errors->first('nama', ':message') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail User</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('no_kp') ? ' has-error' : '' }}">
    <label for="telefon" class="col-md-4 control-label">No. KP</label>

    <div class="col-md-6">
        <input id="no_kp" type="text" class="form-control" name="no_kp" value="{{ old('no_kp') }}" autofocus>
        {!! $errors->first('no_kp', '<span style="color: green">:message</span>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="telefon" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" autofocus>
        {!! $errors->first('password', '<span style="color: green">:message</span>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('cawangan') ? ' has-error' : '' }}">
    <label for="pertanyaan" class="col-md-4 control-label">Cawangan</label>

    <div class="col-md-6">
        <select name="cawangan" class="form-control">
          <option value="1">Cawangan 1</option>
          <option value="2">Cawangan 2</option>
          <option value="3">Cawangan 3</option>
        </select>
    </div>
</div>
