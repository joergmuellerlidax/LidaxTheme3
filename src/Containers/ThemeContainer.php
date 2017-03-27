    <?php

    namespace CeresSadingo\Containers;

    use Plenty\Plugin\Templates\Twig;

    class ThemeContainer
    {
        public function call(Twig $twig):string
        {
            return $twig->render('CeresSadingo::content.CeresSadingo');
        }
    }
