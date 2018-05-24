<div>
    <label>Title
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

    <input class="input-st" autocomplete="off" type="text" name="description" @if(isset($quest->description)) value="{{$quest->description }}"
           @else value="{{ old('description') }}" @endif>


</div>


<div>
    <label>info
        @if ($errors->has('info'))
            <span class="span-error">
                    :{{ $errors->first('info') }}
                                    </span>
        @endif
    </label>

    <textarea class="input-st" autocomplete="off" type="text" name="info">@if(isset($quest->info)){{$quest->info }}@else {{old('info')}}@endif</textarea>

</div>


<div>
    <label>Solution
        @if ($errors->has('solution'))
            <span class="span-error">
                    :{{ $errors->first('solution') }}
                                    </span>
        @endif
    </label>

    <input class="input-st" autocomplete="off" type="text" name="solution" @if(isset($quest->solution)) value="{{$quest->solution }}"
           @else value="{{ old('solution') }}" @endif>


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