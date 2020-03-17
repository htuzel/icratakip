@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kullanıcı Mahkemeleri</div>
                <div class="card-body">
                <a href="{{ route('mahkeme-form', ['user_id' => $user_id] )}}" type="button" class="btn btn-success float-right mb-3"><i class="fas fa-plus"></i> Mahkeme Ekle</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mahkeme Numarası</th>
                                <th scope="col">Mahkeme</th>
                                <th scope="col">Aksiyon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courts as $court)
                            <tr>
                                <th scope="row">{{$court->id}}</th>
                                <td>{{$court->casenumber}}</td>
                                <td>{{$court->courtname}}</td>
                                <td>
                                    <a href="{{ route('mahkeme-notlari', [$court->id]) }}" type="button" class="btn btn-success ">Detay</a>
                                    <a href="{{ route('duzenle-mahkeme', [$court->id]) }}" type="button" class="btn btn-warning ">Düzenle</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
