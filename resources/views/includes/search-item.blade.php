<header>
    <div class="row pl-2 pr-2 pt-2">
        <div class="cell">
            <form action="{{ url()->current() }}" method="GET">
                <input type="text"
                    name='q'
                    data-cls-input="border bd-cobalt border-size-3 bd-cobalt-hover"
                    data-role="input"
                    data-search-button="true"
                    data-search-button-click="submit"
                    data-clear-button="false"
                    id="js-search"
                    class="border-radius-3"
                    title="Search {{ strtolower( $page_title ?? '' ) }} by name, email or phone"
                    placeholder="Search {{ strtolower( $page_title ?? '' ) }} by name, email or phone"/>
            </form>
        </div>
        <div class="stub" style="width: 40px; padding:0px;">
            <button class="button"
                id="js-enable-selected-mode"
                style="margin-top:6px;"
                data-role="hint"
                data-hint-position="left"
                data-hint-text="Enable selected mode"
                data-cls-hint="drop-shadow bg-light no-padding mb-5">
                <span class="mif-list-numbered"></span>
            </button>
        </div>
    </div>
    
    @if(Request::is('customers/bin') || 
        Request::is('invoices/bin') || 
        Request::is('receipts/bin'))

        <div class="row pl-2 pr-2">
            <div class="cell">
                <ul class="h-menu border bd-gray border-top-none border-right-none border-left-none">
                    <a class="button float-left bg-gray c-default" role="button" 
                        style="border-radius: 0px; font-size:12px;">Trash</a> 
                    <li><a href="{{ url("customers/bin") }}" style="font-size:12px;" class="{{ Request::is('customers/bin') ? 'bg-lightGray' : '' }}">Customers</a></li>
                    <li><a href="{{ url("invoices/bin") }}" style="font-size:12px;" class="{{ Request::is('invoices/bin') ? 'bg-lightGray' : '' }}">Invoices</a></li>
                    <li><a href="{{ url("receipts/bin") }}" style="font-size:12px;" class="{{ Request::is('receipts/bin') ? 'bg-lightGray' : '' }}">Receipts</a></li>
                </ul>
            </div>
        </div> 
         
    @endif

    <div class="row pl-2 pr-2">
        <div class="col-8" style="padding: 0">
            <input type="checkbox"
                style="left:0px; "
                class="list-all-checkbox pos- mt-3 ml-2 z-index:99;"
                id="js-check-all-checkbox" />
            <span style="padding:5px 5px 5px 10px; display: inline-block "> {{ __( $page_title ) }}</span>
        </div>
        <div class="col-4" style="padding: 0">
            <button class="image-button links icon-left place-right"
                id="js-wrap-delete-all-button"
                style="font-size: 13px; display:none;"
                title="Delete selected item(s)"
                data-role="popover"
                data-popover-trigger="click"
                data-popover-position="left"
                data-popover-hide="0"
                data-cls-popover="bg-light drop-shadow p-2 mt-2"
                data-popover-text='
                <div style="">
                    <small>
                        <p><b>Delete</b></p>
                        Delete selected item(s)
                    </small>
                    <button class="button alert fg-white small"
                        onclick="event.preventDefault();
                        document.getElementById(`js-delete-all-checkbox`).submit()">
                        Yes
                    </button>
                </div>
                '>
                <span class="mif-bin icon"></span>
                <span class="caption">Delete all</span>
            </button>
        </div>
    </div>
    <div class="border-right-bottom-left bd-lightGray"></div>

    <script>
        $(document).ready(function(){
            $("#js-enable-selected-mode").click(function(){
                $(".list-all-checkbox").animate({width: 'toggle'}, "fast");
                $("#js-wrap-delete-all-button").animate({width: 'toggle'}, "fast");
                $("#js-check-all-checkbox").css({"margin-left": "60px", "font-size": "200%"});
            });

            $("#js-check-all-checkbox").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>
</header>

