<h1>Liste des tâches</h1>
<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->name }}</li>
    @endforeach
</ul>
