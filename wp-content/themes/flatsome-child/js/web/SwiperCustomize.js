// Khởi tạo tất cả slider SlideBlogsVinaWind với navigation độc lập
document.addEventListener("DOMContentLoaded", function() {
    var Sun_SlideCard = new Swiper(".Sun_SlideCard", {
        loop: true,
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto", // Điều chỉnh để các slide bên ngoài chỉ hiện ra một phần
        slideToClickedSlide: true,
        coverflowEffect: {
            rotate: 0,
            stretch:80, // Khoảng cách các slide gần lại
            depth: 100, // Tạo chiều sâu, làm nổi bật slide trung tâm
            modifier: 3, // Tăng kích thước tương đối của slide trung tâm
            slideShadows: true, // Bật bóng cho các slide
        },
        on: {
            init: function() {
                setTimeout(() => this.slideNext(), 800);
            }
        }
    });

    var Partner  = new Swiper(".Partner", {
        loop: true, // Bật chế độ vòng lặp vô hạn
        slidesPerView: 1,
        // slidesPerGroup: 3,
        navigation: {
            nextEl: ".cntt-button-partner-next",
            prevEl: ".cntt-button-partner-prev",
        },
        grabCursor: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        // freeMode: true,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
        breakpoints: {
            320: { 
                slidesPerView: 3,
                spaceBetween: 12,
            },
            768: { 
                slidesPerView: 20,
                spaceBetween: 16,
            },
            1024: { 
                slidesPerView: 7,
                spaceBetween: 15,
            },
        },
    });

    var HeaderTabInner = new Swiper(".HeaderTabInner", {
        loop: false,
        slidesPerView: 'auto',
        spaceBetween: 30,
        freeMode: true,
    });

    var Team = new Swiper(".TeamMember", {
        loop: true,
        slidesPerView: 4,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".cntt-button-team-next",
            prevEl: ".cntt-button-team-prev",
        },
        pagination: {
            el: ".pagination_team",
            clickable: true,
        },
        breakpoints: {
            320: { 
                slidesPerView: 1,
                spaceBetween: 12,
            },
            768: { 
                slidesPerView: 2,
                spaceBetween: 16,
            },
            1024: { 
                slidesPerView: 4,
                spaceBetween: 35,
            },
        },
    });
    var StackingCard = new Swiper(".StackingCard", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 16,
        grabCursor: true,
        autoHeight: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });
});
