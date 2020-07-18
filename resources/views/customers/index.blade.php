@extends('layouts.app')

@section('content')

    @if( App\Customer::where('user_id', Auth::user()->id)->count() == 0 )
        <div class="text-center p-5">
            You haven't create any {{ strtolower( $page_title ?? '' ) }} yet,
            <p>
                <small>
                    Create your first customer and start sending invoice and receipts.
                </small>
            </p><br/>
            <a href="/teckaa/public/customers/create"
                role="button" class="button primary">
                Create
            </a>
        </div>

        @else
        <form method="POST" action="{{ url('customers/deleteall') }}" id="js-delete-all-checkbox">
            @csrf
            @method('delete')
            @if ( App\Customer::withTrashed()->where('user_id', Auth::user()->id)->count() == 0)
                No Trash
            @else
                Trash is ready
            @endif
            <ul class="items-list custom-list-marker">
                @foreach ($collection as $item)
                    <input type="checkbox"
                        value="{{ $item->id }} "
                        name="ids[]"
                        class="list-all-checkbox pos-absolute mt-3 ml-2"
                        style="left:0px; z-index:99;" />
                    <li class="item bg-lightGray-hover c-pointer">
                        <div class="row" style="padding: 0">
                            <div class="stub" style="width: 45px;">
                                <div class="items-list-first-name float-left">
                                    <div style="margin-top:-5px; margin-left:6px;">
                                        {{strtoupper($item->name[0])}}
                                    </div>
                                </div>
                            </div>

                            <div class="cell" style="width:200px;">
                                <a href="{{ url(strtolower( $page_title ?? '' ).'/'.$item->id.'/edit') }}" >
                                    <span class="label" title="{{$item->name}}">{{ substr($item->name, 0, 30)}}</span>
                                    <span class="second-label mt-2">{{$item->phonenumber}}</span>
                                </a>
                            </div>

                            <div class="stub" style="width: 70px; z-index:99;">
                                @if ($trash)
                                    <span class="items-list-icon">
                                        <a href="{{ url('customers/bin', $item) }}" >
                                            <ion-icon name="return-up-back-outline"
                                                class="fg-darkGray-hover"
                                                title="Restore this item">
                                            </ion-icon>
                                        </a>
                                        <ion-icon name="trash-outline"
                                        class="fg-red-hover"
                                        title="Delete this item forever "
                                        data-role="popover"
                                        data-popover-trigger="click"
                                        data-popover-position="left"
                                        data-popover-hide="0"
                                        data-cls-popover="bg-light drop-shadow p-2 mt-2"
                                        data-popover-text='
                                            <small>
                                                Delete this item forever
                                            </small>
                                            <button class="button alert fg-white small"
                                                onclick="event.preventDefault();
                                                document.getElementById(`form-remove-{{$item->id}}`).submit()">
                                                Yes
                                            </button>
                                        '>
                                        </ion-icon>
                                    </span>
                                    <br/>
                                    <span style="font-size: 10px;">
                                        {{$item->created_date}}
                                    </span>

                                    <form id="{{'form-remove-'.$item->id}}" action="{{ route('customer.remove') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}" />
                                    </form>
                                @else
                                    <span class="items-list-icon">
                                        <a href="{{ url(strtolower( $page_title ?? '' ).'/'.$item->id.'/edit') }}" >
                                            <ion-icon name="create-outline"
                                                class="fg-darkGray-hover"
                                                title="Edit this item">
                                            </ion-icon>
                                        </a>
                                        <ion-icon name="trash-outline"
                                        class="fg-red-hover"
                                        title="Delete this item"
                                        data-role="popover"
                                        data-popover-trigger="click"
                                        data-popover-position="left"
                                        data-popover-hide="0"
                                        data-cls-popover="bg-light drop-shadow p-2 mt-2"
                                        data-popover-text='
                                            <small>
                                                Delete this item
                                            </small>
                                            <button class="button alert fg-white small"
                                                onclick="event.preventDefault();
                                                document.getElementById(`form-delete-{{$item->id}}`).submit()">
                                                Yes
                                            </button>
                                        '>
                                        </ion-icon>
                                    </span>
                                    <br/>
                                    <span style="font-size: 10px;">
                                        {{$item->created_date}}
                                    </span>

                                    <form id="{{'form-delete-'.$item->id}}" action="{{ route('customer.delete',$item->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>
    @endif

    <script>
        $(document).ready(function(){
            $(".selectall").click(function(){
                $('selec').not(this).prop('checked', this.checked);
            });

            $("#js-check-all-checkbox").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>

@endsection
