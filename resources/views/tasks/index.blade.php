@extends('layouts.layout',['title'=>'Задания'])
@section('content')
    <div class="row">
        Поиск: <input type="text" id="input" class="input" />
<div class ="col-7 btn-users">
   <a href="{{route('user.index')}}" class="btn btn-outline-secondary">Сотрудники</a>
   <a href="{{route('task.create')}}" class="btn btn-outline-primary">Создать задание</a>

</div>

        @foreach($tasks as $task)
        <div class="col-12 input-search">
            <div class="card">
                <div class="card-header"><h3>Название задания: {{$task->title}}</h3></div>
                <div class="card-author">Описание задания: {{$task->descr}}</div>
                <div class="card-author"><h5>Статус задания: {{$task->status}}</h5></div>
                <div class="user-name">Сотрудники которые выполняют: {{$task->users()->pluck('name')->implode(',')}}</div>
                <div class="card-btn">
                    <a href="{{route('task.edit',['id'=>$task->id])}}" class="btn btn-outline-success">Редактировать</a>
{{--                    <form action="{{route('task.destroy',['id'=>$task->id])}}"  method="post" onsubmit="if(confirm('Вы точно хотите удалить пост?')) {return true} else {return false}">@csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <input type="submit" class="btn btn-outline-danger" value="Удалить">--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>


        @endforeach



    </div>

@endsection
