<div>
    @if(session()->has('success'))
        <div class="remark success p-2" style="font-size: 13px; margin:0px">
            <span class="button square closer"></span>
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="remark alert p-2" style="font-size: 13px; margin:0px">
            {{ session()->get('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="remark alert p-2" style="font-size: 13px; margin:0px">
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li><small>{{ $error }}</small></li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
