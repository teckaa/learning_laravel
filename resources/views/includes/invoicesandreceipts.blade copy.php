@if($page_title == 'Create invoice' ||
$page_title == 'Edit invoice' ||
$page_title == 'Create receipt' ||
$page_title == 'Edit receipt')

<form method="post" action="{{ url("invoices/create") }}">
    @csrf

    @if($page_title == 'Create invoice' ||
    $page_title == 'Edit invoice' ||
    $page_title == 'Create receipt' ||
    $page_title == 'Edit receipt')

    <div class='' style="width: 370px; height: auto; margin-top: 20px;">
        <div class='row'>
            <div class='cell-6'>
                <ion-icon name="arrow-back-circle-outline"
                    class="fg-gray-hover p-2 float-left"
                    id="js-back-btn"
                    style='font-size:20px;'
                    data-role="hint"
                    data-hint-text="Back"
                    data-cls-hint="bg-cyan fg-white drop-shadow">
                </ion-icon>
                <ion-icon name="trash-bin-outline"
                    class="fg-gray-hover p-2 float-left"
                    style='font-size:20px;'
                    data-role="hint"
                    data-hint-text="Move to trash"
                    data-cls-hint="bg-cyan fg-white drop-shadow">
                </ion-icon>
            </div>
            <div class='cell-6'>
                <ion-icon name="add-circle-outline"
                    id='insert-table'
                    class="fg-gray-hover p-2 float-right"
                    style='font-size:20px;'
                    data-role="hint"
                    data-hint-text="Remove last table"
                    data-cls-hint="bg-cyan fg-white drop-shadow">
                </ion-icon>
                <ion-icon name="remove-circle-outline"
                    id='remove-table'
                    class="fg-gray-hover p-2 float-right"
                    style='font-size:20px;'
                    data-role="hint"
                    data-hint-text="Add new table"
                    data-cls-hint="bg-cyan fg-white drop-shadow">
                </ion-icon>
            </div>
        </div>
        <div class="teckaa-invoice-wrapper" id="export-receipt">
            <div class="drop-shadow bd-gray bg-white w-100" style="height: auto;">
                <div class='teckaa-invoice-top fg-white p-5'
                    style='text-align: center; background: {{ Auth::user()->color }}'>
                    <img src="
                        @if(Auth::user()->avatar)
                            {{ asset('storage/images/'.Auth::user()->avatar) }}
                            @else
                            {{ asset('images/avatar.png') }}
                        @endif
                        "
                        class='border bd-white border-size- border-radius-half drop-shadow p-1'
                        style='width: 50px; height: 50px;' />
                    <p class="text-small">
                    <b>{{ Auth::user()->name }}</b><br>
                    <address class="text-small">
                        <span>@isset(Auth::user()->street) {{Auth::user()->street.',' }} <br/>@endisset</span>
                        @isset(Auth::user()->city) {{Auth::user()->city.',' }} @endisset
                        @isset(Auth::user()->state) {{Auth::user()->state.',' }} @endisset
                        @isset(Auth::user()->country) {{Auth::user()->country.'.' }} <br/>@endisset

                        @isset(Auth::user()->phonenumber) <abbr title="Phone">P:</abbr> {{ Auth::user()->phonenumber }} @endisset

                    </address>
                    </p>
                </div>

                <div class='teckaa-invoice-bottom p-5' style='margin-top: -40px;'>
                <div class='bg-light border bd-lightGray drop-shadow'>

                    <div class="row bg-grayWhite" style='margin:0'>
                    <p class='text-bolder text-upper text-bold p-2'>Invoice</p>
                    </div>
                    <div class="row bg-light p-1" style='margin:0'>
                        <div class="cell-6">
                            <small class='text-bold fg-darkGray' style='font-size:12px;'>ORDER NO#</small><br/>
                            <small class='text-bold' style='font-size:10px;'>
                                <input type="text"
                                    name="invoice_no"
                                    readonly
                                    value="{{ $invoice_no ?? $invoice->invoice_no }}"
                                    class="input-small"
                                    data-clear-button="false"
                                    data-role="input">
                            </small>
                            </div>
                            <div class="cell-6 text-right">
                            <small class='text-bold fg-gray' style='font-size:12px;'>DATE</small><br/>
                            <small class='' style='font-size:10px;'>
                                <input type="text"
                                    name="invoice_no"
                                    readonly
                                    value="{{ Carbon\Carbon::now()->format('m/d/Y h:i A') }}"
                                    class="input-small"
                                    data-clear-button="false"
                                    data-role="input">
                            </small>
                        </div>

                        <table class="table subcompact">
                        <thead>
                            <tr>
                                <th>Items</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id='tbody' onkeyup="$('#js-invoice-collector').val(this.innerHTML)" data-role='draggable' data-drag-element=.drag-element'>
                            <tr id="tdata">
                                <td contenteditable="true">Black suit</td>
                                <td><input class="quantity"/></td>
                                <td><input class="price"/></td>
                                <td class="amount" class="text-right"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table subcompact">
                        <tbody>
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-right subtotal" id="sub"></td>
                            </tr>
                            <tr>
                                <td>Discount: </td>
                                <td class="text-right">
                                    <span id="discount">
                                        {{ Auth::user()->discount }}
                                    </span>%
                                </td>
                            </tr>
                            <tr>
                                <td>Discount Amount: </td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td>Total {{ Auth::user()->currency }}: </td>
                                <td class="text-right">
                                    <input type="text"
                                        class="total input-small"
                                        id="tot"
                                        name="invoice_total_balance"
                                        data-clear-button="false"
                                        data-role="input">
                                    <small class="invalid_feedback">
                                        Input correct phone number
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer: </td>
                                <td class="text-right">
                                    <select name="customer input-small" data-role="select">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option>
                                                {{$customer->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="border drop-shadow bg-white text-center">
            <img src="{{ asset('images/download-image.png') }}" width="360" /><br/>
            <div  class="mt-10 mb-10 p-5">
                <p>Invoice and Receipt made easy with {{ config('app.name') }}</p>
                <small>Create a new invoice/receipt by clicking the button below.</small><br/><br/>
                <a class="button text-center primary" href="{{ url("invoices/create") }}" role="button">
                    Invoice
                </a>

                <a class="button text-center primary outline" href="{{ url("receipts/create") }}" role="button">
                    Receipt
                </a>
            </div>

        </div>
    @endif


    <div class="form-group">
        <textarea id="js-invoice-collector" name="invoice_content"></textarea>
    </div>



    <div class="row">
        <div class="cell-md-7">
            <div class="form-group">
                <label>Select your customer</label>
                <select name="customer" data-role="select" onchange="$('#js-customer').html(this.value)">
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option>
                            {{$customer->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="cell-md-5">
            <div class="form-group">
                <label>Create new</label>
                <a href="{{ url(strtolower( $page_title ?? '' )."/create") }}"
                    role="button" class="button primary">
                    Create Customer
                </a>
            </div>
        </div>
    </div><br/>

    <button class="button primary place-right" id="invoice-btn-clone">Save</button>
</form><br/>
@else
    <div class="border drop-shadow bg-white text-center">
        <img src="{{ asset('images/download-image.png') }}" width="360" /><br/>
        <div  class="mt-10 mb-10 p-5">
            <p>Invoice and Receipt made easy with {{ config('app.name') }}</p>
            <small>Create a new invoice/receipt by clicking the button below.</small><br/><br/>
            <a class="button text-center primary" href="{{ url("invoices/create") }}" role="button">
                Invoice
            </a>

            <a class="button text-center primary outline" href="{{ url("receipts/create") }}" role="button">
                Receipt
            </a>
        </div>

    </div>
@endif
