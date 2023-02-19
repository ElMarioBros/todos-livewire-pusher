<div>

    <article>

        <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td><img width="150" src="{{ $todo->image }}"></td>
                        <td>{{ $todo->name }}</td>
                    </tr>
                @endforeach
  
            </tbody>
        </table> 

    </article>

    <script>

    </script>

</div>
