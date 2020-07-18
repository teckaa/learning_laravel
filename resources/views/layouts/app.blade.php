@include('includes.header')

<body>
@include('includes.sidebar')

<div class="shifted-content-2 p-ab bg-light" style="height: 100vh;">
    <div class="row">
        <div class="stub bg-white drop-shadow" style="width: 400px; height: 95vh;">

        @if(Request::is('home') ||
            Request::is('invoices') ||
            Request::is('receipts') ||
            Request::is('customers') ||
            Request::is('customers/bin') ||
            Request::is('invoices/bin') ||
            Request::is('receipts/bin'))

                @include('includes.search-item')
        @else
            <h6 class="m-3">{{ $page_title ?? '' }}</h6>

        @endif

        @if(Request::is('home') ||
            Request::is('invoices') ||
            Request::is('receipts') ||
            Request::is('customers') ||
            Request::is('customers/bin') ||
            Request::is('invoices/bin') ||
            Request::is('receipts/bin'))

            <main style="height: 63vh; overflow: auto;">

        @else
            <main style="height: 70vh; overflow: auto;">

        @endif
            <x-alert />
            @yield('content')

            </main>

        @if(Request::is('home') ||
            Request::is('invoices') ||
            Request::is('receipts') ||
            Request::is('customers') ||
            Request::is('customers/bin') ||
            Request::is('invoices/bin') ||
            Request::is('receipts/bin'))

            @include('includes.paginate-item')
        @endif
        </div>

        <div class="cell d-flex flex-justify-center" style="height: 92vh; overflow: auto;">
            @include('includes.invoicesandreceipts')
        </div>

    </div>
</div>

    <!-- info-box -->
    <div class="info-box" data-role="infobox" id='info-box-1'>
        <span class="button border-radius-half closer"></span>
        <div class="info-box-content text-center" style="padding: 0px;">
            <div class="img-container bg-cobalt">
                <img src="{{ asset('images/download-image-2.png') }}">
            </div>
            <div class="p-10">
            <h5>Thanks for using {{ config('app.name') }}.</h5>
            <p>Your {{ $page_title ?? '' }} have been created.</p>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('metro-ui/build/js/metro.min.js') }}" defer></script>
    <script>
        $(function() {
          $("#btn-to-save-png").click(function() {
            html2canvas($("#export-receipt"), {
                onrendered: function(canvas) {
                    // Convert and download as image
                    Canvas2Image.saveAsPNG(canvas);

                    // Clean up
                    document.body.removeChild(canvas);
                    alert();
                }
            });
        });
        })

    </script>
    <script>
//pdf 다운로드
$("#btn-to-save-pdf").click(function(){

    html2canvas(document.getElementById("export-receipt"), {
        onrendered: function(canvas) {

            var imgData = canvas.toDataURL('image/png');
            console.log('Report Image URL: '+imgData);
            var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high

            doc.addImage(imgData, 'PNG', 10, 10);
            doc.save('sample.pdf');
        }
    });

});
    </script>

<script>
$("#insert-table").click(function(){
    $("#tbody").append($("#tdata:first").clone(true));
});

$(document).ready(function(){
    update_amounts();
        $('.quantity').keyup(function() {
            update_amounts();
        });
        $('.price').keyup(function() {
            update_amounts();
        });
});

function update_amounts(){
    var sum = 0.0;
    $('table > #tbody  > tr').each(function() {
        var quantity = $(this).find('.quantity').val();
        var price = $(this).find('.price').val();
        var amount = (quantity*price)
        sum += amount;
        $(this).find('.amount').text(''+amount);
    });
    //just update the total to sum
    $('.subtotal').text(sum);
    var discount = document.getElementById('discount').innerHTML;
    var sub = document.getElementById('sub').innerHTML;
    document.getElementById('tot').value = discount;

}

$("#remove-table").on("click", function () {
    $("#tdata:last").remove();
    ///event.preventDefault();
});
</script>

</body>
</html>
