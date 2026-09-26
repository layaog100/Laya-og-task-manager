<!DOCTYPE html>
<html>
<head>
    <title>View Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .description {
            margin: 20px 0;
            color: #555;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .back {
            background: #6c757d;
            color: white;
        }

        .edit {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>{{ $task->title }}</h1>

    <p class="description">
        {{ $task->description ?? 'No description provided.' }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $task->completed ? 'Completed' : 'Pending' }}
    </p>

    <a href="{{ route('tasks.index') }}" class="btn back">Back</a>

    <a href="{{ route('tasks.edit', $task) }}" class="btn edit">Edit</a>

</div>

</body>
</html>