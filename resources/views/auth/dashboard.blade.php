<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Welcome, {{ Auth::user()->username }}!</h1>
    <form method="POST" action="/logout">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>