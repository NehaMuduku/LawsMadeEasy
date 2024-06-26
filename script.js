// suggestions.js

// Define an array of keywords and corresponding HTML page URLs
const keywordsAndUrls = [
  { keyword: "health", url: "health.html" },
  { keyword: "education", url: "education.html" },
  { keyword: "transportation", url: "transportation.html" },
  { keyword: "employment", url: "employment.html" },
  { keyword: "sales", url: "sales.html" },
  { keyword: "service", url: "service.html" },
];

// Get the input element and the suggestions list
const inputElement = document.getElementById("autocomplete-input");
const suggestionsList = document.getElementById("autocomplete-list");

// Get the search icon element
const searchButton = document.getElementById("search-button");

// Add an event listener for input changes
inputElement.addEventListener("input", () => {
  const inputValue = inputElement.value.toLowerCase();
  const matchingKeywords = keywordsAndUrls.filter((item) =>
      item.keyword.toLowerCase().includes(inputValue)
  );

  // Clear previous suggestions
  suggestionsList.innerHTML = "";

  // Add matching suggestions to the list
  matchingKeywords.forEach((item) => {
      const suggestionItem = document.createElement("li");
      suggestionItem.textContent = item.keyword;
      suggestionItem.addEventListener("click", () => {
          // Navigate to the corresponding HTML page when a suggestion is clicked
          window.location.href = item.url;
      });
      suggestionsList.appendChild(suggestionItem);
  });

  // Show or hide the suggestions list based on matches
  if (matchingKeywords.length > 0) {
      suggestionsList.style.display = "block";
  } else {
      suggestionsList.style.display = "none";
  }
});

// Add an event listener for the search icon
searchButton.addEventListener("click", () => {
  const inputValue = inputElement.value.toLowerCase();
  const matchingKeyword = keywordsAndUrls.find((item) =>
      item.keyword.toLowerCase() === inputValue
  );

  // If a matching keyword is found, navigate to the corresponding HTML page
  if (matchingKeyword) {
      window.location.href = matchingKeyword.url;
  }
});