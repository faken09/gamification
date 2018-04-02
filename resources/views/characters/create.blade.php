@extends('layouts.app')

@section('content')
    <div class="container-inner">
            {!! Form::open([
             'method' => 'POST',
             'route' => array('character.store'),
             'files' => true
            ]) !!}
            <div>
                <label>Name
                    @if ($errors->has('name'))
                        <span class="span-error">
                    :{{ $errors->first('name') }}
                                    </span>
                    @endif
                </label>

                <input class="input-st" autocomplete="off" type="text" name="name" @if(isset($character->name)) value="{{$character->name }}"
                       @else value="{{ old('name') }}" @endif>

            </div>

            <div>
                <label>Image - 250x250 størrelse
                    @if ($errors->has('image'))
                        <span class="span-error">
                                        :{{ $errors->first('image') }}
                                    </span>
                    @endif
                </label>

                @if(isset($character->image))
                    <img src="{{asset(env('STORAGE_DISK_PATH')."/characters/".$character->image)}}">
                @endif
                <input type="file" name="image">

            </div>


            <div>
                <button type="submit">
                    Opret character
                </button>

            </div>
            {!! Form::close() !!}
</div>
@endsection

