<button {{ $attributes->merge([
    'class' => 'flex items-center bg-primary shadow-lg py-2 px-6 rounded-full hover:bg-secondary hover:shadow-2xl no-underline font-light tracking-wide text-white text-lg'
]) }}>
    {{ $slot }}
</button>