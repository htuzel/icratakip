@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Not Düzenle</div>
            <div class="card-body">
                <form action="{{route('guncelle-not')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Düzenle</label>
                        <input type="text" name="content" value="{{$notes->content}}" class="form-control"  />
                    </div>
                    <input type="hidden" name="note_id" class="form-control" value="{{$notes->id}}"/>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
