<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Purchase Product</title>
    </head>
    <body class="min-h-svh flex items-center justify-center">
        <div class="container lg:w-2/3 h-full mx-auto text-center flex flex-col gap-5 p-4 rounded-xl border shadow-lg">
            <h1 class="text-4xl text-center">Purchase Product</h1>
            <form class="flex flex-col gap-5 items-center justify-center" action="/products/purchase/<?= $product['id'] ?>" method="POST">
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label class="w-28 text-left" for="name">Product Name:</label>
                    <label class="flex-1 text-left" id="name" name="name"><?= $product['name']; ?></label>
                </div>
                <div class="flex p-2 w-full max-w-md gap-2 items-center">
                    <label class="w-28 text-left" for="quantity">Quantity:</label>
                    <input class="flex-1 p-2 rounded border focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="number" name="quantity" id="quantity" value="1" min="1" max="<?= $product['quantity_available'] ?>" required>
                </div>    
                <button class="py-2 px-5 rounded-lg border bg-sky-500 text-white shadow-lg hover:cursor-pointer hover:shadow-xl" type="submit">Buy Now</button>
            </form>
        </div>
    </body>
</html>
