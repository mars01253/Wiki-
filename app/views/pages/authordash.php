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
    ?>
    <h1 class="hidden" id="authorid"><?= $_SESSION['id']; ?></h1>
    <section class="max-w-4xl p-6 mx-auto bg-black rounded-md shadow-md dark:bg-gray-800 mt-5">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">add wiki's</h1>
        <div>
            <div class="flex flex-col">
                <div>
                    <label class="text-white dark:text-gray-200" for="emailAddress">Title</label>
                    <input id="wikititle" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation"> article </label>
                    <input id="wikiarticle" type="textarea" class="block w-full px-4 py-10 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200">Select Category</label>
                    <select id="selectcat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </select>
                </div>
                <div>
                    <input class="hidden" type="text" value="" id="idhere">
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
                    <button id="addwiki" class="px-6 py-2 leading-5 text-black transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-gray-600">Publish</button>
                </div>
                <div id="tagshere2" class="w-[100%] py-6 bg-white rounded-xl">
                    <button id="confirmbtn" class="hidden p-4 bg-green-200 ml-2 mb-2 rounded-xl float-right mr-2">Confirm</button>
                </div>
                <div id="tagspop" class="hidden w-[100%]  flex flex-col md:flex-row  rounded-xl shadow-lg p-3  mx-auto border border-white bg-white">
                    <div class="w-full md:w-3/3 bg-white flex flex-col space-y-2 p-3">
                        <div class="w-[100%] mt-2 ml-4"><button id="closetagdiv" class="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg></button>

                        </div>
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">Choose tags :</h3>
                        <div class="flex flex-wrap " id="tagshere">


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4 ml-4 mr-4 mb-4 flex flex wrap w-[90%]">
        <?php
        require_once('../app/controllers/Wikis.php');
        $wiki = new Wikis();
        $id = $_SESSION['id'];
        $data = $wiki->display($id);
        foreach ($data as $wiki) {

            echo "
            <div class='mx-2'>
                <div class='max-w-2xl mx-auto'>
                    <div class='bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700'>
                        <a href='#'>
                            <img class='rounded-t-lg' src='https://flowbite.com/docs/images/blog/image-1.jpg' alt=''>
                        </a>
                        <div class='p-5'>
                            <a href='#'>
                                <h5 class='text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white'>$wiki[1]</h5>
                                <h5 class='text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white wikiid'>$wiki[0]</h5>
                            </a>
                            <p class='font-normal text-gray-700 mb-3 dark:text-gray-400'>$wiki[2]</p>
                            <a href='readwiki.php?id=$wiki[0]' class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                                Read more
                                <svg class='-mr-1 ml-2 h-4 w-4' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' d='M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z' clip-rule='evenodd'></path>
                                </svg>
                            </a>
                        </div>
                        <div class='flex w-[95%] justify-between mb-2 ml-2 mt-5'>    
                        <button value='$wiki[0]' onclick='deletewiki()' class='deletewiki'><svg xmlns='http://www.w3.org/2000/svg' height='20' width='20' viewBox='0 0 448 512'><path fill='#e3e3e3' d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></button>
                        <button class='updatewiki' onclick='updatewiki()'><svg xmlns='http://www.w3.org/2000/svg' height='20' width='20' viewBox='0 0 512 512'><path fill='#bdbdbd' d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></button>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        ?>


    </section>


</body>

</html>

<script>
    const id = document.querySelectorAll('.wikiid');
    function updatewiki() {

        const updatewiki = document.querySelectorAll('.updatewiki');
        for (let i = 0; i < updatewiki.length; i++) {
            updatewiki[i].addEventListener('click', e => {
                console.log('hello');
            })
        }
    }

    function deletewiki() {
        const deletewiki = document.querySelectorAll('.deletewiki');
        for (let i = 0; i < deletewiki.length; i++) {
            deletewiki[i].addEventListener('click', e => {
                let wikiid = deletewiki[i].value ;
                console.log(wikiid);
                var formData = new FormData();
                formData.append('id', wikiid);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/Wiki-/Wikis/deletewiki', true);
                xhr.onload = function() {
                    if (xhr.status == 200 && xhr.readyState == 4) {
                       
                    }
                };
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(new URLSearchParams(formData));
            })
        }
    }
</script>