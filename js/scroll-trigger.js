gsap.registerPlugin(ScrollTrigger);

gsap.utils.toArray(".photo-item, .scroll-fade").forEach((element) => {
  gsap.fromTo(
    element,
    { opacity: 0, y: 50 },
    {
      opacity: 1,
      y: 0,
      duration: 1,
      ease: "power3.out",
      scrollTrigger: {
        trigger: element,
        start: "top 90%",
        toggleActions: "play none none reverse",
      },
    }
  );
});