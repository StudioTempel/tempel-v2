<?php

namespace Tempel;

/**
 * Generate a search input
 *
 */
function search_input(): void
{
    ?>
        <div class="form-group tempel-search">
            <label for="search">Zoeken</label>
            <div class="input-wrapper">
                <div class="search-input">
                    <input type="search" name="search" id="search" placeholder="Zoeken">
                    <span class="icon icon-search">
                        <i class="i-search"></i>
                    </span>
                    <span class="icon icon-delete">
                        <i class="i-delete"></i>
                    </span>
                </div>
            </div>
        </div>
    <?php
}