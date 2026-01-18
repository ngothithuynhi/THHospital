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
                        <div class="logo-box" style="background: white; border-radius: 50%;">
                            <img src="../../../assets/images/logoHospital.png" style="width: 100px; height: 100px; ">
                        </div>
                        <h1>TH Hospital</h1>
                        <p class="subtitle">Hệ thống quản lý bệnh viện</p>
                    </div>

                    <form @submit.prevent="handleLogin" class="login-form">
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
                                {{ showPassword ? 'Ẩn' : 'Hiển thị' }}
                            </span>
                            <span class="highlight"></span>
                            <span v-if="errors.password" class="error-message">{{ errors.password }}</span>
                        </div>

                        <div class="actions">
                            <label class="custom-checkbox">
                                <input type="checkbox" v-model="remember">
                                <span class="checkmark"></span>
                                <span class="label-text">Luôn xác nhận là tôi</span>
                            </label>
                            <router-link to="/admin/forgot" class="forgot-link text-end">Quên mật khẩu?</router-link>
                        </div>

                        <button type="submit" :class="{ 'loading': isLoading }" :disabled="isLoading">
                            <span class="btn-text">Đăng nhập</span>
                            <div class="loader"></div>
                        </button>
                        <div class="text-center mt-3">
                            Bạn chưa có tài khoản? <router-link to="/admin/register">Đăng ký</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const email = ref('');
const password = ref('');
const showPassword = ref(false);
const remember = ref(false);
const isLoading = ref(false);
const errors = reactive({
    email: '',
    password: ''
});

const handleLogin = async () => {
    // Reset errors
    errors.email = '';
    errors.password = '';
    let hasError = false;

    if (!email.value) {
        errors.email = 'Vui lòng nhập địa chỉ email!';
        hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        errors.email = 'Vui lòng nhập đúng địa chỉ email!';
        hasError = true;
    }

    if (!password.value) {
        errors.password = 'Vui lòng nhập mật khẩu!';
        hasError = true;
    }

    if (hasError) return;

    isLoading.value = true;
    setTimeout(() => {
        isLoading.value = false;
        alert('Welcome back, Doctor!');
    }, 2000);
};
</script>

<style scoped>
/* ... (existing imports and styles) ... */
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
    background: linear-gradient(45deg, #eef2f3 0%, #8e9eab 100%);
    /* Fallback */
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
    max-width: 440px;
    padding: 20px;
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
    padding: 48px 40px;
}

.header {
    text-align: center;
    margin-bottom: 40px;
}

.logo-box {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #0061ff 0%, #60efff 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    box-shadow: 0 10px 20px rgba(0, 97, 255, 0.3);
}

.plus {
    font-size: 36px;
    color: white;
    font-weight: 300;
    line-height: 1;
}

h1 {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
    letter-spacing: -0.5px;
}

.subtitle {
    color: #7f8c8d;
    font-size: 15px;
    margin-top: 5px;
}

/* Modern Input Fields */
.input-group {
    position: relative;
    margin-bottom: 30px;
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
    /* Ensure spacing remains */
}

/* Floating Label Logic */
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
    letter-spacing: 0.5px;
}

/* Actions: Checkbox & Link */
.actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 35px;
}

.custom-checkbox {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 14px;
    color: #555;
    user-select: none;
}

.custom-checkbox input {
    display: none;
}

.checkmark {
    width: 20px;
    height: 20px;
    border: 2px solid #ddd;
    border-radius: 6px;
    margin-right: 8px;
    position: relative;
    transition: all 0.2s;
}

.custom-checkbox input:checked+.checkmark {
    background: #0061ff;
    border-color: #0061ff;
}

.custom-checkbox input:checked+.checkmark::after {
    content: '';
    position: absolute;
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.forgot-link {
    font-size: 14px;
    color: #7f8c8d;
    text-decoration: none;
    transition: color 0.2s;
}

.forgot-link:hover {
    color: #0061ff;
}

/* Button */
button {
    width: 100%;
    height: 56px;
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
