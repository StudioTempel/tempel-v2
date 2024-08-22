<!-- Voeg dit toe waar je de zoekbalk wilt plaatsen -->
<form id="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" id="search-input" name="s" placeholder="Search..." autocomplete="off" />
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
            xhr.open("GET", "<?php echo admin_url('admin-ajax.php'); ?>?action=ajax_search&query=" + query, true);

            xhr.onload = function() {
                if (this.status === 200) {
                    searchResults.innerHTML = this.responseText;
                }
            };

            xhr.send();
        });
    });