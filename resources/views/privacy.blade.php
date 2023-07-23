@extends('layouts.pmi2.apps', ['page' => 'privasi'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('templatePMI/images/banner/suk-mbna.jpg') }});" >
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Dasar Keselamatan & Privasi</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                        <li>Dasar Keselamatan & Privasi</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Privacy Policy -->
        <div class="section-full content-inner inner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="title">DASAR PRIVASI.</h4>
                        <p class="font-18"> Halaman ini menerangkan dasar privasi yang merangkumi penggunaan dan perlindungan maklumat yang dikemukakan oleh pengunjung. Sekiranya anda ingin mendaftar dan membuat transaksi atau menghantar e-mel yang mengandungi maklumat peribadi, maklumat ini mungkin akan dikongsi bersama dengan agensi awam lain untuk membantu penyediaan perkhidmatan yang lebih berkesan dan efektif. Contohnya seperti di dalam menyelesaikan aduan yang memerlukan maklum balas dari agensi-agensi lain.</p>
                        <h6 class="titel">Apa Yang Akan Berlaku Jika Saya Membuat Pautan Kepada Laman Web Yang Lain?</h6>
                        <p class="font-18">
                            Laman web ini mempunyai pautan ke laman web lain. Dasar privasi ini hanya terpakai untuk laman web ini sahaja. Perlu diingatkan bahawa laman web yang terdapat dalam pautan mungkin mempunyai dasar privasi yang berbeza dan pengunjung dinasihatkan supaya meneliti dan memahami dasar privasi bagi setiap laman web yang dilayari.
                        </p>
        
                        <h6 class="titel">Pindaan Dasar</h6>
                        <p class="font-18">
                            Sekiranya dasar privasi ini dipinda, pindaan akan dikemas kini di halaman ini. Dengan sering melayari halaman ini, anda akan dikemas kini dengan maklumat yang dikumpul, cara ia digunakan dan dalam keadaan tertentu, bagaimana maklumat dikongsi bersama pihak yang lain.
                        </p>
                        <div class="dlab-divider bg-gray-dark"></div>
                        <h4 class="title">DASAR KESELAMATAN</h4>
                        <h6 class="titel">Perlindungan Data</h6>
                        <p class="font-18">Teknologi terkini termasuk penyulitan data adalah digunakan untuk melindungi data yang dikemukakan dan pematuhan kepada standard keselamatan yang ketat adalah terpakai untuk menghalang capaian yang tidak dibenarkan.                        </p>
                        <h6 class="titel">Keselamatan Storan</h6>
                        <p class="font-18">
                          Semua storan elektronik dan penghantaran data peribadi akan dilindungi dan disimpan dengan menggunakan teknologi keselamatan yang sesuai.
                        </p>
                        <h6 class="titel">Maklumbalas dan Aduan</h6>
                        <p class="font-18">Pentadbiran Kerajaan Negeri Kelantan amat mengalu-alukan maklumbalas/pertanyaan anda. Sekiranya maklumat yang terperinci diperlukan tidak terdapat di dalam Portal ini, keperluan anda akan dimajukan kepada agensi yang berkaitan.</p>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Privacy Policy END -->
    </div>
</div>
@endsection