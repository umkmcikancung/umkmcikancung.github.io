<?php include '../header.php'; ?>

<style>
    .sosmed-box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: 0.3s;
    }

    .sosmed-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .sosmed-icon {
        font-size: 32px;
        color: white;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px auto;
    }


    .wa {
        background: #25D366;
    }

    .ig {
        background: #E4405F;
    }

    .fb {
        background: #1877F2;
    }

    .yt {
        background: #FF0000;
    }
</style>

<div class="container mt-5 mb-5">
    <h1 class="mb-4 text-center text-dark fw-bold">Hubungi Kami</h1>
    <p class="text-center mb-5">Kami siap terhubung melalui media sosial berikut:</p>

    <div class="row justify-content-center g-4">
        <div class="col-md-3 col-sm-6">
            <a href="https://wa.me/6281234567890" target="_blank" class="text-decoration-none">
                <div class="sosmed-box">
                    <div class="sosmed-icon wa">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h5 class="mt-2">WhatsApp</h5>
                    <p class="text-muted">Klik untuk chat langsung</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="https://instagram.com/akun_ig_anda" target="_blank" class="text-decoration-none">
                <div class="sosmed-box">
                    <div class="sosmed-icon ig">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <h5 class="mt-2">Instagram</h5>
                    <p class="text-muted">@akun_ig_anda</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="https://facebook.com/akun_fb_anda" target="_blank" class="text-decoration-none">
                <div class="sosmed-box">
                    <div class="sosmed-icon fb">
                        <i class="bi bi-facebook"></i>
                    </div>
                    <h5 class="mt-2">Facebook</h5>
                    <p class="text-muted">facebook.com/akun_fb_anda</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="https://youtube.com/@akun_youtube" target="_blank" class="text-decoration-none">
                <div class="sosmed-box">
                    <div class="sosmed-icon yt">
                        <i class="bi bi-youtube"></i>
                    </div>
                    <h5 class="mt-2">YouTube</h5>
                    <p class="text-muted">Channel Kami</p>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>