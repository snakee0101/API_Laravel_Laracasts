<form action="/register" method="POST">
    @csrf
    <div>
        <h2>Registration</h2>
    </div>
    <div style="margin: 1em">
        <label>Name: <input type="text" name="name"> </label>
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
