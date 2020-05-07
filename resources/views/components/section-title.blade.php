<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    @if ($titleslot ?? false)
        {{ $titleslot }}
    @else
        <h2 class="text-5xl">
            @if ($icon)
            <i class="{{ $icon }}"></i>
            @endif

            {{ $title }}
        </h2>
    @endif

	<div class="ml-auto">
		{{ $slot }}
	</div>
</div>
