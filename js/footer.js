const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML =`
    <div class="footer-content">
    <img src="img/light-logo.png" class="logo" alt="">
    <div class="footer-ul-container">
        <ul class="category">
            <li class="category-title">men</li>
            <li><a href="menarmor.html" class="footer-link">armor</a></li>
            <li><a href="accessories.html" class="footer-link">phụ kiện</a></li>
            <li><a href="#" class="footer-link">mũ</a></li>
            <li><a href="#" class="footer-link">giày</a></li>
            <li><a href="#" class="footer-link">găng tay</a></li>
            <li><a href="#" class="footer-link">súng</a></li>
        </ul>
        <ul class="category">
            <li class="category-title">women</li>
            <li><a href="womenarmor.html" class="footer-link">armor</a></li>
            <li><a href="accessories.html" class="footer-link">phụ kiện</a></li>
            <li><a href="#" class="footer-link">mũ</a></li>
            <li><a href="#" class="footer-link">giày</a></li>
            <li><a href="#" class="footer-link">găng tay</a></li>
            <li><a href="#" class="footer-link">súng</a></li>
        </ul>
    </div>
</div>
<p class="footer-title">Thông tin của chúng tôi</p>
<p class="info">email liên hệ: - lightningemperor2193@gmail.com</p>
<p class="info">số điện thoại: - 0386393932</p>
<div class="footer-social-container">
    <div>
        <a href="#" class="social-link">Điều khoản dịch vụ và chính sách bảo mật</a>
        <a href="#" class="social-link">Trang cá nhân</a>
        <a href="#" class="social-link">instagram</a>
        <a href="#" class="social-link">facebook</a>
        <a href="#" class="social-link">twitter</a>
    </div>
</div>
<p class="footer-credit">ARMOR - Biến chiến trường thành sân khấu của bạn</p>    
    `;
}

createFooter();