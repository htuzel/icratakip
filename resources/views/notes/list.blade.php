@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mahkeme Notları</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($notes as $note)
                            <li class="list-group-item">{{$note->content}}</li>
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
