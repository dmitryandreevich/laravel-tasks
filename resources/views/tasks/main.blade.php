@extends('layouts.main')

@section('content')
    <form action="{{ url('/add-task') }}" method="POST" class="form-add-task">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Введите задачу" name="name">
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Создать задачу</button>
            </div>
        </div>
    </form>
    <hr>
    <h1 class="all-tasks">All activated tasks:</h1>
    <hr>
    @if(count($tasks) > 0)
        <div class="row">
        @foreach($tasks as $task)
            <div class="col-md-12">
                <form action="{{ url('/select-task/'.$task->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6"><h4>{{ $task->name }}</h4></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-warning" name="change">Change</button>
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <h1>Tasks not found</h1>
            </div>
        </div>
    @endif
@endsection