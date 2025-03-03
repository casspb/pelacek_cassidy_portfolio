(() => {
    gsap.to('#container1', {
        rotation: 360,
        scale: 1.5,
        duration: 15,
        repeat: -1, 
        ease: 'power1.inOut',
        yoyo: true 
    });

    gsap.to('#container2', {
        rotation: -360,
        scale: 1.2,
        duration: 15,
        repeat: -1, 
        ease: 'power1.inOut',
        yoyo: true
    });

    gsap.to('#container3', {
        rotation: 180,
        scale: 2,
        duration: 15,
        repeat: -1, 
        ease: 'power1.inOut',
        yoyo: true
    });
    
  })();