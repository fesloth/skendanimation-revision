// Get the report button and options elements
const reportBtn = document.getElementById('reportBtn');
const reportOptions = document.getElementById('reportOptions');

// Toggle the visibility of the report options when the button is clicked
reportBtn.addEventListener('click', () => {
    reportOptions.classList.toggle('show');
});

// Function to handle the report action
function reportIssue(issueType) {
    alert(`You reported: ${issueType}`);

    reportOptions.classList.remove('show');
}

