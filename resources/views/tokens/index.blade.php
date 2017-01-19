@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tokens</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Created</th>
                            <th>Name</th>
                            <th>Token</th>
                        </thead>
                        <tbody>
                        @foreach($tokens as $token)
                            <tr>
                                <td>{{ $token->created_at }}</td>
                                <td>{{ $token->name }}</td>
                                <td>{{ $token->id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
