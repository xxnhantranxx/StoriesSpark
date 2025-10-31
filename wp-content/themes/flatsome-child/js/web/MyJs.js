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
            function updateWavePaths(offset) {
                const pointSpacing = 20;
                const points1 = [];
                const points2 = [];

                for (let x = 0; x <= 1920; x += pointSpacing) {
                    const y1 = 25 + 12 * Math.sin(x * 0.002 + offset);
                    const y2 = 25 + 15 * Math.sin(x * 0.003 + offset + 0.2);
                    points1.push(x + ',' + y1);
                    points2.push(x + ',' + y2);
                }

                const pathData1 = 'M0,60 L0,25 ' + points1.join(' ') + ' L1920,60 Z';
                const pathData2 = 'M0,60 L0,25 ' + points2.join(' ') + ' L1920,60 Z';
                path1.attr('d', pathData1);
                path2.attr('d', pathData2);
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
        });

        // Khởi tạo animation cho panel đang active khi load trang
        const $initial = $panels.filter('.active').first();
        if ($initial.length) {
            animatePanel($initial);
        }
    });

	// GSAP stacking cards trong jQuery document
	gsap.registerPlugin(ScrollTrigger);

    const cards = gsap.utils.toArray(".card");
    const stackingSection = document.querySelector(".stacking-section");

    // ✅ Set chiều cao stacking-section = (số card - 1) * 100vh
    stackingSection.style.height = `calc(${(cards.length - 1) * 100}vh + 500px)`;

    cards.forEach((card, i) => {
    if (i === cards.length - 1) return; // bỏ card cuối

    const nextCard = cards[i + 1];

    const tl = gsap.timeline({
        scrollTrigger: {
        trigger: stackingSection,
        start: () => `top+=${i * window.innerHeight} top`,
        end: () => `+=${window.innerHeight}`,
        scrub: true,
        pinSpacing: false,
        }
    });

    // card hiện tại trượt lên, để lộ card kế tiếp
    tl.to(card, {
        yPercent: -120,
        scale: 1.05,
        opacity: 0.95,
        ease: "none"
    }, 0);

    // card kế dưới scale lên để tạo cảm giác nổi
    tl.to(nextCard, {
        scale: 1,
        ease: "none"
    }, 0);
    });

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
