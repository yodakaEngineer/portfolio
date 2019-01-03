@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                New Task
            </div>
            
            <div class="card-body">
                <!-- Display Validation Errors -->
                @include('common.errors') 
                
                <!-- New Task Form -->
                <form action="{{ url('task') }}" method="POST">
                    {{ csrf_field() }} 
                    
                    <!-- Task Name  -->
                    <div class="form-group row">
                        <label for="task-name" class="col-md-3 col-form-label">Task</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Add Task Button -->
                    <div class="form-group row justify-content-center">
                        <div class="md-offset-3 col-md-6">
                            <button type="submit" class="btn page-link text-dark d-inline-block">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- TODO: Current Tasks -->
        @if (count($tasks) > 0)
        <div class="card mt-5">
            <div class="card-header bg-dark text-white">
                Current Tasks
            </div>
            <div class="card-body">
                <table class="table table-striped task-table">
                    
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            
                            <!-- TODO:削除ボタン -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger pull-right">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
    </div>
</div>
@endsection