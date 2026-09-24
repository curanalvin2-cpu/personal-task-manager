><!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white py-5">
    <div class="container" style="max-width: 750px;">
        
        <!-- Header Banner -->
        <div class="card bg-body-tertiary border-secondary mb-4 p-4 text-center shadow-sm">
            <h1 class="fw-bold">Make space for what matters.</h1>
            <p class="text-secondary">Keep the important work visible, moving, and finished.</p>
            <div>
                <a href="/tasks/create" class="btn btn-primary fw-bold">+ Add New Task</a>
            </div>
        </div>

        <!-- Task List Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 fw-semibold">Task List</h4>
            <span class="badge bg-secondary fs-6">{{ $tasks->count() }} Tasks</span>
        </div>

        <!-- Task Cards Loop -->
        @foreach($tasks as $task)
            <div class="card bg-body-tertiary border-secondary mb-3 p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-1">{{ $task->task_name }}</h5>
                        <p class="text-secondary small mb-2">{{ $task->description }}</p>
                        
                        <div class="d-flex align-items-center gap-2">
                            @if($task->status == 'Completed')
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                            
                            @if($task->due_date)
                                <small class="text-secondary">Due: {{ $task->due_date }}</small>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2">
                        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-outline-light btn-sm">Edit</a>
                        <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</body>
</html>