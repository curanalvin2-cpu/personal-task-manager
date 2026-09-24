<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Add New Task</h2>
    <form action="/tasks" method="POST">
        @csrf
        <div class="mb-3">
            <label>Task Name</label>
            <input type="text" name="task_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save Task</button>
        <a href="/tasks" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>