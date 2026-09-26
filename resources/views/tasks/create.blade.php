<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2563eb;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            height: 150px;
        }

        button,
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #6b7280;
            color: white;
        }

        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="title">Task Title</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Enter task title"
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror


        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
            placeholder="Enter task description"
        >{{ old('description') }}</textarea>

        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror


        <button type="submit">
            Save Task
        </button>

        <a href="{{ route('tasks.index') }}" class="back">
            Back
        </a>

    </form>

</div>

</body>
</html>