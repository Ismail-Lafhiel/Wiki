<?php
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0){
include("layouts/head.php");
?>
<main class=" mt-14 p-12 ml-0 smXl:ml-64  dark:border-gray-700">
    <?php
    include("layouts/adminSideBar.php");
    ?>
    <div class="cards flex flex-wrap justify-center tablet:justify-between gap-6 mb-12 ">
        <div
            class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]   tablet:max-w-[20rem] p-5 rounded-xl">
            <div class="icon_container mb-9">
                <span class="h-9 w-9 bg-[#CAFFF2] rounded-full flex justify-center
                    items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z"
                            stroke="#00373E" stroke-width="2" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
            <div class="data_container flex justify-between">
                <div class="left">
                    <p class="font-bold dark:text-gray-200 text-lg font-inter"><?php echo $numberOfWikis ?></p>
                    <p class="font-medium text-[#7F7D83] font-inter">Posts Created</p>
                </div>
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
            <div class="icon_container mb-9">
                <span class="h-9 w-9 bg-[#FFD58F] rounded-full flex justify-center
                    items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z"
                            stroke="#B27104" stroke-width="2" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>


            <div class="data_container flex justify-between">
                <div class="left">
                    <p class="font-bold dark:text-gray-200  text-lg font-inter"><?php echo $numberOfUsers ?></p>
                    <p class="font-medium text-[#7F7D83] font-inter">Users</p>
                </div>
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
            <div class="icon_container mb-9">
                <span class="h-9 w-9 bg-[#EBF1FD] rounded-full flex justify-center
                    items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z"
                            stroke="#2080F6" stroke-width="2" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>


            <div class="data_container flex justify-between">
                <div class="left">
                    <p class="font-bold dark:text-gray-200  text-lg font-inter"><?php echo $numberOfCategories ?></p>
                    <p class="font-medium text-[#7F7D83] font-inter">Categories created</p>
                </div>
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
            <div class="icon_container mb-9">
                <span class="h-9 w-9  rounded-full flex justify-center
                    items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z"
                            stroke="#802c98" stroke-width="2" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>


            <div class="data_container  flex justify-between">
                <div class="left">
                    <p class="font-bold dark:text-gray-200  text-lg font-inter"><?php echo $numberOfTags ?></p>
                    <p class="font-medium text-[#7F7D83] font-inter">Tags created</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("layouts/footer.php");
}else{
    header("Location: /not-allowed");
}
?>