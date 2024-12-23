<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Add New Product</title>
    </head>
    <body class="min-h-svh flex items-center justify-center">
        <div class="container lg:w-2/3 h-full mx-auto text-center flex flex-col gap-5 p-4 rounded-xl border shadow-lg">
            <h1 class="text-4xl text-center">Add Product</h1>
            <form class="flex flex-col gap-5 items-center justify-center" action="/products/create" method="POST">
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label for="name" class="w-28 text-left">Name:</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="text" id="name" name="name" required>
                </div>
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label for="price" class="w-28 text-left">Price:</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="number" step="0.001" id="price" name="price" required>
                </div>
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label for="quantity_available" class="w-28 text-left">QTY Available:</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="number" id="quantity_available" name="quantity_available" required>
                </div>
                <button class="py-2 px-5 rounded-lg border bg-sky-500 text-white shadow-lg hover:cursor-pointer hover:shadow-xl" type="submit">Save</button>
            </form>
        </div>
    </body>
</html>
