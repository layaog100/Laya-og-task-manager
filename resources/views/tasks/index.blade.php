<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #111827;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 40px;
            padding: 0 12px;
        }

        .logo span {
            color: #60a5fa;
        }

        .nav-title {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            margin: 20px 12px 10px;
        }

        .nav-item {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            padding: 13px 12px;
            border-radius: 8px;
            margin-bottom: 6px;
        }

        .nav-item:hover,
        .nav-item.active {
            background: #2563eb;
            color: white;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            padding: 30px;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 6px;
        }

        .welcome p {
            color: #6b7280;
        }

        .add-button {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        /* SUCCESS MESSAGE */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #22c55e;
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-title {
            color: #6b7280;
            font-size: 14px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            margin-top: 8px;
        }

        .icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .blue {
            background: #dbeafe;
        }

        .green {
            background: #dcfce7;
        }

        .orange {
            background: #ffedd5;
        }

        /* TASK SECTION */
        .task-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 20px;
        }

        .task-count {
            color: #6b7280;
            font-size: 14px;
        }

        /* TASK CARDS */
        .task {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 12px;
            transition: 0.2s;
        }

        .task:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .task-main {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .task-info h3 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .task-info p {
            color: #6b7280;
            font-size: 14px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            margin-top: 12px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .pending {
            background: #fef3c7;
            color: #b45309;
        }

        /* ACTIONS */
        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
            font-weight: bold;
        }

        .view {
            background: #e0f2fe;
            color: #0369a1;
        }

        .edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .toggle {
            background: #ede9fe;
            color: #6d28d9;
        }

        .delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        /* MOBILE */
        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .task-main {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">
            Task<span>Manager</span>
        </div>

        <div class="nav-title">
            Menu
        </div>

        <a href="{{ route('tasks.index') }}" class="nav-item active">
            📋 Dashboard
        </a>

        <a href="{{ route('tasks.create') }}" class="nav-item">
            ➕ Add Task
        </a>

    </aside>


    <!-- MAIN CONTENT -->

    <main class="main">

        <!-- TOP BAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>Task Dashboard</h1>

                <p>
                    Manage your tasks and stay organized.
                </p>

            </div>

            <a href="{{ route('tasks.create') }}" class="add-button">
                + Add New Task
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success">
                ✓ {{ session('success') }}
            </div>

        @endif


        <!-- STATISTICS -->

        @php
            $totalTasks = $tasks->count();
            $completedTasks = $tasks->where('completed', true)->count();
            $pendingTasks = $tasks->where('completed', false)->count();
        @endphp

        <div class="stats">

            <div class="stat-card">

                <div class="stat-header">

                    <div>
                        <div class="stat-title">
                            Total Tasks
                        </div>

                        <div class="stat-number">
                            {{ $totalTasks }}
                        </div>
                    </div>

                    <div class="icon blue">
                        📋
                    </div>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-header">

                    <div>
                        <div class="stat-title">
                            Completed
                        </div>

                        <div class="stat-number">
                            {{ $completedTasks }}
                        </div>
                    </div>

                    <div class="icon green">
                        ✓
                    </div>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-header">

                    <div>
                        <div class="stat-title">
                            Pending
                        </div>

                        <div class="stat-number">
                            {{ $pendingTasks }}
                        </div>
                    </div>

                    <div class="icon orange">
                        ⏳
                    </div>

                </div>

            </div>

        </div>


        <!-- TASK LIST -->

        <section class="task-section">

            <div class="section-header">

                <h2>My Tasks</h2>

                <span class="task-count">
                    {{ $totalTasks }} task(s)
                </span>

            </div>


            @forelse($tasks as $task)

                <div class="task">

                    <div class="task-main">

                        <div class="task-info">

                            <h3>
                                {{ $task->title }}
                            </h3>

                            <p>
                                {{ $task->description ?? 'No description provided.' }}
                            </p>


                            @if($task->completed)

                                <span class="status completed">
                                    ✓ Completed
                                </span>

                            @else

                                <span class="status pending">
                                    ⏳ Pending
                                </span>

                            @endif

                        </div>


                        <div class="actions">

                            <a
                                href="{{ route('tasks.show', $task) }}"
                                class="btn view">
                                View
                            </a>


                            <a
                                href="{{ route('tasks.edit', $task) }}"
                                class="btn edit">
                                Edit
                            </a>


                            <form
                                action="{{ route('tasks.toggle', $task) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="btn toggle">

                                    {{ $task->completed ? 'Mark Pending' : 'Complete' }}

                                </button>

                            </form>


                            <form
                                action="{{ route('tasks.destroy', $task) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this task?');">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn delete">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty">

                    <div class="empty-icon">
                        📋
                    </div>

                    <h3>No tasks yet</h3>

                    <p>
                        Create your first task to get started.
                    </p>

                    <br>

                    <a
                        href="{{ route('tasks.create') }}"
                        class="add-button">

                        + Create Task

                    </a>

                </div>

            @endforelse

        </section>

    </main>

</body>

</html>