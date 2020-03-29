@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mahkeme Notları</div>
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
                    <ul class="list-group">
                        @foreach ($notes as $note)
                            <li class="list-group-item">
                            {{$note->content}}
                            <a href="{{route('duzenle-not', $note->id)}}" class="btn btn-success float-right">Düzenle</a>
                            <a href="{{route('not-sil', $note->id)}}" class="btn btn-primary float-right">sil</a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{route('not-olustur')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Not</label>
                            <input type="text" name="not" class="form-control"  />
                        </div>
                        <input type="hidden" name="courtid" class="form-control" value="{{$court_id}}"/>
                        <button type="submit" class="btn btn-primary float-right">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
