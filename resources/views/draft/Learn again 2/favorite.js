// Function to save or unsave a post
function toggleSavePost(postId, button) {
    let savedPosts = JSON.parse(localStorage.getItem('savedPosts')) || [];

    // Convert postId to string to avoid type mismatch
    postId = postId.toString();

    if (savedPosts.includes(postId)) {
        // If post is already saved, remove it
        savedPosts = savedPosts.filter(id => id !== postId);
        button.classList.remove('saved');
        button.textContent = 'Save';
    } else {
        // If post is not saved, save it
        savedPosts.push(postId);
        button.classList.add('saved');
        button.textContent = 'Saved';
    }

    // Save the updated saved posts to localStorage
    localStorage.setItem('savedPosts', JSON.stringify(savedPosts));

    // Update the saved posts list
    displaySavedPosts();
}

// Function to display saved posts in the "Saved Posts" section
function displaySavedPosts() {
    let savedPosts = JSON.parse(localStorage.getItem('savedPosts')) || [];
    const savedPostsContainer = document.getElementById('saved-posts');
    savedPostsContainer.innerHTML = ''; // Clear existing saved posts

    savedPosts.forEach(postId => {
        const post = document.querySelector(`.post[data-post-id="${postId}"]`);
        const savedPostClone = post.cloneNode(true);
        savedPostClone.querySelector('.save-btn').remove(); // Remove save button
        savedPostClone.classList.add('saved-post');
        savedPostsContainer.appendChild(savedPostClone);
    });
}

// Function to check saved posts on page load and mark them as "Saved"
function initializeSavedPosts() {
    let savedPosts = JSON.parse(localStorage.getItem('savedPosts')) || [];
    const saveButtons = document.querySelectorAll('.save-btn');

    saveButtons.forEach(button => {
        const postId = button.closest('.post').getAttribute('data-post-id').toString();

        if (savedPosts.includes(postId)) {
            button.classList.add('saved');
            button.textContent = 'Saved';
        }

        // Add click event listener to each save button
        button.addEventListener('click', () => toggleSavePost(postId, button));
    });

    displaySavedPosts(); // Display saved posts initially
}

// Initialize the saved posts functionality when the page loads
window.onload = initializeSavedPosts;
