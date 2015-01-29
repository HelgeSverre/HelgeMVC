<?php


// TODO: Implement cryptography function



/**
 * Helper class used for various tasks like generating anchor links and redirecting the user to a different page.
 */
class Helper {

    /**
     * @return string the base url to the application.
     */
    public static function URL() {

        $protocol = self::isSecure() ? 'https://' : 'http://';

        return $protocol . $_SERVER['HTTP_HOST'] . '/';
    }


    /**
     * Redirects the user by using the header() function.
     * @param string $url url to redirect to
     */
    public static function Redirect($url) {
        header("Location: {$url}");
    }


    /**
     * Will include a partial view file into the application, useful for widgets and forms.
     * @param string $name name of the partial view to load and display.
     */
    public static function LoadPartial($name) {

        $name = str_replace(".", "/", $name);
        $filepath = PARTIALS_PATH . $name . ".php";

        if (file_exists($filepath)) {
            include $filepath;
        } else {
            Bootstrap::Error("The partial file <b>". $filepath . "</b> does not exist." );
        }
    }


    /**
     * @param string $href target of the anchor link
     * @param string $text the text for the anchor link
     * @param string $class optional class name attribute for the anchor link
     * @param string $id optional  id attribute for anchor link
     * @param string $rel optional rel attribute for the anchor link
     * @return string the complete anchor tag
     */
    public static function Anchor($href, $text, $class = "", $id = "", $rel = "") {

        $anchor = "<a href='" . $href . "'";

        if(!empty($class))
            $anchor .= " class='" . $class . "'";

        if(!empty($id))
            $anchor .= " id='" . $id . "'";

        if(!empty($rel))
            $anchor .= " rel='" . $rel . "'";

        $anchor .= ">" . $text . "</a>";

        return $anchor;
    }


    /**
     * Helper class for creating a <link rel="stylesheet"> tag
     * @param string $href path to the css file inside public/css/
     */
    public static function LoadStylesheet($path) {
        echo "<link rel='stylesheet' href='" . self::URL() . STYLESHEETS_PATH . $path . "'>";
    }


    /**
     * Helper class for creating a <link rel="stylesheet"> tag
     * @param string $href path to the css file inside public/css/
     */
    public static function LoadScript($path) {
        echo "<script src='" . self::URL() .  SCRIPTS_PATH . $path . "'></script>";
    }


    /**
     * checks if the server is running under HTTPS.
     * @return bool https is enabled.
     */
    public static function isSecure() {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? true : false;
    }


    /**
     * @param string $text the text you want inside the title tags
     */
    public static function Title($text) {
        echo '<title>' . $text . '</title>';
    }

}