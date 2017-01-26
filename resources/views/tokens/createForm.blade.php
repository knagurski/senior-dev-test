@if (session('token'))
    <div class="alert alert-info">
        <strong>Access token generated</strong>
        <pre class="pre-scrollable pre-wrap">{{ session('token') }}</pre>
    </div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">Access Token</div>
    <div class="panel-body">
        <form action="{{ route('createToken') }}" class="form" method="post">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Token name" required>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Generate access token</button>
                </div>
            </div>
        </form>
    </div>
</div>