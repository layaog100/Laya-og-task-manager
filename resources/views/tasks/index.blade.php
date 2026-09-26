<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 20px 40px;
        }

        .navbar h1 {
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            color: white;
        }

        .primary {
            background: #2563eb;
        }

        .success {
            background: #16a34a;
        }

        .warning {
            background: #f59e0b;
        }

        .danger {
            background: #dc2626;
        }

        .secondary {
            background: #6b7280;
        }

        .task {
            background: white;
            padding: 20px;
            margin-top: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .task.completed h3 {
            text-decoration: line-through;
            color: #777;
        }

        .actions {
            margin-top: 15px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            margin-top: 20px;
            border-radius: 6px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="navbar">
    <h1>Task Manager</h1>
</div>

<div class="container">

    <div class="top">
        <h2>My Tasks</h2>

        <a href="{{ route('tasks.create') }}" class="btn primary">
            + Add Task
        </a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @forelse($tasks as $task)

        <div class="task {{ $task->completed ? 'completed' : '' }}">

            <h3>{{ $task->title }}</h3>

            <p>
                {{ $task->description ?: 'No description.' }}
            </p>

            <strong>
                Status:
                {{ $task->completed ? '✅ Completed' : '⏳ Pending' }}
            </strong>

            <div class="actions">

                <a href="{{ route('tasks.show', $task) }}"
                   class="btn secondary">
                    View
                </a>

                <a href="{{ route('tasks.edit', $task) }}"
                   class="btn warning">
                    Edit
                </a>

                <form action="{{ route('tasks.toggle', $task) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn success">
                        {{ $task->completed ? 'Mark Pending' : 'Complete' }}
                    </button>

                </form>

                <form action="{{ route('tasks.destroy', $task) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this task?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn danger">
                        Delete
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="task">
            <h3>No Tasks Yet</h3>
            <p>Create your first task.</p>
        </div>

    @endforelse

</div>

</body>
</html>