@if(App::getLocale() == 'ku')
    <a class="link accent padded-underline"
       href="{{route(Route::current()->getName(), ['locale' => 'en'])}}">{{__('auth.view_in_another_language')}}</a>
@else
    <a class="link accent padded-underline"
       href="{{route(Route::current()->getName(), ['locale' => 'ku'])}}">{{__('auth.view_in_another_language')}}</a>
@endif
