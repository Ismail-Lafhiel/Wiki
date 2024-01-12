<?php
include(__DIR__ . "/../layouts/head.php");
?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="/users/"
            class="bg-gray-800 text-white rounded-l-md border-r border-gray-100 py-2 rounded-lg text-sm hover:bg-red-700 hover:text-white px-3 mb-2">
            <div class="flex flex-row align-middle">
                <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="ml-2">Go back</p>
            </div>
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div id="alertMessage">
            </div>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Update User
                </h1>
                <form class="space-y-4 md:space-y-6" id="editUser">
                    <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                    <div>
                        <label for="user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                            user
                            name</label>
                        <input type="user_name" id="user_name" name="user_name" value="<?php echo $user["user_name"] ?>"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="Alan Walker" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                            email</label>
                        <input type="email" id="email" name="email" value="<?php echo $user["email"] ?>"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="name@example.com" required>
                    </div>
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            user
                            role</label>
                        <select id="role" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php
                            $roles = [
                                0 => "Admin",
                                1 => "Author"
                            ];

                            foreach ($roles as $value => $label) {
                                $selected = ($user['role'] == $value) ? "selected" : "";
                                echo "<option value='{$value}' $selected>$label</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="button" onclick="updateUser()"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include(__DIR__ . "/../layouts/footer.php");
?>