<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<style>
    /* Styling khusus kartu login */
    .login-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    .login-header {
        background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
        color: #ffffff;
        padding: 30px 20px;
        text-align: center;
    }
    .login-icon-box {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }
    .form-control-custom {
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        font-size: 0.95rem;
    }
    .form-control-custom:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    .input-group-text-custom {
        border-radius: 10px 0 0 10px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-right: none;
        color: #64748b;
    }
    .btn-toggle-password {
        border-radius: 0 10px 10px 0;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: none;
        color: #64748b;
        cursor: pointer;
    }
    .btn-toggle-password:hover {
        color: #4f46e5;
    }
    .btn-login {
        background-color: #4f46e5;
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
</style>

<div class="row justify-content-center align-items-center min-vh-100 my-4">
    <div class="col-md-5 col-lg-4">

        <div class="card login-card">
            
            <!-- Header Kartu -->
            <div class="login-header">
                <div class="login-icon-box">
                    <i class="bi bi-shield-lock-fill fs-2"></i>
                </div>
                <h4 class="fw-bold mb-1">Login Admin</h4>
                <p class="text-white-50 mb-0 fs-7">Masukkan akun Anda untuk melanjutkan</p>
            </div>

            <!-- Body Kartu -->
            <div class="card-body p-4">

                <!-- Alert Pesan Error -->
                <?php if(session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post">
                    
                    <!-- Fitur Keamanan CSRF CodeIgniter 4 -->
                    <?= csrf_field() ?>

                    <!-- Input Username -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Username</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">
                                <i class="bi bi-person"></i>
                            </span>
                            <input 
                                type="text" 
                                name="username" 
                                class="form-control form-control-custom" 
                                placeholder="Masukkan username"
                                value="<?= old('username') ?>"
                                required 
                                autofocus>
                        </div>
                    </div>

                    <!-- Input Password dengan Toggle Mata -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                id="passwordInput" 
                                name="password" 
                                class="form-control form-control-custom border-end-0" 
                                placeholder="Masukkan password"
                                required>
                            <button 
                                class="btn btn-toggle-password px-3" 
                                type="button" 
                                id="togglePassword"
                                title="Lihat Password">
                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn btn-primary btn-login w-100 mb-2">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk Sekarang
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<!-- Script JavaScript untuk Toggle Mata Password -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');
        const toggleIcon = document.querySelector('#toggleIcon');

        if (togglePassword && passwordInput && toggleIcon) {
            togglePassword.addEventListener('click', function () {
                // Switch tipe input antara 'password' dan 'text'
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Ganti ikon mata
                if (type === 'text') {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                } else {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>