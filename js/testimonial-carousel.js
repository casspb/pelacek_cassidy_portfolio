const scrollers = document.querySelectorAll(".testimonial-section");

addAnimation();

function addAnimation(){
    scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);

        const scrollerInner = scroller.querySelector(".testimonial-carousel");
        const scrollerContent = Array.from(scrollerInner.children);

        scrollerContent.forEach(item => {
            const duplicatedItem = item.cloneNode(true);
            scrollerInner.appendChild(duplicatedItem);
        });

        // Add event listeners to pause the animation on hover or click
        const testimonials = scrollerInner.querySelectorAll('.testimonial');
        
        testimonials.forEach((testimonial) => {
            testimonial.addEventListener('mouseenter', () => {
                pauseAnimation(scrollerInner);
            });

            testimonial.addEventListener('mouseleave', () => {
                resumeAnimation(scrollerInner);
            });

            testimonial.addEventListener('click', () => {
                pauseAnimation(scrollerInner);
            });
        });
    });
}

// Function to pause the animation
function pauseAnimation(scrollerInner) {
    scrollerInner.style.animationPlayState = 'paused';
}

// Function to resume the animation
function resumeAnimation(scrollerInner) {
    scrollerInner.style.animationPlayState = 'running';
}
