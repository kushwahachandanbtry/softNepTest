@extends('layouts.frontend');
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Task
                        <a href="{{url('/')}}" class="btn btn-warning float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{old('task')}}" class="form-control">
                            @error('task')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" cols="3" id="">{!!old('description')!!}</textarea>
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Priority</label>
                            <input type="text" value="{{old('priority')}}" name="priority" class="form-control">
                            @error('priority')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Due Date</label>
                            <input type="date" value="{{old('priority')}}" name="due_date" class="form-control">
                            @error('due_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
