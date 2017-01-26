@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('tokens.createForm')

            <activities></activities>
            {{--<!-- Here for posterity, replaced by Vue component to excercise API -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Activities
                    <a href="{{ route('addActivity') }}" class="btn btn-sm btn-primary pull-right">Create</a>
                </div>

                    <table class="table">
                        <thead>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Created</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity->user->name }}</td>
                                <td>{{ $activity->subject }}</td>
                                <td>{{ $activity->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <form method="post" class="btn-group"
                                          action="{{ route('deleteActivity', [$activity]) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <a href="{{ route('editActivity', [$activity]) }}"
                                           class="btn-success btn btn-sm">Edit</a>
                                        <button type="submit"
                                                class="btn-danger btn btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>--}}
        </div>
    </div>
</div>
@endsection
