<div>
    <label>Name
        @if ($errors->has('name'))
            <span class="span-error">
                    :{{ $errors->first('name') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="name" @if(isset($enemy->name)) value="{{$enemy->name }}"
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

    <textarea class="input-st" autocomplete="off" type="text" name="description">@if(isset($enemy->description)){{$enemy->description }}@else {{old('description')}}@endif</textarea>

</div>

<div>
    <label>Health
        @if ($errors->has('health'))
            <span class="span-error">
                    :{{ $errors->first('health') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="health" @if(isset($enemy->health)) value="{{$enemy->health }}"
           @else value="{{ old('health') }}" @endif>

</div>

<div>
    <label>Attack
        @if ($errors->has('attack'))
            <span class="span-error">
                    :{{ $errors->first('attack') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="attack" @if(isset($enemy->attack)) value="{{$enemy->attack }}"
           @else value="{{ old('name') }}" @endif>

</div>

<div>
    <label>Quests
        @if ($errors->has('quest'))
            <span class="span-error">
                    :{{ $errors->first('quest') }}
                                    </span>
        @endif
    </label>
    <select class="input-st" size="20" multiple name="quest">
        @if(isset($enemy)) {{--  if edit page  --}}
        @foreach($quests as $quest)
            <option
                    @if($quest->enemy_id == $enemy->id) selected @endif
            value="{{$quest->id}}"> {{$quest->title}}
            </option>
        @endforeach
        @else {{--  Show all players on create page --}}
        @foreach($quests as $quest)
            <option
                    value="{{$quest->id}}"> {{$quest->title}}
            </option>
        @endforeach

        @endif
    </select>

</div>

<div>
    <label>Image
        @if ($errors->has('image'))
            <span class="span-error">
                                        :{{ $errors->first('image') }}
                                    </span>
        @endif
    </label>

    @if(isset($enemy->image))
        <img src="{{asset(env('STORAGE_DISK_PATH')."/enemy/".$enemy->image)}}">
    @endif
    <input type="file" name="image">

</div>

<div>
    <button type="submit">
        {{$submitButton}}
    </button>

</div>