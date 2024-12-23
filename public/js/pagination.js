// Sự kiện khi nhấn vào nút phân trang
$(document).on("click", ".pagination_index a", function (e) {
    e.preventDefault(); // Prevent the default behavior for all clicks

    // Check if the clicked link has the 'is_active' class
    if ($(this).hasClass("is_active")) {
        return; // Exit the function to stop further processing
    }
    // Check if the page is less than 1, and prevent the action if true
    const page = $(this).data("page");
    if (page < 1) {
        return; // Do nothing if the page is invalid (less than 1)
    }
    // console.log(1);
    // Call the loadGames function if the page is valid

    const context = $(".section.trending").data("context");
    
    if (context === "homepage") {
        loadGames("category",currentCategoryId, page);
    } else if (context === "recentpage") {
        const user_id = window.Laravel.userId;
        loadGames("user", user_id, page);
    } else if (context === "bookmarkpage") {
        const user_id = window.Laravel.userId;
        loadGames("bookmark", user_id, page);
    }
    else{
        console.error('Invalid context or missing parameters.');
    }
    // loadGames(currentCategoryId, page);
});

function loadGames(type, id, page) {
    // Gửi AJAX request đến server
    console.log('type:', type);
    console.log('currentId:', id);
    console.log('page:', page);
    fetch(`/games/pagination/${type}/${id}/${page}`)
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
                            <a href="/games/${game.game_id}">
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
    paginationHtml += `<li><p data-page="{{ Auth::user()->user_id ? Auth::user()->user_id : "" }}" class="disabled" hidden></p></li>`;

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
    } else 
    if (currentPage === lastPage) {
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

    $(".pagination_index").html(paginationHtml);
}
