<div class="input">
    
    {{-- Label --}}
    @if ($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    
    {{-- Input --}}
    @if ($type == 'editor')
        <textarea name="{{ $name }}" id="{{ $id }}">{{ old($name, $value) }}</textarea>
        <script>
            CKEDITOR.replace('{{ $id }}', {
                height: 300,
                removeButtons: 'PasteFromWord',
                toolbar: [
                    ['Bold', 'Italic', 'Underline'],
                    ['NumberedList', 'BulletedList'],
                    ['Link', 'Unlink'],
                    ['Source']
                ]
            });
        </script>
    @else
        <input 
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            autocomplete="off"
            value="{{ old($name, $value) }}"
            >
    @endif
    
    @error($name)
        <small class="error">{{ $message }}</small>
    @enderror
    
</div>