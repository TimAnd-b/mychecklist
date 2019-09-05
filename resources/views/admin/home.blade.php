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
                            <th scope="col">Имя</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if (!($user->id == $you_id))
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#basicModal" value="{{$user->id}}" onclick="f(this)">
                                            Редактировать
                                        </button>
                                    </td>
                                    <td>
                                        @if ($user->banned)
                                            <form action="/admin/user/{{$user->id}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-dark">Разбанить</button>
                                            </form>
                                        @else
                                            <form action="/admin/user/{{$user->id}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="PUT">
                                                <button type="submit" class="btn btn-dark">Бан</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/admin/user/{{$user->id}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="delete">
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/user/{{$user->id}}/checklists" role="button">Посмотреть чеклисты</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" action="/admin/user">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <input id="user_id" name="user_id" type="hidden" value=>
                                <div class="modal-body">
                                    <span>Имя</span>
                                    <input type="text" class="form-control" name="name" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                    <span>Email</span>
                                    <input type="text" class="form-control" name="email" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <script>
        function f(el) {
            var id = el.value;
            document.getElementById('user_id').value = id;
        }
    </script>
@endsection