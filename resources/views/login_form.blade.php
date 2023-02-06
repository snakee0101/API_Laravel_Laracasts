<form action="/login" method="POST">
    @csrf
    <div>
        <h2>Login. Current user is: ID: {{ auth()->id() }}.</h2>
    </div>
    <div style="margin: 1em">
        <label>Email: <input type="email" name="email"> </label>
    </div>
    <div style="margin: 1em">
        <label>Password: <input type="password" name="password"> </label>
    </div>
    <div style="margin: 1em">
        <button>Submit</button>
    </div>
</form>
