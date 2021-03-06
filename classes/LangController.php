<?php
/**
*   @author ShahidKhan
*   @link   https://github.com/shahidkh4n/multiple-language-for-php-web-app
*/
class LangController{
    // If you used translator be sure to copy list from Translate.php
    /**
    * @var ids of languages
    */
    public $langIDMap = [
        'en'        => 'English',
        'hi'        => 'Hindi',
        'gu'        => 'Gujrati',
        'kn'        => 'Kannad',
        'mr'        => 'Marathi',
        'sd'        => 'Sindhi',
        'te'        => 'Telgu',
        'ur'        => 'Urdu',
        'bn'        => 'Bangla',
        'ml'        => 'Malyalam',
        'sw'        => 'Swahili',
        'af'        => "Afrikaans",
        'sq'        => "Albanian",
        'ar'        => "Arabic",
        'be'        => "Belarusian",
        'bg'        => "Bulgarian",
        'ca'        => "Catalan",
        'zh-cn'     => "Chinese (Simpl)",
        'zh-tw'     => "Chinese (Trad)",
        'hr'        => "Croatian",
        'cs'        => "Czech",
        'da'        => "Danish",
        'nl'        => "Dutch",
        'en'        => "English",
        'et'        => "Estonian",
        'tl'        => "Filipino",
        'fi'        => "Finnish",
        'fr'        => "French",
        'gl'        => "Galician",
        'de'        => "German",
        'el'        => "Greek",
        'ht'        => "Haitian Creole",
        'iw'        => "Hebrew",
        'hi'        => "Hindi",
        'hu'        => "Hungarian",
        'is'        => "Icelandic",
        'id'        => "Indonesian",
        'ga'        => "Irish",
        'it'        => "Italian",
        'ja'        => "Japanese",
        'ko'        => "Korean",
        'lv'        => "Latvian",
        'lt'        => "Lithuanian",
        'mk'        => "Macedonian",
        'ms'        => "Malay",
        'mt'        => "Maltese",
        'no'        => "Norwegian",
        'fa'        => "Persian",
        'pl'        => "Polish",
        'pt'        => "Portuguese",
        'ro'        => "Romanian",
        'ru'        => "Russian",
        'sr'        => "Serbian",
        'sk'        => "Slovak",
        'sl'        => "Slovenian",
        'es'        => "Spanish",
        'sw'        => "Swahili",
        'sv'        => "Swedish",
        'th'        => "Thai",
        'tr'        => "Turkish",
        'uk'        => "Ukrainian",
        'vi'        => "Vietnamese",
        'cy'        => "Welsh",
        'yi'        => "Yiddish",
    ];
    /**
    * includes lang_*.php file based on current cookie value
    * @return (array) of language map
    */
    public function init()
    {
        $current_lang = $this->getCurrentLang();
        $lang_file = "classes/lang_{$current_lang}.php";
        if(file_exists($lang_file)) {
            include $lang_file;
            return $language;
        }
        echo "<!-- No file named $current_lang found so using default one -->";
        include "classes/lang_en.php";
        return $language;
    }

    /**
    * Returns Current Language ID
    * @return languageID
    */
    public function getCurrentLang()
    {
        if(isset($_COOKIE['lang'])){
            return $_COOKIE['lang'];
        }
        return "en"; // By default return english
    }
    /**
    * Sets Cookie value which is supposed to be the ID of language
    * @return (bool)
    */
    public function setCurrentLang($lang)
    {
        return setcookie("lang", $lang, 0);
    }
    /**
    * @return (array) Language ID Name Pair
    */
    public function getLangList(){
        $list = glob('classes/lang_*.php');
        $name = [];
        foreach($list as $langName){
            $id = substr($langName, -6, -4);
            $name[$id] = $this->langIDMap[$id];
        }

        return $name;
    }


}


