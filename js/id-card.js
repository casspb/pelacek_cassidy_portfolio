(() => {

    // Variables
    const hotspots = document.querySelectorAll('.Hotspot');
  
    // the array for the hotspot info including alt tags
    const hotspotInfo = [
      {
        id: 'hotspot-1',
        p: "hope the government doesn't get mad about this one"
      },
      {
        id: 'hotspot-2',
        p: 'silly old me is invisible'
      },
      {
        id: 'hotspot-3',
        p: 'I will not be expiring!!'
      },
      {
        id: 'hotspot-4',
        p: 'I can drive, thankfully'
      },
      {
        id: 'hotspot-5',
        p: 'available for work!'
      }
    ];
  
    // Function to show content dynamically rather than hard coded in the html 
    function showContent() {
      hotspotInfo.forEach(data => {
        const hotspotElement = document.querySelector(`button[slot="${data.id}"]`); 
        
        if (hotspotElement) {
          const annotation = hotspotElement.querySelector('.HotspotAnnotation');
          
  
          const description = document.createElement('p');
  
          description.textContent = data.p;
  
          annotation.appendChild(description);
  
          // Make sure it's hidden initially
          annotation.style.visibility = 'hidden';
        }
      });
    }
  
    showContent();
  
    // Functions for hover effects (show/hide info)
    function showInfo(e) {
      let selected = e.currentTarget.querySelector('.HotspotAnnotation');
      gsap.to(selected, 0.5, { autoAlpha: 1, visibility: 'visible' });
    }
  
    function hideInfo(e) {
      let selected = e.currentTarget.querySelector('.HotspotAnnotation');
      gsap.to(selected, 0.5, { autoAlpha: 0, visibility: 'hidden' });
    }
   
    // Keep track of the currently open info box (if any) so that you can not have multiple open at once 
    let currentOpenHotspot = null;
  
  
    //function to make it so that if its on mobile or tablet you need to actually click on the hotspots
    function isMobile() {
      return window.innerWidth <= 768;
    }
    hotspots.forEach(hotspot => {
      if (isMobile()) {
        let isVisible = false; 
  
        hotspot.addEventListener("click", (e) => {
          const selected = e.currentTarget.querySelector('.HotspotAnnotation'); 
  
          if (currentOpenHotspot && currentOpenHotspot !== selected) {
            gsap.to(currentOpenHotspot, 0.5, { autoAlpha: 0, visibility: 'hidden' });
          }
  
          
          if (isVisible) {
            gsap.to(selected, 0.5, { autoAlpha: 0, visibility: 'hidden' });
          } else {
            gsap.to(selected, 0.5, { autoAlpha: 1, visibility: 'visible' });
          }
  
          // Update which info box is currently open so that only one info box can be open at once 
          if (isVisible) {
            currentOpenHotspot = null;
          } else {
            currentOpenHotspot = selected;
          }
          isVisible = !isVisible;
        });
  
      } else {
        // On desktop use 'hover' to show/hide the info box
        hotspot.addEventListener("mouseover", showInfo); 
        hotspot.addEventListener("mouseout", hideInfo);  
      }
    });
  
  })();
  