(() => {
    const track = document.querySelector(".toolkit-track");
    
    // Duplicate images for smooth looping
    track.innerHTML += track.innerHTML;

    let speed = 1; // Adjust scrolling speed
    function autoScroll() {
        track.style.transform = `translateX(${track.offsetLeft - speed}px)`;
        
        if (Math.abs(track.offsetLeft) >= track.scrollWidth / 2) {
            track.style.transform = "translateX(0)";
        }

        requestAnimationFrame(autoScroll);
    }

    autoScroll();
})();
