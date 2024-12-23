<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product</title>
</head>
<body class="min-h-svh">
    <div class="container mx-auto h-full flex flex-col gap-3">
        <h1 class="text-4xl text-center">Products</h1>
        <div class="flex items-center justify-between">
            <a href="/logout" class="text-md hover:cursor-pointer text-sky-600 underline">Log out</a>
            <?php if ($is_admin) : ?>
                <a href="/products/create" class="py-2 px-5 rounded-lg border bg-sky-500 text-white hover:cursor-pointer hover:shadow-xl">Create New Product</a>
            <?php endif; ?>
        </div>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border border-gray-300">ID</th>
                    <th class="px-4 py-2 border border-gray-300">Name</th>
                    <th class="px-4 py-2 border border-gray-300">Price</th>
                    <th class="px-4 py-2 border border-gray-300">QTY Available</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $product['id'] ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?= $product['name'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-right"><?= $product['price'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-right"><?= $product['quantity_available'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <?php if ($is_admin) : ?>
                                <a href="/products/edit/<?= $product['id'] ?>" class="text-blue-500 hover:cursor-pointer underline hover:text-blue-700">Edit</a>
                                <a href="/products/delete/<?= $product['id'] ?>" class="text-red-500 hover:cursor-pointer underline hover:text-red-700 ml-2">Delete</a>
                            <?php endif; ?>
                            <a href="/products/purchase/<?= $product['id'] ?>" class="text-green-500 hover:cursor-pointer underline hover:text-green-700 ml-2">Purchase</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
