@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ route('updateActivity', ['activity' => $activity]) }}" class="panel panel-default">
                <div class="panel-heading">Edit Activity</div>

                <div class="panel-body">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>User</label>
                        <p class="form-control-static">{{ $activity->user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Date created</label>
                        <p class="form-control-static">{{ $activity->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                    <div class="form-group">
                        <label>Date last updated</label>
                        <p class="form-control-static">
                            @if (!is_null($activity->updated_at))
                                {{ $activity->updated_at->format('Y-m-d H:i') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject', $activity->subject) }}">
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('activities') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
