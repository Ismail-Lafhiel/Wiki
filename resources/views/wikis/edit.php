<?php
include(__DIR__ . "/../layouts/head.php");
?>

<body>
    <section class="bg-gray-50 dark:bg-gray-900" style="margin: 160px 0 0 0;">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div id="alertMessage">
                </div>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Update User
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="editWikis">
                        <input type="hidden" id="id" name="id" value="<?php echo $wiki['id']; ?>">
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                Title</label>
                            <input type="title" id="title" name="title" value="<?php echo $wiki["title"] ?>"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                placeholder="Alan Walker" required>
                        </div>
                        <div>
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                message</label>
                            <textarea id="mytextarea"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><?php echo $wiki["content"] ?></textarea>
                        </div>
                        <div>
                            <label for="category_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                Category</label>
                            <input type="text" id="category_name" name="category_name"
                                value="<?php echo $wiki["category_name"] ?>"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                placeholder="Alan Walker" required>
                        </div>
                        <div>
                            <label for="user_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                Author</label>
                            <input type="text" id="user_name" name="user_name" value="<?php echo $wiki["user_name"] ?>"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                placeholder="Alan Walker" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Upload file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="user_avatar_help" id="img_path" name="img_path" type="file"
                                value="<?php echo $wiki["img_path"] ?>">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Post
                                picture is useful to give an overview on your article</div>
                        </div>

                        <button type="button" onclick="updateWiki()"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
include(__DIR__ . "/../layouts/footer.php");
?>