document.getElementById('file-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-pic').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});