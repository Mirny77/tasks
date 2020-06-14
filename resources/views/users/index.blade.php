@extends('layouts.layout',['title'=>'Сотрудники'])
@section('content')
<div class="row ">
    Поиск:  <input type="text" id="input" class="input" />

    <div class="col-7 btn-users">
        <a href="{{route('task.index')}}" class="btn btn-outline-secondary">Задания</a>
        <a href="{{route('user.create')}}" class="btn btn-outline-primary">Создать сотрудника</a>

    </div>



@foreach($users as $user)
        <div class="col-12 input-search">
            <div class="card ">
                <div class="card-header" id ='fio'>ФИО: <h3>{{$user->name}}</h3></div>
                <div class="card-body"><div class="card-img" style="background-image: url({{$user->img ?? asset("img/122.png")}}) "></div>
                    <div class="task-name">Задание: {{$user->tasks()->pluck('title')->implode(', ')}}</div>
                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-outline-success">Редактировать</a>

                </div>
            </div>
        </div>
    @endforeach



</div>


@endsection
