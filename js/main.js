(() => {
    //video player stuff
    const playerCon = document.querySelector('#player-container');
    const player = document.querySelector('video');
    const pauseButton = document.querySelector('#pause-button');
    const stopButton = document.querySelector('#stop-button');
    const volumeSlider = document.querySelector("#change-vol");
    const fullScreen = document.querySelector("#full-screen");
    const videoControls = document.querySelector('#video-controls');
    const bigPlay = document.querySelector('.play-button');
    const video = document.querySelector('video');

    player.controls = false;

    player.volume = 0.5;
    volumeSlider.value = 0.5;

    function pauseVideo() {
        player.pause();
        bigPlay.style.display = 'flex';
    }

    function playVideo() {
        player.play();
        bigPlay.style.display = 'none';
    }

    function stopVideo() {
        player.pause();
        player.currentTime = 0;
        player.load();
    }

    function changeVolume() {
        player.volume = volumeSlider.value;
    }

    function toggleFullScreen() {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            playerCon.requestFullscreen();
        }
    }

    function handleVideoClick() {
        if (player.paused) {
            playVideo();
        } else {
            pauseVideo();
        }
    }

    pauseButton.addEventListener("click", () => {
        if (player.paused) {
            playVideo();
        } else {
            pauseVideo();
        }
    });

    
    stopButton.addEventListener("click", stopVideo);
    volumeSlider.addEventListener("input", changeVolume);
    fullScreen.addEventListener("click", toggleFullScreen);
    bigPlay.addEventListener("click", playVideo);

    player.addEventListener('play', () => {
        videoControls.style.display = 'flex';
    });

    player.addEventListener('pause', () => {
        videoControls.style.display = 'none';
    });

    player.addEventListener('ended', () => {
        player.pause();
        player.currentTime = 0;
        player.load();
        videoControls.style.display = 'none';
    });

    player.addEventListener('click', handleVideoClick);
})();
