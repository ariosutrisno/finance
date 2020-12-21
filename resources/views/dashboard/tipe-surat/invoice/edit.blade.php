@extends('layouts.homepage.app')
@section('title', 'Edit Invoice')
@section('container')
@include('layouts.homepage.css&js.cssdashboard')
@include('layouts.homepage.css&js.css')
@include('layouts.homepage.css&js.jsSelect')
@include('layouts.homepage.css&js.cssSelect')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    @include('dashboard.sidebardashboard')
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-1 mt-1">
                                        <img src="{{ asset('img/bill.png') }}" alt="Hutang">
                                    </div>
                                    <div class="col-sm-10 ml-3">
                                        <span class="h1 text-cyan"><strong> Invoice </strong></span>
                                        <br><span>buat invoice dan berikan kepada orang lain</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('invoice-update', $invoice->idx_invoice) }}" method="POST">
                            @csrf
                            @include('dashboard.tipe-surat.invoice.formedit')
                            <div class="float-right">
                                <a href="{{route('quotation')}}" class="btn  tombol btn-danger  ml-5">Cancel</a>
                                <button type="submit" class="btn tombol bg-purple  btn-primary ">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Script JS -->

<script>
    $('#POITable').on('change', 'input[name="cp[]"]', function() {
    var total = 0;
    var ppn = 0.1;
    var wajibpajak =0;
    var seluruh =0;
    $('table').find('tr').each(function() {
        var $this = $(this);
        var gg =(parseFloat($this.find('input[name="cp[]"]').val(), 10) || 0);
        total += gg;
        wajibpajak = parseFloat(total) * parseFloat(ppn);
        seluruh = parseInt(total)+parseInt(wajibpajak);
        console.log('keseluruhan:',seluruh)
        console.log('pajak:',wajibpajak);
        console.log('subtotal:',total);
    })
    $('#subtotal').val(total)
    $('#total').val(seluruh)
})

    $('select').on('change', function(){
    var terpilih =  this.value;
    console.log(terpilih);
    if(terpilih =='excelent'){
        console.log('ini excelent pembayaran excelent'); 
        $('.coba').remove();
        $('.dab').remove();

    }else if(terpilih == 'high'){
        dp=0.6;
        term=0.4
        totalp = $('#total').val();
        $('#dptext').text("DP");
        dpwajib= parseInt(totalp) * dp;
    
        terminpt= parseInt(totalp) * term;
        // Remove Termin
        $('.dab').remove();
        $('.coba').remove();
        p = $('.tambah').append('<div class="coba"> <div class="form-group row"><label for="Term" class="col-sm-4   col-form-label">Term I <span id="termin"></span></label> <div class="col-sm-8"><input type="text" readonly class="form-control" id="inputterminhight" name="terminhigh[]" value=""> </div>     </div>');
        $('.hiddengg').append('<div class="coba"> <div class="form-group row dd"> <label for="dp" id="dptext" class="col-sm-4 col-form-label">DP</label>       <div class="col-sm-8    ">  <input type="text" class="form-control" id="dp" name="dphigh" readonly>   </div></div>  </div>');
        fromdp = $('#dp').val(dpwajib);
        $('#inputterminhight').val(terminpt)
        console.log('ini high pembayaran, Dp Wajib =', dpwajib);
    }else if(terpilih =='medium'){
        dp=0.55;
        term1= 0.30;
        term2=0.15;
        totalp = $('#total').val();
        term1jml = parseInt(totalp) * term1;
        term1jm2 = parseInt(totalp) * term2;
        dpwajib= parseInt(totalp) * dp;
        // Remove Termin 
        $('.coba').remove();
        $('.dab').remove();
        // Add new Termin
        p = $('.tambah').append('<div class="coba"> <div class="form-group row"><label for="Term" class="col-sm-4   col-form-label">Term I <span id="termin"></span></label> <div class="col-sm-8"><input type="text" readonly class="form-control" id="inputtermin1" name="terminmedium[]" value=""><br>  </div><label for="Term" class="col-sm-4   col-form-label">Term II<span id="termin"></span></label> <div class="col-sm-8"> <input type="text" readonly class="form-control" id="inputtermin2" name="terminmedium[]" value="">   </div>   </div>  </div>');
        $('.hiddengg').append('<div class="coba"> <div class="form-group row dd"> <label for="dp" id="dptext" class="col-sm-4 col-form-label">DP</label>       <div class="col-sm-8 ">  <input type="text" class="form-control" id="dp" name="dpmedium" readonly>   </div></div>  </div>');
        $('#inputtermin1').val(term1jml);
        $('#inputtermin2').val(term1jm2);
        $('#dptext').text("DP");

        fromdp = $('#dp').val(Math.round(dpwajib));
        console.log('ini pembayaran medium, Dp Wajib =', dpwajib);
    } else if(terpilih == 'standar'){
        dp=0.5;
        totalp = $('#total').val();
        // jmltermin = $('#Jt').val();
        dpwajib= parseInt(totalp) * dp;
        // hasiltermin= parseInt(dpwajib)/parseInt(jmltermin);
        // console.log(jmltermin);
        fromdp = $('#dp').val(dpwajib);
        $('.dab').remove();
        $('.coba').remove();
        $('.standar').append('  <div class="coba"><label for="Jt">Jumlah Termin</label>   <input type="number" min="0" class="form-control" onchange="coba()" id="Jt" name="jt[]"></input>  </div>');
        $('.hiddengg').append('<div class="coba"> <div class="form-group row dd"> <label for="dp" id="dptext" class="col-sm-4 col-form-label">DP</label>    <div class="col-sm-8    ">  <input type="text" class="form-control" id="dp" name="dpstandar" readonly>   </div></div>  </div>');
        $('#dptext').text("DP");
        // $('#inputtermin').val(hasiltermin);
        console.log('ini pembayaran standar, Dp Wajib =', dpwajib)
    } else{
        console.log('pilih');
        $('.coba').remove();
    }
})
function coba(){
        $('.dab').remove();
    var st=0.5;
    var term = $('#Jt').val();
    var jml =  $('#total').val();
    var dp=parseInt(jml)*st;
    var total=parseInt(dp)/parseInt(term);
    for(var x=1; x<=parseInt(term);x++)
    {
        $('.tambah').append(` <div class="form-group row dab"><label for="Term" class="col-sm-3   col-form-label">Term ke-`+x+`<span id="termin"></span></label><div class="col-sm-9"> <input type="text" readonly class="form-control" id="inputtermin" name="terminstandar[]" value="`+total+`"></div></div>`);
    }
    
    $('#dp').val(dp)
    
}
// Termin Standar

// $('#Jt').on('change',function() { 
//     alert('coba satu');
//     var term = $(this).val();
//     var jml =  $('#total').val();
//     console.log(term);
//     for(var x=1; x<=parseInt(term);x++)
//     {
//         $('.tambah').append('<label for="Term" class="col-sm-3   col-form-label">Term <span id="termin"></span></label><div class="col-sm-9"> <input type="text" readonly class="form-control" id="inputtermin" value=""></div>');
//     }
//     console.log(x);
// });


$(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
    var dd =  $('#POITable tbody tr').length;
    // console.log(dd);
    var min_fields=1;
    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append(`<tr class="table-white "><td class="text-right"> <input type="text" class="form-control" id="np" placeholder="Nama Proyek" name="np[]"></input></td><td class="text-right gini"><input type="text" class="form-control cp" id="cp"     placeholder="Biaya Proyek" name="cp[]"    ></input></td><td class="text-center"><a href="#"  id="delete"class="delete btn btn-danger tombol">Delete</a></td></tr>`);
             //add input box
            document.getElementById("delete").setAttribute("style", "display: block;")
        } else {
            alert('You Reached the limits')
        }
        console.log('total Field',x);
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
       
        $(this).parent().parent().remove();
    
        x--;
     
        console.log('sisa field',x);
        if(x <= min_fields){
            document.getElementById("delete").setAttribute("style", "display: none;");
        }

        var total = 0;
        var ppn = 0.1;
        var wajibpajak =0;
        var seluruh =0;
        $('table').find('tr').each(function() {
            var $this = $(this);
            var gg =(parseFloat($this.find('input[name="cp[]"]').val(), 10) || 0);
            total += gg;
            wajibpajak = parseFloat(total) * parseFloat(ppn);
            seluruh = parseInt(total)+parseInt(wajibpajak);
            console.log('keseluruhan:',seluruh)
            console.log('pajak:',wajibpajak);
            console.log('subtotal:',total);
        })
        $('#subtotal').val(total)
        $('#total').val(seluruh)
            console.log(x);
        
        })
});

</script>
<script>
    // FORM QUOTATION 
    function fetch_customer_data(query = '') {
            $.ajax({
                url: `/create-invoice/${query}`,
                method:'GET',
                data: {
                    query:query,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data)
                    var email = $("#email").val(data.pelanggan_email)
                    var perusahaan = $("#perusahaan").val(data.perusahaan)
                    var telepon = $("#telepon").val(data.pelanggan_telepon)

                }
            });
        }
        function onSelect() {
            var query = document.getElementById("nama").value;
            console.log(query)
            setInterval(fetch_customer_data(query),5000);
        }
</script>
<script>
    // FORM QUOTATION 
   
    function fetch_customer_data(query = '') {
            $.ajax({
                url: `/create-invoice/${query}`,
                method:'GET',
                data: {
                    query:query,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data)
                    var email = $("#email").val(data.pelanggan_email)
                    var perusahaan = $("#perusahaan").val(data.perusahaan)
                    var telepon = $("#telepon").val(data.pelanggan_telepon)

                }
            });
        }
        function onSelect() {
            var query = document.getElementById("nama").value;
            console.log(query)
            setInterval(fetch_customer_data(query),5000);
        }
</script>
@endsection