<?php

namespace App\Http\Livewire;

use App\Events\UpdateTodos;
use Livewire\Component;
use App\Models\Todo;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AddTodo extends Component
{
    use WithFileUploads;

    public $name, $image, $input_reset;

    public function mount()
    {
        $this->input_reset = rand();
    }

    public function render()
    {
        return view('livewire.add-todo');
    }


    public function updated($field)
    {
        $this->validateOnly($field,[
            'name'=>'required|min:3',
            'image'=>'required|image|max:1024'
        ]);
    }

    public function saveTodo()
    {
        $todo = new Todo;

        $this->validate([
            'name'=>'required|min:3',
            'image'=>'required|image|max:1024'
        ]);

        $imageCloud = Cloudinary::upload($this->image->path())->getSecurePath();
        $todo->image = $imageCloud;
        $todo->name = $this->name;

        if ($todo->save()) {
            $this->reset(['name','image']);
            $this->input_reset = rand();
            event(new UpdateTodos($todo->name,$todo->image));
        }
    }

}
