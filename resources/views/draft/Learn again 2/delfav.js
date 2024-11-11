// Function to handle the favorite feature
function toggleFavoritePost(postId, button) {
    let favoritePosts = JSON.parse(localStorage.getItem('favoritePosts')) || [];

    if (favoritePosts.includes(postId)) {
        // Remove from favorites
        favoritePosts = favoritePosts.filter(id => id !== postId);
        button.classList.remove('favorited');
        button.textContent = 'Favorite';
    } else {
        // Add to favorites
        favoritePosts.push(postId);
        button.classList.add('favorited');
        button.textContent = 'Favorited';
    }

    // Update localStorage
    localStorage.setItem('favoritePosts', JSON.stringify(favoritePosts));
    displayFavoritePosts();
}

// Function to display the favorite posts
function displayFavoritePosts() {
    let favoritePosts = JSON.parse(localStorage.getItem('favoritePosts')) || [];
    const favoritePostsContainer = document.getElementById('favorite-posts');
    favoritePostsContainer.innerHTML = '';

    favoritePosts.forEach(postId => {
        const post = document.querySelector(`.post[data-post-id="${postId}"]`);
        const savedPostClone = post.cloneNode(true);
        savedPostClone.querySelector('.favorite-btn').remove();
        savedPostClone.querySelector('.delete-btn').remove();
        savedPostClone.classList.add('saved-post');
        favoritePostsContainer.appendChild(savedPostClone);
    });
}

// Function to delete a post
function deletePost(postId) {
    const post = document.querySelector(`.post[data-post-id="${postId}"]`);
    post.remove(); // Remove the post from the DOM

    // Remove from favorites if it's marked as favorite
    let favoritePosts = JSON.parse(localStorage.getItem('favoritePosts')) || [];
    if (favoritePosts.includes(postId)) {
        favoritePosts = favoritePosts.filter(id => id !== postId);
        localStorage.setItem('favoritePosts', JSON.stringify(favoritePosts));
        displayFavoritePosts(); // Update the favorite posts section
    }
}

// Initialize the favorite and delete buttons
function initialize() {
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Add event listeners for the favorite buttons
    favoriteButtons.forEach(button => {
        const postId = button.closest('.post').getAttribute('data-post-id');
        button.addEventListener('click', () => toggleFavoritePost(postId, button));
    });

    // Add event listeners for the delete buttons
    deleteButtons.forEach(button => {
        const postId = button.closest('.post').getAttribute('data-post-id');
        button.addEventListener('click', () => deletePost(postId));
    });

    // Display any saved favorite posts on page load
    displayFavoritePosts();
}

// Run the initialize function when the page loads
window.onload = initialize;
