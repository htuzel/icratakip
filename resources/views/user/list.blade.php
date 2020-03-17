@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kullanıcılar</div>
                <div class="card-body">
                <a href="{{route('kayit-form')}}" type="button" class="btn btn-success float-right mb-3"><i class="fas fa-plus"></i> Ekle</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">TCN</th>
                                <th scope="col">Aksiyon</th>
                            </tr>
                        </thead>
                        @php
                        $users = \App\User::all();
                        @endphp
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->tcn}}</td>
                                <td>
                                    <a href="{{ route('kullanici-davalari', [$user->id]) }}" type="button" class="btn btn-success ">Detay</a>
                                    <a href="{{ route('duzenle-form', [$user->id]) }}" type="button" class="btn btn-warning ">Düzenle</a>
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
