@php
    $route = route('bone.captcha.image', [], true);
        
        if (mb_strpos(config('app.url'), 'https://') !== false) {
            $route = secure_url($route);
        }
        
        $route .= '?_=' . mt_rand();
@endphp
<img src="{{ $route }}"
     {{-- alt="https://github.com/igoshev/laravel-captcha" --}}
     style="cursor:pointer;width:{{ $width }}px;height:{{ $height }}px;"
     data-toggle="tooltip"
     title="{{ $title }}"
     onclick="this.setAttribute('src','{{ $route }}&_='+Math.random());var captcha=document.getElementById('{{ $input_id }}');if(captcha){captcha.focus()}"
>
