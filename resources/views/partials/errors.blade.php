
{{--@foreach($errors->all() as $error)--}}
{{--    <ul>--}}
{{--        <li class="alert alert-danger">{{$error}}</li>--}}
{{--    </ul>--}}

{{--@endforeach--}}

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
