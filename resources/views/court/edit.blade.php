@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Kullanıcı Mahkemeleri Düzenle</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('duzenle-mahkeme2')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mahkeme Numarası</label>
                        <input type="number" name="casenumber" value="{{$court->casenumber}}" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mahkeme</label>
                        <input type="text" name="courtname" value="{{$court->courtname}}"  class="form-control" />
                    </div>
                    <input type="hidden" name="courtid" class="form-control" value="{{$court->id}}"/>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
