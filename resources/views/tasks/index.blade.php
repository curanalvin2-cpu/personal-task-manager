<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <!-- Bootstrap 5 Dark Theme Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-dark text-white py-5">
    <div class="container" style="max-width: 900px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-primary"><i class="bi bi-check2-square"></i> Personal Task Manager</h1>
            <a href="/tasks/create" class="btn btn-success fw-bold">+ Add New Task</a>
        </div>

        @if($tasks->isEmpty())
            <div class="alert alert-secondary text-center">No tasks found. Click "+ Add New Task" to get started!</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($tasks as $task)
                    <div class="col">
                        <div class="card h-100 bg-secondary text-white border-0 shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title fw-bold text-wrap">{{ $task->task_name }}</h5>
                                    <span class="badge {{ $task->status == 'Completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $task->status }}
                                    </span>
                                </div>
                                <p class="card-text text-light small mb-3">{{ $task->description ?? 'No description provided.' }}</p>
                                <p class="card-text text-info small mb-3"><i class="bi bi-calendar-event"></i> Due: {{ $task->due_date ?? 'N/A' }}</p>
                                
                                <div class="d-flex gap-2">
                                    <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-outline-light">Edit</a>
                                    <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>