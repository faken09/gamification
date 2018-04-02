<div>
    <label>Name
        @if ($errors->has('name'))
            <span class="span-error">
                    :{{ $errors->first('name') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="name" @if(isset($location->name)) value="{{$location->name }}"
           @else value="{{ old('name') }}" @endif>

</div>

<div>
    <label>Description
        @if ($errors->has('description'))
            <span class="span-error">
                    :{{ $errors->first('description') }}
                                    </span>
        @endif
    </label>

    <textarea class="input-st" autocomplete="off" type="text" name="description">@if(isset($location->description)){{$location->description }}@else {{old('description')}}@endif</textarea>

</div>

<div>
    <label>Image
        @if ($errors->has('image'))
            <span class="span-error">
                                        :{{ $errors->first('image') }}
                                    </span>
        @endif
    </label>

    @if(isset($description->image))
        <img src="{{asset(env('STORAGE_DISK_PATH')."/characters/".$description->image)}}">
    @endif
    <input type="file" name="image">

</div>

<div>
    <button type="submit">
        {{$submitButton}}
    </button>

</div>