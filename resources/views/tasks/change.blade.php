@extends('layouts.main')
@section('content')
<form action="{{ url('/change-task/'.$id) }}" method="POST" class="form-add-task">
    {{ csrf_field() }}
    <h2>Change task #{{ $id }}</h2>
    <div class="row">
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Введите задачу" name="name" value="{{ $name }}">
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-success">Изменить</button>
        </div>
    </div>
</form>
@stop