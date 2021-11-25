
<a href="todo_show">View Data</a><br><br>

<form action="todo_submit" method="post">
    @csrf
    <tr>         
        <td>Name : </td>
        <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Save"></td>
    </tr>

</form>
