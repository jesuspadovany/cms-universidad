<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
	<h2 class="text-5xl">
		@if ($icon)
			<i class="{{ $icon }}"></i>
		@endif

		{{ $title }}
	</h2>

	<div class="ml-auto">
		{{ $slot }}
	</div>
</div>