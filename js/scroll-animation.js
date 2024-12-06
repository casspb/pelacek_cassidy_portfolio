(() => {
    const menuItems = document.querySelectorAll(".navbar ul li");
    //menu scroll to animation 
    gsap.registerPlugin(ScrollToPlugin)

    document.querySelectorAll("nav ul li").forEach((btn, index) => {
        btn.addEventListener("click", () => {
          gsap.to(window, {duration: 1, scrollTo:{y:"#section" + (index + 1), offsetY:70}});
        });
      });

      menuItems.forEach(item => {
        item.addEventListener("click", () => {
            // Uncheck the #menu-bar to hide the menu
            document.getElementById("menu-bar").checked = false;
        });
    });
})();