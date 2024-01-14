<?php
include("layouts/head.php");
?>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <div id="alertMessage">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Profile</h2>
            <form id="editUser">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="hidden" id="id" value="<?php echo $_SESSION['user']['id'] ?>">
                    <div class="sm:col-span-2">
                        <label for="user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User
                            Name</label>
                        <input type="text" name="user_name" id="user_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="profile_path"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add
                            Profile
                            Image</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="profile_path" name="profile_path" type="file">
                    </div>
                </div>
                <button type="button" onclick="updateUser()"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Edit profile
                </button>
            </form>
            <div id="editProfile-fields"></div>
        </div>
</section>
<?php
include("layouts/footer.php");
?>