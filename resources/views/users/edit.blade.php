@extends('layouts.layout',['title'=>'Редактирование'])
@section('content')
    <form action="{{route('user.update',['id'=>$user->id])}}}" method="post" enctype="multipart/form-data">
        <h2>Редактировать задание</h2>
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">ФИО:
            <input type="text" class="form-control" name="name" required value="{{old('title')??$user->name }}">
        </div>
        <div class="form-group">Фото:
            <input type = "file" name="img">
        </div>
        <div class="form-group">
            <div>Сотрудники:</div>
            @foreach($tasks as $task)
                <input type="radio" name="tasks[]" value="{{($task->id)}}"
                       @if($user->tasks->where('id', $task->id)->count())
                       checked="checked"
                    @endif>
                <span>{{$task->title}}</span><br>
            @endforeach
        </div>
        <div class="button-form"><input type="submit" value="Редакрировать" class="btn-outline-primary"></div>
    </form>

@endsection

