jQuery(document).ready(function ($) {
    
    // Khởi tạo WowJs
    wow = new WOW(
        {
            boxClass: 'wow',      // default
            animateClass: 'animated', // default
            offset: 0,          // default
            mobile: true,       // default
            live: true        // default
        }
    )
    wow.init();

    // Khởi tạo Wave Animation
    const svg = $('.waveSvg');

    if (svg.length) {
        
        const path1 = svg.find('.wave1');
        const path2 = svg.find('.wave2');

        if (path1.length && path2.length) {
            const viewBoxWidth = 1920;
            const viewBoxHeight = 150;
            const pointSpacing = 20;
            const baseline1 = viewBoxHeight - 90;
            const baseline2 = viewBoxHeight - 85;
            const amplitude1 = 40;
            const amplitude2 = 20;

            function buildPath(points) {
                return [
                    `M0,${viewBoxHeight}`,
                    ...points.map((point) => `L${point}`),
                    `L${viewBoxWidth},${viewBoxHeight}`,
                    'Z',
                ].join(' ');
            }

            function updateWavePaths(offset) {
                const points1 = [];
                const points2 = [];

                for (let x = 0; x <= viewBoxWidth; x += pointSpacing) {
                    const y1 = baseline1 + amplitude1 * Math.sin(x * 0.002 + offset);
                    const y2 = baseline2 + amplitude2 * Math.sin(x * 0.003 + offset + 0.2);
                    points1.push(`${x},${y1.toFixed(2)}`);
                    points2.push(`${x},${y2.toFixed(2)}`);
                }

                path1.attr('d', buildPath(points1));
                path2.attr('d', buildPath(points2));

            }

            function animateWaves() {
                const offset = performance.now() * 0.003;
                updateWavePaths(offset);
                requestAnimationFrame(animateWaves);
            }

            animateWaves();
        }
    }

    // TabSystem: xử lý chuyển tab theo index
    $('.TabSystem').each(function () {
        const $container = $(this);
        const $headers = $container.find('.left_tab_header .item_header_tab');
        const $panels = $container.find('.content_pannel_tab .pannel.entry-content');
        const $rightHeader = $container.find('.right_tab_header');
        const colorClasses = ['yellow_tab', 'purple_tab', 'coffee_tab', 'green_tab'];

        function syncRightHeader(idx) {
            if (idx < 0) {
                return;
            }
            const $header = $headers.eq(idx);
            const colorClass = colorClasses.find((cls) => $header.hasClass(cls));
            if (!colorClass) {
                return;
            }
            $rightHeader.removeClass(colorClasses.join(' ')).addClass(colorClass);
        }

        function animatePanel($panel) {
            const $items = $panel.find('._6typ');
            $items.each(function (i, el) {
                const $el = $(el);
                // Reset animation
                $el.removeClass('animate__animated animate__zoomIn');
                // Force reflow to restart animation
                // eslint-disable-next-line no-unused-expressions
                el.offsetWidth;
                // Apply animation classes
                $el.addClass('animate__animated animate__zoomIn');
                el.style.animationDuration = '700ms';
                el.style.animationDelay = (i * 60) + 'ms';
            });
        }

        $headers.on('click', function (e) {
            e.preventDefault();
            const idx = $(this).index();

            $headers.removeClass('active');
            $(this).addClass('active');

            $panels.removeClass('active').eq(idx).addClass('active');
            animatePanel($panels.eq(idx));
            syncRightHeader(idx);
        });

        // Khởi tạo animation cho panel đang active khi load trang
        const $initial = $panels.filter('.active').first();
        if ($initial.length) {
            animatePanel($initial);
        }
        syncRightHeader($headers.filter('.active').first().index());
    });

    // Program Tab: xử lý chuyển tab cho component Program
    $('.Program').each(function () {
        const $container = $(this);
        const $tabs = $container.find('.tab'); // Tab headers trong swiper-slide
        const $panels = $container.find('.panel.entry-content'); // Tab content panels

        $tabs.on('click', function (e) {
            if ($(e.target).closest('a').length) {
                return;
            }
            e.preventDefault();
            const idx = $(this).index();

            // Chuyển active class cho tab và panel tương ứng
            $tabs.removeClass('active');
            $(this).addClass('active');

            $panels.removeClass('active').eq(idx).addClass('active');
        });
    });

    // BoxQuyTrinh: xử lý chuyển tab giữa Cá nhân và Tổ chức
    $(document).on('click', '._6kwx ._7mmn', function () {
        const $tab = $(this);
        const $container = $tab.closest('._6kwx');
        const tabIndex = $tab.index();

        $container.find('._7mmn').removeClass('active');
        $tab.addClass('active');

        const $boxes = $container.find('.BoxQuyTrinh');
        $boxes.removeClass('active').eq(tabIndex).addClass('active');
    });

    $('.button-toggle-share').click(function(){
        $(this).next('.share-list').toggleClass('active');
    });
    
	if($(window).width() > 980){
        $("#ran").skywheel({effect:1,width:"970px",height:"300px"});
        $("#ran li:first-child").click();
        setInterval(() => {
            // console.log(index++);
            $("#ran li.effect1_1.mask1").click();
        }, 2000);
    }

	// Counter: đếm số tăng dần trong 5s cho .count
	function animateCount($el, durationMs) {
		const raw = ($el.text() || '').toString();
		const target = parseInt(raw.replace(/[^0-9]/g, ''), 10) || 0;
		const startTime = performance.now();
		function tick(now) {
			const progress = Math.min((now - startTime) / durationMs, 1);
			const value = Math.floor(progress * target);
			$el.text(value.toLocaleString('vi-VN'));
			if (progress < 1) requestAnimationFrame(tick);
		}
		requestAnimationFrame(tick);
	}

	// Chỉ chạy khi phần tử vào viewport
	const $counts = $('.count');
	if ('IntersectionObserver' in window) {
		const seen = new WeakSet();
		const io = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting && !seen.has(entry.target)) {
					seen.add(entry.target);
					animateCount($(entry.target), 2000);
				}
			});
		}, { threshold: 0.2 });
		$counts.each(function () { io.observe(this); });
	} else {
		// Fallback: chạy ngay với trình duyệt cũ
		$counts.each(function () { animateCount($(this), 2000); });
	}

});
