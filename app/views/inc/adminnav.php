<nav class="sticky px-4 py-4 flex justify-between items-center bg-white">
	<a class="text-3xl font-bold leading-none" href="#">
		<h1 class="relative z-10 flex items-center w-auto text-2xl font-black leading-none text-gray-900 select-none">MyWiki</h1>
	</a>

	<div class=" items-center justify-around font-bold hidden md:block md:w-[40%] md:flex">
		<form method="post" action="<?php echo URLROOT; ?>pages/admin">
			<input class="cursor-pointer" type="submit" name="dash" value="Dashboard">
		</form>
		<form method="post" action="<?php echo URLROOT; ?>users/logout">
			<input class="cursor-pointer" type="submit" name="Log out" value="Log out">
		</form>
	</div>
	<button id="burgermenu" class=" block md:hidden"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
			<path fill="#0d0d0d" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
		</svg></button>

	<div id="nav" class="hidden flex flex-col fixed top-0 right-0 bg-black text-white font-bold w-[70%] z-100 h-[100%] md:hidden">
		<div class="h-[10%] flex flex-row justify-center items-center ">
			<button id="closenav"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512">
					<path fill="#ffffff" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
				</svg></button>
		</div>
		<div class="h-[50%] flex flex-col items-center justify-evenly">
			<form method="post" action="<?php echo URLROOT; ?>users/logout">
				<div class="flex items-center gap-1">
					<svg xmlns="http://www.w3.org/2000/svg" height="15" width="16" viewBox="0 0 512 512">
						<path fill="#ffffff" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
					</svg>
					<input class="cursor-pointer" type="submit" name="Log out" value="Log out">
				</div>
			</form>
		</div>
	</div>
</nav>


<script>
	let closenav = document.getElementById('closenav');
	let nav = document.getElementById('nav');
	let burgermenu = document.getElementById('burgermenu');
	burgermenu.addEventListener('click' , e=>{
		nav.classList.remove('hidden');
		nav.classList.add('opacity-100');
	})
	closenav.addEventListener('click', e=>{
		nav.classList.add('hidden');
		nav.classList.remove('opacity-100');
	})
</script>