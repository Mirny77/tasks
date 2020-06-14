@extends('layouts.layout',['title'=>'Создание задания'])
@section('content')
    <form action="{{route('task.store')}}" method="post" >
        <h2>Создать задание</h2>
        {{ csrf_field() }}

        <div class="form-group">Название:
            <input type="text" class="form-control" name="title" required value="{{old('title') ?? ''}}">
        </div>

        <div class="form-group">Описание:
            <textarea name="descr" rows ="10" class="form-control" required>{{old('descr') ?? ''}}</textarea>

        </div>
        <div class="form-group">Статус:
            {{--    <input type="text" class="form-control" name="status" required value="{{old('status')??$task->status ?? ''}}">--}}
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
                <input type="checkbox" name="users[]" value="{{($user->id)}}">

                <span>{{$user->name}}</span><br>

            @endforeach
        </div>


        <div class="button-form"> <input type="submit" value="Создать задание" class="btn-outline-primary"></div>

    </form>

@endsection
