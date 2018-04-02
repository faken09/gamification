<div>
    <label>Name
        @if ($errors->has('title'))
            <span class="span-error">
                    :{{ $errors->first('title') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="title" @if(isset($quest->title)) value="{{$quest->title }}"
           @else value="{{ old('title') }}" @endif>

</div>

<div>
    <label>Description
        @if ($errors->has('description'))
            <span class="span-error">
                    :{{ $errors->first('description') }}
                                    </span>
        @endif
    </label>

    <textarea class="input-st" autocomplete="off" type="text" name="description">@if(isset($quest->title)){{$quest->title }}@else {{old('description')}}@endif</textarea>

</div>

<div>
    <label>Gold Rewards
        @if ($errors->has('gold_rewards'))
            <span class="span-error">
                    :{{ $errors->first('gold_rewards') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="gold_rewards" @if(isset($quest->gold_rewards)) value="{{$quest->gold_rewards }}"
           @else value="{{ old('gold_rewards') }}" @endif>

</div>

<div>
    <label>Experience Gains
        @if ($errors->has('experience_gains'))
            <span class="span-error">
                    :{{ $errors->first('experience_gains') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="experience_gains" @if(isset($quest->experience_gains)) value="{{$quest->experience_gains }}"
           @else value="{{ old('experience_gains') }}" @endif>

</div>

<div>
    <label>Required Level
        @if ($errors->has('required_level'))
            <span class="span-error">
                    :{{ $errors->first('required_level') }}
                                    </span>
        @endif
    </label>
    <select class="input-st" name="required_level">
        @if(isset($quest)) {{--  if edit page  --}}
        @foreach($levels as $level)
            <option
                    @if($level->id == $quest->required_level) selected @endif
            value="{{$level->id}}"> {{$level->id}}
            </option>
        @endforeach
        @else {{--  Show all players on create page --}}
        @foreach($levels as $level)
            <option
                    value="{{$level->id}}"> {{$level->id}}
            </option>
        @endforeach

        @endif
    </select>

</div>

<div>
    <label>Sted
        @if ($errors->has('location'))
            <span class="span-error">
                    :{{ $errors->first('location') }}
                                    </span>
        @endif
    </label>
    <select class="input-st" name="location">
        @if(isset($quest)) {{--  if edit page  --}}
        @foreach($locations as $location)
            <option
                    @if($location->id == $quest->location_id) selected @endif
            value="{{$location->id}}"> {{$location->name}}
            </option>
        @endforeach
        @else {{--  Show all players on create page --}}
        @foreach($locations as $location)
            <option
                    value="{{$location->id}}"> {{$location->name}}
            </option>
        @endforeach

        @endif
    </select>

</div>

<div>
    <label>Fjende
        @if ($errors->has('enemy'))
            <span class="span-error">
                    :{{ $errors->first('enemy') }}
                                    </span>
        @endif
    </label>
    <select class="input-st" name="enemy">
        @if(isset($quest)) {{--  if edit page  --}}
        @foreach($enemies as $enemy)
            <option
                    @if($enemy->id == $quest->enemy_id) selected @endif
            value="{{$enemy->id}}"> {{$enemy->name}}
            </option>
        @endforeach
        @else {{--  Show all players on create page --}}
        @foreach($enemies as $enemy)
            <option
                    value="{{$enemy->id}}"> {{$enemy->name}}
            </option>
        @endforeach

        @endif
    </select>

</div>


<div>
    <button type="submit">
        {{$submitButton}}
    </button>

</div>