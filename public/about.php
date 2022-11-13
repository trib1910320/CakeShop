<?php
define('TITLE', 'Giới thiệu');

require '../partials/header.php';
require '../partials/narbar.php';
?>
<main>

    <!-- Nội dung chính Begin-->
    <div class="my-2 card bg-info bg-opacity-25">
        <div class="row m-2">
            <img class="col-lg-6 rounded-5" src="img/about1.jpg" alt="" height="350px">
            <div class="col-lg-6 text-black">
                <h2 class="text-warning fs-3 fw-bold fst-italic ">Khởi Nguồn</h2>
                <p>Cake Shop khởi đầu là một cơ sở sản xuất bánh nhỏ với quy mô gia đình vào đầu những năm 2000. Trải qua gần 20 năm xây dựng và phát triển, Cake Shop đã xây dựng được chuỗi hệ thống cửa hàng với hơn 10 cửa hàng bánh lớn nhỏ trải khắp thành phố Cần Thơ.</p>
                <p>Là thương hiệu được biết đến với những sản phẩm chất lượng và ngon miệng từ bánh ngọt, bánh kem , bánh mặn. Cùng với tinh thần ham học hỏi, trách nhiệm, Cake Shop đã, đang và sẽ luôn mang đến cho khách hàng những chiếc bánh thơm ngon, dinh dưỡng nhất.</p>
            </div>
        </div>
    </div>
    <div class="my-2 card bg-info bg-opacity-25">
        <div class="row m-2">
            <div class="col-lg-6 text-black">
                <h2 class="text-warning fs-3 fw-bold fst-italic">Sứ Mệnh</h2>
                <p>Sứ mệnh của chúng tôi là lưu giữ những giá trị truyền thống của Bánh Việt Nam, những điều làm cho những chiếc Bánh trở thành món ăn hấp dẫn nhất hành tinh.</p>
                <p>“CHẤT LƯỢNG LÀM NÊN THƯƠNG HIỆU”, Cake Shop luôn cam kết về chất lượng sản phẩm, cùng phong cách phục vụ chuyên nghiệp, thân thiện để có thể đáp ứng tốt nhất nhu cầu của Quý khách hàng.</p>
            </div>
            <img class="col-lg-6 rounded-5" src="img/about2.jpg" alt="" height="300px">
        </div>
    </div>
    <div class="my-2 card ">
        <div class="row m-2 ">
            <h2 class="col-lg-3 text-warning fs-3 fw-bold fst-italic my-5">Giá Trị Cốt Lỗi</h2>
            <div class="card text-white col-lg-3 border-0">
                <img src="img/header_3.jpg" class="card-img h-100" style="filter: brightness(70%);" alt="...">
                <div class="card-img-overlay fst-italic my-4">
                    <h5 class="card-title">Tiệm bánh</h5>
                    <p class="card-text">Tạo ra sản phẩm tươi, mới, chất lượng và tốt cho sức khỏe.</p>
                </div>
            </div>
            <div class="card text-white col-lg-3 border-0">
                <img src="img/about1.jpg" class="card-img h-100" style="filter: brightness(70%);" alt="...">
                <div class="card-img-overlay fst-italic my-4">
                    <h5 class="card-title">Phục vụ</h5>
                    <p class="card-text">Luôn lắng nghe mọi phản hồi từ Quý khách hàng để mang đến những trải nghiệm dịch vụ và sản phẩm tốt nhất.</p>
                </div>
            </div>
            <div class="card text-white col-lg-3 border-0">
                <img src="img/about3.jpg" class="card-img h-100" style="filter: brightness(70%);" alt="...">
                <div class="card-img-overlay fst-italic my-4">
                    <h5 class="card-title">Nhân viên</h5>
                    <p class="card-text">Xây dựng văn hóa đội ngũ nhân viên đầy năng lượng, nhiệt tình và sáng tạo.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Nội dung chính End-->
</main>
<?php
include '../partials/footer.php';
?>