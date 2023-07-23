<!DOCTYPE html>
<html>
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
    <!-- Document Title -->
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>

    <style>
        .hero .logos{
            background-image: url('{{ asset('images/suk.png') }}');
            background-repeat: no-repeat;
            background-position: left top;
        }

        .pulse-danger {
            color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
            animation: pulse-danger 1s infinite;
        }
        .pulse-danger:hover {
            color: rgba(255, 255, 255, 1) !important;
        }

        @@-webkit-keyframes pulse-danger {
            0% {
                -webkit-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                color: rgba(255, 255, 255, 1);
            }
            70% {
                -webkit-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, 0);
            }
            100% {
                -webkit-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                color: rgba(255, 255, 255, 1);
            }
        }
        @@keyframes pulse-danger {
            0% {
                -moz-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                color: rgba(255, 255, 255, 1);
            }
            70% {
                -moz-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, 0);
                box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, 0);
            }
            100% {
                -moz-box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                box-shadow: 0px 0px 20px 5px rgba(255, 63, 58, .8);
                color: rgba(255, 255, 255, 1);
            }
        }
    </style>
	<!-- Matomo -->
	<script type="text/javascript">
		var _paq = window._paq = window._paq || [];
		/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		_paq.push(['trackPageView']);
		_paq.push(['enableLinkTracking']);
		(function() {
		var u="https://aplikasi1.kelantan.gov.my/analytic/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', 'rko5qxzgdyevbg2nbmjawp341']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
		})();
	</script>
	<noscript><p><img src="https://aplikasi1.kelantan.gov.my/analytic/matomo.php?idsite=rko5qxzgdyevbg2nbmjawp341&amp;rec=1" style="border:0;" alt="" /></p></noscript>
  <!-- End Matomo Code -->
</head>
<body>
  <!-- HEADER SECTION -->  
  <header id="home">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <!-- Change Logo Img Here -->
        <a class="navbar-brand" href="{{ route('welcome') }}">Sistem e-PMI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="interactive-menu-button">
            <a href="#">
              <span>Menu</span>
            </a>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <!-- Nav Link -->
              <a class="nav-link" data-scroll href="#makluman">Makluman</a>
            </li>
            <li class="nav-item">
              <!-- Nav Link -->
              <a class="nav-link" data-scroll href="#gambar">Gambar Program</a>
            </li>
            <li class="nav-item">
              <!-- Nav Link -->
              <a class="nav-link" data-scroll href="#urusetia">Urus Setia PPST</a>
            </li>
            
            <li class="nav-item active">
              <!-- Nav Link -->
              <a class="nav-link" href="{{ route('login') }}">Log Masuk</a>
            </li>
          </ul>
          
        </div>
      </nav>
    </div>
    <!-- HERO SECTION -->    
    <div class="container-fluid hero">
      <img class="logo" src="{{ asset('vendor/doob/images/hero.svg') }}" alt="" style="max-height: 90%">
      <div class="container px-3">
        <!-- Hero Title -->
        <img src="{{ asset('images/suk.png') }}" alt="" class="mt-5" style="max-height: 12rem; max-width: 12rem;">
        <h1 class="mt-2" style="font-size: 2.7rem;">
            Program Pembangunan <br> Sains &amp; Teknologi
        </h1>
        <!-- Hero Title Info -->
        <p>Pejabat Setiausaha Kerajaan Negeri Kelantan</p>
        <div class="hero-btns">
          <!-- Hero Btn First -->
          <a data-scroll href="#senarai-program">Lihat Program PPST</a>
          {{-- <!-- Hero Btn Second -->
          <a data-scroll href="#contact-us">Get in Touch.</a> --}}
        </div>
      </div>
    </div>
  </header>
    {{-- Makluman --}}
    <section id="makluman" class="blog">
      <div class="container-fluid">
        <div class="blog-aside">
          <img src="" alt="">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              {{-- <h5>BLOG STORIES</h5> --}}
              <h2>Makluman Dari Urus Setia PPST</h2>
            </div>
          </div>
          <div id="blog-drag" class="row blog-slider">
            @foreach ($senaraiMakluman as $makluman)
            <div class="col-12 col-lg-4 blog-box border border-grey">
              <!-- Blog Post Title -->
              <h6 style="font-size: 1.2rem;">{{ $makluman->tajuk }}</h6>
              <!-- Blog Post Date -->
              <p style="font-size: 0.8rem;">Tarikh Kemaskini : {{ \Carbon\Carbon::parse($makluman->updated_at)->format('d M Y') }}</p>
              <!-- Blog Post -->
              <p style="font-size: 1rem;">{!! nl2br($makluman->keterangan) !!}</p>
            </div>    
            @endforeach

            @if ($senaraiMakluman->count() == 0)
            <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6>Tiada Makluman Semasa</h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>
            {{-- <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6></h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>    
            <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6></h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>    --}}
            @endif

            {{-- @if ($senaraiMakluman->count() == 1)
            <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6></h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>    
            <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6></h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>    
            @endif --}}

            @if ($senaraiMakluman->count() == 2)
            <div class="col-12 col-lg-4 blog-box">
              <!-- Blog Post Title -->
              <h6></h6>
              <!-- Blog Post Date -->
              <p></p>
              <!-- Blog Post -->
              <p></p>
            </div>    
            @endif
            
            
          </div>
          <!-- Blog Button to Show More or Less on Mobile&Tablet View  -->
          <button class="hide-me" id="blog-btn">Lihat lagi</button>
        </div>
      </div>
    </section>  
    
  <!-- SERVICES SECTION -->  
  <section id="senarai-program" class="services">
    <div class="container-fluid">
      <div class="side-img"> 
        <img src="{{ asset('vendor/doob/images/aside.svg') }}" alt="">
      </div>
      <div class="side2-img"> 
        <img src="" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-6 service-txt">
            <h2>Program PPST Terkini</h2>
            {{-- <div class="hero-btns service-btn">
              <a data-scroll href="{{ route('login') }}" class="btn btn-danger pulse-danger">DAFTAR SEKARANG</a>
            </div> --}}
          </div>
          @forelse ($senaraiProgram as $program)
          <div class="col-12 col-sm-6 col-lg-12">
            <div class="service-box">
              <img src="{{ asset('storage/lampiran/'.$program->poster_program) }}" alt="" class="img-fluid img-thumbnail">
              <!-- Service Title -->
              <h3 style="font-size: 1.5rem">{{ $program->nama_program }}</h3>
              <!-- Replace Patch to Image Under -->
              <p>
                  <ul>
                      <li>Tarikh : {{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y') }}</li>
                      <li>Tempat : {{ $program->tempatProgram->nama_tempat }}</li>
                  </ul>
              </p>
              <a data-scroll href="{{ route('login') }}" class="btn btn-danger pulse-danger">DAFTAR SEKARANG</a>
            </div>
          </div>
          @empty
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="service-box">
              
              <!-- Service Title -->
              <h3 style="font-size: 1.5rem">Tiada Program Dibuka</h3>
              
            </div>
          </div>
          @endforelse
          
          
        </div>
      </div>
    </div>
  </section>
  
  <!-- PORTFOLIO SECTION -->
  <section id="gambar" class="portfolio mt-3 pt-3">
    <div class="container-fluid">
      <div class="portfolio-aside">
        <img src="" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Gambar Program Telah Dianjurkan</h2>
          </div>
        </div>
        <div class="row">
          @forelse ($senaraiGambar as $gambar)
          <div class="col-12 col-lg-4 work-box">
            <div class="photobox photobox_type10">
                <div class="photobox__previewbox">
                  <!-- Replace Patch to Image Under -->
                  <img src="{{ asset('storage/lampiran/'.$gambar->lokasi) }}" class="photobox__preview img-fluid" alt="Preview" style="max-height: 280px">
                  <!-- Replace Image Title Under -->
                  <span class="photobox__label">{{ $gambar->program->nama_program }}</span>
                </div>
              </div>
          </div>  
          @empty
          <div class="col-12 col-lg-4 work-box">
            <div class="photobox photobox_type10">
                <div class="photobox__previewbox">
                  Tiada Gambar
                  
                  
                </div>
              </div>
          </div> 
          @endforelse
          
          
        {{-- <!-- Hidden Images From Portfolio -->
        <div id="hiden-gallery" class="hide">
          <div class="row">
            <div class="col-12 col-lg-4 work-box">
              <div class="photobox photobox_type10">
                  <div class="photobox__previewbox">
                    <!-- Replace Patch to Image Under -->
                    <img src="{{ asset('vendor/doob/images/1.png') }}" class="photobox__preview" alt="Preview">
                    <!-- Replace Image Title Under -->
                    <span class="photobox__label">Awesome Work</span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 work-box">
              <div class="photobox photobox_type10">
                  <div class="photobox__previewbox">
                    <!-- Replace Patch to Image Under -->
                    <img src="{{ asset('vendor/doob/images/1.png') }}" class="photobox__preview" alt="Preview">
                    <!-- Replace Image Title Under -->
                    <span class="photobox__label">Awesome Work</span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 work-box">
              <div class="photobox photobox_type10">
                  <div class="photobox__previewbox">
                    <!-- Replace Patch to Image Under -->
                    <img src="{{ asset('vendor/doob/images/1.png') }}" class="photobox__preview" alt="Preview">
                    <!-- Replace Image Title Under -->
                    <span class="photobox__label">Awesome Work</span>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 more-btn">
            <!-- Show Me More/Less Button -->
            <a class="more-btn-inside">Papar Lebih...</a>
          </div>
        </div> --}}

      </div>
    </div>
  </section>
  <!-- ABOUT SECTION -->
  <section class="about pt-5" id="urusetia">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-6">
          <img src="{{ asset('vendor/doob/images/aboutimg.svg') }}" alt="">
        </div>
        <div class="col-12 col-sm-12 col-lg-6">
          <h5>Urus Setia PPST</h5>
          <h2>Bahagian Pengurusan Teknologi Maklumat</h2>
          <!-- Replace About Us Text Under -->
          <p>
              <ul>
                  <li>No Telefon : 	09-7481957</li>
                  <li>No Fax : 	09-7430504</li>
                  <li>	Bahagian Pengurusan Teknologi Maklumat, <br>
                      Pejabat Setiausaha Kerajaan Negeri Kelantan, <br> Aras 1, Blok 6, Kompleks Kota Darulnaim, <br>
                    15503 KOTA BHARU, KELANTAN   </li>
              </ul>
          </p>
        </div>
      </div>
    </div>
  </section>



  {{-- <!-- CONTACT SECTION -->
  <section id="contact-us" class="contact">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5>CONTACT US</h5>
          <h2>Get in Touch</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 email">
          <input placeholder="Your email" type="email" id="email" pattern=".+@globex.com" size="30" required>
        </div>
        <div class="col-12 col-lg-6 email">
          <input placeholder="Subject" type="subject" id="subject" size="30" required>
        </div>
      </div>
      <div class="row">
        <div class="col-12 message">
          <textarea id="message" name="message" rows="5" cols="1">Message here...</textarea>
        </div>
        <div class="col-12">
          <div class="hero-btns contact-btn">
            <!-- Send Message Btn -->
            <a href="#">Send Message</a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

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
          <ul class="social mt-1">
            <li><a href="{{ route('privasi') }}" style="font-size: 11px">Dasar Keselamatan dan Privasi</a></li>
          </ul>
          {{-- <ul class="social">
            <li><a href="#"><i class="icofont-facebook"></i></a></li>
            <li><a href="#"><i class="icofont-twitter"></i></a></li>
            <li><a href="#"><i class="icofont-dribbble"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="{{ asset('vendor/doob/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/doob/js/slick.min.js') }}"></script>
  <script src="{{ asset('vendor/doob/js/smooth-scroll.min.js') }}"></script>
  <script src="{{ asset('vendor/doob/js/main.js') }}"></script>
  <!-- Scripts Ends -->
</body>
</html>