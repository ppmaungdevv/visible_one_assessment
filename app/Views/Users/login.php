<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log in</title>

</head>
<body class="min-h-svh flex items-center justify-center">
    <div class="container h-full md:w-2/3 lg:w-1/3 mx-auto text-center flex flex-col gap-5 p-4 rounded-xl border shadow-lg">
        <h1 class="text-4xl text-center">Login</h1>
        <?php if (!empty($error)) : ?>
            <p class="text-lg text-red-500"><?= $error ?></p>
        <?php endif; ?>
        <form class="flex flex-col gap-5 items-center justify-center" action="/login" method="post">
            <div class="flex p-2 gap-2 items-center">
                <label for="username">Username:</label>
                <input class="p-1 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="text" id="username" name="username" required>
            </div>
            <div class="flex p-2 gap-2 items-center">
                <label for="password">Password:</label>
                <input class="p-1 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="password" id="password" name="password" required>
            </div>
            <input class="py-2 px-5 rounded-lg border bg-sky-500 text-white shadow-lg hover:cursor-pointer hover:shadow-xl" type="submit" value="Login">
            <div class="text-sm hover:cursor-pointer text-sky-600 underline">
                <a href="/register">Register</a>
            </div>
        </form>
    </div>
</body>
</html>
