<style>
.modal-register-form {
    padding: 0;
    margin: 0;
}

.register-form-container {
    background: transparent;
    padding: 32px 24px;
    border-radius: 0;
    margin: 0;
}

.register-form-title {
    text-align: center;
    margin-bottom: 32px;
}

.register-form-title h2 {
    color: #f0f6fc;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 8px;
}

.register-form-subtitle {
    color: #8b949e;
    font-size: 14px;
    margin-top: 8px;
}

.register-form-group {
    margin-bottom: 20px;
    position: relative;
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.register-form-group:nth-child(2) {
    animation-delay: 0.1s;
}

.register-form-group:nth-child(3) {
    animation-delay: 0.2s;
}

.register-form-group:nth-child(4) {
    animation-delay: 0.3s;
}

.register-form-group:nth-child(5) {
    animation-delay: 0.4s;
}

.register-form-group:nth-child(6) {
    animation-delay: 0.5s;
}

.register-form-group:nth-child(7) {
    animation-delay: 0.6s;
}

.register-form-group:nth-child(8) {
    animation-delay: 0.7s;
}

.register-form-group:nth-child(9) {
    animation-delay: 0.8s;
}

.register-form-group label {
    display: block;
    color: #f0f6fc;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
}

.register-form-control {
    width: 100%;
    padding: 12px 16px;
    font-size: 14px;
    line-height: 1.45;
    color: #e6edf3;
    background-color: #0d1117;
    border: 1px solid #30363d;
    border-radius: 6px;
    transition: all 0.15s ease-in-out;
    box-sizing: border-box;
    font-family: inherit;
}

.register-form-control:focus {
    border-color: #58a6ff;
    outline: none;
    box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.12);
    background-color: #0d1117;
}

.register-form-control:hover {
    border-color: #8b949e;
}

.register-form-control::placeholder {
    color: #7d8590;
}

.register-name-row {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
}

.register-name-row .register-form-group {
    flex: 1;
    margin-bottom: 0;
}

.register-btn-primary {
    width: 100%;
    padding: 12px 16px;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.5;
    color: #ffffff;
    background: linear-gradient(135deg, #238636 0%, #2ea043 100%);
    border: 1px solid transparent;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
    font-family: inherit;
    position: relative;
    overflow: hidden;
    margin-top: 16px;
}

.register-btn-primary:hover {
    background: linear-gradient(135deg, #2ea043 0%, #238636 100%);
    transform: translateY(-1px);
    box-shadow: 0 8px 24px rgba(46, 160, 67, 0.35);
}

.register-btn-primary:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(46, 160, 67, 0.35);
}

.register-form-toggle {
    text-align: center;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #30363d;
}

.register-form-toggle a {
    color: #58a6ff;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.15s ease-in-out;
    cursor: pointer;
}

.register-form-toggle a:hover {
    color: #79c0ff;
    text-decoration: underline;
}

.register-alert-success {
    color: #3fb950;
    text-align: center;
    padding: 12px;
    background: #0f2419;
    border: 1px solid #238636;
    border-radius: 6px;
    margin-top: 16px;
    display: none;
}

.register-alert-danger {
    color: #f85149;
    text-align: center;
    padding: 12px;
    background: #490202;
    border: 1px solid #da3633;
    border-radius: 6px;
    margin-top: 16px;
    display: none;
}

.register-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(13, 17, 23, 0.9);
    display: none;
    z-index: 10000;
    align-items: center;
    justify-content: center;
}

.register-loader {
    width: 40px;
    height: 40px;
    border: 3px solid #30363d;
    border-top: 3px solid #58a6ff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

/* Responsive design */
@media (max-width: 480px) {
    .register-name-row {
        flex-direction: column;
        gap: 0;
    }

    .register-name-row .register-form-group {
        margin-bottom: 20px;
    }

    .register-form-container {
        padding: 24px 16px;
    }

    .register-form-title h2 {
        font-size: 24px;
    }
}
</style>

<div class="register-overlay">
    <div class="register-loader"></div>
</div>

<div class="modal-register-form">
    <form id="signup_form" onsubmit="return false" class="register-form-container">
        <div class="register-form-title">
            <h2>Join Us Today</h2>
            <div class="register-form-subtitle">Create your account and get started</div>
        </div>

        <div class="register-name-row">
            <div class="register-form-group">
                <label for="f_name">First Name</label>
                <input class="register-form-control" type="text" name="f_name" id="f_name" placeholder="John" required>
            </div>
            <div class="register-form-group">
                <label for="l_name">Last Name</label>
                <input class="register-form-control" type="text" name="l_name" id="l_name" placeholder="Doe" required>
            </div>
        </div>

        <div class="register-form-group">
            <label for="register_email">Email</label>
            <input class="register-form-control" type="email" name="email" id="register_email"
                placeholder="john.doe@example.com" required>
        </div>

        <div class="register-form-group">
            <label for="register_password">Password</label>
            <input class="register-form-control" type="password" name="password" id="register_password"
                placeholder="Create a strong password" required>
        </div>

        <div class="register-form-group">
            <label for="repassword">Confirm Password</label>
            <input class="register-form-control" type="password" name="repassword" id="repassword"
                placeholder="Confirm your password" required>
        </div>

        <div class="register-form-group">
            <label for="mobile">Mobile Number</label>
            <input class="register-form-control" type="text" name="mobile" id="mobile" placeholder="+1 (555) 123-4567"
                required>
        </div>

        <div class="register-form-group">
            <label for="address1">Address</label>
            <input class="register-form-control" type="text" name="address1" id="address1" placeholder="123 Main Street"
                required>
        </div>

        <div class="register-form-group">
            <label for="address2">City</label>
            <input class="register-form-control" type="text" name="address2" id="address2" placeholder="New York"
                required>
        </div>

        <input class="register-btn-primary" value="Create Account" type="submit" name="signup_button">

        <div class="register-form-toggle">
            <a href="#" data-toggle="modal" data-target="#Modal_login" data-dismiss="modal">
                Already have an account? <strong>Sign in</strong>
            </a>
        </div>

        <div id="signup_msg">
            <div class="register-alert-success" id="register_success_msg"></div>
            <div class="register-alert-danger" id="register_error_msg"></div>
        </div>
    </form>
</div>