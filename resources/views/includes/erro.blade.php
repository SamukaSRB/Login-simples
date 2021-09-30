{{-- Erros --}}
@if ($errors->any())
<div class="toast align-items-center ">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger ">
        {{ $error }}
    </div>
    @endforeach
  </div>
  @endif


{{-- erros de bd --}}

@if(isset($erros_bd))

    <div class="toast align-items-center ">

        @foreach ($erros_bd as $item)
        <div class="alert alert-danger ">
        {{$item}}
        </div>

        @endforeach
    </div>

@endif
