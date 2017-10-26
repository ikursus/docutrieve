@if( session('alert-success') )

<div class="alert alert-success" role="alert">
{{ session('alert-success') }}
</div>

@endif
