(() => {
    const categoryButtons = document.querySelectorAll('.sorting-buttons');
    const projectCards = document.querySelectorAll('.project-card');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const selectedCategory = button.getAttribute('data-category').toLowerCase();
            
            projectCards.forEach(card => {
                const cardCategories = card.getAttribute('data-categories').toLowerCase();
                
                if (cardCategories.includes(selectedCategory)) {
                    card.style.display = 'block'; // Show the project card
                } else {
                    card.style.display = 'none'; // Hide the project card
                }
            });
        });
    });
    })();