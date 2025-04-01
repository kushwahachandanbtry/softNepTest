@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    @session("status")
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endsession
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Task List
                        <a href="{{route('task.add')}}" class="btn btn-primary float-end">Add Task</a>
                    </h3>
                </div>
                <div class="card-header">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Mark</th>
                                <th>Status</th>
                                <th>ID</th>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    <form action="{{ route('update.status', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info">
                                            {{ $task->status == 0 ? "Mark as Completed" : "Mark as Incomplete" }}
                                        </button>
                                    </form>

                                </td>
                               
                                <td> {{ $task->status == 0 ? "Incomplete" : "Completed" }}</td>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->priority}}</td>
                                <td>{{$task->due_date}}</td>
                                <td>
                                    <a href="{{route('task.edit', $task->id)}}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$tasks->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
