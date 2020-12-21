<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./././css/bootstrap-4.3.1-dist/css/bootstrap.min.css">

  <title>Surat Penerimaan</title>


</head>

<style>
  @page {
    size: a4 potrait;
    margin: 0;
    padding: 0;
    /* margin-top: 25px; */
    margin-bottom: 100px;
    /* // you can set margin and padding 0  */
  }
  @media print{
    h1{
      font-size: 12pt;
    }
  }
.mulai{
    float: left;
    width: 40%;
    padding: 0%;
}
  .columnlabel {
    float: left;
    width: 25%;
    padding: 0;
    
    /* height: 300px; */
    /* Should be removed. Only for demonstration */
  }

  .columnvalue {
    float: left;
    width: 100%;
    padding: 0;
    /* height: 300px; */
    /* Should be removed. Only for demonstration */
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  header {
    position: fixed;
    top: -60px;
    left: 0px;
    right: 0px;
    height: 50px;

    /** Extra personal styles **/
    /* background-color: #03a9f4; */
    /* color: white; */
    text-align: center;
    line-height: 35px;
  }

  footer {
    position: fixed;
    bottom: -60px;
    left: 0px;
    right: 0px;
    height: 50px;

    /** Extra personal styles **/
    /* background-color: #03a9f4; */
    /* color: white; */
    text-align: center;
    line-height: 35px;
  }

  html,
  body {
    height: 100%;
  }

  body {
    display: flex;
    flex-direction: column;
  }

  .content {
    flex: 1 0 auto;
  }

  .footer {
    flex-shrink: 0;
  }
</style>

<img src="./././img/Kop-Surat-Alan-2020.png" width="100%" />
<div class="content" style="padding-left:50px; padding-right:50px">
  <div class="container">
    @if ($data->letter_peruntukan == '1')
    Yth. Saudara <span class="font-weight-bold">{{$data->letter_nama}}</span>
    <br /> Di Tempat
    <div class="content-isi mt-3">
      <span class="font-weight-bold">Dengan Hormat,</span><br />
      <p class="text-justify">Sehubungan dengan surat lamaran kerja yang Anda kirimkan ke perusahaan kami beberapa waktu
        lalu dan telah melalui proses seleksi berupa wawancara dan tes psikologi, maka dengan ini kami
        memberitahukan bahwa Anda diterima bekerja di perusahaan kami. Mohon kehadirannya pada:</p>
    </div>
    <div class="container  format-keterangan ">
      <div class="ml-4 mt-1">
        <div class="row ">
          <div class="columnlabel">Hari dan Tanggal </div>

          <div class="columnvalue"> :
            {{ \Carbon\Carbon::parse($data->letter_tanggal_mulai)->locale('id')->isoFormat('dddd, D MMMM Y') }}</div>
        </div>
        <div class="row ">
          <div class="columnlabel">Tempat</div>
          <div class="columnvalue"> : PT Alan Mediatech Indonesia<br />
            Graha Mandiri, Blok B-5, Jl. Tugu Raya, Kelurahan Tugu, Cimanggis,<br />
            Depok, Jawa Barat</div>
        </div>
        <div class="row ">
          <div class="columnlabel">Waktu</div>
          <div class="columnvalue"> :
            {{ \Carbon\Carbon::parse($data->letter_jam_mulai)->locale('id')->format('H:i') }} -
            {{ \Carbon\Carbon::parse($data->letter_jam_selesai)->locale('id')->format('H:i') }}
            WIB</div>
        </div>
        <div class="row ">
          <div class="columnlabel">Narahubung</div>
          <div class="columnvalue">: {{$data->letter_telepon_pembimbing}} ( {{$data->letter_narahubung}} )
          </div>
        </div>
      </div>
      <div class="mt-3">
        <div class="row ">
          <p class="text-justify">Kami harapkan kedatangan saudari di tempat dan waktu yang telah ditetapkan
            tersebut. Apabila ada kendala perihal kehadiran, mohon dapat menginformasikan hal tersebut kepada
            kami.</p>
        </div>
        <div class="row " style="margin-top:-30px">
          <p class="text-justify"> Demikian yang dapat kami sampaikan. Atas perhatian dan kerjasamanya kami ucapkan
            terima
            kasih.</p>
        </div>
        <div class="row ">
          <p class="text-right mt-5"> Depok,
            {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoformat('DD MMMM Y') }}
          </p>
        </div>
        <div class="row ">
          <p class="text-right font-weight-bold">Chief Executive Officer</p>
        </div>
        <div class="row">
          <p class="text-right font-weight-bold  mt-5">Ahmad Alimuddin, S.Kom</p>
        </div>
      </div>
    </div>
  </div>
</div>
@else

<div class="container">
  <div class="row ">
    <div class="columnlabel">No Surat </div>

    <div class="columnvalue">: {{ $data->nomor_surat }}</div>
  </div>


  <div class="row ">
    <div class="columnlabel">Perihal </div>

    <div class="columnvalue">: Konfirmasi Internship</div>
  </div>

  <div class="row ">
    <div class="columnvalue mt-3">Hello <span class="font-weight-bold">{{$data->letter_nama}},</span></div>
  </div>


  <div class="content-isi ">
    <div class="row">
      <p class="text-justify">Berdasarkan lamaran internship anda pada tanggal
        {{ \Carbon\Carbon::parse($data->letter_tanggal_lamaran)->locale('id')->isoFormat(' D MMMM Y') }} melalui
        email <a href="mailto:someone@example.com">karir@alan.co.id</a>, hasil
        interview, dan hasil tugas yang diberikan, maka dengan ini kami ingin mengabarkan bahwa anda
        DITERIMA untuk melaksanakan INTERNSHIP di Alan Creative yang bernaung dibawah PT. Alan
        Mediatech Indonesia. <br>Adapun jadwal pelaksanaan internship di Alan Creative akan dilaksanakan dengan
        rincian
        sebagai
        berikut: </p>
    </div>
  </div>


  <div class="ml-4 mt-2">
    <div class="row ml-3">
      <div class="mulai">Hari dan Tanggal Mulai </div>

      <div class="columnvalue">:
        {{ \Carbon\Carbon::parse($data->letter_tanggal_mulai)->locale('id')->isoFormat('dddd, D MMMM Y') }}</div>
    </div>
    <div class="row ml-3">
      <div class="mulai">Hari dan Tanggal Selesai </div>

      <div class="columnvalue">:
        {{ \Carbon\Carbon::parse($data->letter_tanggal_selesai)->locale('id')->isoFormat('dddd, D MMMM Y') }}</div>
    </div>
    <div class="row ml-3">
      <div class="mulai">Jadwal-Masuk</div>

      <div class="columnvalue">:
        Senin - Jumat</div>
    </div>
    <div class="row ml-3">
      <div class="mulai ">Waktu</div>
      <div class="columnvalue">:
        {{ \Carbon\Carbon::parse($data->letter_jam_mulai)->locale('id')->format('H:i') }} -
        {{ \Carbon\Carbon::parse($data->letter_jam_selesai)->locale('id')->format('H:i') }}
        WIB</div>
    </div>
    <div class="row ml-3">
      <div class="mulai">Pembimbing</div>
      <div class="columnvalue">: {{$data->letter_narahubung}} ({{$data->letter_telepon_pembimbing}}3
      </div>
    </div>
  </div>


  <div class="mt-2">
    <div class="row ">
      <p class="text-justify mt-3">Demikian informasi penerimaan internship ini kami sampaikan, jika ada yang ingin
        ditanyakan dapat
        langsung menghubungi kami melalui email atau nomor yang tertera. Atas Perhatian dan kerjasamanya,
        kami ucapkan terima kasih.</p>
    </div>

    <div class="row ">
      <p class="text-right mt-5"> Depok,
        {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoformat('DD MMMM Y') }}
      </p>
    </div>
    <div class="row ">
      <p class="text-right font-weight-bold">Chief Executive Officer</p>
    </div>
    <div class="row">
      <p class="text-right font-weight-bold  mt-5">Ahmad Alimuddin, S.Kom</p>
    </div>
  </div>
</div>
</div>


@endif
</div>
</div>

<script src="./././css/src/assets/libs/popper/dist/umd/popper.min.js"></script>
<script src="./././css/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./././css/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>




<footer>
  <img src="./././img/Kopsurat_footer_2020.jpg" alt="" width='100%' style="bottom:0"></footer>