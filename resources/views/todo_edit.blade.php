@extends('layouts.app')

@section('content')
<a href="todo_show">View Data</a><br><br>

<!--<form action="../todo_update/{{$todoArr->id}}" method="post">-->

<form action="{{ route('todo.update', [$todoArr->id] )}}" method="post">
    @csrf
    <tr>         
        <td>Name : </td>
        <td><input type="text" name="name" id="name" value="{{$todoArr->name }}"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Save"></td>
    </tr>

</form>

@endsection