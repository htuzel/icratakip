@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mahkeme Kayıt Kullanıcı : {{ $userid }}</div>
                <div class="card-body">
                    <form action="{{route('mahkeme-ekle')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mahkeme Numarası</label>
                            <input type="text" value="{{old('casenumber')}}"  name="casenumber" class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mahkeme Adı</label>
                            <input type="text" value="{{old('courtname')}}" name="courtname" class="form-control"  />
                        </div>
                        <input type="hidden" name="userid" class="form-control" value="{{$userid}}"/>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
