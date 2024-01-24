<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="text/javascript" src="../public/js/admin.js"></script>

    <title>MyWiki</title>
</head>

<body class="bg-gray-900">
    <?php include_once('../app/views/inc/adminnav.php'); ?>
    <?php require_once('../app/controllers/Wikis.php');
    $wiki = new Wikis();
    ?>

    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
        <div class="sm:flex sm:space-x-4">
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Authors</h3>
                            <p class="text-3xl font-bold text-black"><?= $wiki->totalauthors(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Most active User</h3>
                            <p class="text-3xl font-bold text-black"><?= $wiki->activeuser(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="deletedcat" class="hidden bg-blue-50 border-b border-blue-400 text-blue-800 text-sm p-4 flex justify-between">
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <p>
                    <span class="font-bold">Info:</span>
                    Category was Deleted succefully
                </p>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <h1 class="hidden" id="id"><?= 1?></h1>
    <div class="bg-gray-900 min-h-[60vh] flex items-center justify-center">
        <div class="bg-gray-800 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
            <div class="flex-1 px-2 sm:px-0">
                <div class="flex justify-between items-center">
                    <h3 class="text-3xl font-extralight text-white/50">Categories</h3>
                </div>
                <div id="catdiv" class="mb-10 sm:mb-0 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <div class="group bg-gray-900/30 py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/40 hover:smooth-hover">
                        <a class="bg-gray-900/70 text-white/50 group-hover:text-white group-hover:smooth-hover flex w-20 h-20 rounded-full items-center justify-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </a>
                        <button id="addcategory" class="text-white/50 group-hover:text-white group-hover:smooth-hover text-center">Add Cattegory</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="w-[100%] flex">
        <div class="flex justify-between items-center ml-4">
            <h3 class="text-3xl font-extralight mb-2 text-white/50"> Add tags</h3>
        </div>
    </div>

    <form id="tgadd" action="<?php echo URLROOT; ?>Users/addtag" method="post">
        <div class="w-[100%] flex">
            <div class="w-[80%] ml-4 flex flex-row items-center gap-5 ">
                <input id="tgname" type="text" name="tagname" class="block w-full px-4 py-2  text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                <button type="submit" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Add</button>

            </div>
        </div>
        <div class="text-white ml-4" id="taganswer"></div>
    </form>
    <div class="flex min-h-[60vh] items-center justify-center bg-gray-900">
        <div class="w-[100%]">
            <table class="w-full min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Tag Name</p>
                        </th>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Delete Tag</p>
                        </th>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Edit tag</p>
                        </th>
                    </tr>
                </thead>
                <tbody id="tagshere">

                </tbody>
            </table>
        </div>

    </div>
    <div class="w-[100%] flex">
        <div class="flex justify-between items-center ml-4">
            <h1 class="text-3xl font-extralight  text-white/50 font-bold"> Archive Wikis</h1>
        </div>
    </div>


    <div class="flex min-h-[60vh] items-center justify-center bg-gray-900">
        <div class="w-[100%]">
            <table class="w-full min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Wiki title</p>
                        </th>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Wiki Category</p>
                        </th>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Wiki author</p>
                        </th>
                        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                            <p class="block antialiased font-sans text-sm text-white font-normal leading-none opacity-70">Archive</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // require_once('../app/controllers/Wikis.php');
                    // $wiki = new Wikis();
                    $data = $wiki->displayallwikiadmin();
                    foreach ($data as $wiki) {
                    ?>
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <p class="block antialiased font-sans text-sm leading-normal text-white font-bold"><?= $wiki[1] ?></p>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-sm leading-normal text-white font-bold"><?= $wiki[14]  ?></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-sm leading-normal text-white font-bold"><?= $wiki[9]  ?></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <form action="<?php echo URLROOT; ?>Wikis/archivewiki" method="post">
                                    <input type="text" class="hidden" name="id" value="<?= $wiki[0] ?>">
                                    <input type="submit" value="Archive" class="text-white font-bold cursor-pointer">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



    <div id="category" class="w-[50%] hidden rounded-xl fixed bottom-[25%] z-50 right-[25%] border border-white-500 p-6 bg-gray-900">
        <div class="w-[80%] mt-2 ml-4"><button id="closecat" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-white font-semibold">
            Add Category</h2>
        <div>
            <div class="flex flex-col  text-white mb-3">
                <label for="name">Name</label>
                <input type="text" id="catname" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
                <span id="added"></span>
            </div>
        </div>
        <span id="categoryadded"></span>
        <div class="w-full text-white pt-3">
            <button id="addtocat" class="w-full bg-gray-900 border border-white-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-white-500 hover:text-white text-xl cursor-pointer">
                Add
            </button>
        </div>
    </div>



    <div id="editcategory" class="w-[50%] hidden rounded-xl fixed bottom-[25%] z-50 right-[25%] border border-white-500 p-6 bg-gray-900">
        <div class="w-[80%] mt-2 ml-4"><button id="closecatedit" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-white font-semibold">
            Edit Category</h2>
        <div>
            <div class="flex flex-col  text-white mb-3">
                <label for="name">Edit Name</label>
                <input type="text" id="editcat" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
            </div>
        </div>
        <span id="categoryadded"></span>
        <div class="w-full text-white pt-3">
            <button id="sendedit" class="w-full bg-gray-900 border border-white-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-white-500 hover:text-white text-xl cursor-pointer">
                Edit
            </button>
        </div>
    </div>

    <form method="post" action="<?php echo URLROOT; ?>Users/updatetag" id="edittag" class="w-[50%] hidden rounded-xl fixed bottom-[25%] z-50 right-[25%] border border-white-500 p-6 bg-gray-900">
        <div class="w-[80%] mt-2 ml-4"><button id="closeedittag" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-white font-semibold">
            Edit Tag</h2>
        <div>
            <div class="flex flex-col  text-white mb-3">
                <label for="name">Edit Name</label>
                <input type="text" name="name" id="edittaginp" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
                <input type="text" name="id" id="edittagid" class="hidden px-3 py-2 bg-gray-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500" autocomplete="off">
            </div>
        </div>
        <span id="categoryadded"></span>
        <div class="w-full text-white pt-3">
            <button type="submit" class="w-full bg-gray-900 border border-white-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-white-500 hover:text-white text-xl cursor-pointer">
                Edit
            </button>
        </div>
    </form>


</body>

</html>