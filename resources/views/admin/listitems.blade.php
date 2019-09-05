@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Дата создание</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listitems as $listitem)
                            <tr>
                                <td>{{$listitem->id}}</td>
                                <td>{{$listitem->body}}</td>
                                <td>{{$listitem->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $listitems->links() }}
            </div>
        </div>
    </div>
@endsection