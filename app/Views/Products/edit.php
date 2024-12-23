<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Edit Product</title>
    </head>
    <body class="min-h-svh flex items-center justify-center">
        <div class="container lg:w-2/3 h-full mx-auto text-center flex flex-col gap-5 p-4 rounded-xl border shadow-lg">
            <h1 class="text-4xl text-center">Edit Product</h1>
            <form class="flex flex-col gap-5 items-center justify-center" action="/products/edit/<?php echo $product['id']; ?>" method="POST">
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label class="w-28 text-left" for="name">Product Name</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label class="w-28 text-left" for="price">Price</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="number" step="0.01" id="price" name="price" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label class="w-28 text-left" for="quantity_available">QTY Available</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="number" id="quantity_available" type="number" id="quantity_available" name="quantity_available" value="<?php echo $product['quantity_available']; ?>" required>
                </div>

                <button class="py-2 px-5 rounded-lg border bg-sky-500 text-white shadow-lg hover:cursor-pointer hover:shadow-xl" type="submit">Update</button>
            </form>
        </div>
    </body>
</html>