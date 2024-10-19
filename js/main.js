// Select elements
const playerCon = document.querySelector('#player-container');
const player = document.querySelector('video');
const videoControls = document.querySelector('#video-controls');
const playButton = document.querySelector('#play-button');
const pauseButton = document.querySelector('#pause-button');
const stopButton = document.querySelector('#stop-button');
const volumeSlider = document.querySelector("#change-vol");
const fullScreen = document.querySelector("#full-screen");


player.controls = false;

// Basic Video controls
function playVideo() {
    player.play();
    playButton.style.display = 'none'; 
    videoControls.style.display = 'flex'; 
}

function pauseVideo() {
    player.pause();
    playButton.style.display = 'flex'; 
}

function stopVideo() {
    player.pause(); // Pause the video
    player.currentTime = 0; // Reset video to start
    player.load(); // Reload the video to ensure the poster shows
    playButton.style.display = 'flex'; // Show the play button when stopped
    videoControls.style.display = 'none'; // Optionally hide controls
}

// Update volume based on slider
function changeVolume() {
    player.volume = volumeSlider.value;
}

// Toggle full screen mode
function toggleFullScreen() {
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        playerCon.requestFullscreen();
    }
}

// Event listeners
playButton.addEventListener("click", playVideo);
pauseButton.addEventListener("click", pauseVideo);
stopButton.addEventListener("click", stopVideo);
volumeSlider.addEventListener("input", changeVolume);
fullScreen.addEventListener("click", toggleFullScreen);

// Show controls when video is playing
player.addEventListener('play', () => {
    playButton.style.display = 'none'; // Hide play button
    videoControls.style.display = 'flex'; // Show controls
});

// Show play button when paused or ended
player.addEventListener('pause', () => {
    playButton.style.display = 'flex'; // Show play button
});

// Reset video to poster when it ends
player.addEventListener('ended', () => {
    player.pause(); // Ensure video is paused
    player.currentTime = 0; // Reset video to start
    player.load();
    playButton.style.display = 'flex'; // Show play button when video ends
    videoControls.style.display = 'none'; // Hide controls when video ends
});

