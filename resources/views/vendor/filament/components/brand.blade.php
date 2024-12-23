@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold leading-5 tracking-tight',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-16">
    </div>
@endif
