<div>

    <label for="todo-name">Tarea</label>
    <input type="text" id="todo-name" wire:model="name" wire:keydown.enter="saveTodo" placeholder="Ej. Comenzar proyecto" >

    @error('name')
        <small>{{ $message }}</small>
    @enderror

    <label for="{{ $input_reset }}">Buscar imagen</label>
    <input type="file" id="{{ $input_reset }}"  wire:model="image">

    <a href="#" class="margin-bot" aria-busy="true" wire:loading.block wire:target="image">Generating link, please wait…</a>

    @if ($image)
        <img width="200px" class="margin-bot" src="{{ $image->temporaryUrl() }}">
    @endif

    <button wire:click="saveTodo" wire:loading.remove wire:target="name, image, saveTodo">Insertar</button>
    <button class="secondary" aria-busy="true" wire:loading.block wire:target="name, image, saveTodo"></button>

    @error('image')
        <small>{{ $message }}</small>
    @enderror

    <script>

        var pusher = new Pusher('128599f752c2a446f6b3', {
          cluster: 'us3'
        });
    
        var channel = pusher.subscribe('todos-updateTable-channel');
        channel.bind('todos-updateTable-event', (data) => {
            Livewire.emit('newTodo',data);


            Livewire.on('addNewTodo', todo => {
            let newTodo = `
                <tr>
                    <td>${todo.id}</td>
                    <td>${todo.title}</td>
                    <td>${todo.image}</td>
                </tr>
            `;
            $('table tbody').append(newTodo);
            });
            
        });



    </script>

</div>
