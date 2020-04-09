@php
    function getMenuLinkBgColor(array $routeNames)
    {
        foreach ($routeNames as $name) {
            if (request()->routeIs($name)) {
                return 'bg-primary';
            }
        }

        return '';
    }
@endphp

<nav class="flex-shrink-0 w-64 bg-primary-lighter text-white">
	<h1 class="flex items-center justify-center h-16 bg-primary leading-none font-semibold text-3xl text-white">
		UBA "ROJAS"
	</h1>

	<ul>
		<li>
			<a
				href="/admin"
				class="
					flex items-center hover:bg-primary pl-2 pr-3 py-2
					{{ request()->is('admin') ? 'bg-primary' : '' }}
				"
			>
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-home fa-lg"></i>
				</span>
				Inicio
			</a>
		</li>
		<li>
			<a
				href="{{ route('admin.slider.index') }}"
				class="
					flex items-center hover:bg-primary pl-2 pr-3 py-2
                    {{ getMenuLinkBgColor(['admin.slider.index', 'admin.slider.create']) }}
				">

				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-sliders-h fa-lg"></i>
				</span>
				Sliders
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.schedule.index') }}"
                class="
                    flex items-center hover:bg-primary pl-2 pr-3 py-2
                    {{ getMenuLinkBgColor(['admin.schedule.index', 'admin.schedule.slider', 'admin.schedule.create']) }}
                ">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-calendar-alt fa-lg"></i>
				</span>
				Agenda
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.library.index') }}"
                class="
                    flex items-center hover:bg-primary pl-2 pr-3 py-2
                    {{ getMenuLinkBgColor(['admin.library.index', 'admin.library.create', 'admin.library.slider', 'admin.library.changePageImage']) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="far fa-calendar-alt"></i>
				</span>
				Biblioteca
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.courses.index') }}"
                class="
                    flex items-center hover:bg-primary pl-2 pr-3 py-2
                    {{ getMenuLinkBgColor(['admin.courses.index', 'admin.courses.changePageImage']) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-cubes fa-lg"></i>
				</span>
				Cursos
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-university fa-lg"></i>
				</span>
				Institucional
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-video fa-lg"></i>
				</span>
				Prensa
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-clipboard-list fa-lg"></i>
				</span>
				Contacto
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-users fa-lg"></i>
				</span>
				Equipo
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-home fa-lg"></i>
				</span>
				Pie de página
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-home fa-lg"></i>
				</span>
				Categoría
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-bars fa-lg"></i>
				</span>
				Menú desplegable
			</a>
		</li>
		<li>
			<a href="#" class="flex items-center hover:bg-primary pl-2 pr-3 py-2">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="far fa-newspaper fa-lg"></i>
				</span>
				Newsletter
			</a>
		</li>
	</ul>
</nav>
