<?php
include("layouts/head.php");
?>
<main>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">All
                    Wikis</h2>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                <?php foreach ($allWikis as $allWiki): ?>
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span
                                class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <?php echo $allWiki['category_name'] ?>
                            </span>
                            <span class="text-sm">
                                <?php echo \Carbon\Carbon::parse($allWiki['created_at'])->diffForHumans(); ?>
                            </span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">
                                <?php echo $allWiki['title'] ?>
                            </a>
                        </h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                            <?php echo $allWiki['content'] ?>
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <?php if (isset($allWiki['profile_path'])): ?>
                                    <img class="w-7 h-7 rounded-full" src="<?php echo $allWiki['profile_path'] ?>"
                                        alt="avatar" />
                                <?php else: ?>
                                    <img class="w-7 h-7 rounded-full" src="../../public/assets/default_user_profile.png"
                                        alt="avatar" />
                                <?php endif; ?>
                                <span class="font-medium dark:text-white">
                                    <?php echo $allWiki['user_name'] ?>
                                </span>
                                <div>
                                    <?php foreach ($allWiki['tags'] as $tag): ?>
                                        <span
                                            class="text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 font-normal rounded-full text-sm px-3.5 py-1.5 text-center mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-900 mr-2">
                                            <?php echo ($tag['tag_name']) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <a href="#"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php
include("layouts/footer.php");
?>