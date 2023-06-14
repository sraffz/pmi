<!DOCTYPE html>
<html lang="ms">
<head>
    <!-- Metas -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Links -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/doob/icofont.min.css') }}">
    <link href="{{ asset('vendor/doob/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/doob/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/doob/css/main.css') }}" rel="stylesheet" />
</head>
<body>
    <header id="home">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light ">
            <!-- Change Logo Img Here -->
            <a class="navbar-brand" href="{{ route('welcome') }}">Program Pembangunan Modal Insan (e-PMI)</a>
            
            
          </nav>
        </div>
       
      </header>

    <section class="about">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h4>Dasar Privasi & Keselamatan</h4>
                    <h5>DASAR PRIVASI</h5>
        
                        <p style="font-size: 14px">
                            Halaman ini menerangkan dasar privasi yang merangkumi penggunaan dan perlindungan maklumat yang dikemukakan oleh pengunjung.
                            Sekiranya anda ingin mendaftar dan membuat transaksi atau menghantar e-mel yang mengandungi maklumat peribadi, maklumat ini mungkin akan dikongsi bersama dengan agensi awam lain untuk membantu penyediaan perkhidmatan yang lebih berkesan dan efektif. Contohnya seperti di dalam menyelesaikan aduan yang memerlukan maklum balas dari agensi-agensi lain.
                        </p>
        
                        <p style="font-size: 14px">Tiada maklumat peribadi akan dikumpul semasa anda melayari laman web ini kecuali maklumat yang dikemukakan oleh anda melalui e-mel.</p>
        
                        <h6>Apa Yang Akan Berlaku Jika Saya Membuat Pautan Kepada Laman Web Yang Lain?</h6>
                        <p style="font-size: 14px">
                            Laman web ini mempunyai pautan ke laman web lain. Dasar privasi ini hanya terpakai untuk laman web ini sahaja. Perlu diingatkan bahawa laman web yang terdapat dalam pautan mungkin mempunyai dasar privasi yang berbeza dan pengunjung dinasihatkan supaya meneliti dan memahami dasar privasi bagi setiap laman web yang dilayari.
                        </p>
        
                        <h6>Pindaan Dasar</h6>
                        <p style="font-size: 14px">
                            Sekiranya dasar privasi ini dipinda, pindaan akan dikemas kini di halaman ini. Dengan sering melayari halaman ini, anda akan dikemas kini dengan maklumat yang dikumpul, cara ia digunakan dan dalam keadaan tertentu, bagaimana maklumat dikongsi bersama pihak yang lain.
                        </p>
        
        
        
        
                        <h5>DASAR KESELAMATAN</h5>

                        <h6>Perlindungan Data</h6>
                        <p style="font-size: 14px">
                            Teknologi terkini termasuk penyulitan data adalah digunakan untuk melindungi data yang dikemukakan dan pematuhan kepada standard keselamatan yang ketat adalah terpakai untuk menghalang capaian yang tidak dibenarkan.
                        </p>

                        <h6>Keselamatan Storan</h6>
                        <p style="font-size: 14px">
                            Semua storan elektronik dan penghantaran data peribadi akan dilindungi dan disimpan dengan menggunakan teknologi keselamatan yang sesuai.
                        </p>

                        <h6>Maklumbalas dan Aduan</h6>
                        <p style="font-size: 14px">
                            Pentadbiran Kerajaan Negeri Kelantan amat mengalu-alukan maklumbalas/pertanyaan anda. Sekiranya maklumat yang terperinci diperlukan tidak terdapat di dalam Portal ini, keperluan anda akan dimajukan kepada agensi yang berkaitan.
                        </p>
        
                </div>
            </div>
        </div>
    </section>

      <!-- FOOTER SECTION -->
  <footer style="min-height: 100px; background-color: black" class="pt-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5 class="mb-1 pb-1">SISTEM PROGRAM PEMBANGUNAN SAINS TEKNOLOGI</h5>
          <h3 style="font-size: 0.8rem; color: white;" class="mb-1">DIBANGUNKAN OLEH BAHAGIAN PENGURUSAN TEKNOLOGI MAKLUMAT</h3>
          {{-- <ul class="contact-nav">
            <li><a data-scroll href="#home">Home.</a></li>
            <li><a data-scroll href="#about-us">About Us.</a></li>
            <li><a data-scroll href="#portfolio">Portfolio.</a></li>
            <li><a data-scroll href="#blog">Blog.</a></li>
            <li><a data-scroll href="#contact-us">Contact.</a></li>
          </ul> --}}
          <h6 class="mt-1">Hakcipta &copy; Terpelihara Pejabat Setiausaha Kerajaan Negeri Kelantan {{ Carbon\Carbon::now()->year }}</h6>
          {{-- <ul class="social">
            <li><a href="#"><i class="icofont-facebook"></i></a></li>
            <li><a href="#"><i class="icofont-twitter"></i></a></li>
            <li><a href="#"><i class="icofont-dribbble"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </div>
  </footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/doob/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/doob/js/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/doob/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('vendor/doob/js/main.js') }}"></script>
</body>
</html>