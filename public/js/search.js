$(document).ready(function () {
  $("#search-bar").keyup(function () {
    var searchTerm = $(this).val();
    $.ajax({
      url: "/wikis/show-all",
      type: "POST",
      data: { searchTerm: searchTerm },
      success: function (data) {
        displaySearchResults(data);
        console.log('gg');
      },
    });
  });

  function displaySearchResults(results) {
    var searchResultsDiv = $("#searchResults");
    searchResultsDiv.empty();

    if (results.length === 0) {
      searchResultsDiv.append("<p>No results found</p>");
    } else {
      results.forEach(function (wiki) {
        var wikiHtml = '<div class="wiki">';
        wikiHtml += "<h2>" + wiki.title + "</h2>";
        wikiHtml += "<p>" + wiki.content + "</p>";
        wikiHtml += "</div>";
        searchResultsDiv.append(wikiHtml);
      });
    }
  }
});
