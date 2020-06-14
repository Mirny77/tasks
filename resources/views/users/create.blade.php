@extends('layouts.layout',['title'=>'Создание сотрудника'])
@section('content')
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        <h2>Создать пост</h2>
        {{ csrf_field() }}

        <div class="form-group">ФИО:
            <input type="text" class="form-control" name="name" required value="{{old('name')?? ''}}">
        </div>
        <div class="form-group">Фото:
            <input type = "file" name="img">
        </div>

        <div class="form-group">
            <div>Задание:</div>
            @foreach($tasks as $task)
                <input type="radio" name="tasks[]" value="{{($task->id)}}">
                <span>{{$task->title}}</span><br>

            @endforeach
        </div>



        <input type="submit" value="Создать" class="btn-outline-success">
    </form>

@endsection
