@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Kullanıcı Kayıt</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('kayit')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad Soyad</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">TC Kimlik No</label>
                        <input type="number" value="{{ old('tcn') }}" name="tcn" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
