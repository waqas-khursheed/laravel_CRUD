<!-- Styles -->
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    width : 600px;
    }
</style>
<a href="todo_create">Add Record</a><br><br>
{{session('msg')}}
<div class="flex-center position-ref full-height">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach($todoArr as $todo)
        <tr>
            <td>{{ $todo->id}}</td>
            <td>{{ $todo->name}}</td>
            
            <td><a href="todo_delete/{{$todo->id}}">Delete</a>|
            <a href="todo_edit/{{$todo->id}}" >Edit</a></td>
            <!--
            <td><a href="" class="delete_record" data-id="{{ $todo->id}}">Delete</a>|
            -->
            
        </tr>
        @endforeach
    </table>
</div>
   
