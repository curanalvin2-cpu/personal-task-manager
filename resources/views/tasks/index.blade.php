<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Task Manager</h2>
    <a href="/tasks/create" class="btn btn-primary mb-3">Add Task</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->description }}</td>
                <td><span class="badge bg-secondary">{{ $task->status }}</span></td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>