@props(['name', 'label', 'type' => 'text', 'placeholder' => ''])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="relative mt-2 rounded-md shadow-sm">

        <textarea type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="block w-full rounded-md border-0 py-1.5 px-2 ring-1 ring-inset focus:ring-inset sm:text-sm sm:leading-6 @error($name)text-red-900 placeholder:text-red-300 focus:ring-red-500 pr-10 ring-red-300 0 focus:ring-2 @enderror"
            placeholder="{{ $placeholder }}" aria-invalid="false"
            aria-describedby="{{ $name }}-error">{{ old($name) }}</textarea>

        @error($name)
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">

                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
</div>