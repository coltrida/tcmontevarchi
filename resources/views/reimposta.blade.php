@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error )
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('message'))
    @component('components.alert-info')
        {{session()->get('message')}}
    @endcomponent
@endif

<form action="{{route('reimposta')}}" method="post">
    @csrf
    Nuova Password: <input type="password" name="password">
    <br>
    Ridigita Password: <input type="password" name="password_confirmation">
    <input type="hidden" name="indirizzo" value="{{$indirizzo}}">
    <br>
    <input type="submit" value="Modifica">
</form>