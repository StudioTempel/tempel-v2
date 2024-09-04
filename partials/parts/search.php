<!-- Voeg dit toe waar je de zoekbalk wilt plaatsen -->
<form id="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" id="search-input" name="s" placeholder="Zoeken" autocomplete="off" />
    <div id="search-results"></div>
</form>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-input");
        const searchResults = document.getElementById("search-results");

        searchInput.addEventListener("input", function() {
            let query = searchInput.value;

            if (query.length < 3) {
                searchResults.innerHTML = "";
                return;
            }

            let xhr = new XMLHttpRequest();
            let url = "<?php echo admin_url('admin-ajax.php'); ?>";
            let params = "action=ajax_search&query=" + encodeURIComponent(query);

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                console.log(this.responseText);
                if (this.status === 200) {
                    try {
                        let response = JSON.parse(this.responseText);
                        if (response.success) {
                            let results = response.data;
                            let resultsHtml = '<ul>';
                            results.forEach(function(result) {
                                resultsHtml += '<li><a href="' + result.url + '">' + result.title + '</a></li>';
                            });
                            resultsHtml += '</ul>';
                            searchResults.innerHTML = resultsHtml;
                        } else {
                            searchResults.innerHTML = '<p>Geen resultaten gevonden</p>';
                        }
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                    }
                } else {
                    searchResults.innerHTML = '<p>There was an error with the search request.</p>';
                }
            };

            xhr.send(params);
        });
    });
</script>
