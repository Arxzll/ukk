
<head><link rel="stylesheet" href="css/index.css"></head>
@section('content')
    @if (session('success'))
        <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
        </script>
    @endif
    <!-- Header Page Start -->
    <header>
        <div class="container header__container">
            <div class="header__left">
                <h1>Selamat datang di E-Library</h1>
                <p>Selamat datang di E-Library kami, tempat di mana pintu pengetahuan selalu terbuka untuk Anda! Mari jelajahi koleksi kami yang kaya dan beragam, dari buku-buku terkini hingga klasik abadi. Temukan dunia literasi tanpa batas dan tingkatkan wawasan Anda di setiap halaman. Mulailah petualangan membaca Anda sekarang, dan mari bersama-sama mengeksplorasi keajaiban dunia tulisan!</p>
            </div>
            
            <div class="header__right">
                <div class="header__right-image">
                    <img src="img/logo.png" alt="logo">
                </div>
            </div>
        </div>
    </header>
    <!-- Header Page End -->

    <!-- categories start -->
    <section class="categories">
        <div class="container categories__container">
            <div class="categories__left">
                <h1>Buku Terbaru</h1>
                <p>Tak lupa, berikut adalah beberapa buku yang sangat populer di E-Library kita. Jangan sia-siakan kesempatan emas ini untuk menjelajahi setiap halaman yang memikat dan penuh inspirasi. Mulailah petualangan literasi Anda sekarang!</p>
                <a href="/book" class="btn">Lihat Buku</a>
            </div>

            <div class="categories__right">
                
                    <article class="category">
                        <img src="" alt="Buku">
                        <p class="title"></p>
                    </article>
               
            </div>
        </div>
    </section>
    <!-- categories end -->

    <section class="faqs" id="fq">
        <h2>Informasi seputar E-Library</h2>
        <div class="container faqs__container">
            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer">
                    <h4>Apa Itu E-Library</h4>
                    <p>E-Library, singkatan dari "Electronic Library" atau "Perpustakaan Elektronik", adalah sebuah platform atau sistem yang menyediakan akses digital ke berbagai koleksi buku, jurnal, artikel, dan materi bacaan lainnya. E-Library memungkinkan pengguna untuk mencari, mengakses, dan membaca materi-materi tersebut secara online melalui komputer, tablet, atau perangkat seluler lainnya.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer">
                    <h4>Fungsi perpustakaan</h4>
                    <p>1. Aksesibilitas: Memungkinkan akses mudah dan cepat terhadap berbagai materi bacaan secara online.
                       2. Pencarian dan Temuan Informasi: Memudahkan pengguna untuk mencari dan menemukan informasi yang relevan dengan kebutuhan mereka.
                       3. Koleksi yang Luas: Menyediakan akses ke beragam koleksi buku, jurnal, artikel, dan materi bacaan lainnya.
                       4. Kemudahan Berbagi dan Kolaborasi: Memfasilitasi berbagi materi bacaan dan kolaborasi antara pengguna.
                       5. Hemat Ruang dan Biaya: Mengurangi kebutuhan akan ruang fisik dan biaya pengadaan koleksi fisik.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer">
                    <h4>Manfaat membaca</h4>
                    <p>Peningkatan Pengetahuan, Peningkatan Keterampilan Berpikir, Peningkatan Kosa Kata dan Bahasa, Pengurangan Stres, Stimulasi Otak, Peningkatan Kreativitas, Hiburan dan Relaksasi</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer">
                    <h4>Tujuan E-Library</h4>
                    <p>Memungkinkan pengguna untuk menjelajahi berbagai topik dan subjek dari berbagai disiplin ilmu, serta mendapatkan wawasan yang lebih luas tentang dunia.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer">
                    <h4>Apa itu literasi</h4>
                    <p>Kegiatan literasi mencakup berbagai aktivitas yang bertujuan untuk meningkatkan kemampuan membaca, menulis, dan memahami informasi. Ini melibatkan pembacaan dan penulisan teks-teks yang beragam, pengembangan pemahaman yang mendalam terhadap informasi, serta penguasaan keterampilan digital. Selain itu, kegiatan literasi juga mencakup pengembangan keterampilan berpikir kritis, kreatif, dan reflektif, serta promosi kebiasaan membaca yang sehat dan teratur. Keseluruhan, kegiatan literasi tidak hanya memberdayakan individu untuk berpartisipasi secara aktif dalam kehidupan sosial dan ekonomi, tetapi juga memainkan peran penting dalam meningkatkan kualitas pendidikan dan membangun masyarakat yang berpengetahuan.</p>
                </div>
            </article>
        </div>
    </section>


    <footer>
        <div class="container footer__container">
            <div class="footer__1">
                <a href="index.html" class="footer__logo"><h4>E-Library</h4></a>
                <p>Website ini di sponsori oleh Lab StartupZal</p>
            </div>

            <div class="footer__2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="/">Home</a></li>
                    <li><a href="/book">Book</a></li>
                    <li><a href="/categories">Category</a></li>
                    {{-- <li><a href="contact.html">Contact</a></li> --}}
                </ul>
            </div>

            <div class="footer__3">
                <h4>Primacy</h4>
                <ul class="privacy">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms and condition</a></li>
                    <li><a href="#">Refund policy</a></li>
                </ul>
            </div>

            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>0123-1232-1233</p>
                    <p>Rizal@gmail.com</p>
                </div>
                <ul class="footer__socials">
                    <li>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; E-Library</small>
        </div>
    </footer>
