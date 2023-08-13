<?php
use function Livewire\Volt\state;
use App\Models\Todo;

state(description:'',todos:fn()=> Todo::all());
$addTodo = function (){
    Todo::create(['description'=>$this->description]);

    $this->description='';
    $this->todos= Todo::all();
}; ?>
<html>
    <head>
        <title>Todos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    @volt
    <div>
        <h1>Add Todo</h1>
        <form wire:submit="addTodo">
            <label>
                <input type="text" wire:model="description">
            </label>
            <button type="submit">Add</button>
        </form>
        <h1>Todos</h1>
{{--        <ol>--}}
{{--            @foreach($todos as $todo)--}}
{{--                <li>{{$todo->description}}</li>--}}
{{--            @endforeach--}}
{{--        </ol>--}}
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Description</td>
                <td>Created At</td>
                <td>Action</td>
            </tr>
            @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->description}}</td>
                    <td>{{$todo->created_at}}</td>
                    <td><a href="delete/{{$todo->id}}">Delete</a> || <a href="edit/{{$todo->id}}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    @endvolt
    </body>
</html>

