document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            // Toggles the 'active' class on click
            navLinks.classList.toggle('active');
        });
    }
});

// for tabs 

document.addEventListener('DOMContentLoaded', function () {

    const tabs = document.querySelectorAll('.service-steps .step-item');
    const contents = document.querySelectorAll('.services-tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {

            const tabNumber = this.getAttribute('data-tab');

            /* remove active from all tabs */
            tabs.forEach(t => t.classList.remove('active-tab'));

            /* remove active from all contents */
            contents.forEach(c => c.classList.remove('active-content'));

            /* add active to clicked tab */
            this.classList.add('active-tab');

            /* show matching content */
            const activeContent = document.getElementById(`tab-${tabNumber}-content`);
            if (activeContent) {
                activeContent.classList.add('active-content');
            }
        });
    });

});

// --- Testimonial Carousel Skeleton ---

document.addEventListener('DOMContentLoaded', () => {

    const cards = document.querySelectorAll('.r3a1-card');
    const container = document.querySelector('.r3f2-box');

    if (!cards.length || !container) return;

    let activeIndex = 0;
    const AUTO_SLIDE_TIME = 3000;
    let autoSlideInterval = null;
    let isPaused = false;

    /* =========================
       UPDATE UI
    ========================= */
    function updateCards() {
        cards.forEach((card, index) => {
            card.classList.remove('active', 'inactive');

            if (index === activeIndex) {
                card.classList.add('active');
            } else if (index < activeIndex) {
                card.classList.add('inactive');
            }
        });
    }

    /* =========================
       AUTO SLIDE
    ========================= */
    function startAutoSlide() {
        if (autoSlideInterval) return;

        autoSlideInterval = setInterval(() => {
            if (!isPaused) {
                activeIndex = (activeIndex + 1) % cards.length;
                updateCards();
            }
        }, AUTO_SLIDE_TIME);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = null;
    }

    function resetAutoSlide() {
        stopAutoSlide();
        startAutoSlide();
    }

    /* =========================
       🔥 BUTTONS + CARD CLICK (DELEGATION)
    ========================= */
    document.addEventListener('click', (e) => {

        if (e.target.closest('#btnNext')) {
            e.preventDefault();
            activeIndex = (activeIndex + 1) % cards.length;
            updateCards();
            resetAutoSlide();
            return;
        }

        if (e.target.closest('#btnPrev')) {
            e.preventDefault();
            activeIndex = (activeIndex - 1 + cards.length) % cards.length;
            updateCards();
            resetAutoSlide();
            return;
        }

        const card = e.target.closest('.r3a1-card');
        if (card) {
            activeIndex = [...cards].indexOf(card);
            updateCards();
            resetAutoSlide();
        }
    });

    /* =========================
       PAUSE ON HOVER
    ========================= */
    container.addEventListener('pointerenter', () => {
        isPaused = true;
    });

    container.addEventListener('pointerleave', () => {
        isPaused = false;
    });

    /* =========================
       INIT
    ========================= */
    updateCards();
    startAutoSlide();

});


// --- Testimonial Carousel Skeleton ---

// for  accourdians

document.addEventListener('DOMContentLoaded', () => {
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const isExpanded = header.getAttribute('aria-expanded') === 'true';

            // 1. Collapse all open items
            document.querySelectorAll('.accordion-header[aria-expanded="true"]').forEach(openHeader => {
                if (openHeader !== header) {
                    openHeader.setAttribute('aria-expanded', 'false');
                    openHeader.classList.remove('is-active'); //  remove border
                    openHeader.nextElementSibling.classList.remove('is-open');
                    openHeader.nextElementSibling.setAttribute('hidden', 'true');
                    openHeader.nextElementSibling.style.maxHeight = '0';
                }
            });

            // 2. Toggle the current item
            if (!isExpanded) {
                header.setAttribute('aria-expanded', 'true');
                header.classList.add('is-active'); //  add border
                content.classList.add('is-open');
                content.removeAttribute('hidden');
                content.style.maxHeight = content.scrollHeight + 30 + "px";
            } else {
                header.setAttribute('aria-expanded', 'false');
                header.classList.remove('is-active'); //  remove border
                content.style.maxHeight = '0';
                setTimeout(() => {
                    content.classList.remove('is-open');
                    content.setAttribute('hidden', 'true');
                }, 300);
            }
        });
    });
});



// testimonials script

// (() => {
//     const track = document.getElementById("tmcTrack");
//     const wrap = track.parentElement;
//     const testimonialCards = [...track.children];
//     const prev = document.getElementById("tmcPrev");
//     const next = document.getElementById("tmcNext");

//     let current = 0;
//     const isMobile = () => matchMedia("(max-width:768px)").matches;

//     function center(i) {
//         if (isMobile()) return;
//         const card = cards[i];
//         wrap.scrollTo({
//             left: card.offsetLeft - (wrap.clientWidth / 2 - card.clientWidth / 2),
//             behavior: "smooth"
//         });
//     }

//     function activate(i) {
//         current = i;
//         cards.forEach((c, k) => c.toggleAttribute("active", k === i));
//         prev.disabled = i === 0;
//         next.disabled = i === cards.length - 1;
//         center(i);
//     }

//     prev.onclick = () => activate(Math.max(current - 1, 0));
//     next.onclick = () => activate(Math.min(current + 1, cards.length - 1));

//     cards.forEach((c, i) => c.addEventListener("click", () => activate(i)));

//     activate(0);
// })();



// blogs

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('blog-carousel-track');
    const nextBtn = document.getElementById('next-slide');
    const prevBtn = document.getElementById('prev-slide');

    if (!slider || !nextBtn || !prevBtn) return;

    const gap = 20;
    let slides = Array.from(slider.children);

    // Clone first & last
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);

    slider.appendChild(firstClone);
    slider.insertBefore(lastClone, slides[0]);

    slides = Array.from(slider.children);

    let index = 1;
    let slideWidth = 0;
    let isAnimating = false;

    function updateWidth() {
        slideWidth = slides[0].offsetWidth + gap;
        slider.scrollLeft = slideWidth * index;
    }

    updateWidth();
    window.addEventListener('resize', updateWidth);

    function goToSlide() {
        isAnimating = true;
        slider.scrollTo({
            left: slideWidth * index,
            behavior: 'smooth'
        });

        // Unlock after animation
        setTimeout(() => {
            // Jump logic (NO animation)
            if (index === 0) {
                index = slides.length - 2;
                slider.scrollLeft = slideWidth * index;
            }

            if (index === slides.length - 1) {
                index = 1;
                slider.scrollLeft = slideWidth * index;
            }

            isAnimating = false;
        }, 400);
    }
    

    nextBtn.addEventListener('click', () => {
        if (isAnimating) return;
        index++;
        goToSlide();
    });

    prevBtn.addEventListener('click', () => {
        if (isAnimating) return;
        index--;
        goToSlide();
    });
});


// for search trademark  here

/**
 * TRADEMARK SEARCH JAVASCRIPT LOGIC (using jQuery)
 * This code handles the button click, prevents page reload,
 * calls the external API, and dynamically renders the results table.
 */

// Use the document.ready function to ensure the code only runs after the page is fully loaded.
$(document).ready(function () {

    // Attach a click event listener to the search button class
    $(document).on('click', '.srch-btn', function (event) {

        // 1. CRITICAL FIX: PREVENT PAGE RELOAD
        // This stops the browser's default form submission action.
        event.preventDefault();

        // Clear previous results and hide the results container immediately
        $('.search-data tbody').html('');
        $('.search-data').css('display', 'none');

        // Get the search text from the input field with class '.srch'
        var searchText = $('.srch').val().trim();

        if (searchText === '') {
            // Display a message if the search field is empty
            $('.search-data tbody').append(
                `<tr><td colspan="4">Please enter a trademark name to search.</td></tr>`
            );
            $('.search-data').css('display', 'block');
            return; // Exit the function
        }

        // Display a "Searching..." message while waiting for the API
        $('.search-data tbody').append(
            `<tr><td colspan="4">Searching for "${searchText}" globally...</td></tr>`
        );
        $('.search-data').css('display', 'block');

        var requestOptions = {
            method: 'GET'
            // NOTE: If the API required headers (like an API Key), they would go here.
        };

        // Asynchronous function to handle the API call
        async function searchTrademarks(searchText) {
            try {
                // Construct the full API URL with the search text
                const apiUrl = `https://innova-labs.net:9094/trademarks/search?name=${searchText}&page=1&count=5`;

                // Fetch data from the external API
                const response = await fetch(apiUrl, requestOptions);

                // Check if the network request itself failed (e.g., 404, 500 status)
                if (!response.ok) {
                    throw new Error(`API returned status: ${response.status}`);
                }

                // Parse the JSON result
                const result = await response.json();

                // Clear the "Searching..." message
                $('.search-data tbody').html('');

                // Check if the API returned actual trademark elements
                if (result.elements && result.elements.length > 0) {

                    // Loop through each found item and append a row to the table
                    result.elements.forEach(function (item) {
                        // Ensure owner data exists before trying to access partyName
                        const ownerName = item.owners && item.owners.length > 0 ? item.owners[0].partyName : 'N/A';

                        $(".search-data tbody").append(
                            `<tr>
                                <td>${item.markIdentification}</td>
                                <td>${ownerName}</td>
                                <td>${item.serialNumber}</td>
                                <td>${item.filingDate}</td>
                            </tr>`
                        );
                    });
                    // The table is already shown from the "Searching..." step.

                } else {
                    // No results found
                    $(".search-data tbody").append(
                        `<tr><td colspan="4">✅ No Trademark Found For "${searchText}"</td></tr>`
                    );
                }

            } catch (error) {
                // Handle network or parsing errors
                console.error('Trademark Search Error:', error);
                $('.search-data tbody').html(
                    `<tr><td colspan="4" style="color: red;">❌ Error connecting to the search service. Please try again later.</td></tr>`
                );
                // Ensure the results container is displayed so the error message is visible
                $('.search-data').css('display', 'block');
            }
        }

        // Call the search function
        searchTrademarks(searchText);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Select all accordion headers
    const headers = document.querySelectorAll('.renewal-timeline-item-header');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            // Get the closest parent item (the full box)
            const item = header.closest('.renewal-timeline-item');
            
            // Toggle the 'is-open' class on the item
            item.classList.toggle('is-open');
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const chatBtn = document.getElementById('openLiveChat');

    chatBtn.addEventListener('click', () => {
        if (typeof Tawk_API !== 'undefined') {
            Tawk_API.maximize(); // 🔥 open chat
        }
    });
});

