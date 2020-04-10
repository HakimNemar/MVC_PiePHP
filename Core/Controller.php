<?php

namespace Core;

class Controller
{
    static public $_render;

    protected function render($view, $scope = []) {
        extract($scope);
        if ($view == "404") {
            $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'Error', $view]) . '.php';
        }
        else {
            $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace(["Controller", "\\"], '', basename(get_class($this))), $view]) . '.php';
        }
        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }

        $pattern = [];
        $pattern[0] = '/\{\{(\$.*)\}\}/';
        $pattern[1] = "/@if\((\s*.*\s*)\)/";
        $pattern[2] = "/@elseif\((\s*.*\s*)\)/";
        $pattern[3] = "/@else/";
        $pattern[4] = "/@endif/";
        $pattern[5] = "/@foreach\((\s*.*\s*)\)/";
        $pattern[6] = "/@endforeach/";
        $pattern[7] = "/@isset\((\s*.*\s*)\)/";
        $pattern[8] = "/@endisset/";
        $pattern[9] = "/@empty\((\s*.*\s*)\)/";
        $pattern[10] = "/@endempty/";

        $remplace = [];
        $remplace[0] = "<?= htmlentities($1) ?>";
        $remplace[1] = "<?php if($1): ?>";
        $remplace[2] = "<?php elseif($1): ?>";
        $remplace[3] = "<?php else: ?>";
        $remplace[4] = "<?php endif; ?>";
        $remplace[5] = "<?php foreach($1): ?>";
        $remplace[6] = "<?php endforeach; ?>";
        $remplace[7] = "<?php if(isset($1)): ?>";
        $remplace[8] = "<?php endif; ?>";
        $remplace[9] = "<?php if(empty($1)): ?>";
        $remplace[10] = "<?php endif; ?>";
        
        self::$_render = preg_replace($pattern, $remplace, self::$_render);
        return self::$_render;
    }
}