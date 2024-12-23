document.addEventListener("DOMContentLoaded", function () {
    const likeButton = document.querySelector('[data-rate="like"]');
    const dislikeButton = document.querySelector('[data-rate="dislike"]');
    const dropdownButton = document.getElementById("dropDownReport");
    const dropdownContent = document.querySelector(".dropdownReport-content");
    const bookmarkButton = document.querySelector('.bookmark-btn');
    const gameId = likeButton.getAttribute("data-id");

    // Khi click vào nút like
    likeButton.addEventListener("click", function () {
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }
        
        if (!likeButton.classList.contains('active-like')) {
            // Gửi yêu cầu like qua AJAX
            updateRating(gameId, 1);
    
            // Thêm hiệu ứng
            likeButton.classList.add("active-like");
            dislikeButton.classList.remove("active-dislike");
        }
    });

    // Khi click vào nút dislike
    dislikeButton.addEventListener("click", function () {
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }

        if (!dislikeButton.classList.contains('active-dislike')) {
            // Gửi yêu cầu dislike qua AJAX
            updateRating(gameId, -1);
    
            // Thêm hiệu ứng
            dislikeButton.classList.add("active-dislike");
            likeButton.classList.remove("active-like");
        }
    });

    // Dropdown báo cáo
    dropdownButton.addEventListener("click", function (event) {
        event.stopPropagation();
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    });

    // Ẩn dropdown nếu click ra ngoài
    document.addEventListener("click", function (event) {
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownContent.contains(event.target)
        ) {
            dropdownContent.style.display = "none";
        }
    });

    bookmarkButton.addEventListener("click", function() {
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }

        if (bookmarkButton.classList.contains('unactive')) {

            updateBookmark(gameId, 1);
            
            bookmarkButton.classList.remove('unactive');
            bookmarkButton.classList.add('active');
        } else if (bookmarkButton.classList.contains('active')) {

            updateBookmark(gameId, 0);

            bookmarkButton.classList.remove('active');
            bookmarkButton.classList.add('unactive');
        }
    });

    // Hiển thị modal
    function showLoginModal() {
        const loginModalElement = document.getElementById("loginModal");
        if (loginModalElement) {
            const loginModal = new bootstrap.Modal(loginModalElement);
            loginModal.show();
        } else {
            console.error("Login modal not found in the DOM.");
        }
    }

    // Gửi yêu cầu AJAX để cập nhật rating
    function updateRating(gameId, action) {
        fetch(`/games/rating/${gameId}/${action}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert("Có lỗi xảy ra, vui lòng thử lại.");
                }
            })
            .catch((error) => console.error("Error:", error));
    }

    function updateBookmark(gameId, action) {
        fetch(`/games/bookmark/${gameId}/${action}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert("Có lỗi xảy ra, vui lòng thử lại.");
                }
            })
            .catch((error) => console.error("Error:", error));
    }
});


// Sự kiện click vào từng mục báo cáo
document.querySelectorAll(".dropdownReport-content a").forEach(function (reportLink) {
    reportLink.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định (chuyển trang)
        
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }

        const gameId = this.getAttribute("data-id");
        const reportType = this.getAttribute("data-report"); // Lấy giá trị report từ data-report

        // Gửi yêu cầu Ajax
        fetch('/games/report', {
            method: "POST", // Phải sử dụng POST
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                report: reportType,
                gameId: gameId
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert("Something went wrong: " + error.message);
        });
    });
    
});