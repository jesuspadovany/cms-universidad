<div {{ $attributes->merge(['class' => 'p-6 mb-3 bg-red-400 rounded ' . ($errors->any() ? '' : 'hidden') ]) }}>
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>
