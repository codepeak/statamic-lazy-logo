@php
$colors = config('lazy-logo.gradient', [config('lazy-logo.color', '#19292f')]);
$offset = count($colors) > 1 ? 100 / (count($colors) - 1) : 0;
$center = strpos(Request::server('HTTP_REFERER'), 'login') !== false;
@endphp
<svg width="280" height="32" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="fill" x1="0" x2="100%" y1="0" y2="0" gradientUnits="objectBoundingBox">
            @foreach ($colors as $i => $color)
                <stop stop-color="{{ $color }}" offset="{{ $offset * $i }}%"/>
            @endforeach
        </linearGradient>
    </defs>
    <style>
        #text {
            font-family: {{ config('lazy-logo.font_family', 'Inter UI,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue') }};
            font-size: {{ config('lazy-logo.font_size', '22px') }};
            font-weight: {{ config('lazy-logo.font_weight', 'normal') }};
        }
    </style>
    <text
        id="text"
        x="{{ $center ? '50%' : '0' }}"
        y="50%"
        dominant-baseline="central"
        text-anchor="{{ $center ? 'middle' : 'start' }}"
        fill="url(#fill)">
        {{ config('lazy-logo.text', config('app.name')) }}
    </text>
</svg>
