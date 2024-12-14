@if (is_array($getState()) || is_object($getState()))
    {{-- Debug Output --}}
    @php
        var_dump($getState());
    @endphp
    @foreach ($getState() as $color)
        <div style="width: 20px; height: 20px; background-color: {{ $color['code'] ?? '#000' }}; border-radius: 4px;"></div>
    @endforeach
@else
    <p>No colors available. Debug: {{ json_encode($getState()) }}</p>
@endif
