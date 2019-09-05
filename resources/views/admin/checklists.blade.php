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
                        @foreach($checklists as $checklist)
                            <tr>
                                <td>{{$checklist->id}}</td>
                                <td><a href="/admin/user/checklists/{{$checklist->id}}">{{$checklist->title}}</a></td>
                                <td>{{$checklist->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $checklists->links() }}
            </div>
        </div>
    </div>
@endsection
