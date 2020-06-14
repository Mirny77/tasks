@extends('layouts.layout',['title'=>'Редактирование задания'])
@section('content')
    <form action="{{route('task.update',['id'=>$task->id])}}}" method="post" >
        <h2>Редактировать задание</h2>
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">Название:
            <input type="text" class="form-control" name="title" required value="{{old('title')??$task->title }}">
        </div>

        <div class="form-group">Описание:
            <textarea name="descr" rows ="10" class="form-control" required>{{old('descr')??$task->descr }}</textarea>
        </div>
        <div class="form-group">Статус:
{{--            <input type="text" class="form-control" name="status" required value="{{old('status')??$task->status ?? ''}}">--}}
            <label>
                <select name="status">
                    <option>Новое</option>
                    <option>Выполняется</option>
                    <option>Выполнено</option>
                </select>
            </label>
        </div>

        <div class="form-group">
            <div>Сотрудники:</div>
            @foreach($users as $user)
                <input type="checkbox" name="users[]" value="{{($user->id)}}"
                       @if($task->users->where('id', $user->id)->count())
                       checked="checked"
                    @endif>

                <span>{{$user->name}}</span><br>

            @endforeach
        </div>


<div class="button-form"><input type="submit" value="Редакрировать" class="btn-outline-success"></div>

    </form>

@endsection
