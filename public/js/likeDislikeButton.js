// Lấy tất cả các nút rating
const likeButton = document.querySelector('[data-rate="like"]');
const dislikeButton = document.querySelector('[data-rate="dislike"]');

// Khi click vào nút like
likeButton.addEventListener('click', function() {
    // Đặt màu cho nút like
    likeButton.classList.add('active-like');
    dislikeButton.classList.remove('active-dislike'); // Xóa hiệu ứng của dislike nếu có
});

// Khi click vào nút dislike
dislikeButton.addEventListener('click', function() {
    // Đặt màu cho nút dislike
    dislikeButton.classList.add('active-dislike');
    likeButton.classList.remove('active-like'); // Xóa hiệu ứng của like nếu có
});


const dropdownButton = document.getElementById('dropDownReport');
const dropdownContent = document.querySelector('.dropdownReport-content');

// Thêm sự kiện click vào nút dropdown
dropdownButton.addEventListener('click', function(event) {
    // Ngăn sự kiện click không lan truyền
    event.stopPropagation();
    // Đổi trạng thái hiển thị của dropdown
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
});

// Ẩn dropdown nếu click ra ngoài
document.addEventListener('click', function(event) {
    if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
        dropdownContent.style.display = 'none';
    }
});