@extends('layouts.app')

@section('content')
    <form method="post" action="{{ url('user/upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <img src="
                @if(Auth::user()->avatar)
                    {{ asset('storage/images/'.Auth::user()->avatar) }}
                    @else
                    {{ asset('images/avatar.png') }}
                @endif
                "
            class="border-radius-half border bd-gray drop-shadow" width="100" height="100"/>
        </div>

        <div class="form-group">
            <label>Picture</label>
            <input type="file"
                name="avatar"
                data-clear-button="false"
                data-role="file"
                data-button-title="<ion-icon name='image-outline' style='width:20px; padding:5px;'></ion-icon>"
                value="{{ Auth::user()->avatar }}" /><br/>
            <button class="button primary" name="update">Save</button>
        </div>
    </form>
@endsection
