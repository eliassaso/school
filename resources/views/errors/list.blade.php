{{-- var_dump($errors->toArray()) --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li class="red-text text-lighten-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
