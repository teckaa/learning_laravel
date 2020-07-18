@extends('layouts.app')

@section('content')
    @if( App\Receipt::count() == 0 )
        <div class="text-center p-5">
            You haven't create any {{ strtolower( $page_title ?? '' ) }} yet,
            <p>
                <small>
                    Start by clicking the button below...
                </small>
            </p><br/>
            <a href="/teckaa/public/{{ strtolower( $page_title ?? '' ) }}/create"
                role="button" class="button primary">
                Create
            </a>
        </div>
    @else
        <ul data-role="listview" data-view="content" data-select-node="true" class="all-list">
            @foreach ($collection as $item)
            <a href="{{'/teckaa/public/receipts/'.$item->id.'/edit'}}" >
                <li data-icon="<div class='all-list-first-name'>{{strtoupper($item->name[0])}}</div>"
                    data-caption="{{$item->name}}<br/>"
                    data-content="<span class='text-muted'>{{$item->phonenumber}}</span>">
                </li>
            </a>
            @endforeach
        </ul>
    @endif
@endsection
