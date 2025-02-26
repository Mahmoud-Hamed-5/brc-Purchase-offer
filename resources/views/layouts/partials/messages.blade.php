@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {!! $msg !!}
            </div>
        @endforeach
    @else
        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            {!! $data !!}
        </div>
    @endif
@endif

@foreach ($errors->all() as $error)
    <div role="alert" class="alert alert-danger">
        <i class="fa fa-x" style="color: red; margin-left: 7px"></i>
        {{ $error }}
    </div>
@endforeach

