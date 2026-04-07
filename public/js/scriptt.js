// document.addEventListener('DOMContentLoaded', () => {
//     const menuToggle = document.querySelector('.menu-toggle');
//     const navLinks = document.querySelector('.nav-links');

//     if (menuToggle && navLinks) {
//         menuToggle.addEventListener('click', () => {
//             // Toggles the 'active' class on click
//             navLinks.classList.toggle('active'); 
//         });
//     }
// });

// // for tabs 

// // --- Services Tab Functionality ---

// document.addEventListener('DOMContentLoaded', () => {
//     // Get all the step elements (the tabs)
//     const tabSteps = document.querySelectorAll('.service-steps .step-item');
//     // Get all the content description elements
//     const tabContents = document.querySelectorAll('.tab-content-container .services-description');

//     // Add a click listener to each tab step
//     tabSteps.forEach(step => {
//         step.addEventListener('click', () => {
//             // 1. Remove 'active-tab' class from ALL tabs
//             tabSteps.forEach(t => t.classList.remove('active-tab'));
            
//             // 2. Add 'active-tab' class to the clicked tab
//             step.classList.add('active-tab');
            
//             // Get the target tab number from the data-tab attribute
//             const targetTab = step.getAttribute('data-tab');
//             const targetContentId = `tab-${targetTab}-content`;
            
//             // 3. Hide ALL content descriptions
//             tabContents.forEach(content => content.classList.remove('active-content'));
            
//             // 4. Show only the targeted content description
//             const targetElement = document.getElementById(targetContentId);
//             if (targetElement) {
//                 targetElement.classList.add('active-content');
//             }
//         });
//     });
// });
// // --- Testimonial Carousel Skeleton ---

// // --- Testimonial Carousel Skeleton ---
// document.addEventListener('DOMContentLoaded', () => {
//     const track = document.querySelector('.testimonial-track');
//     const prevBtn = document.querySelector('.prev-btn');
//     const nextBtn = document.querySelector('.next-btn');
//     const cards = Array.from(document.querySelectorAll('.testimonial-card'));
    
//     if (!track || cards.length === 0) return;

//     let cardWidth = cards[0].offsetWidth + 30; // Card width + margin
//     let currentIndex = 0;
    
//     const updateCarousel = () => {
//         const translateValue = -currentIndex * cardWidth;
//         // Apply the transformation to the track to slide it
//         track.style.transform = `translateX(${translateValue}px)`; 
        
//         // Disable buttons at the limits
//         prevBtn.disabled = currentIndex === 0;
//         nextBtn.disabled = currentIndex >= cards.length - 1; 
//         // Note: You will need more complex logic if showing multiple cards per view.
//     };
    
//     nextBtn.addEventListener('click', () => {
//         if (currentIndex < cards.length - 1) {
//             currentIndex++;
//             updateCarousel();
//         }
//     });

//     prevBtn.addEventListener('click', () => {
//         if (currentIndex > 0) {
//             currentIndex--;
//             updateCarousel();
//         }
//     });

//     // Initial positioning
//     // updateCarousel(); 
//     // You might need to call this after the page fully renders with CSS applied
//     // Or, use a dedicated carousel library for easier implementation.
// });



// // document.addEventListener('DOMContentLoaded', () => {
// //     const track = document.querySelector('.testimonial-track');
// //     const prevBtn = document.querySelector('.prev-btn');
// //     const nextBtn = document.querySelector('.next-btn');
// //     const cards = Array.from(document.querySelectorAll('.testimonial-card'));
    
// //     if (!track || cards.length === 0) return;

// //     let cardWidth = cards[0].offsetWidth + 30; 
// //     let currentIndex = 0;
    
// //     const updateCarousel = () => {
// //         const translateValue = -currentIndex * cardWidth;
       
// //         track.style.transform = `translateX(${translateValue}px)`; 
        
        
// //         prevBtn.disabled = currentIndex === 0;
// //         nextBtn.disabled = currentIndex >= cards.length - 1; 
        
// //     };
    
// //     nextBtn.addEventListener('click', () => {
// //         if (currentIndex < cards.length - 1) {
// //             currentIndex++;
// //             updateCarousel();
// //         }
// //     });

// //     prevBtn.addEventListener('click', () => {
// //         if (currentIndex > 0) {
// //             currentIndex--;
// //             updateCarousel();
// //         }
// //     });

  
// // });

  // Select ALL buttons using the class selector
  const fcmpBtns = document.querySelectorAll(".fcmp-trigger-button");
  
  // Modal elements remain the same since they are unique IDs
  const fcmpModal = document.getElementById("fcmp-modal-wrapper");
  const fcmpClose = document.getElementById("fcmp-close");

  // Loop through each button and attach the click event
  fcmpBtns.forEach(button => {
    button.onclick = () => fcmpModal.style.display = "flex";
  });

  // Close handlers remain the same
  fcmpClose.onclick = () => fcmpModal.style.display = "none";
  window.onclick = (e) => {
    if (e.target === fcmpModal) {
      fcmpModal.style.display = "none";
    }
  }
// client form js 


// // // Select modal elements
// // const fcmpModal = document.getElementById("fcmp-modal-wrapper");
// // const fcmpClose = document.getElementById("fcmp-close");

// // // Show modal function
// // function showModal() {
// //   fcmpModal.style.display = "flex";
// // }

// // // Close modal handlers
// // fcmpClose.onclick = () => (fcmpModal.style.display = "none");
// // window.onclick = (e) => {
// //   if (e.target === fcmpModal) {
// //     fcmpModal.style.display = "none";
// //   }
// // };

// Optional: manual trigger buttons
document.querySelectorAll(".fcmp-trigger-button").forEach(button => {
  button.onclick = showModal;
});

// // // --- AUTO SHOW LOGIC ---

// // // Show first time after 10 seconds
// // setTimeout(() => {
// //   showModal();

// //   // After first time, repeat every 5 minutes (300000 ms)
// //   setInterval(showModal, 120000);

// // }, 5000); // 10000 ms = 10 seconds


// // Select modal elements
// const fcmpModal = document.getElementById("fcmp-modal-wrapper");
// const fcmpClose = document.getElementById("fcmp-close");

// // Show modal function
// function showModal() {
//   fcmpModal.style.display = "flex";
//   localStorage.setItem("fcmpModalShown", "true"); // mark as shown
// }

// // Close modal handlers
// fcmpClose.onclick = () => (fcmpModal.style.display = "none");
// window.onclick = (e) => {
//   if (e.target === fcmpModal) {
//     fcmpModal.style.display = "none";
//   }
// };

// // Optional: manual trigger buttons
// document.querySelectorAll(".fcmp-trigger-button").forEach(button => {
//   button.onclick = showModal;
// });

// // --- AUTO SHOW LOGIC ---

// // Check if user is logged in via a JS variable set by Blade/PHP
// // Example: in Blade template, add: <script>const userLoggedIn = @json(auth()->check());</script>

// if (!window.userLoggedIn) {
//   // Only show if modal hasn't been shown yet
//   if (!localStorage.getItem("fcmpModalShown")) {
//     // Show after 10 seconds
//     setTimeout(() => {
//       showModal();
//     }, 10000);
//   }
// }

document.addEventListener('DOMContentLoaded', () => {

    // --- Hamburger Menu ---
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => navLinks.classList.toggle('active'));
    }

    // --- Tabs ---
    const tabSteps = document.querySelectorAll('.service-steps .step-item');
    const tabContents = document.querySelectorAll('.tab-content-container .services-description');
    tabSteps.forEach(step => {
        step.addEventListener('click', () => {
            tabSteps.forEach(t => t.classList.remove('active-tab'));
            step.classList.add('active-tab');
            const targetTab = step.getAttribute('data-tab');
            const targetContent = document.getElementById(`tab-${targetTab}-content`);
            tabContents.forEach(c => c.classList.remove('active-content'));
            if (targetContent) targetContent.classList.add('active-content');
        });
    });

    // --- Testimonial Carousel ---
    const track = document.querySelector('.testimonial-track');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const cards = Array.from(document.querySelectorAll('.testimonial-card'));
    if (track && cards.length > 0) {
        let cardWidth = cards[0].offsetWidth + 30;
        let currentIndex = 0;
        const updateCarousel = () => {
            track.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= cards.length - 1;
        };
        nextBtn.addEventListener('click', () => { if (currentIndex < cards.length - 1) { currentIndex++; updateCarousel(); } });
        prevBtn.addEventListener('click', () => { if (currentIndex > 0) { currentIndex--; updateCarousel(); } });
    }

 

});

// document.addEventListener("DOMContentLoaded", function () {
//   const fcmpModalWrapper = document.getElementById("fcmp-modal-wrapper");
//   const fcmpClose = document.getElementById("fcmp-close");

//   // Safety check
//   if (!fcmpModalWrapper || !fcmpClose) return;

//   // Clear localStorage for testing
//   // localStorage.removeItem("fcmpModalShown");

//   // Pages to exclude
//   const excludedPages = ["login", "register", "trademark.apply", "dashboard"];
//   const currentPath = window.location.pathname.toLowerCase();
//   const isExcluded = excludedPages.some(page => currentPath.includes(page));

//   // Only show if not excluded and not already shown
//   if (!isExcluded && !localStorage.getItem("fcmpModalShown")) {

//     function showModal() {
//       fcmpModalWrapper.style.display = "flex";  // show modal
//       localStorage.setItem("fcmpModalShown", "true");
//     }

//     // Show after 5 seconds
//     setTimeout(showModal, 5000);

//     // Close modal on X
//     fcmpClose.onclick = () => {
//       fcmpModalWrapper.style.display = "none";
//     };

//     // Close modal on clicking outside modal
//     fcmpModalWrapper.onclick = (e) => {
//       if (e.target === fcmpModalWrapper) {
//         fcmpModalWrapper.style.display = "none";
//       }
//     };
//   }
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const fcmpModalWrapper = document.getElementById("fcmp-modal-wrapper");
//   const fcmpClose = document.getElementById("fcmp-close");

//   if (!fcmpModalWrapper || !fcmpClose) return;

//   // Only show if user is NOT logged in
//   if (!window.isUserLoggedIn && !localStorage.getItem("fcmpModalShown")) {

//     function showModal() {
//       fcmpModalWrapper.style.display = "flex";
//       localStorage.setItem("fcmpModalShown", "true");
//     }

//     // Show modal after 5 seconds
//     setTimeout(showModal, 5000);

//     // Close modal on X
//     fcmpClose.onclick = () => {
//       fcmpModalWrapper.style.display = "none";
//     };

//     // Close modal when clicking outside
//     fcmpModalWrapper.onclick = (e) => {
//       if (e.target === fcmpModalWrapper) {
//         fcmpModalWrapper.style.display = "none";
//       }
//     };
//   }
// });

