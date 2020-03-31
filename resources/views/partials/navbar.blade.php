<nav class="flex items-center p-3 bg-primary text-white shadow-md">
	<a href="{{ route('home.index') }}" class="text-xl">el Rojas</a>

	<div class="flex items-center ml-auto">
		<div>
            <a href="{{ route('schedule.index') }}" class="mr-2 font-semibold">Agenda</a>
            <a href="{{ route('courses.index') }}" class="mr-2 font-semibold">Cursos</a>
            <a href="{{ route('library.index') }}" class="font-semibold">Biblioteca</a>
        </div>

		<div class="mx-4">
			<button type="button" class="focus:outline-none">
				<i class="fa fa-search curso"></i>
			</button>
		</div>

		<button type="button">
			<i class="fa fa-bars fa-lg"></i>
		</button>
	</div>
</nav>
