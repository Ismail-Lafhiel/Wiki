<?php
include(__DIR__ . "/../layouts/head.php");
?>

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article
            class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                <?php echo $wiki['user_name'] ?>
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <?php if (isset($wiki['role']) == 1)
                                    echo "Author" ?>
                                </p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">
                                    <?php echo \Carbon\Carbon::parse($wiki['created_at'])->toFormattedDateString() ?>
                                </time></p>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white text-center">
                    <?php echo $wiki['title'] ?>
                </h1>
            </header>
            <p class="lead my-3">
                <?php echo $wiki['content'] ?>
            </p>
            <figure class="my-10">
                <img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
                <figcaption class="mt-5">
                    <?php foreach ($wiki['tags'] as $tag) {
                        echo " <span
                        class='text-white bg-blue-500 font-ligh rounded-full text-sm px-4 py-2 text-center me-2 mb-2'>
                        {$tag["tag_name"]}
                    </span>";
                    } ?>
                </figcaption>
            </figure>
            <div class="flex items-center space-x-4">
                <a href="/wikis/edit/<?php echo $wiki['id'] ?>"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit
                </a>
                <a href="/wikis/delete/<?php echo $wiki['id'] ?>"
                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Delete
                </a>
            </div>
        </article>
    </div>
</main>
<?php
include(__DIR__ . "/../layouts/footer.php");
?>