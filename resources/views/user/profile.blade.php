@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Şifre Değiştir</div>
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
                <form action="{{route('sifre-degistir')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Şifre Değiştir</label>
                        <input type="password" name="password" value=""  class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Şifre Doğrula</label>
                        <input type="password" name="password1" value=""  class="form-control" />
                    </div>
                    <input type="hidden" name="userid" class="form-control" value="{{Auth::user()->id}}"/>
                    <!-- Auth::user()->id Login olmus kullanıcının id'sini getirir -->
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
