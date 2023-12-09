// const loader = document.querySelector('.loader');
// const productListing = document.querySelector('.product-listing');
// const card=document.querySelector('.product-card');

// const deleteProduct= document.querySelector('.delete-popup-btn');
// deleteProduct.addEventListener('click', () => {
//     if (confirm('Bạn có chắc là muốn xoá sản phẩm này không?')) {
//     showAlert('Đã xoá thành công');
//     card.classList.add('hide');
//     let emtyBG=document.querySelector('.no-product-image');
//     setTimeout(() => {
//         emtyBG.classList.remove('hide');
//       }, 1200);}
//     else{
//         showAlert('Xoá thất bại');
//     }
// })
// JavaScript để mở và đóng popup form
function openForm() {
  var popup = document.getElementById("popup-form");
  popup.style.display = "block";
}

function closeForm() {
  var popup = document.getElementById("popup-form");
  popup.style.display = "none";
}

function openForm2() {
  var popup = document.getElementById("popup-form2");
  popup.style.display = "block";
}

function closeForm2() {
  var popup = document.getElementById("popup-form2");
  popup.style.display = "none";
}

var imageInput = document.getElementById('image');
imageInput.addEventListener('change', function(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function(e) {
    var imageData = e.target.result;
  };
  reader.readAsDataURL(file);
});
//alert
const showAlert = (msg) =>{
    let alertBox = document.querySelector('.alert-box');
    let alertMsg = document.querySelector('.alert-msg');
    alertMsg.innerHTML = msg;
    alertBox.classList.add('show');
    setTimeout(() => {
        alertBox.classList.remove('show');
    }, 3000);
}