<?php
class Demo_Twig_Extension extends Twig_Extension
{
    // see http://twig.sensiolabs.org/doc/advanced.html

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('toStr', array($this, 'toStrFilter')), // $this那邊是class
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('navBar', array($this, 'navBarFunction')), // $this那邊是class
        );
    }

    public function toStrFilter($type)
    {
        switch ($type) {
        case 1:
            $str = 'type = 1的時候會被filter換成這串字';
            break;
        case 2:
            $str = 'type = 2...(下略)';
            break;
        case 3:
            $str = '他們可是有三個啊～～～～';
            break;
        default:
            $str = '預設的type';
        }

        return $str;
    }

    public function navBarFunction($num)
    {
        $i = (int)$num;
        $html = '';
        if (1 < $i) {
            $html .= '<a href="demo_' . sprintf('%02d', $i - 1) . '.php">Prev</a>';
        }
        $html .= '<b> ' . $i . ' </b>';
        $html .= '<a href="demo_' . sprintf('%02d', $i + 1) . '.php">Next</a>';

        return $html;
    }

    public function getName()
    {
        return 'demo';
    }
}
