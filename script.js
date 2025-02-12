// Handle form submission for contributing knowledge
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();

    const contributeText = document.getElementById('contributeText').value;
    const fileUpload = document.getElementById('fileUpload').files[0];

    // Check if there's any content to contribute
    if (contributeText || fileUpload) {
        alert("Your knowledge has been submitted!");
        // You can add further functionality to store data (in a database, for instance).
    } else {
        alert("Please provide some knowledge to contribute.");
    }
});

// Handle search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const resultsContainer = document.getElementById('searchResults');

    // Mock data for knowledge base
    const knowledgeBase = [
        { title: "Traditional Folk Music", region: "South India", language: "Tamil" },
        { title: "Local Farming Practices", region: "North India", language: "Hindi" },
        { title: "Folk Stories from the Desert", region: "Rajasthan", language: "Hindi" }
    ];

    // Clear existing results
    resultsContainer.innerHTML = '';

    // Filter the knowledge based on search term
    const filteredResults = knowledgeBase.filter(knowledge =>
        knowledge.title.toLowerCase().includes(searchTerm) ||
        knowledge.region.toLowerCase().includes(searchTerm) ||
        knowledge.language.toLowerCase().includes(searchTerm)
    );

    // Display filtered results
    filteredResults.forEach(result => {
        const listItem = document.createElement('li');
        listItem.classList.add('p-2', 'border', 'rounded', 'mt-2');
        listItem.textContent = `${result.title} - ${result.region} (${result.language})`;
        resultsContainer.appendChild(listItem);
    });
});

// Basic User Authentication (mock)
document.querySelector('#auth form').addEventListener('submit', function(e) {
    e.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Hardcoded login credentials (for demo purposes)
    if (username === "user" && password === "password") {
        alert("Welcome, " + username + "!");
        // Add logic to redirect or show authenticated content
    } else {
        alert("Invalid username or password.");
    }
});