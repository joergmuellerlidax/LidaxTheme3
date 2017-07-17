    <?php
     
    namespace LidaxTheme\Containers;
     
    use Plenty\Plugin\Templates\Twig;
     
    class LidaxThemeContainer
    {
        public function call(Twig $twig):string
        {
            return $twig->render('LidaxTheme::LidaxTheme');
        }
    }