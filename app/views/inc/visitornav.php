<nav class="sticky px-4 py-4 flex justify-between items-center bg-white">


	<h1 class="relative z-10 flex items-center w-auto text-xl font-black leading-none text-gray-900 select-none md:text-2xl">MyWiki</h1>
	<ul class=" absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
		<li><a class="hidden text-sm text-gray-400 hover:text-gray-500 lg:block" href="<?php echo URLROOT; ?>pages/index">Home</a></li>
		<li class="text-gray-300 hidden lg:block">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
			</svg>
		</li>
		<li> <input type="text" id="searchbar"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search..."></li>
	</ul>
	<button id="burgermenu" class=" block lg:hidden"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
			<path fill="#0d0d0d" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
		</svg></button>
	<button class=" signbtn hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200 md:">Sign In</button>
	<button class="registerbtn hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200 md:">Sign up</button>
</nav>



<div id="nav" class=" hidden flex flex-col items-center gap-3  bg-black text-white font-bold w-[100%] z-100 h-[20%]">
	<div class="h-[10%] flex flex-row justify-center items-center ">
		<button id="closenav"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512">
				<path fill="#ffffff" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
			</svg></button>

	</div class="flex flex-col items-center justify-center	">
	<form action="<?php echo URLROOT; ?>pages/index">
		<input type="submit" class="cursor-pointer" value="Home">
	</form>
	<div class="w-[50%] flex flex-col gap-3 mb-2">
		<button class="signbtn F lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200 md:">Sign In</button>
		<button class="registerbtn F lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200 md:">Sign up</button>
	</div>
</div>
</div>


<script>
	const signbtn = document.querySelectorAll('.signbtn')
	const registerbtn = document.querySelectorAll('.registerbtn')
	let closenav = document.getElementById('closenav');
	let nav = document.getElementById('nav');
	let burgermenu = document.getElementById('burgermenu');
	burgermenu.addEventListener('click', e => {
		nav.classList.remove('hidden');
		nav.classList.add('opacity-100');
	})
	closenav.addEventListener('click', e => {
		nav.classList.add('hidden');
		nav.classList.remove('opacity-100');
	})

	for (let index = 0; index < signbtn.length; index++) {
    signbtn[index].addEventListener('click', e => {
        signindiv.classList.remove('hidden');
    })

}
for (let index = 0; index < registerbtn.length; index++) {
    registerbtn[index].addEventListener('click', e => {
        signupdiv.classList.remove('hidden');
    })
}


</script>