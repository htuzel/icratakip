@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Kullanıcı Kayıt</div>
            <div class="card-body">
                <form action="{{route('kayit')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad Soyad</label>
                        <input type="text" name="name" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">TC Kimlik No</label>
                        <input type="number" name="tcn" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
