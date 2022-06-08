@extends('layouts.index')

@section('content')
<form action="{{ url('userOrmawa') }}" method="post">
    <div class="form-group">
        @csrf
       <input type="Text" name="username" class="form-control" placeholder="Username"><br>
       <input type="password" name="password" class="form-control" placeholder="Password"><br>
       <input type="password" name="password1" class="form-control" placeholder="Ulangi Password"><br>

        <button type="submit">Simpan</button>
    </div>
</form>
@endsection