<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="text/javascript" src="../public/js/author.js"></script>
    <title>MyWiki</title>
</head>

<body>
    <?php include_once('../app/views/inc/authornav.php');
    echo $_SESSION['id']; ?>
    <section class="max-w-4xl p-6 mx-auto bg-black rounded-md shadow-md dark:bg-gray-800 mt-5">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">add wiki's</h1>
        <div>
            <div class="flex flex-col">
                <div>
                    <label class="text-white dark:text-gray-200" for="emailAddress">Title</label>
                    <input id="" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation"> article </label>
                    <input id="" type="textarea" class="block w-full px-4 py-10 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Select Category</label>
                    <select id="selectcat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-white">
                        Image
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-md bg-gray-600">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="">Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1 text-white">or drag and drop</p>
                            </div>
                            <p class="text-xs text-white">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-[100%]">
                <div class="flex mt-3 flex-row justify-center items-center justify-between w-[100%]">
                    <button id="opentagdiv" class="px-6 py-2 leading-5 text-black transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-gray-600">Add Tags</button>
                    <button class="px-6 py-2 leading-5 text-black transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-gray-600">Publish</button>
                </div>
                <div class="w-[100%] py-6 bg-white rounded-xl"></div>
                <div id="tagspop" class="hidden w-[100%]  flex flex-col md:flex-row  rounded-xl shadow-lg p-3  mx-auto border border-white bg-white">
                    <div class="w-full md:w-3/3 bg-white flex flex-col space-y-2 p-3">
                        <div class="w-[100%] mt-2 ml-4"><button id="closetagdiv" class="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg></button>
                            <p class="text-gray-500 font-medium hidden md:block">Tags</p>
                        </div>
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">Choose tags :</h3>
                        <div class="flex flex-wrap" id="tagshere">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>