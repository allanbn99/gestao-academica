<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark rounded-0">
        <li class="breadcrumb-item"><a href="{{ route('panel.home') }}" class="text-light">Home</a></li>
        @php
            $uri = $_SERVER['REQUEST_URI'];
            $ex = array_filter(explode('/', $uri));
            $array = [];
            for($i = 0;$i < count($ex);$i++){
                array_push($array, $i);
            }
            function newKeyArray($key, $val){
                return [$key => $val];
            }
            $result = array_map('newKeyArray', $array, $ex);
        @endphp
        @foreach ($result as $key => $value)
            @if ($key != 0)
                @if (array_key_last($result) == $key)
                    <li class="breadcrumb-item active" aria-current="page">{{ $value[$key] }}</li>
                @else
                    <li class="breadcrumb-item text-light">{{ $value[$key] }}</li>
                @endif
            @endif
        @endforeach
    </ol>
</nav>