// Sự kiện khi nhấn vào nút phân trang
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault(); // Prevent the default behavior for all clicks

    // Check if the clicked link has the 'is_active' class
    // if ($(this).hasClass("is_active")) {
    //     return; // Exit the function to stop further processing
    // }

    const page = $(this).data("page");

    // Check if the page is less than 1, and prevent the action if true
    if (page < 1) {
        return; // Do nothing if the page is invalid (less than 1)
    }
    // console.log(1);
    // Call the loadGames function if the page is valid
    loadGames(page);
});

function loadGames(page) {
    // Gửi AJAX request đến server
    console.log('currentCategoryId:', currentCategoryId);
    console.log('page:', page);
    fetch(`/games/pagination/${currentCategoryId}/${page}`)
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        
        
        // Xử lý dữ liệu nhận được
        console.log(data);
        renderGameList(data.data);

        // console.log(data.current_page, data.last_page);
        renderPagination(data.current_page, data.last_page);


    })
    .catch((error) => {
        console.error(error); // Log lỗi chi tiết
        alert("Unable to load data. Please try again.");
    });
}

function renderGameList(games) {
    let gameListHtml = "";
    const chunkSize = 6;

    // Chia games thành các dòng (chunk size = 6)
    for (let i = 0; i < games.length; i += chunkSize) {
        const row = games.slice(i, i + chunkSize);
        gameListHtml += '<div class="row">';

        row.forEach((game) => {
            gameListHtml += `
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="item">
                        <div class="thumb">
                            <img src="/storage/gameImages/${game.imagePath}" alt="${game.imagePath}">
                            <a href="/play/${game.game_id}">
                                <div class="overlay">
                                    <div class="info">
                                        <h4>${game.name}</h4>
                                        <span class="rating">${game.rating} ★</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });

        gameListHtml += "</div>";
    }

    $("#game-list").html(gameListHtml);
}

function renderPagination(currentPage, lastPage) {
    let paginationHtml = "";

    // Nút trang trước
    if (currentPage > 1) {
        paginationHtml += `<li><a data-page="${currentPage - 1}">&lt;</a></li>`;
    } else {
        paginationHtml += `<li><a data-page="${currentPage - 1}" class="disabled"> &lt; </a></li>`;
    }

    // Các trang
    let startPage = Math.max(1, currentPage - 1); // Trang bắt đầu
    let endPage = Math.min(lastPage, currentPage + 1); // Trang kết thúc

    // Đảm bảo luôn hiển thị 3 trang
    if (currentPage === 1) {
        endPage = Math.min(lastPage, 3);
    } else if (currentPage === lastPage) {
        startPage = Math.max(1, lastPage - 2);
    }

    for (let i = startPage; i <= endPage; i++) {
        paginationHtml += `
            <li>
                <a data-page="${i}" class="${i === currentPage ? "is_active" : ""}">${i}</a>
            </li>
        `;
    }

    // Nút trang kế tiếp
    if (currentPage < lastPage) {
        paginationHtml += `<li><a data-page="${currentPage + 1}">&gt;</a></li>`;
    } else {
        paginationHtml += `<li><a data-page="${currentPage - 1}" class="disabled"> &gt; </a></li>`;
    }

    $(".pagination").html(paginationHtml);
}
