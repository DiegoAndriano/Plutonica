<link href="{{ asset('css/flash.css') }}" rel="stylesheet">

@if(Session::has('notificacion_flash_minimized.message'))
    <div id="minimized_notification" class="minimized-notification">
        <div
            style="filter: drop-shadow(0px 10px 1rem #a5a5a5);"
            class="{{Session::get('notificacion_flash_minimized.level')}}">
            <p onclick="hideDiv()" style="cursor: pointer">x</p>
            <h2>{{ \Illuminate\Support\Str::title(Session::get('notificacion_flash_minimized.level')) }}</h2>
            <p>{{ Session::get('notificacion_flash_minimized.message') }}</p>
        </div>
    </div>
@endif

@if(Session::has('notificacion_flash.message'))
    <div
        onclick="hideModal(this)"
        id="modal-container" class="{{Session::get('notificacion_flash.level') === 'increible exito' ? 'six' : 'two'}}">
        <div class="modal-background">
            <div
                class="modal {{\Illuminate\Support\Str::replaceFirst(' ', '-', Session::get('notificacion_flash.level'))}}">
                <h2>{{ \Illuminate\Support\Str::replaceFirst('Increible', '', \Illuminate\Support\Str::title(Session::get('notificacion_flash.level')))}}</h2>
                <p>{{ Session::get('notificacion_flash.message') }}</p>
                <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                     preserveAspectRatio="none">
                    <rect x="0" y="0" fill="none" width="100%" height="100%" rx="3" ry="3"></rect>
                </svg>
            </div>
        </div>
    </div>
@endif

<script>
    function hideDiv() {
        $('#minimized_notification').addClass('hideDiv');
    }

    function hideModal(e) {
        $(e).addClass('out');
    }
</script>
