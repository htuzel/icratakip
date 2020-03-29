@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Kullanıcı Kayıt Düzenle</div>
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
                <form action="{{route('duzenle')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad Soyad</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">TC Kimlik No</label>
                        <input type="number" name="tcn" value="{{$user->tcn}}"  class="form-control" />
                    </div>
                    <input type="hidden" name="userid" class="form-control" value="{{$user->id}}"/>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
