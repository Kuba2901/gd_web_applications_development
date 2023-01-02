<?php 

class UploadImageMethods {
    public static function autofillAuthor() {
        if (isset($_SESSION["userLogin"])) {
            echo '
                <input
                type="text"
                name="author"
                id="author"
                class="formbold-form-input"
                value="'.$_SESSION['userLogin'].'"
                disabled
                required
                />
            ';
        } else {
            echo '
                <input
                type="text"
                name="author"
                id="author"
                class="formbold-form-input"
                required
                />
            ';
        }
    }

    public static function showPublicPrivate() {
        if (isset($_SESSION["userLogin"])) {
            echo '
                <br>
                <br>
                <h3 class="formbold-form-label">Wybierz rodzaj</h3>
                <input type="radio" id="public" name="visibility" value="public" checked>
                <label for="html" style="color: #f2f2f2;">Public</label>
                <br>
                <input type="radio" id="private" name="visibility" value="private">
                <label for="css" style="color: #f2f2f2;">Private</label>
            ';
        } else {
            echo '
                <div style="display: none;">
                    <br>
                    <br>
                    <h3 class="formbold-form-label">Wybierz rodzaj</h3>
                    <input type="radio" id="public" name="visibility" value="public" checked>
                    <label for="html" style="color: #f2f2f2;">Public</label>
                    <br>
                    <input type="radio" id="private" name="visibility" value="private">
                    <label for="css" style="color: #f2f2f2;">Private</label>
                </div>
            ';
        }
    }
}

?>