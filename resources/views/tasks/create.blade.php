<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white py-5">
    <div class="container" style="max-width: 600px;">
        <h2 class="mb-4 fw-bold">Add New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Task Name</label>
                <input type="text" name="task_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary fw-bold">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>