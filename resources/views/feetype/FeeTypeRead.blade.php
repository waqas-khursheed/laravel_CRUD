
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
  <table id="feetype">

      <thead>
          <tr>
              <th class="text-center" data-class="expand">id</th>
              <th>Name</th>
              <th>Display Name</th>
              <th>Code</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($user['page_data'] as $data)
              <tr>
                  <td class="text-center">{{ $data->id }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->dname }}</td>
                  <td>{{ $data->code }}</td>
                  <td>
                  <a href="#" class="edit-fee" data-id="{{ $data->id }}">Edit</a> / <a href="#" class="delete-fee" data-id="{{ $data->id }}">Delete</a>
                  </td>
              </tr>
          @endforeach
      </tbody>

  </table>
</div>
