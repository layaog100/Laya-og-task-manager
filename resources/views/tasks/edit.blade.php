<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
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

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 150px;
        }

        button, a {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        button {
            background: #007bff;
            color: white;
            cursor: pointer;
        }

        .back {
            background: #6c757d;
            color: white;
            margin-left: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Title</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $task->title) }}"
            required
        >

        <label>Description</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>

        <button type="submit">Update Task</button>

        <a href="{{ route('tasks.index') }}" class="back">Cancel</a>

    </form>

</div>

</body>
</html>