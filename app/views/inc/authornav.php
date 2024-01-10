<nav class="sticky px-4 py-4 flex justify-between items-center bg-white">
		<a class="text-3xl font-bold leading-none" href="#">
			<h1 class="relative z-10 flex items-center w-auto text-2xl font-black leading-none text-gray-900 select-none">MyWiki</h1>
		</a>
		
			<div class=" items-center justify-around font-bold hidden md:block md:w-[40%] md:flex	">
			<form method="post" action="<?php echo URLROOT; ?>pages/admin" >
			<input class="cursor-pointer" type="submit" name="Dashboard" value="Dashboard">
			</form>
			<form method="post" action="<?php echo URLROOT; ?>pages/stats" >
			<input class="cursor-pointer" type="submit" name="Stats" value="Stats">
			</form>
			<form method="post" action="<?php echo URLROOT; ?>pages/Wiki" >
			<input class="cursor-pointer" type="submit" name="Wikis" value="Wikis">	
			</form>
			<form method="post" action="<?php echo URLROOT; ?>users/logout" >
			<input class="cursor-pointer" type="submit" name="Log out" value="Log out">
			</form>
			</div>

	</nav>
