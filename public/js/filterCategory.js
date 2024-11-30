let currentCategoryId = 1;

document.addEventListener("DOMContentLoaded", function () {
    const tags = document.querySelectorAll(".tag");
    const gameList = document.getElementById("game-list");

    tags.forEach((tag) => {
        tag.addEventListener("click", function () {
            currentCategoryId = tag.getAttribute("data-category");
            const categoryId = currentCategoryId;

            // Gửi AJAX request đến server
            fetch(`/games/filter/${categoryId}`)
                .then((response) => response.json())
                .then((data) => {
                    // Xóa danh sách game hiện tại
                    gameList.innerHTML = "";


                    // Chia game thành từng dòng (mỗi dòng chứa 6 game)
                    const chunkSize = 6;
                    for (let i = 0; i < data.length; i += chunkSize) {
                        const row = document.createElement("div");
                        row.className = "row";

                        // Lấy 6 game mỗi lần
                        const chunk = data.slice(i, i + chunkSize);
                        chunk.forEach((game) => {
                            const gameItem = `
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
                            row.innerHTML += gameItem; // Thêm item vào row
                        });

                        gameList.appendChild(row); // Thêm row vào danh sách game
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});



