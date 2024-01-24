<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MyWiki</title>
</head>

<body>
    <?php
        require_once '../app/views/inc/visitornav.php';
    ?>
    <div class="flex flex-col" id="searchresult">

    </div>
    <div id="success" class=" hidden bg-green-50 border-b border-green-400 text-green-800 text-sm p-4 flex justify-between">
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <p>
                    <span class="font-bold">Info:</span>
                    You have Successfully Signed up
                </p>
            </div>
        </div>
    </div>
    <div id="failed" class="hidden bg-red-50 border-b border-red-400 text-red-800 text-sm p-4 flex justify-between">
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <p>
                    <span class="font-bold">Info:</span>
                    You have Failed to Register
                </p>
            </div>
        </div>
    </div>

    <div class="relative rounded-lg block md:flex items-center bg-gray-100 shadow-xl mt-5" style="min-height: 19rem;">
        <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg" style="min-height: 19rem;">
            <div class="absolute inset-0 w-full h-full bg-indigo-900 opacity-75"></div>
            <div class="absolute inset-0 w-full h-full flex items-center justify-center fill-current text-white">
                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 512 512">
                    <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z" />
                </svg>

            </div>
        </div>
        <div class="w-full md:w-3/5 h-full flex items-center bg-gray-100 rounded-lg">
            <div class="p-12 md:pr-24 md:pl-16 md:py-12">
                <p class="text-black text-3xl font-bold "> Discover Our Latest Categories</p>
                <?php
                require_once('../app/controllers/Categories.php');
                $cate = new Categories();
                $data = $cate->latestcat();
                ?>
                <a class="flex items-baseline mt-3 text-indigo-600 hover:text-indigo-900 focus:text-indigo-900" href="">
                    <div class="flex flex-col">
                        <h1 class="font-bold text-3xl text-gray-900"><?= $data[1] ?></h1>
                        <img class="rounded-xl" src="../public/img/project.png" alt="..">
                    </div>
                </a>
            </div>
            <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-100 -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>
        </div>
    </div>




    <div id="signindiv" class="hidden w-[50%] fixed bottom-[20%] z-50 right-[25%] bg-white flex flex-col items-center justify-center text-center">
        <div class="mx-auto max-w-lg">
            <div class="flex flex-col">
                <div class="w-[80%] mt-2 ml-4"><button id="closesignin" class="float-right"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                            <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                        </svg></button></div>
                <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Sign In</h1>

                <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                    inventore quaerat mollitia?
                </p>
            </div>
            <form method="post" action="<?php echo URLROOT; ?>Users/logIn" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                <p class="text-center text-lg font-medium">Sign in to your account</p>

                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input name="email" type="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter email" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>

                    <div class="relative">
                        <input name="pass" type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter password" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <button type="submit" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                    Sign in
                </button>
            </form>
        </div>
    </div>

    <div id="signupdiv" class="hidden w-[50%] fixed bottom-[10%] z-50 right-[25%] bg-white flex flex-col items-center justify-center text-center">
        <div class="mx-auto max-w-lg">
            <div class="flex flex-col">
                <div class="w-[80%] mt-2 ml-4"><button id="closesignup" class="float-right"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                            <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                        </svg></button></div>
                <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Sign Up</h1>

                <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                    inventore quaerat mollitia?
                </p>
            </div>
            <form id="signupform" action="<?php echo URLROOT; ?>Users/signup" method="post" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                <div>
                    <label for="email" class="sr-only">Name</label>
                    <div class="relative">
                        <input type="text" name="name" id="inpname" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter Your Name" />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        <span id="name"></span>
                    </div>

                </div>

                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input type="email" name="email" id="inpemail" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter email" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                    <span id="email"></span>
                    <span id="checkmail"></span>
                </div>
                <div>
                    <label for="email" class="sr-only">Password</label>
                    <div class="relative">
                        <input type="password" id="inppass" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter Your Password" />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                    <span id="pass"></span>
                </div>

                <div>
                    <label for="password" class="sr-only">Confirm your Password</label>
                    <div class="relative">
                        <input type="password" name="pass" id="cinppass" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Confirm Your Password" />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                    <span id="cpass"></span>
                </div>

                <button type="submit" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                    Sign Up
                </button>
            </form>
        </div>
    </div>


    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div id="defaultTabContent">
            <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Discover Our Latest Wikis</h2>
            </div>
        </div>
    </div>


    <section class="py-6 sm:py-12 dark:bg-gray-800 dark:text-gray-100">
        <div class="container p-6 mx-auto space-y-8">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                <?php

                require_once('../app/controllers/Wikis.php');
                $wiki = new Wikis();
                $data = $wiki->displayallwiki();
                foreach ($data as $wiki) {
                 $img = basename($wiki[7]);
                ?>


                    <article class="flex flex-col dark:bg-gray-900">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                            <img alt="" class="object-cover w-full h-52 dark:bg-gray-500 rounded-xl" src="../public/img/<?= $img  ?>">
                        </a>
                        <div class="flex flex-col flex-1 p-6">
                            <a rel="noopener noreferrer" href="#" class="font-bold" aria-label="Te nulla oportere reprimique his dolorum"><?= $wiki[1]  ?></a>
                            <div class="flex items-center ">
                                <h4 rel="noopener noreferrer" class="text-sl  w-[40%] rounded-xl tracki uppercase hover:underline dark:text-violet-400"><?= $wiki[14] ?></h4>
                                <h3 class="flex-1 py-2 text-lg font-semibold leadi"><?= $wiki[9] ?></h3>
                            </div>
                            <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                                <span><?= $wiki[3] ?></span>
                            </div>
                            <button class="bg-blue-300 p-3 rounded-xl"><a href="http://localhost/Wiki-/Wikis/displaysinglewiki?id=<?= $wiki[0] ?>">Read More</a></button>
                        </div>
                    </article>
                <?php
                }
                ?>
            </div>
        </div>
    </section>


    <footer>
        <div class="w-full min-h-screen flex items-center justify-center bg-black">
            <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
                <div class="w-full text-3xl font-bold">
                    <h1 class="w-full md:w-2/3">MyWiki , Where you can unleach your creative thoughts.</h1>
                </div>
                <div class="flex mt-8 flex-col md:flex-row md:justify-between">
                    <div class="w-44 pt-6 md:pt-0">
                        <a class="bg-white justify-center text-black text-center rounded-lg shadow px-10 py-3 flex items-center">Contact US</a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex mt-24 mb-12 flex-row justify-between">

                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">About</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Services</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Why us</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Contact</a>
                        <div class="flex flex-row space-x-8 items-center justify-between">
                            <a>
                                <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.89782 12V6.53514H5.67481L5.93895 4.39547H3.89782V3.03259C3.89782 2.41516 4.06363 1.99243 4.91774 1.99243H6V0.0847928C5.47342 0.0262443 4.94412 -0.00202566 4.41453 0.000112795C2.84383 0.000112795 1.76542 0.994936 1.76542 2.82122V4.39147H0V6.53114H1.76928V12H3.89782Z" fill="white" />
                                </svg>
                            </a>
                            <a>
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.99536 2.91345C5.17815 2.91345 4.39441 3.23809 3.81655 3.81594C3.2387 4.3938 2.91406 5.17754 2.91406 5.99475C2.91406 6.81196 3.2387 7.5957 3.81655 8.17356C4.39441 8.75141 5.17815 9.07605 5.99536 9.07605C6.81257 9.07605 7.59631 8.75141 8.17417 8.17356C8.75202 7.5957 9.07666 6.81196 9.07666 5.99475C9.07666 5.17754 8.75202 4.3938 8.17417 3.81594C7.59631 3.23809 6.81257 2.91345 5.99536 2.91345ZM5.99536 7.99586C5.46446 7.99586 4.9553 7.78496 4.57989 7.40955C4.20448 7.03415 3.99358 6.52499 3.99358 5.99408C3.99358 5.46318 4.20448 4.95402 4.57989 4.57861C4.9553 4.20321 5.46446 3.99231 5.99536 3.99231C6.52626 3.99231 7.03542 4.20321 7.41083 4.57861C7.78624 4.95402 7.99714 5.46318 7.99714 5.99408C7.99714 6.52499 7.78624 7.03415 7.41083 7.40955C7.03542 7.78496 6.52626 7.99586 5.99536 7.99586Z" fill="white" />
                                    <path d="M9.19863 3.51848C9.59537 3.51848 9.91698 3.19687 9.91698 2.80013C9.91698 2.4034 9.59537 2.08179 9.19863 2.08179C8.8019 2.08179 8.48029 2.4034 8.48029 2.80013C8.48029 3.19687 8.8019 3.51848 9.19863 3.51848Z" fill="white" />
                                    <path d="M11.6821 2.06975C11.5279 1.67138 11.2921 1.30961 10.99 1.00759C10.6879 0.705576 10.326 0.469972 9.92759 0.31586C9.46135 0.140842 8.9688 0.0462069 8.4709 0.0359839C7.82919 0.00799638 7.62594 0 5.99867 0C4.37139 0 4.16282 -6.70254e-08 3.52643 0.0359839C3.02891 0.0456842 2.53671 0.140339 2.07108 0.31586C1.67255 0.469792 1.31059 0.705333 1.00844 1.00737C0.706289 1.30941 0.47061 1.67127 0.316526 2.06975C0.141474 2.53595 0.0470554 3.02855 0.0373167 3.52643C0.00866281 4.16748 0 4.37072 0 5.99867C0 7.62594 -4.96485e-09 7.83319 0.0373167 8.4709C0.0473123 8.96935 0.14127 9.46113 0.316526 9.92825C0.471042 10.3266 0.70695 10.6883 1.00918 10.9903C1.3114 11.2923 1.6733 11.5279 2.07175 11.6821C2.5365 11.8642 3.0289 11.9656 3.52777 11.982C4.16948 12.01 4.37272 12.0187 6 12.0187C7.62728 12.0187 7.83585 12.0187 8.47223 11.982C8.97008 11.9719 9.46262 11.8775 9.92892 11.7028C10.3272 11.5483 10.689 11.3125 10.9911 11.0104C11.2932 10.7083 11.529 10.3466 11.6835 9.94825C11.8587 9.48179 11.9527 8.99 11.9627 8.49156C11.9913 7.85051 12 7.64727 12 6.01932C12 4.39138 12 4.18481 11.9627 3.54709C11.9549 3.04216 11.86 2.54237 11.6821 2.06975ZM10.8705 8.42159C10.8662 8.80562 10.7961 9.18608 10.6633 9.54642C10.5632 9.80555 10.41 10.0409 10.2135 10.2372C10.017 10.4336 9.78162 10.5867 9.52243 10.6866C9.16608 10.8188 8.78967 10.8889 8.4096 10.8938C7.77654 10.9231 7.59796 10.9305 5.97468 10.9305C4.35007 10.9305 4.18414 10.9305 3.53909 10.8938C3.15921 10.8892 2.78298 10.8191 2.42692 10.6866C2.16683 10.5873 1.93048 10.4345 1.73316 10.2381C1.53584 10.0417 1.38194 9.80605 1.28143 9.54642C1.15045 9.18995 1.08039 8.81398 1.07419 8.43425C1.04554 7.8012 1.03887 7.62261 1.03887 5.99933C1.03887 4.37539 1.03887 4.20946 1.07419 3.56375C1.0785 3.17993 1.14859 2.7997 1.28143 2.43958C1.48467 1.91382 1.90116 1.5 2.42692 1.29876C2.78316 1.16691 3.15928 1.09682 3.53909 1.09151C4.17281 1.06286 4.35073 1.05486 5.97468 1.05486C7.59862 1.05486 7.76522 1.05486 8.4096 1.09151C8.7897 1.09609 9.16617 1.1662 9.52243 1.29876C9.7816 1.39889 10.017 1.55211 10.2134 1.74858C10.4099 1.94504 10.5631 2.18041 10.6633 2.43958C10.7942 2.79606 10.8643 3.17203 10.8705 3.55175C10.8992 4.18547 10.9065 4.36339 10.9065 5.98734C10.9065 7.61062 10.9065 7.78521 10.8778 8.42226H10.8705V8.42159Z" fill="white" />
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/channel/UCjtCbnkIaiCJgj13sEZ9iqw">
                                <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.7355 1.415C12.6616 1.14357 12.517 0.896024 12.3162 0.697014C12.1154 0.498004 11.8654 0.354468 11.5911 0.280692C10.5739 0.00450089 6.5045 4.87928e-06 6.5045 4.87928e-06C6.5045 4.87928e-06 2.43578 -0.00449139 1.41795 0.259496C1.14379 0.336667 0.894302 0.482233 0.693428 0.68222C0.492554 0.882207 0.347041 1.1299 0.270859 1.40152C0.00259923 2.40737 9.51671e-07 4.49358 9.51671e-07 4.49358C9.51671e-07 4.49358 -0.0025972 6.59006 0.263714 7.58564C0.413109 8.13609 0.851549 8.57094 1.40885 8.71931C2.43643 8.9955 6.49476 9 6.49476 9C6.49476 9 10.5641 9.00449 11.5813 8.74115C11.8557 8.6675 12.106 8.52429 12.3073 8.32569C12.5086 8.12709 12.6539 7.87996 12.729 7.60876C12.998 6.60355 12.9999 4.51798 12.9999 4.51798C12.9999 4.51798 13.0129 2.42086 12.7355 1.415ZM5.20282 6.42628L5.20607 2.57244L8.58823 4.50257L5.20282 6.42628Z" fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <hr class="border-gray-600" />
                    <p class="w-full text-center my-12 text-gray-600">Copyright © 2024 Mouad Creative</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

<script>
    const signupdiv = document.getElementById('signupdiv')
    const signindiv = document.getElementById('signindiv')
    const closesignin = document.getElementById('closesignin')
    const closesignup = document.getElementById('closesignup')


    closesignin.addEventListener('click', e => {
        signindiv.classList.add('hidden');
    })
    closesignup.addEventListener('click', e => {
        signupdiv.classList.add('hidden');
    })



    let inpname = document.getElementById('inpname');
    let rname = document.getElementById('name');

    let inpemail = document.getElementById('inpemail');
    let email = document.getElementById('email');

    let inppass = document.getElementById('inppass');
    let pass = document.getElementById('pass');

    let cinppass = document.getElementById('cinppass');
    let cpass = document.getElementById('cpass');

    let validname = /^[a-zA-Z]{3,}\s[a-zA-Z]{3,}$/;
    let validemail = /^^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    inpname.addEventListener('input', e => {
        const inputValue = inpname.value;
        if (validname.test(inputValue)) {
            rname.innerText = 'Name is Valid';
            rname.style.color = 'green';
            rname.style.display = 'block';
        } else if (inpname.value === '') {
            rname.innerText = '';
        } else {
            rname.innerText = 'Name is Invalid';
            rname.style.color = 'red';
            rname.style.display = 'block';
            e.preventDefault(e);
        }
    });

    var emailValue = inpemail.value;
    cinppass.addEventListener("input", e => {
        if (inppass.value != cinppass.value && inppass.value != '') {
            cpass.innerText = 'Password dont\'t match!';
            cpass.style.color = 'red';
            cpass.style.display = 'block';
            e.preventDefault(e);
        } else if (inppass.value == cinppass.value && inppass.value != '') {
            cpass.innerText = 'Password match';
            cpass.style.color = 'green';
        }
    })
    let success = document.getElementById('success');
    let failed = document.getElementById('failed');

    let open = new URL(location.href).searchParams.get('t');
    let close = new URL(location.href).searchParams.get('f');
    if (open) {
        setTimeout(() => {
            success.classList.remove('hidden');
        }, 3600);
    } else if (close) {

        setTimeout(() => {
            failed.classList.remove('hidden');
        }, 3600);
    }

    inpemail.addEventListener('input', checkemail);





    function checkemail() {
        let checkemail = document.getElementById('checkmail');
        let signupform = document.getElementById('signupform');
        let email = inpemail.value;
        // if (emailValue === '') {
        //             email.innerText = '';
        //             return;
        //         }

        //         if (validemail.test(emailValue)) {
        //             email.innerText = 'Email is Valid';
        //             email.style.color = 'green';
        //             email.style.display = 'block';
        //         } else {
        //             email.innerText = 'Email is Invalid';
        //             email.style.color = 'red';
        //             email.style.display = 'block';
        //             e.preventDefault();
        //             return;
        //         }
        var formData = new FormData();
        formData.append('email', email);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/Wiki-/Users/findEmail', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                checkemail.innerText = xhr.responseText;
            }
        };
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(new URLSearchParams(formData));
    }



    let searchbar = document.getElementById('searchbar');

    searchbar.addEventListener('input', search);

    function search() {
        let searchresult = document.getElementById('searchresult');
        let search = searchbar.value;
        const xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('search', search);
        xhr.open('POST', 'http://localhost/Wiki-/Users/search', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                let data = JSON.parse(xhr.response);
                for (let index = 0; index < data.length; index++) {
                    searchresult.innerHTML = '';
                    searchresult.innerHTML += `
                <a href="http://localhost/Wiki-/Wikis/displaysinglewiki?id=${data[index][0]}">${data[index][1]}</a>
            `;

                }
                if (search.length == 0) {
                    searchresult.innerHTML = '';
                }
            }
        };
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(new URLSearchParams(formData));
    }
</script>