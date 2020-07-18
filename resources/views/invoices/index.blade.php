@extends('layouts.app')

@section('content')

    @if( App\Invoice::where('user_id', Auth::user()->id)->count() == 0 )
        <div class="text-center p-5">
            You haven't create any {{ strtolower( $page_title ?? '' ) }} yet,
            <p>
                <small>
                    Start by clicking the button below.
                </small>
            </p><br/>
            <a href="/teckaa/public/invoices/create"
                role="button" class="button primary">
                Create
            </a>
        </div>

        @else

        <ul class="items-list custom-list-marker"
            data-role="sorter"
            data-sort-start="false"
            id="sorter-attr">
            @foreach ($collection as $item)
            <a href="{{ url(strtolower( $page_title ?? '' ).'/'.$item->id.'/edit') }}" >
                <li class="item bg-lightGray-hover c-pointer sort">
                    <div class="row sort">
                        <div class="stub" style="width: 50px;">

                            <div class="items-list-first-name float-left">
                                <div style="margin-top:-5px; margin-left:6px;">
                                    {{strtoupper($item->name[0])}}
                                </div>
                            </div>
                        </div>

                        <div class="cell">
                            <a href="{{ url(strtolower( $page_title ?? '' ).'/'.$item->id.'/edit') }}" >
                                <span class="label">You sent invoices {{$item->invoice_total_balance }} to {{$item->customer}}</span>
                                <span class="second-label mt-2">{{$item->invoice_no}}</span>
                            </a>
                        </div>

                        <div class="stub" style="width: 70px; z-index:99;">
                            <span class="items-list-icon">
                                <a href="{{ url(strtolower( $page_title ?? '' ).'/'.$item->id.'/edit') }}" >
                                    <ion-icon name="create-outline"
                                        class="fg-darkGray-hover"
                                        title="Edit this item">
                                    </ion-icon>
                                </a>
                                <ion-icon name="trash-outline"
                                class="fg-darkRed-hover"
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
                                    <button class="button bg-darkRed fg-white small"
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
                        </div>
                        <form id="{{'form-delete-'.$item->id}}" action="{{ route('customer.delete',$item->id) }}"
                        method="POST" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </li>
            </a>
            @endforeach
        </ul>
    @endif

@endsection
