<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodosList extends Component
{
    public $todos;
    protected $listeners = ['newTodo'=>'newTodo'];
    
    public function render()
    {
        $this->todos = Todo::all()->sortByDesc("id");
        return view('livewire.todos-list');
    }

    public function newTodo($todoData)
    {

        $newTodo = Todo::where('image','=',$todoData['image']);

        $this->emit('addNewTodo',$newTodo);
    }

}
