<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body class="min-h-svh flex items-center justify-center">
    <div class="container h-full md:w-2/3 lg:w-1/3 mx-auto text-center flex flex-col gap-5 p-4 rounded-xl border shadow-lg">
        <h1 class="text-4xl text-center">Register</h1>
        <form class="flex flex-col gap-5 items-center justify-center" action="/register" method="post">
            <div class="flex p-2 w-full max-w-md gap-2 items-center">
                <label for="username" class="w-2/6 text-left">Username:</label>
                <input class="flex-1 p-1 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="text" id="username" name="username" required>
            </div>
            <div class="flex p-2 w-full max-w-md gap-2 items-center">
                <label for="password" class="w-2/6 text-left">Password:</label>
                <input class="flex-1 p-1 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="password" id="password" name="password" required>
            </div>
            <div class="flex p-2 w-full max-w-md gap-2 items-center justify-center">
                <label for="role" class="w-2/6 text-left">Role:</label>
                <select class="flex-1 py-2 px-3 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 bg-white" id="role" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input class="py-2 px-5 rounded-lg border bg-sky-500 text-white shadow-lg hover:cursor-pointer hover:shadow-xl" type="submit" value="Register">
            <div class="text-sm hover:cursor-pointer text-sky-600 underline">
                <a href="/login">Log in</a>
            </div>
        </form>
    </div>
</body>
</html>
