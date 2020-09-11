@if(App::getLocale() == 'ku')
    <a class="link accent padded-underline"
       href="{{route($route ?? '', ['locale' => 'en'])}}">{{__('auth.view_in_another_language')}}</a>
@else
    <a class="link accent padded-underline"
       href="{{route($route ?? '', ['locale' => 'ku'])}}">{{__('auth.view_in_another_language')}}</a>
@endif
