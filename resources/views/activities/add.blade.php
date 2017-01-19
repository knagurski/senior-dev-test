@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ route('createActivity') }}" class="panel panel-default">
                <div class="panel-heading">Create Activity</div>

                <div class="panel-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="subject">Activity subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                </div>

                <div class="panel-footer text-right">
                    <a href="{{ route('activities') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Activity</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
