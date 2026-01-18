<template>
    <div class="login-wrapper">
        <!-- Animated Background Shapes -->
        <div class="background">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="login-container">
            <div class="glass-card">
                <div class="card-content">
                    <div class="header">
                        <div class="logo-box">
                            <img src="../../../assets/images/logoHospital.png" alt="Logo" class="logo-img">
                        </div>
                        <h1>Đăng Ký Tài Khoản</h1>
                        <p class="subtitle">Tham gia hệ thống quản lý TH Hospital</p>
                    </div>

                    <form @submit.prevent="handleRegister" class="login-form">
                        <div class="input-group">
                            <input type="text" v-model="name" placeholder=" " id="name" @input="errors.name = ''">
                            <label for="name">Họ và tên</label>
                            <span class="highlight"></span>
                            <span v-if="errors.name" class="error-message">{{ errors.name }}</span>
                        </div>

                        <div class="input-group">
                            <input type="email" v-model="email" placeholder=" " id="email" @input="errors.email = ''">
                            <label for="email">Email</label>
                            <span class="highlight"></span>
                            <span v-if="errors.email" class="error-message">{{ errors.email }}</span>
                        </div>

                        <div class="input-group">
                            <input :type="showPassword ? 'text' : 'password'" v-model="password" placeholder=" "
                                id="password" @input="errors.password = ''">
                            <label for="password">Mật khẩu</label>
                            <span class="eye-icon" @click="showPassword = !showPassword">
                                {{ showPassword ? 'Ẩn' : 'Hiện' }}
                            </span>
                            <span class="highlight"></span>
                            <span v-if="errors.password" class="error-message">{{ errors.password }}</span>
                        </div>

                        <div class="input-group">
                            <input :type="showConfirmPassword ? 'text' : 'password'" v-model="confirmPassword"
                                placeholder=" " id="confirmPassword" @input="errors.confirmPassword = ''">
                            <label for="confirmPassword">Nhập lại mật khẩu</label>
                            <span class="eye-icon" @click="showConfirmPassword = !showConfirmPassword">
                                {{ showConfirmPassword ? 'Ẩn' : 'Hiện' }}
                            </span>
                            <span class="highlight"></span>
                            <span v-if="errors.confirmPassword" class="error-message">{{ errors.confirmPassword
                            }}</span>
                        </div>

                        <div class="actions">
                            <router-link to="/" class="forgot-link"><span class="text-secondary">Đã có tài khoản?</span>
                                Đăng nhập
                                ngay</router-link>
                        </div>

                        <button type="submit" :class="{ 'loading': isLoading }" :disabled="isLoading">
                            <span class="btn-text">Đăng Ký</span>
                            <div class="loader"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const name = ref('');
const email = ref('');
const password = ref('');
const confirmPassword = ref('');
const showPassword = ref(false);
const showConfirmPassword = ref(false);
const isLoading = ref(false);
const errors = reactive({
    name: '',
    email: '',
    password: '',
    confirmPassword: ''
});

const handleRegister = async () => {
    // Reset errors
    Object.keys(errors).forEach(key => errors[key] = '');
    let hasError = false;

    if (!name.value) {
        errors.name = 'Vui lòng nhập họ và tên!';
        hasError = true;
    }

    if (!email.value) {
        errors.email = 'Vui lòng nhập email!';
        hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        errors.email = 'Vui lòng nhập đúng địa chỉ email!';
        hasError = true;
    }

    // Password validation logic
    if (!password.value) {
        errors.password = 'Vui lòng nhập mật khẩu!';
        hasError = true;
    } else {
        const passErrors = [];
        if (password.value.length < 8) {
            passErrors.push('Mật khẩu phải có ít nhất 8 ký tự!');
        }
        const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/;
        if (!passwordRegex.test(password.value)) {
            passErrors.push('Mật khẩu phải chứa ít nhất: 1 ký tự đặc biệt, 1 số, 1 chữ cái và 1 chữ viết hoa!');
        }

        if (passErrors.length > 0) {
            errors.password = passErrors.join('\n');
            hasError = true;
        }
    }

    if (!confirmPassword.value) {
        errors.confirmPassword = 'Vui lòng nhập lại mật khẩu!';
        hasError = true;
    } else if (password.value !== confirmPassword.value) {
        errors.confirmPassword = 'Mật khẩu nhập lại không khớp!';
        hasError = true;
    }

    if (hasError) return;

    isLoading.value = true;
    setTimeout(() => {
        isLoading.value = false;
        alert('Đăng ký thành công! Vui lòng đăng nhập.');
        router.push('/admin/login');
    }, 2000);
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    box-sizing: border-box;
}

.error-message {
    color: #ff3333;
    font-size: 12px;
    margin-top: 5px;
    display: block;
    text-align: left;
    white-space: pre-line;
}

.login-wrapper {
    /* ... rest of the styles ... */
    min-height: 100vh;
    width: 100%;
    position: relative;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    background-color: #f0f4f8;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Animated Dynamic Background */
.background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    overflow: hidden;
    background: #f0f2f5;
}

.shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.8;
    animation: float 10s infinite alternate;
}

.shape-1 {
    top: -10%;
    left: -10%;
    width: 600px;
    height: 600px;
    background: linear-gradient(to right, #4facfe, #00f2fe);
    animation-delay: 0s;
}

.shape-2 {
    bottom: -10%;
    right: -5%;
    width: 500px;
    height: 500px;
    background: linear-gradient(to right, #43e97b, #38f9d7);
    animation-delay: -2s;
}

.shape-3 {
    top: 40%;
    left: 40%;
    width: 300px;
    height: 300px;
    background: linear-gradient(to right, #a18cd1, #fbc2eb);
    mix-blend-mode: multiply;
    animation-delay: -4s;
}

@keyframes float {
    0% {
        transform: translate(0, 0) rotate(0deg);
    }

    100% {
        transform: translate(30px, 50px) rotate(10deg);
    }
}

.login-container {
    position: relative;
    z-index: 10;
    width: 100%;
    max-width: 460px;
}

/* Glassmorphism Card */
.glass-card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.2);
}

.card-content {
    padding: 40px;
}

.header {
    text-align: center;
    margin-bottom: 30px;
}

.logo-box {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.logo-img {
    width: 60px;
    height: 60px;
    object-fit: contain;
}

h1 {
    font-size: 26px;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
    letter-spacing: -0.5px;
}

.subtitle {
    color: #7f8c8d;
    font-size: 14px;
    margin-top: 5px;
}

/* Modern Input Fields */
.input-group {
    position: relative;
    margin-bottom: 24px;
}

.input-group input {
    width: 100%;
    padding: 12px 0;
    font-size: 16px;
    color: #333;
    border: none;
    border-bottom: 2px solid #ddd;
    outline: none;
    background: transparent;
    transition: all 0.3s ease;
}

.input-group label {
    position: absolute;
    top: 12px;
    left: 0;
    font-size: 16px;
    color: #999;
    pointer-events: none;
    transition: all 0.3s ease;
}

.input-group input:focus,
.input-group input:not(:placeholder-shown) {
    border-bottom-color: #0061ff;
    padding-bottom: 12px;
}

.input-group input:focus+label,
.input-group input:not(:placeholder-shown)+label {
    top: -12px;
    font-size: 12px;
    color: #0061ff;
    font-weight: 600;
}

.eye-icon {
    position: absolute;
    right: 0;
    top: 12px;
    font-size: 12px;
    font-weight: 600;
    color: #0061ff;
    cursor: pointer;
    text-transform: uppercase;
}

.actions {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.forgot-link {
    font-size: 14px;
    color: #0061ff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s;
}

.forgot-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

/* Button */
button {
    width: 100%;
    height: 52px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #0061ff 0%, #60efff 100%);
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 97, 255, 0.4);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 97, 255, 0.5);
}

button:active {
    transform: translateY(0);
}

button:disabled {
    background: #ccc;
    cursor: not-allowed;
    box-shadow: none;
}

button.loading .btn-text {
    visibility: hidden;
}

.loader {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 24px;
    height: 24px;
    margin-top: -12px;
    margin-left: -12px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

button.loading .loader {
    display: block;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>
